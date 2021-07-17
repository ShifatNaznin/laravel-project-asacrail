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
    <form method="post" action="{{url('admin/banner/update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$banner->id}}">
      <div class="card">
        <div class="card-header header-part">
          <div class="row">
            <div class="col-md-6 card_header_title">
              <h3><i class="fa fa-gg-circle"></i> Update Banner</h3>
            </div>
            <div class="col-md-6 text-right card_header_btn">
              <a href="{{url('admin/banner')}}" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>
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
                            text: "Update Information failed.",
                            timer: 5000,
                            icon: "warning",
                        });

          </script>
          @endif
          <div class="form-group row custom_form{{$errors->has('title')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Title One:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="title" value="{{$banner->title}}">
              @if ($errors->has('title'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{ $errors->has('photo') ? ' has-error' : '' }}">
            <label class="col-sm-3 col-form-label">Banner One:</label>
            <div class="col-sm-7">
              <div class="row">
                <div class="col-8">
                  <input type="file" id="input-file-now-custom-1" name="photo" class="dropify" />
                </div>
                <div class="col-4">
                  <img src="{{ asset('uploads/banner/'.$banner->photo) }}" style="width: 182px;" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('title_two')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Title Two:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="title_two" value="{{$banner->title_two}}">
              @if ($errors->has('title_two'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title_two') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{ $errors->has('photo_two') ? ' has-error' : '' }}">
            <label class="col-sm-3 col-form-label">Banner Two:</label>
            <div class="col-sm-7">
              <div class="row">
                <div class="col-8">
                  <input type="file" id="input-file-now-custom-1" name="photo_two" class="dropify" />
                </div>
                <div class="col-4">
                  <img src="{{ asset('uploads/banner/'.$banner->photo_two) }}" style="width: 182px;" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('title_three')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Title Three:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="title_three" value="{{$banner->title_three}}">
              @if ($errors->has('title_three'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title_three') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{ $errors->has('photo_three') ? ' has-error' : '' }}">
            <label class="col-sm-3 col-form-label">Banner Three:</label>
            <div class="col-sm-7">
              <div class="row">
                <div class="col-8">
                  <input type="file" id="input-file-now-custom-1" name="photo_three" class="dropify" />
                </div>
                <div class="col-4">
                  <img src="{{ asset('uploads/banner/'.$banner->photo_three) }}" style="width: 182px;" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row custom_form{{$errors->has('title_four')? ' has-error':''}}">
            <label class="col-sm-3 col-form-label">Title Four:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="title_four" value="{{$banner->title_four}}">
              @if ($errors->has('title_four'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title_four') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row custom_form{{ $errors->has('photo_four') ? ' has-error' : '' }}">
            <label class="col-sm-3 col-form-label">Banner Four:</label>
            <div class="col-sm-7">
              <div class="row">
                <div class="col-8">
                  <input type="file" id="input-file-now-custom-1" name="photo_four" class="dropify" />
                </div>
                <div class="col-4">
                  <img src="{{ asset('uploads/banner/'.$banner->photo_four) }}" style="width: 182px;" alt="">
                </div>
              </div>
            </div>
          </div>
            <div class="form-group row custom_form{{$errors->has('title_five')? ' has-error':''}}">
              <label class="col-sm-3 col-form-label">Title Five:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="title_five" value="{{$banner->title_five}}">
                @if ($errors->has('title_five'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title_five') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row custom_form{{ $errors->has('photo_five') ? ' has-error' : '' }}">
              <label class="col-sm-3 col-form-label">Banner Five:</label>
              <div class="col-sm-7">
                <div class="row">
                  <div class="col-8">
                    <input type="file" id="input-file-now-custom-1" name="photo_five" class="dropify" />
                  </div>
                  <div class="col-4">
                    <img src="{{ asset('uploads/banner/'.$banner->photo_five) }}" style="width: 182px;" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row custom_form{{$errors->has('title_six')? ' has-error':''}}">
              <label class="col-sm-3 col-form-label">Title Six:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="title_six" value="{{$banner->title_six}}">
                @if ($errors->has('title_six'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title_six') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row custom_form{{ $errors->has('photo_six') ? ' has-error' : '' }}">
              <label class="col-sm-3 col-form-label">Banner Six:</label>
              <div class="col-sm-7">
                <div class="row">
                  <div class="col-8">
                    <input type="file" id="input-file-now-custom-1" name="photo_six" class="dropify" />
                  </div>
                  <div class="col-4">
                    <img src="{{ asset('uploads/banner/'.$banner->photo_six) }}" style="width: 182px;" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row custom_form{{$errors->has('title_seven')? ' has-error':''}}">
              <label class="col-sm-3 col-form-label">Title Seven:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="title_seven" value="{{$banner->title_seven}}">
                @if ($errors->has('title_seven'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title_seven') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row custom_form{{ $errors->has('photo_seven') ? ' has-error' : '' }}">
              <label class="col-sm-3 col-form-label">Banner Seven:</label>
              <div class="col-sm-7">
                <div class="row">
                  <div class="col-8">
                    <input type="file" id="input-file-now-custom-1" name="photo_seven" class="dropify" />
                  </div>
                  <div class="col-4">
                    <img src="{{ asset('uploads/banner/'.$banner->photo_seven) }}" style="width: 182px;" alt="">
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