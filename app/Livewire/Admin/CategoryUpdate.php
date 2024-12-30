<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class CategoryUpdate extends Component
{

    public \App\Models\Category $category;
    public string $title;
    public function mount(\App\Models\Category $category)
    {
        $this->category = $category;
        $this->title = $category->title;
    }

    public function update()
    {
        $this->validate([
            'title' => ['required' , 'string' , 'unique:categories,title' , 'max:32' , 'min:3'],
        ]);

        $this->category
            ->update([
                'title' => $this->title,
            ]);

        $this->redirectRoute('admin.category.index', '', true, true);
    }

    public function render()
    {
        return view('livewire.admin.category-update')
            ->layout('admin.layout');

    }
}
