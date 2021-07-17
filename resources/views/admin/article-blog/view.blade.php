@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-part">
                <div class="row">
                    <div class="col-md-6 card_header_title">
                        <h3><i class="fa fa-gg-circle"></i> View Services</h3>
                    </div>
                    <div class="col-md-6 text-right card_header_btn">
                        <a href="{{url('admin/article-blog')}}" class="btn"><i class="fa fa-reply"
                                aria-hidden="true"></i>
                            Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-xlg-1">
                        <img style="width:200px" src="{{asset('uploads/article-blog/'.$article->article_photo)}}"
                            alt="photo" />
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                        
                            <tr>
                                <td>Title</td>
                                <td>:</td>
                                <td>{{$article->article_title}}</td>
                            </tr>
                            <tr>
                                <td>Photo Credit</td>
                                <td>:</td>
                                <td class="text-break">{{$data->photo_credit}}</td>

                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{!!$article->article_description!!}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>:</td>
                                <td>{!!$article->created_at->format('d M,Y h:i:s a')!!}</td>
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