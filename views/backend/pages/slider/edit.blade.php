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
                    <li class="active">Slider</li>
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
                                <h4 class="widget-title col-md-11">Edit Slider </h4>
                                <a href="{{ route('home.slider') }}" class="btn btn-danger btn-sm pull-right"><i
                                        class="fas fa-undo"></i></a>
                            </div>
                            <div class="card">
                                <div class="card-body">

                                    <form action="{{ url('update-slider/' . $slider->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="">Heading</label>
                                            <input type="text" name="title" value="{{ $slider->title }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description"
                                                class="form-control">{{ $slider->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Link</label>
                                            <input type="text" name="link" value="{{ $slider->link }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Link Name</label>
                                            <input type="text" name="link_name" value="{{ $slider->link_name }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" value="{{ $slider->slug }}"
                                                class="form-control text-lowercase">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Slider Image Upload</label>
                                            <input type="file" name="image" value="{{ $slider->image }}"
                                                class="form-control">
                                            <img src="{{ asset('uploads/slider/' . $slider->image) }}" width="60px" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status"
                                                {{ $slider->status == '1' ? 'checked' : '' }}> 0=Deactive,1=Active
                                                @error('status')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
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
