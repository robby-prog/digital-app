<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\Dept;
use App\Models\Employee;
use App\Models\Level;
use App\Models\Store;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $search;

    public $nik, $name, $dept, $store, $team, $level, $image;


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
        $depts = Dept::orderBy('name', 'ASC')->get();
        $levels = Level::orderBy('name', 'ASC')->get();
        $stores = Store::orderBy('name', 'ASC')->get();
        $teams = Team::orderBy('name', 'ASC')->get();

        return view('livewire.admin.employee.index', [
            'employees' => $this->search === null ?
                Employee::orderBy('name', 'ASC')->paginate($this->paginate) :
                Employee::orderBy('name', 'ASC')->where('name', 'like', '%' . $this->search . '%')->orWhere('id', 'like', '%' . $this->search . '%')->paginate($this->paginate),
            'depts' => $depts,
            'levels' => $levels,
            'stores' => $stores,
            'teams' => $teams,

        ])->extends('admin.template.default');
    }


    function openAddEmployeeModal()
    {
        $this->nik = "";
        $this->name = "";
        $this->dept = "";
        $this->store = "";
        $this->level = "";
        $this->team = "";
        $this->image = "";
        $this->dispatchBrowserEvent('openAddEmployeeModal');
    }

    function create()
    {
        $this->validate([
            'nik' => 'required|unique:employees|numeric|min:6',
            'name' => 'required|string',
            'dept' => 'required',
            'store' => 'required',
            'level' => 'required',
            'team' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png|max:1024|nullable',
        ]);

        $image = 'https://via.placeholder.com/50x50?text=No+Image';

        if ($this->image) {
            $image = $this->image->store('img/employee');
        }


        $employee = Employee::create([
            'id' => $this->nik,
            'name' => $this->name,
            'dept_id' => $this->dept,
            'store_id' => $this->store,
            'level_id' => $this->level,
            'team_id' => $this->team,
            'image' => $image,
        ]);

        if ($employee) {
            $this->dispatchBrowserEvent('closeAddEmployeeModal');
        }
    }
}
