@extends('admin.template.default')

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Create</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form method="post" action="{{ route('dept.store') }}">
    @csrf
    <div class="card-body">

      <div class="form-group">
        <label for="exampleInputEmail1">Dept</label>
        <input type="text" class="form-control @error('name')
          is-invalid
        @enderror" id="exampleInputEmail1" placeholder="Enter Dept" name="name">
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
      <a href="{{ route('admin.dept') }}"  class="btn btn-sm btn-secondary">Back</a>
    </div>
  </form>
  
</div>
<!-- /.card -->

@endsection