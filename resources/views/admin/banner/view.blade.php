@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-part">
                <div class="row">
                    <div class="col-md-6 card_header_title">
                        <h3><i class="fa fa-gg-circle"></i> View Banner</h3>
                    </div>
                    <div class="col-md-6 text-right card_header_btn">
                        <a href="{{url('admin/banner')}}" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>
                            Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-xlg-1">
                        <img style="width:200px" src="{{asset('uploads/banner/'.$banner->photo)}}" alt="photo" />
                        <img style="width:200px" src="{{asset('uploads/banner/'.$banner->photo_two)}}" alt="photo" />
                        <img style="width:200px" src="{{asset('uploads/banner/'.$banner->photo_three)}}" alt="photo" />
                        <img style="width:200px" src="{{asset('uploads/banner/'.$banner->photo_four)}}" alt="photo" />
                        <img style="width:200px" src="{{asset('uploads/banner/'.$banner->photo_five)}}" alt="photo" />
                        <img style="width:200px" src="{{asset('uploads/banner/'.$banner->photo_six)}}" alt="photo" />
                        <img style="width:200px" src="{{asset('uploads/banner/'.$banner->photo_seven)}}" alt="photo" />
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td>Title One</td>
                                <td>:</td>
                                <td class="text-break">
                                    {{$banner->title}}
                                </td>
                            </tr>
                            <tr>
                                <td>Title Two</td>
                                <td>:</td>
                                <td class="text-break">
                                    {{$banner->title_two}}
                                </td>
                            </tr>
                            <tr>
                                <td>Title Three</td>
                                <td>:</td>
                                <td class="text-break">
                                    {{$banner->title_three}}
                                </td>
                            </tr>
                            <tr>
                                <td>Title Four</td>
                                <td>:</td>
                                <td class="text-break">
                                    {{$banner->title_four}}
                                </td>
                            </tr>
                            <tr>
                                <td>Title Five</td>
                                <td>:</td>
                                <td class="text-break">
                                    {{$banner->title_five}}
                                </td>
                            </tr>
                            <tr>
                                <td>Title Six</td>
                                <td>:</td>
                                <td class="text-break">
                                    {{$banner->title_six}}
                                </td>
                            </tr>
                            <tr>
                                <td>Title Seven</td>
                                <td>:</td>
                                <td class="text-break">
                                    {{$banner->title_seven}}
                                </td>
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