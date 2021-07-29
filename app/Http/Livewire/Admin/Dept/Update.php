<?php

namespace App\Http\Livewire\Admin\Dept;

use App\Models\Dept;
use Livewire\Component;

class Update extends Component
{

    public $deptId;
    public $name;

    protected $listeners = [
        'editDept' => 'editDeptHandler'
    ];

    public function render()
    {
        return view('livewire.admin.dept.update');
    }

    public function editDeptHandler($dept)
    {
        $this->deptId = $dept['id'];
        $this->name = $dept['name'];
    }
    protected $rules = [
        'name' => 'required|min:3|unique:depts',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|unique:depts',
        ]);


        $dept = Dept::find($this->deptId);

        $dept->update([
            'name' => $this->name,
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Update Data Succesfully!!',
            'icon' => 'success',
            'timer' =>  3000,
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  true,
        ]);

        $this->emit('deptUpdate');
    }
}
