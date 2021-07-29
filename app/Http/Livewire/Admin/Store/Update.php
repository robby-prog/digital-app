<?php

namespace App\Http\Livewire\Admin\Store;

use App\Models\Store;
use Livewire\Component;

class Update extends Component
{
    public $storeId;
    public $name;

    protected $listeners = [
        'editStore' => 'editStoreHandler'
    ];

    public function render()
    {
        return view('livewire.admin.store.update');
    }

    public function editStoreHandler($store)
    {
        $this->storeId = $store['id'];
        $this->name = $store['name'];
    }

    protected $rules = [
        // 'id' => 'required|unique:stores',
        'name' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function update()
    {
        $this->validate([
            // 'id' => 'required|unique:stores',
            'name' => 'required',
        ]);
        $store = Store::find($this->storeId);

        $store->update([
            'id' => $this->storeId,
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

        $this->emit('storeUpdate');
    }
}
