<div class="row">
  <div class="col">
        <form method="post" wire:submit.prevent="update">
          @csrf
        <div class="input-group input-group-sm">
          <input wire:model="name" type="text" class="form-control @error('name')
                    is-invalid
                @enderror" id="exampleInputEmail1" placeholder="Enter Dept" name="name" autofocus>
          <span class="input-group-append">
            <button type="sumbit" class="btn btn-sm btn-outline-dark"><i class="fas fa-save"></i> Save</button>
            <a wire:click="$emit('formClose')" class="btn btn-sm btn-outline-dark">Cancel</a>
          </span>
        </div>
      </form>
  </div>
</div>