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
                    <li class="active">Service</li>
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
                                <h4 class="widget-title col-md-11">Show Service </h4>
                                <a href="{{ route('service.index') }}" class="btn btn-danger btn-sm pull-right"><i
                                        class="fas fa-undo"></i></a>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Heading</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $serviceShow->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description"
                                            class="form-control">value="{{ $serviceShow->description }}"</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Icon</label>
                                        <input type="text" class="form-control" name='icon'
                                            value="{{ $serviceShow->icon }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status"
                                            {{ $serviceShow->status == '1' ? 'checked' : '' }}>
                                        0=Deactive,1=Active
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
