<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PodcastCreate extends Component
{

    use WithFileUploads;

    #[Validate(['required' , 'string' , 'unique:categories,title' , 'max:32' , 'min:3'])]
    public string $title;

    #[Validate(['required' , 'string' , 'unique:categories,title' , 'max:1024' , 'min:8'])]
    public string $description;
    #[Validate(['required', 'exists:categories,id'])]
    public int $category_id;

    #[Validate(['required', 'in:1,2,3'])]
    public $access_level;

    #[Validate(['required', 'file'])]
    public $cover;

    public function store()
    {
        $this->validate();

        if ($this->cover) {
            $path = $this->cover->store('images/podcast' , 'public');
        }

        \App\Models\Podcast::query()
            ->create(
                [
                    'title' => $this->title,
                    'access_level' => $this->access_level,
                    'description' => $this->description,
                    'category_id' => $this->category_id,
                    'cover' => $path,
                ]
            );

        $this->redirectRoute('admin.podcast.index' , '' , true, true);

    }
    public function render()
    {
        $categories = \App\Models\Category::all();
        return view('livewire.admin.podcast-create', ['categories' => $categories])
            ->layout('admin.layout');

    }
}
