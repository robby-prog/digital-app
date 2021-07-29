<div>
    <script>
        window.addEventListener('swal',function(e){ 
        Swal.fire(e.detail);
          });
      </script>

{{-- @if ($showUpdate)
@livewire('admin.store.update') 
@endif --}}

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Store</h3>
          <a href="{{ route('store.create') }}"class="btn btn-sm btn-primary ml-3">Create</a>
          <button  hidden></button>
        </div>
      <div class="card-body">
               <div class="form-group">
                  <div class="row">
                    
                    <label>Show Data</label>
                    
                        <div class="col-sm-1">
                          <select wire:model="paginate" class="custom-select">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>

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
                    <th style="width: 5%">
                      Image
                  </th>
                    <th style="width: 5%">
                        Nik
                    </th>
                    <th style="width: 10%">
                        Name
                    </th>
                    <th style="width: 5%">
                        Dept
                    </th>
                    <th style="width: 5%">
                        Store
                    </th>
                    <th style="width: 5%">
                        Level
                    </th>
                    <th style="width: 5%">
                        Team
                    </th>
                    <th style="width: 5%">
                        Action
                    </th>
                </tr>
          </thead>
                       
          <tbody>
            @foreach ($employees as $employee)
            <tr>
              <td>
                <strong>{{ $loop->iteration }}</strong>
              </td>
              <td>
                <img src ="{{ asset($employee->image) }}"  class="img-circle img-bordered-sm" height="60px" width="60px">
              </td>
              <td>
                {{ $employee->id}}
              </td>
              <td>
                {{ $employee->name}}
              </td>
              <td>
                {{ $employee->dept->name}}
              </td>
              <td>
                {{ $employee->store->name}}
              </td>
              <td>
                {{ $employee->level->name}}
              </td>
              <td>
                {{ $employee->team->name}}
              </td>
              <td>
                <a   class="btn btn-sm btn-primary">Edit</a>
                <a   class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
    
        </table>
    
        {{ $employees->links() }}
        
      </div>
    </div>
    </div>
    </div>
    
    </div>
    
</div>
