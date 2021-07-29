<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Level</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" wire:submit.prevent="store">
      @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="exampleInputEmail1">Level</label>
          <input wire:model="name" type="text" class="form-control @error('name')
              is-invalid
          @enderror" id="exampleInputEmail1" placeholder="Edit Level" name="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
             @enderror
        </div>
        
        
      </div>
      <!-- /.card-body -->
  
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button wire:click="$emit('formClose')" type="submit" class="btn btn-secondary">Close</button>
      </div>
    </form>
  </div>
  <!-- /.card -->

