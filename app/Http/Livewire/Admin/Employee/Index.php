<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\Employee;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $store;
    public $search;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $updateQueryString = [
        'search'
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }


    public function render()
    {
        return view('livewire.admin.employee.index', [
            'employees' => $this->search === null ?
                Employee::orderBy('name', 'ASC')->paginate($this->paginate) :
                Employee::orderBy('name', 'ASC')->where('name', 'like', '%' . $this->search . '%')->orWhere('id', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])->extends('admin.template.default');
    }
}
