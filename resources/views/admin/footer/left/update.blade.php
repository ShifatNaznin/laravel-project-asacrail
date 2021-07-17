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
    <form method="post" action="{{route('footer_left_update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="card">
        <div class="card-header header-part">
          <div class="row">
            <div class="col-md-6 card_header_title">
              <h3><i class="fa fa-gg-circle"></i> Update Footer</h3>
            </div>
            <div class="col-md-6 text-right card_header_btn">
              <a href="{{route('footer_left')}}" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>
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
          <div class="form-group row custom_form{{$errors->has('heading')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Footer Heading:</label>
            <div class="col-sm-7">
              <textarea id="my-editor" name="heading" class="form-control">{!!$data->heading!!}</textarea>
              <script src="{{asset('contents/admin')}}/assets/js/ckeditor/ckeditor.js"></script>
              <script>
                var options = {
                      width: "100%",
                  };
                  CKEDITOR.replace('my-editor', options);
              </script>
              @if ($errors->has('heading'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('heading') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('facebook_link')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Facebook Link:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="facebook_link" value="{{$data->facebook_link}}">
              @if ($errors->has('facebook_link'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('facebook_link') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('twitter_link')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Twitter Links:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="twitter_link" value="{{$data->twitter_link}}">
              @if ($errors->has('twitter_link'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('twitter_link') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('instagram_link')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Linkedin Link:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="instagram_link" value="{{$data->instagram_link}}">
              @if ($errors->has('instagram_link'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('instagram_link') }}</strong>
              </span>
              @endif
            </div>
          </div>
          {{-- <div class="form-group row custom_form{{$errors->has('pinterest_link')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Pinterest Links:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="pinterest_link" value="{{$data->pinterest_link}}">
              @if ($errors->has('pinterest_link'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('pinterest_link') }}</strong>
              </span>
              @endif
            </div>
          </div> --}}
    

        </div>
        <div class="card-footer header-part text-center">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection