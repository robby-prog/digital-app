@extends('admin.template.default')

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Create</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form method="post" action="{{ route('level.store') }}">
    @csrf
    <div class="card-body">

      <div class="form-group">
        <label for="exampleInputEmail1">Level</label>
        <input wire:model="name" type="text" class="form-control @error('name')
          is-invalid
        @enderror" id="exampleInputEmail1" placeholder="Enter Level" name="name">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      <a href="{{ route('admin.level') }}"  class="btn btn-sm btn-secondary">Back</a>
    </div>
  </form>
  
</div>

@endsection