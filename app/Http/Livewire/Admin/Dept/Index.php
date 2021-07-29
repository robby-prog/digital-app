<?php

namespace App\Http\Livewire\Admin\Dept;

use App\Models\Dept;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $search;
    public $name, $deptId;
    public $checkedDept = [];

    protected $listeners = [
        'deleteDept',
        'deleteCheckedDept',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $updateQueryString = [
        ['search']
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {

        return view('livewire.admin.dept.index', [
            'depts' =>
            $this->search === null ?
                Dept::orderBy('name', 'ASC')->paginate($this->paginate) :
                Dept::orderBy('name', 'ASC')->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate),
        ])->extends('admin.template.default');
    }

    function openAddDeptModal()
    {
        $this->name = "";
        $this->dispatchBrowserEvent('openAddDeptModal');
    }

    function create()
    {
        $this->validate([
            'name' => 'required|unique:depts'
        ]);

        $dept = Dept::create([
            'name' => $this->name,
        ]);

        if ($dept) {
            $this->dispatchBrowserEvent('closeAddDeptModal');
        }
    }

    function openEditDeptModal($id)
    {
        $dept = Dept::find($id);

        $this->deptId = $dept->id;
        $this->name = $dept->name;

        $this->dispatchBrowserEvent('openEditDeptModal', [
            'id' => $id,
        ]);
    }

    function update()
    {


        $this->validate([
            'name' => 'required|unique:depts'
        ]);

        $dept = Dept::find($this->deptId)->update([
            'name' => $this->name,
        ]);

        if ($dept) {
            $this->dispatchBrowserEvent('closeeditDeptModal');
        }
    }

    function delete($id)
    {
        $this->dispatchBrowserEvent('swal:deleteOnly', [
            'title' => 'Apakah anda yakin ?',
            'html' => 'Data yang di hapus tidak dapat di kembalikan',
            'icon' => 'warning',
            'id' => $id,
        ]);
    }

    function deleteDept($id)
    {
        Dept::find($id)->delete();
    }

    function deleteDepts()
    {
        $this->dispatchBrowserEvent('swal:deleteSelect', [
            'title' => 'Apakah anda yakin ?',
            'html' => 'Data yang di hapus tidak dapat di kembalikan',
            'icon' => 'warning',
            'ids' => $this->checkedDept,
        ]);
    }

    function deleteCheckedDept($ids)
    {
        Dept::whereKey($ids)->delete();
        $this->checkedDept = [];
    }

    function cancel()
    {
        $this->checkedDept = [];
    }
}
