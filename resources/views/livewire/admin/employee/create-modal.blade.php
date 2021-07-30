<!-- Modal -->
<div class="modal fade addEmployee" wire:ignore.self id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="create" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="createdept">Nik</label>
              <input wire:model="nik" type="text" class="form-control" id="createdept" placeholder="Enter Dept" name="nik" autofocus>
              <span class="text-danger">@error('nik'){{ $message }}@enderror</span>
            </div>

            <div class="form-group">
              <label for="createname">Name</label>
              <input wire:model="name" type="text" class="form-control" id="createname" placeholder="Enter Dept" name="name" autofocus>
              <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col">
                  <label for="createdept">Dept</label>
                        <select class="custom-select" wire:model="dept" name='dept'>
                          <option value=""selected disabled>Select Dept</option>
                          @foreach ($depts as $dept)
                          <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                          @endforeach
                        </select>
              <span class="text-danger">@error('dept'){{ $message }}@enderror</span>

                </div>
                <div class="col">
                  <label for="createdept">Level</label>
                        <select class="custom-select" wire:model="level" name="level">
                        <option value=""selected disabled>Select Level</option>
                          @foreach ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                          @endforeach
                        </select>
              <span class="text-danger">@error('level'){{ $message }}@enderror</span>

                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="createdept">Store</label>
                    <select class="custom-select" wire:model="store" name='store'>
                      <option value=""selected disabled>Select Store</option>
                      @foreach ($stores as $store)
                      <option value="{{ $store->id }}">{{ $store->name }}</option>
                      @endforeach
                    </select>
              <span class="text-danger">@error('store'){{ $message }}@enderror</span>

                  </div>
                  <div class="col">
                    <label for="createdept">Team</label>
                          <select class="custom-select" wire:model="team" name="team">
                          <option value=""selected disabled>Select Team</option>
                            @foreach ($teams as $team)
                          <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                          </select>
              <span class="text-danger">@error('team'){{ $message }}@enderror</span>

                  </div>
                </div>

                <div class="form-group">
  
                    <label for="inputGroupFile01">Image</label>
                    <input type="file" class="form-control" id="inputGroupFile01" wire:model="image">
              <span class="text-danger">@error('image'){{ $message }}@enderror</span>


                </div>


            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
            
        </form>

      </div>
            
        
    </div>
  </div>
</div>