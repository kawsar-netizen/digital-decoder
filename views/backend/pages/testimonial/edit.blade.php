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
                    <li class="active">Testimonial</li>
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
                                <h4 class="widget-title col-md-11">Edit Testimonial </h4>
                                <a href="{{ route('testimonial.index') }}" class="btn btn-danger btn-sm pull-right"><i
                                        class="fas fa-undo"></i></a>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('testimonial.update',$testimonial_edit->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $testimonial_edit->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $testimonial_edit->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Designation</label>
                                        <input type="text" name="designation" class="form-control"
                                            value="{{ $testimonial_edit->designation }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $testimonial_edit->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $testimonial_edit->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image Upload</label>
                                        <input type="file" name="image" value="{{ $testimonial_edit->image }}"
                                            class="form-control">
                                        <img src="{{ asset('uploads/testimonial/' . $testimonial_edit->image) }}" width="60px"
                                            alt="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status"
                                            {{ $testimonial_edit->status == '1' ? 'checked' : '' }}>
                                        0=Deactive,1=Active
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" role="button"> Update </button>
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
