<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PodcastUpdate extends Component
{
    use WithFileUploads;

    public \App\Models\Podcast $podcast;
    public string $title;
    public string $description;
    public int $category_id;
    public int $access_level;
    public  $cover = null;

    public function mount(\App\Models\Podcast $podcast)
    {
        $this->podcast = $podcast;
        $this->title = $podcast->title;
        $this->description = $podcast->description;
        $this->access_level = $podcast->access_level;
        $this->category_id = $podcast->category_id;
    }

    public function update()
    {
        $this->validate([
            'title' => ['required' , 'string' , 'unique:categories,title' , 'max:32' , 'min:3'],
            'description' => ['required' , 'string' , 'max:1024' , 'min:8'],
            'category_id' => ['required', 'exists:categories,id'],
            'access_level' => ['required', 'in:1,2,3'],
            'cover' => ['nullable' , 'file'],
        ]);
//
        if ($this->cover) {
            $path = $this->cover->store('images/podcast' , 'public');
        }

        $this->podcast
            ->update([
                'title' => $this->title,
                'description' => $this->description,
                'access_level' => $this->access_level,
                'category_id' => $this->category_id,
                'cover' => $path,
            ]);

        $this->redirectRoute('admin.category.index', '', true, true);
    }

    public function render()
    {
        $categories = \App\Models\Category::all();

        return view('livewire.admin.podcast-update' , ['categories' => $categories])
            ->layout('admin.layout');

    }
}
