<div>
    <script>
        window.addEventListener('swal',function(e){ 
        Swal.fire(e.detail);
          });


        window.addEventListener('openAddDeptModal', function()
        {
          $('.addDept').find('span').html('');
          $('.addDept').find('form')[0].reset();
          $('.addDept').modal('show');
        });

        window.addEventListener('closeAddDeptModal', function() {
          $('.addDept').find('span').html('');
          $('.addDept').find('form')[0].reset();
          $('.addDept').modal('hide');

          Swal.fire({
                        title: 'Success!',
                        text: 'Data Berhasil di Buat !!',
                        icon: 'success',
                        });

        });

        window.addEventListener('openEditDeptModal', function() {
          $('.editDept').find('span').html('');
          $('.editDept').modal('show');
        });

        window.addEventListener('closeeditDeptModal', function() {
          $('.editDept').find('span').html('');
          $('.editDept').find('form')[0].reset();
          $('.editDept').modal('hide');

          Swal.fire({
            title: 'Succsess!',
            text: 'Data Berhasil di Edit',
            icon: 'success',
          });
        });

        window.addEventListener('swal:deleteOnly', function(event){

          swal.fire({
            icon:event.detail.icon,
            title:event.detail.title,
            html:event.detail.html,
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            dangerMode: true,
          }).then((result) => {
            if(result.value) {
              window.livewire.emit('deleteDept', event.detail.id);
              Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        } else {
                            Swal.fire(
                            'Canceled!',
                            'Operation Cancelled!',
                            'error'
                            )
            }

          });
        });

        window.addEventListener('swal:deleteSelect', function(event){
          swal.fire({
            icon:event.detail.icon,
            title:event.detail.title,
            html:event.detail.html,
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            dangerMode: true,
          }).then((result) => {
            if(result.value) {
              window.livewire.emit('deleteCheckedDept', event.detail.ids);
              Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        } else {
                            Swal.fire(
                            'Canceled!',
                            'Operation Cancelled!',
                            'error'
                            )
            }

          });
        });

        
      </script>


              <div class="card">
                <div class="card-header">
                        <h3 class="card-title">Dept</h3>
                      
                        <a wire:click="openAddDeptModal()"class="btn btn-sm btn-primary ml-3">Create</a>
                        @if ($checkedDept)
                    <button wire:click="deleteDepts()" class="btn btn-sm btn-danger">Delete [{{ (count($checkedDept)) }}] Item</button>
                    <button wire:click="cancel" class="btn btn-sm btn-secondary">Cancel</button>
                    @endif
  
  
                </div>
  
                <div class="card-body">
                    <div class="row">
                      <label>Show Data of</label>
                          <div class="col-sm-2">
                            <select wire:model="paginate" class="custom-select">
                              <option value="5">5</option>
                              <option value="10">10</option>
                              <option value="20">20</option>
                            </select>
                          </div>
  
                          <div class="col-sm-5 ml-auto">
                            <input wire:model="search" type="admin" class="form-control form-control" placeholder="Search">
                          </div>
  
                    </div>
                  
                </div>
              
                
                <div class="overflow-auto">
  
                      <div class="card-body"  style="height: 300px">
                        
                          <div class="table-responsive"> 
                            
                              <table class="table table-striped projects">
                                  <thead>
                                      <tr>
                                        <th style="width: 1%"></th>
                                          <th style="width: 1%">
                                              #
                                          </th>
                                          <th style="width: 10%">
                                              Name
                                          </th>
                                          <th style="width: 5%">
                                              Action
                                          </th>
                                      </tr>
                                </thead>
                                            
                                <tbody>
                                  @foreach ($depts as $dept)
                                  <tr>
                                    <td>
                                      <input type="checkbox" value="{{ $dept->id }}" wire:model="checkedDept">
                                    </td>
                                    <td>
                                      <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>
                                      {{ $dept->name}}
                                    </td>
                                    <td>
                                    
                                      <a  wire:click="openEditDeptModal({{ $dept->id }})" class="btn btn-sm btn-primary">Edit</a>
                                      <a  wire:click="delete({{ $dept->id }})" class="btn btn-sm btn-danger">Delete</a>
  
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                          
                              </table>
                        
                      
                            
                          </div>
  
                      </div>
                </div>
                      <div class="card-footer">
                        {{ $depts->links() }}
                      </div>
            
                
            
              </div>

              @include('livewire.admin.dept.create-modal')
              @include('livewire.admin.dept.edit-modal')
              

    
</div>
