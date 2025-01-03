<?php

namespace App\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public string $search = '';

    public function delete($category_id): void
    {
        $category = \App\Models\Category::find($category_id);
       $category->delete();

    }
    public function render()
    {
//        $categories = \App\Models\Category::query()->paginate();

        $categories = \App\Models\Category::query()
            ->when($this->search !== '', fn(Builder $query) => $query->where('title', 'like', '%'. $this->search .'%'))
            ->orderByDesc('id')
            ->paginate(15);

        return view('livewire.admin.category' , ['categories' => $categories])
            ->layout('admin.layout');
    }
}
