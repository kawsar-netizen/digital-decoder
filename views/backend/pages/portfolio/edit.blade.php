@extends('backend.layouts.admin_master')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Admin</a>
                    </li>
                    <li class="active">Company Portfolio</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                                autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
            <br>

            <div class="container mt-5">
                @if (Session::has('status'))
                    <div>
                        <p class="alert alert-info">{{ Session::get('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="font-size:20px">×</span>
                            </button>
                        </p>
                    </div>

                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="widget-header">
                                <h4 class="widget-title col-md-11">Edit Portfolio </h4>
                                <a href="{{ route('company_portfolio.index') }}" class="btn btn-danger btn-sm pull-right"><i
                                        class="fas fa-undo"></i></a>
                            </div>
                            <div class="card">
                                <div class="card-body">

                                    <form action="{{route('company_portfolio.update',$portfolio_edit->id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="">Project Title</label>
                                            <input type="text" name="project_titel"
                                                value="{{ $portfolio_edit->project_titel }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Project Type</label>
                                            <input type="text" name="project_type" value="{{ $portfolio_edit->project_type }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Project Link</label>
                                            <input type="text" name="project_link" value="{{ $portfolio_edit->project_link }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Project Image</label>
                                            <input type="file" name="project_image" class="form-control">
                                            <img src="{{ asset('uploads/portfolio/' . $portfolio_edit->project_image) }}"
                                                width="60px" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Project Status</label>
                                            <input type="checkbox" name="project_status"
                                            {{ $portfolio_edit->project_status == '1' ? 'checked' : '' }}> 0=Deactive,1=Active
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" role="button">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
