@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-part">
                <div class="row">
                    <div class="col-md-6 card_header_title">
                        <h3><i class="fa fa-gg-circle"></i> All User</h3>
                    </div>
                    <div class="col-md-6 text-right card_header_btn">
                        <a href="{{url('admin/user/add')}}" class="btn"><i class="fa fa-plus-circle"></i> Add
                            User</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered custom_table custom_table_btn">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>User Role</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $user = App\User::orderBy('name','ASC')->paginate(10);
                        @endphp
                        @foreach ($user as $data)
                        <tr>
                            <td class="text-break">{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->email}}</td>
                            <td><img src="{{ asset('uploads/user/'.$data->pic) }}" style="height: 50px;" alt="">
                            </td>
                            <td>{{$data->userRole->role_name}}</td>
                            <td>
                                <div class="btn-group btn-group-sm btn-color-ceate">
                                    <a href="{{url('admin/user/view',$data->id)}}"
                                        class="btn btn-info view-btn">View</a>
                                    {{-- <a href="#" class="btn btn-warning edit-btn">Edit</a> --}}
                                    {{-- <a href="{{url('admin/user/edit',$data->id)}}"
                                    class="btn btn-warning edit-btn">Edit</a> --}}
                                    <a href="#" class="btn btn-danger delete-btn" data-toggle="modal" id="softDelete"
                                        data-target="#softDelModal" data-id="{{$data->id}}">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer header-part">
                <a href="#" class="btn btn-sm btn-warning">Print</a>
                <a href="#" class="btn btn-sm btn-info">CSV</a>
                <a href="#" class="btn btn-sm btn-success">Excel</a>
            </div>
        </div>
    </div>
</div>

<!--Delete Modal Code-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-labelledby="SoftDelModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <form method="post" action="{{url('admin/user/delete')}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header modal-header-color">
                    <h5 class="modal-title" id="SoftDelModalTitle">Confirm Message</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this information?
                    <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary modal-delete-btn">YES</button>
                    <button type="button" class="btn btn-secondary modal-close-btn" data-dismiss="modal">NO</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
