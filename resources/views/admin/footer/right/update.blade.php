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
    <form method="post" action="{{route('footer_right_update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="card">
        <div class="card-header header-part">
          <div class="row">
            <div class="col-md-6 card_header_title">
              <h3><i class="fa fa-gg-circle"></i> Update Footer</h3>
            </div>
            <div class="col-md-6 text-right card_header_btn">
              <a href="{{route('footer_right')}}" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>
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
          
          <div class="form-group row custom_form{{$errors->has('email')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Email Address:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="email" value="{{$data->email}}">
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('phone')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Phone No:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
              @if ($errors->has('phone'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('address')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Address:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="address" value="{{$data->address}}">
              @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
              </span>
              @endif
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