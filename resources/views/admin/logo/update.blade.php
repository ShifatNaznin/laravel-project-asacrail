@extends('layouts.admin')
@section('content')
@push('css')
<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/plugins/dropify/dist/css/dropify.min.css">
@endpush
@push('js')
<script src="{{asset('contents/admin')}}/assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
  $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
</script>
@endpush
<div class="row">
  <div class="col-md-12">
    <form method="post" action="{{route('logo_update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="card">
        <div class="card-header header-part">
          <div class="row">
            <div class="col-md-6 card_header_title">
              <h3><i class="fa fa-gg-circle"></i> Update Logo and Title</h3>
            </div>
            <div class="col-md-6 text-right card_header_btn">
              <a href="{{route('logo')}}" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>
                Back</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          @if(Session::has('success'))
          <script>
            swal({
                            title: "Successfully!",
                            text: "Updated Information.",
                            timer: 5000,
                            icon: "success",
                        });

          </script>
          @endif
          @if(Session::has('error'))
          <script>
            swal({
                            title: "Opps!",
                            text: "Updated Failed.",
                            timer: 5000,
                            icon: "warning",
                        });

          </script>
          @endif
          <div class="form-group row custom_form">
            <label class="col-sm-3 col-form-label">Title:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="title" value="{{$data->title}}">
            </div>
          </div>
          <div class="form-group row custom_form">
            <label class="col-sm-3 col-form-label">Logo:</label>
            <div class="col-sm-7">
              <div class="row">
                <div class="col-8">
                  <input type="file" id="input-file-now-custom-1" name="logo" class="dropify" />
                </div>
                <div class="col-4">
                  <img src="{{asset('uploads/logo/'.$data->logo)}}" style="width: 182px;" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row custom_form">
            <label class="col-sm-3 col-form-label">Icon:</label>
            <div class="col-sm-7">
              <div class="row">
                <div class="col-8">
                  <input type="file" id="input-file-now-custom-1" name="icon" class="dropify" />
                </div>
                <div class="col-4">
                  <img src="{{asset('uploads/logo/'.$data->icon)}}" style="width: 50px;" alt="">
                </div>
              </div>
            </div>
          </div>
        
        </div>
        <div class="card-footer header-part text-center">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection