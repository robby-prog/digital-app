  <div>
      <script>
          window.addEventListener('swal',function(e){ 
          Swal.fire(e.detail);
            });
        </script>

  @if ($showUpdate)
  @livewire('admin.level.update') 
  @endif

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Level</h3>
              <a href="{{ route('level.create') }}"class="btn btn-sm btn-primary ml-3">Create</a>
              
              <button wire:click="$toggle('showUpdate')" hidden></button>
            </div>
          <div class="card-body">
                  <div class="form-group">
                      <div class="row">
        
                        <label>Show Data of</label>
                            <div class="col-sm-2">
                              <select wire:model="paginate" class="custom-select">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                              </select>
                            </div>
        
                            <div class="col-sm-4 ml-auto">
                              <input wire:model="search" type="admin" class="form-control form-control" placeholder="Search">
                            </div>
        
                      </div>
                  </div>


                    <div class="table-responsive"> 

                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 15%">
                                        Name
                                    </th>
                                    <th style="width: 5%">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                                      
                          <tbody>
                            @foreach ($levels as $level)
                            <tr>
                              <td>
                                <strong>{{ $loop->iteration }}</strong>
                              </td>
                              <td>
                                {{ $level->name}}
                              </td>
                              <td>
                                @if($confirming===$level->id)
                                <a wire:click="cancel"
                                          class="btn btn-sm btn-outline-primary">Cancel</a>
                                    <a wire:click="kill({{ $level->id }})"
                                        class="btn btn-sm btn-danger">Are you Sure ?</a>                       
                                @else
                                <a wire:click="editLevel({{ $level->id }})" class="btn btn-sm btn-primary">Edit</a>
                                    <a wire:click="confirmDelete({{ $level->id }})"
                                        class="btn btn-sm btn-outline-danger">Delete</a>

                                        
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                    
                        </table>
                    
                        {{ $levels->links() }}
                    
                    </div>
                    
                  
                    <div class="card-footer">
                      {{ $levels->links() }}
                    </div>
        </div>
          



      
  </div>
