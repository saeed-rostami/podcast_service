<?php

namespace App\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public string $search = '';

    public function render()
    {
        $users = \App\Models\User::query()
            ->when($this->search !== '', fn(Builder $query) => $query

                ->where('mobile', 'like', '%'. $this->search .'%')
                ->orWhere('username', 'like', '%'. $this->search .'%')

            )
            ->orderByDesc('id')
            ->paginate(15);
        return view('livewire.admin.users' , ['users' => $users])
            ->layout('admin.layout');

    }
}
