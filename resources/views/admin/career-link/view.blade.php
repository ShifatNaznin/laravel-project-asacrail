@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-part">
                <div class="row">
                    <div class="col-md-6 card_header_title">
                        <h3><i class="fa fa-gg-circle"></i> View Career Link</h3>
                    </div>
                    <div class="col-md-6 text-right card_header_btn">
                        <a href="{{route('career_link')}}" class="btn"><i class="fa fa-reply"
                                aria-hidden="true"></i>
                            Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-xlg-1">

                    </div>
                    <div class="col-md-6 table-responsive">
                        <table class="table table-bordered table-striped table-hover custom_view_table">

                            <tr>
                                <td>Heading</td>
                                <td>:</td>
                                <td>{!!$project->heading!!}</td>
                            </tr>
                            <tr>
                                <td>Career Link</td>
                                <td>:</td>
                                <td>{!!$project->description!!}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>:</td>
                                <td>{!!$project->created_at->format('d M,Y h:i:s a')!!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer header-part">
                <a href="#" class="btn btn-sm btn-warning">Print</a>
                <a href="#" class="btn btn-sm btn-info">CSV</a>
                <a href="#" class="btn btn-sm btn-success">Excel</a>
            </div>
        </div>
    </div>
</div>
@endsection