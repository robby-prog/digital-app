@extends('admin.template.default')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col">
    @livewire('admin.dept.index')
  </div>
  <div class="col">
    @livewire('admin.level.index')
  </div>

    <div class="col">
      @livewire('admin.store.index')
    </div>
    <div class="col">
      @livewire('admin.team.index')
    </div>

</div>

</div>


@endsection