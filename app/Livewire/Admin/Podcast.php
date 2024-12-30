<?php

namespace App\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Podcast extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public string $search = '';

    public function render()
    {
        $podcasts = \App\Models\Podcast::query()
            ->when($this->search !== '', fn(Builder $query) => $query->where('title', 'like', '%'. $this->search .'%'))
            ->orderByDesc('id')
            ->paginate(15);

        return view('livewire.admin.podcast' , ['podcasts' => $podcasts])
            ->layout('admin.layout');

    }
}
