@extends('admin.template.default')

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Create Store</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form method="post" action="{{ route('store.store') }}">
    @csrf
    <div class="card-body">

      <div class="form-group">
        <label for="exampleInputEmail">Kode Store</label>
        <input type="text" class="form-control @error('id')
          is-invalid
        @enderror" id="exampleInputEmail" placeholder="Enter Kode" value="{{ old('id') }}" name="id">
        @error('id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Store</label>
        <input type="text" class="form-control @error('name')
          is-invalid
        @enderror" id="exampleInputEmail1" value="{{ old('name') }}" placeholder="Enter Dept" name="name">
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
      <a href="{{ route('admin.store') }}"  class="btn btn-secondary">Back</a>
    </div>
  </form>
  
</div>
<!-- /.card -->

@endsection