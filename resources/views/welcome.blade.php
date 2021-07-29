<!DOCTYPE html>
<html lang="en" >
        <head>
                <meta charset="utf-8">
                <title>CKEditor</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <!-- dependencies (Summernote depends on Bootstrap & jQuery) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
        </head>
        <body>
<div class="container-fluid">
          <form method="POST" action="{{ route('post.store') }}">
            @csrf

            <div class="form-floating my-3">
              <input type="text" class="form-control" id="floatingInput" name="name">
              <label for="floatingInput">Input Judul</label>
            </div>

            
           <div class="mb-2"><textarea id="summernote-editor" name="content"></textarea>
           </div>
            <button class="btn btn-primary">Post</button>
          </form>
  <!-- summernote config -->
<script>
  $(document).ready(function(){

    // Define function to open filemanager window
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };
    

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote-editor').summernote({
      placeholder: 'input your post',
      tabsize: 2,
      height:300,
      toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize','fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['popovers', ['lfm', 'video', 'link'],],
          ['misc', ['codeview', 'fullscreen','help']],
          ['misc2', [ 'undo','redo']],

      ],
      buttons: {
        lfm: LFMButton
      }
      
    })
    
  });
</script>
<div class="row">
@foreach ($posts as $post)
<div class="col-sm-6">

  <div class="card bg-dark text-black">
    <img src="/storage/photos/test.jpeg" class="card-img" alt="..." height="200px" width="200px">
    <div class="card-img-overlay">
      <h5 class="card-title"><span class="badge bg-primary"> title</h5>
    </div>
  </div>
  <a href="#"><h3>{{ $post->name }}</h3></a>

</div>
@endforeach
</div>

{{ $posts->links('vendor.pagination.bootstrap-4') }}
            
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
</html>