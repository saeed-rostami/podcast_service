<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CategoryCreate extends Component
{
    use WithFileUploads;

    #[Validate(['required' , 'string' , 'unique:categories,title' , 'max:32' , 'min:3'])]
    public string $title;


    #[Validate(['nullable', 'file'])]
    public $cover;

    public function store()
    {
        $this->validate();

        if ($this->cover) {
            $path = $this->cover->store('images/podcast' , 'public');
        }

        \App\Models\Category::query()
            ->create(['title' => $this->title , 'cover' => $path]);

        $this->redirectRoute('admin.category.index' , '' , true, true);

    }

    public function render()
    {
        return view('livewire.admin.category-create')
            ->layout('admin.layout');
    }
}
