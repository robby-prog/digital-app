<?php

namespace App\Http\Livewire\Admin\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $teamId;
    public $paginate = 5;
    public $search;
    public $checkedTeam = [];

    protected $listeners = [
        'deleteCheckedTeam',
        'deleteTeam',
    ];

    // live Search
    function updatingSearch()
    {
        $this->resetPage();
    }

    protected $updateQueryString = [
        'search'
    ];

    function mount()
    {
        $this->search = request()->query('seerch', $this->search);
    }
    // end Live Search


    public function render()
    {
        if ($this->search === null) {
            $team = Team::orderBy('name', 'ASC')->paginate($this->paginate);
        } else {
            $team = Team::orderBy('name', 'ASC')->where('name', 'LIKE', '%'  . $this->search . '%')->paginate($this->paginate);
        }

        return view('livewire.admin.team.index', [
            'teams' => $team,
        ])->extends('admin.template.default');
    }

    // Show create Modal
    function openAddTeamModal()
    {
        $this->name = "";
        $this->dispatchBrowserEvent('openAddTeamModal');
    }

    // create Data
    function create()
    {
        $this->validate([
            'name' => 'required|unique:teams'
        ]);

        $create = Team::create([
            'name' => $this->name,
        ]);

        if ($create) {
            $this->dispatchBrowserEvent('closeAddTeamModal');
        }
    }


    // show Edit Modal
    public function openEditTeamModal($id)
    {
        $team = Team::find($id);
        $this->teamId = $team['id'];
        $this->name = $team['name'];

        $this->dispatchBrowserEvent('openEditTeamModal', [
            'id' => $id,
        ]);
    }

    // update Modal
    function update()
    {
        $id = $this->teamId;

        $this->validate([
            'name' => 'required|unique:teams',
        ]);

        $update = Team::find($id)->update([
            'name' => $this->name,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('closeEditTeamModal');
        }
    }

    // delete Only
    function delete($teamId)
    {
        $this->dispatchBrowserEvent('swal:deleteOnly', [
            'title' => 'Apakah anda yakin ?',
            'html' => 'Data yang di hapus tidak dapat di kembalikan !',
            'icon' => 'warning',
            'id' => $teamId,
        ]);
    }

    function deleteTeam($id)
    {
        Team::find($id)->delete();
    }
    //  end delete Only


    // delete Selected
    function deleteTeams()
    {
        $this->dispatchBrowserEvent('swal:deleteTeams', [
            'title' => 'Apakah anda yakin ?',
            'html' => 'Anda akan menghapus data yang di pilih !!',
            'icon' => 'warning',
            'ids' => $this->checkedTeam,
        ]);
    }

    function deleteCheckedTeam($checkedIds)
    {
        Team::whereKey($checkedIds)->delete();
        $this->checkedTeam = [];
    }
    // end delele Selected
}
