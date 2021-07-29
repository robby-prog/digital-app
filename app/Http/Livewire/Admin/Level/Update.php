<?php

namespace App\Http\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;

class Update extends Component
{
    public $name;
    public $levelId;

    protected $listeners = [
        'editLevel' => 'editLevelHandler'
    ];

    public function render()
    {
        return view('livewire.admin.level.update');
    }

    function editLevelHandler($level)
    {
        $this->levelId = $level['id'];
        $this->name = $level['name'];
    }

    protected $rules = [
        'name' => 'required|unique:levels'
    ];

    function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    function store()
    {
        $this->validate([
            'name' => 'required|unique:levels'
        ]);

        $level = Level::find($this->levelId);

        $level->update([
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

        $this->emit('updateLevel');
    }
}
