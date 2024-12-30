<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryCreate extends Component
{
    #[Validate(['required' , 'string' , 'unique:categories,title' , 'max:32' , 'min:3'])]
    public string $title;

    public function store()
    {
        $this->validate();

        \App\Models\Category::query()
            ->create(['title' => $this->title]);

        $this->redirectRoute('admin.category.index' , '' , true, true);

    }

    public function render()
    {
        return view('livewire.admin.category-create')
            ->layout('admin.layout');
    }
}
