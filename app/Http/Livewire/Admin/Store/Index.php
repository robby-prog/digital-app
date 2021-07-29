<?php

namespace App\Http\Livewire\Admin\Store;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $search;
    public $updateFormId = 0;
    public $confirming;

    protected $listeners = [
        'storeUpdate' => 'storeUpdateHandler',
        'formClose' => 'formClosehandler',
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
        return view('livewire.admin.store.index', [
            'stores' => $this->search === null ?
                Store::orderBy('name', 'ASC')->paginate($this->paginate) :
                Store::orderBy('name', 'ASC')->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])->extends('admin.template.default');
    }

    public function formClosehandler()
    {
        $this->updateFormId = 0;
    }

    public function editStore($storeId)
    {

        $this->updateFormId = $storeId;

        $store = Store::find($storeId);
        $this->emit('editStore', $store);
    }

    public function storeUpdateHandler()
    {
        $this->updateFormId = 0;
    }

    function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    function cancel()
    {
        $this->confirming = 0;
    }
    public function deleteStore($storeId)
    {
        $store = Store::find($storeId);
        $store->delete();

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
}
