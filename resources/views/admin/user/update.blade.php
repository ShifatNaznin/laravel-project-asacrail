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
        <form method="post" action="{{url('admin/user/update')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header header-part">
                    <div class="row">
                        <div class="col-md-6 card_header_title">
                            <h3><i class="fa fa-gg-circle"></i> Update User</h3>
                        </div>
                        <div class="col-md-6 text-right card_header_btn">
                            <a href="{{url('admin/user')}}" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>
                                Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <script>
                        swal({ title: "Successfully!", text: "Updated Information.", timer:5000, icon: "success",});
                    </script>
                    @endif
                    @if(Session::has('error'))
                    <script>
                        swal({ title: "Opps!", text: "Update Failed.", timer:5000, icon: "warning",});
                    </script>
                    @endif
                    <div class="form-group row custom_form">
                        <label class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group row custom_form">
                        <label class="col-sm-3 col-form-label">Phone:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                        </div>
                    </div>
                    {{-- <div class="form-group row custom_form">
                        <label class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
            </div> --}}
            {{-- <div class="form-group row custom_form">
                        <label class="col-sm-3 col-form-label">Password:</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password" value="">

                        </div>
                    </div>
                    <div class="form-group row custom_form">
                        <label class="col-sm-3 col-form-label">Confirm-Password:</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password_confirmation" value="">
                        </div>
                    </div> --}}
            <div class="form-group row custom_form">
                <label class="col-sm-3 col-form-label">User-Role:</label>
                <div class="col-sm-4">
                    <select class="form-control" name="role">
                        {{-- <option value="{{$user->userRole->role_name}}"></option> --}}
                        <option value="{{$user->userRole->role_name}}">
                            {{$user->userRole->role_name}}</option>
                        @php
                        $allRole=App\UserRole::where('role_status',1)->orderBy('role_id','ASC')->get();
                        @endphp
                        @foreach($allRole as $urole)
                        <option value="{{$urole->role_id}}">{{$urole->role_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row custom_form">
                <label class="col-sm-3 col-form-label">Photo:</label>
                <div class="col-sm-7">
                    {{-- <input type="file" name="pic" /> --}}
                    <input type="file" id="input-file-now-custom-1" name="pic" class="dropify" />
                </div>
            </div>
    </div>
    <div class="card-footer header-part text-center">
        <button type="submit" class="btn btn-info">Add</button>
    </div>
</div>
</form>
</div>
</div>
@endsection