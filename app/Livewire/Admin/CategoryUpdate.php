<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CategoryUpdate extends Component
{
    use WithFileUploads;

    public \App\Models\Category $category;
    public string $title;
    public  $cover = null;
    public function mount(\App\Models\Category $category)
    {
        $this->category = $category;
        $this->title = $category->title;
    }

    public function update()
    {
        $this->validate([
            'title' => ['required' , 'string' , 'unique:categories,title' , 'max:32' , 'min:3'],
            'cover' => ['nullable' , 'file'],
        ]);
//
        if ($this->cover) {
            $path = $this->cover->store('images/category' , 'public');
        }

        $this->category
            ->update([
                'title' => $this->title,
                'cover' => $path,
            ]);

        $this->redirectRoute('admin.category.index', '', true, true);
    }

    public function render()
    {
        return view('livewire.admin.category-update')
            ->layout('admin.layout');

    }
}
