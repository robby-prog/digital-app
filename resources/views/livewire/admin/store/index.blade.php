        <div>
            <script>
                window.addEventListener('swal',function(e){ 
                Swal.fire(e.detail);
                  });
              </script>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Store</h3>
                <a href="{{ route('store.create') }}"class="btn btn-sm btn-primary ml-3">Create</a>
                <button wire:click="$toggle('showUpdate')" hidden></button>
              </div>
            <div class="card-body" >
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
                            <th style="width: 10%">
                              Kode Store
                          </th>
                            <th style="width: 15%">
                                Name
                            </th>
                            <th style="width: 10%">
                                Action
                            </th>
                        </tr>
                  </thead>
                              
                  <tbody>
                    @foreach ($stores as $store)
                    <tr>
                      <td>
                        <strong>{{ $loop->iteration }}</strong>
                      </td>
                      <td>
                        A{{ $store->id}}
                      </td>
                      <td>
                        @if ($updateFormId === $store->id)
                            @livewire('admin.store.update')
                        @else
                        {{ $store->name}}
                        @endif
                      </td>
                      <td>
                        @if($updateFormId !== $store->id)
                      
                        @if ($confirming === $store->id)
                        
                        <a  wire:click="cancel" class="btn btn-sm btn-outline-primary">Cancel</a>
                        <a  wire:click="deleteStore({{ $store->id }})" class="btn btn-sm btn-danger">Are You Sure ?</a>
                        @else
                        <a  wire:click="editStore({{ $store->id }})" class="btn btn-sm btn-outline-dark"><i class="fas fa-edit"></i> Edit</a>
                        <a  wire:click="confirmDelete({{ $store->id }})" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Delete</a>
                        @endif
                        @endif
                        
                        
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
            
                </table>
          
                  {{ $stores->links() }}
              
              </div>
            </div>
            </div>
            </div>
          
            </div>



            
            
        </div>
