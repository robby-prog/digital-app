    <div>
        <script>

            // show Add Modal
            window.addEventListener('openAddTeamModal', function () {
                // const btnCreate = document.querySelector('.btn-create');
                // const btnLoading = document.querySelector('.btn-loading');

                // btnLoading.classList.toggle('d-none');
                // btnCreate.classList.toggle('d-none');
                $('.addTeam').find('span').html('');
                $('.addTeam').find('form')[0].reset();
                $('.addTeam').modal('show');
            });

            // hide Add Modal
            window.addEventListener('closeAddTeamModal', function () {
                $('.addTeam').find('span').html('');
                $('.addTeam').find('form')[0].reset();
                $('.addTeam').modal('hide');

                Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Team Berhasil di Buat !!',
                        });
            });

            // show Edit Modal
            window.addEventListener('openEditTeamModal', function (event) {
                $('.editTeam').find('span').html('');
                $('.editTeam').modal('show');
            });

            window.addEventListener('closeEditTeamModal', function() {
                $('.editTeam').find('span').html('');
                $('.addTeam').find('form')[0].reset();
                $('.editTeam').modal('hide');

                Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data Berhasil di Update !!',
                        });
            })

            // Alert Delete Single
            window.addEventListener('swal:deleteOnly', function (event) {
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
                }).then((result) =>{
                    if (result.value) {
                        window.livewire.emit('deleteTeam', event.detail.id);
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

            // Alert Delete Selected

            window.addEventListener('swal:deleteTeams', function (event) {
                swal.fire({
                    icon:event.detail.icon,
                    title:event.detail.title,
                    html:event.detail.html,
                    showCloseButton:true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    dangerMode: true,
                }).then((result) => {
                        if (result.value) {
                            // alert(event.detail.ids);
                        window.livewire.emit('deleteCheckedTeam',event.detail.ids);
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
                    <h3 class="card-title">Team</h3>
                    <a wire:click="openAddTeamModal()" class="btn btn-sm btn-primary ml-3 btn-create">Create</a>
                    <button class="btn btn-sm btn-primary btn-loading d-none ml-3" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                      </button>
                    @if ($checkedTeam)
                    <button wire:click="deleteTeams()" class="btn btn-sm btn-danger">Delete ({{ (count($checkedTeam)) }}) Item</button>
                    @endif
                            <div class="btn-group ml-1">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-upload"></i> Upload</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-download"></i> Download</button>
                            </div>
                            
                    
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
                                                    <th style="width: 1%" class="text-center">
                                                    Select
                                                    </th>
                                                    <th style="width: 1%" class="text-center">
                                                        #
                                                    </th>
                                                    <th style="width: 30%">
                                                        Name
                                                    </th>
                                                    <th style="width: 10%" class="text-center">
                                                        Action
                                                    </th>
                                                    
                                                </tr>
                                        </thead>
                                                    
                                        <tbody>
                                            @foreach ($teams as $team)
                                            <tr>
                                                <td class="text-center">
                                                    
                                                    <input type="checkbox" value="{{ $team->id }}" wire:model="checkedTeam">
                                                </td>

                                            <td class="text-center">
                                                <strong>{{ $loop->iteration }}</strong>
                                            </td>
                                            <td>
                                            {{ $team->name}}
                                            </td>
                                            
                                            <td class="text-center">
                                                <a wire:click="openEditTeamModal({{ $team->id }})" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a wire:click="delete({{ $team->id }})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                            
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    
                                        </table>
                                    
                                        {{ $teams->links() }}
                                        
                                    </div>
                        </div>
                </div>


@include('livewire.admin.team.create-modal')
@include('livewire.admin.team.edit-modal')

        
    </div>
