<!-- Modal -->
<div class="modal fade editTeam" wire:ignore.self id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Team</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="update">
          @csrf
          <input type="text" hidden wire:model="teamId">

            <div class="form-group">
              <label for="exampleInputEmail1">Team</label>
              <input wire:model="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Team" name="name">
              <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

      </div>
            
        
    </div>
  </div>
</div>