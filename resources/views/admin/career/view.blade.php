@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-part">
                <div class="row">
                    <div class="col-md-6 card_header_title">
                        <h3><i class="fa fa-gg-circle"></i> View Career Message</h3>
                    </div>
                    <div class="col-md-6 text-right card_header_btn">
                        <a href="{{route('career')}}" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>
                            Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-xlg-1">

                    </div>
                    <div class="col-md-6" id="printableTable">
                        <table cellspacing="0" bordercolor="gray" id="table_with_data"
                            class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td class="text-break">{{$data->name}}</td>

                            </tr>
                            
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td class="text-break">{{$data->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td>:</td>
                                <td class="text-break">{{$data->phone}}</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>:</td>
                                <td class="text-break">{{$data->subject}}</td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>:</td>
                                <td class="text-break">{{$data->message}}</td>
                            </tr>
                            <tr>
                                <td>File</td>
                                <td>:</td>
                                <td class="text-break">{{$data->file}}</td>
                            </tr>
                           
                        </table>
                    </div>
                </div>
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
@endsection