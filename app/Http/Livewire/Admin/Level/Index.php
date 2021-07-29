<?php

namespace App\Http\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $search;
    public $showUpdate;
    public $formUpdate = false;
    public $confirming;

    protected $listeners = [
        'updateLevel' => 'updateLevelHandler',
    ];

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

        if ($this->search === null) {
            $level =  level::orderBy('name', 'ASC')->paginate($this->paginate);
        } else {
            $level = level::orderBy('name', 'ASC')->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        }

        return view('livewire.admin.level.index', [
            'levels' => $level
        ])->extends('admin.template.default');
    }


    function editLevel($levelId)
    {
        $this->formUpdate = true;
        $this->showUpdate = true;

        $level = Level::find($levelId);
        $this->emit('editLevel', $level);
    }


    function updateLevelHandler()
    {
        $this->formUpdate = false;
        $this->showUpdate = false;
    }


    function confirmDelete($id)
    {
        $this->confirming = $id;
    }


    public function kill($id)
    {
        Level::destroy($id);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Delete Data Succesfully!!',
            'icon' => 'success',
            'timer' =>  3000,
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  true,
        ]);
    }

    function cancel()
    {
        $this->confirming = 0;
    }
}
