@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-part">
                <div class="row">
                    <div class="col-md-6 card_header_title">
                        <h3><i class="fa fa-gg-circle"></i> Banner Information</h3>
                    </div>
                    <div class="col-md-6 text-right card_header_btn">
                        <a href="{{url('admin/banner/add')}}" class="btn"><i class="fa fa-plus-circle"></i> Add
                            Banner</a>
                    </div>
                </div>
            </div>
            <div id="printableTable" class="card-body table-responsive">
                <table cellspacing="0" bordercolor="gray" id="table_with_data"
                    class="table table-bordered custom_table custom_table_btn">
                    <thead>
                        <tr>

                            <th>Title One</th>
                            <th>Banner One</th>
                            <th>Title Two</th>
                            <th>Banner Two</th>
                            <th>Title Three</th>
                            <th>Banner Three</th>
                            <th>Title Four</th>
                            <th>Banner Four</th>
                            <th>Title Five</th>
                            <th>Banner Five</th>
                            <th>Title Six</th>
                            <th>Banner Six</th>
                            <th>Title Seven</th>
                            <th>Banner Seven</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $banner = App\Banner::orderBy('id','DESC')->get();
                        @endphp
                        @foreach ($banner as $data)
                        <tr>

                            <td class="text-break">{{$data->title}}</td>
                            <td><img src="{{ asset('uploads/banner/'.$data->photo) }}" style="height: 50px;" alt="">
                            </td>
                            <td class="text-break">{{$data->title_two}}</td>
                            <td><img src="{{ asset('uploads/banner/'.$data->photo_two) }}" style="height: 50px;" alt="">
                            </td>
                            <td class="text-break">{{$data->title_three}}</td>
                            <td><img src="{{ asset('uploads/banner/'.$data->photo_three) }}" style="height: 50px;"
                                    alt="">
                            </td>
                            <td class="text-break">{{$data->title_four}}</td>
                            <td><img src="{{ asset('uploads/banner/'.$data->photo_four) }}" style="height: 50px;"
                                    alt="">
                            </td>
                            <td class="text-break">{{$data->title_five}}</td>
                            <td><img src="{{ asset('uploads/banner/'.$data->photo_five) }}" style="height: 50px;"
                                    alt="">
                            </td>
                            <td class="text-break">{{$data->title_six}}</td>
                            <td><img src="{{ asset('uploads/banner/'.$data->photo_six) }}" style="height: 50px;" alt="">
                            </td>
                            <td class="text-break">{{$data->title_seven}}</td>
                            <td><img src="{{ asset('uploads/banner/'.$data->photo_seven) }}" style="height: 50px;"
                                    alt="">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm btn-color-ceate">
                                    <a href="{{url('admin/banner/view',$data->id)}}"
                                        class="btn btn-info view-btn">View</a>
                                    <a href="{{url('admin/banner/edit',$data->id)}}"
                                        class="btn btn-warning edit-btn">Edit</a>
                                    <a href="#" class="btn btn-danger delete-btn" data-toggle="modal" id="softDelete"
                                        data-target="#softDelModal" data-id="{{$data->id}}">Delete</a>

                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div id="editor"></div>
                <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
            </div>
            <div class="card-footer header-part">
                <button onclick="generatePDF()" class="btn btn-sm btn-danger">PDF</button>
                <button onclick="$('table').tblToExcel();" class="btn btn-sm btn-success">EXCEL</button>
                <button id="csv" class="btn btn-sm btn-info">CSV</button>
                <button id="json" class="btn btn-sm btn-warning">JSON</button>
                <button onclick="printDiv()" class="btn btn-sm btn-primary">PRINT</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Code-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-labelledby="SoftDelModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <form method="post" action="{{url('admin/banner/delete')}}">
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