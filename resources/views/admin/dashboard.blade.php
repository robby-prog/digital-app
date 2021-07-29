@extends('admin.template.default')

@section('content')
<h1> <span id="typed3"></span></h1>
             <script src=" https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js"></script>
             <script>
               var typed3 = new Typed('#typed3', {
                strings: ['Welcome to: <i>Dashboard</i>', 'Welcome to: <strong>Area 6</strong>',],
                typeSpeed: 40,
                backSpeed: 40,
                smartBackspace: true, // this is a default
                loop: true
                });
            </script>

<div class="container">
  <h1 class="page-header">Integration Demo Page</h1>
  <div class="row">
    <div class="col-md-6">
      <h2 class="mt-4">Standalone Image Button</h2>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
            <i class="fa fa-picture-o"></i> Choose
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="filepath">
      </div>
      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    </div>
  </div>
</div>
     

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script>
 var route_prefix = "/filemanager";
</script>

<!-- CKEditor init -->


  <script>
  {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
  </script>
<script>
  $('#lfm').filemanager('image', {prefix: route_prefix});
  // $('#lfm').filemanager('file', {prefix: route_prefix});
</script>

<script>
  var lfm = function(id, type, options) {
    let button = document.getElementById(id);
    button.addEventListener('click', function () {
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      var target_input = document.getElementById(button.getAttribute('data-input'));
      var target_preview = document.getElementById(button.getAttribute('data-preview'));
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = function (items) {
        var file_path = items.map(function (item) {
          return item.url;
        }).join(',');
        // set the value of the desired input to image url
        target_input.value = file_path;
        target_input.dispatchEvent(new Event('change'));
        // clear previous preview
        target_preview.innerHtml = '';
        // set or change the preview image src
        items.forEach(function (item) {
          let img = document.createElement('img')
          img.setAttribute('style', 'height: 5rem')
          img.setAttribute('src', item.thumb_url)
          target_preview.appendChild(img);
        });
        // trigger change event
        target_preview.dispatchEvent(new Event('change'));
      };
    });
  };
  lfm('lfm2', 'file', {prefix: route_prefix});
</script>


            @endsection