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
                    <li class="active">Company Information</li>
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
				@if(Session::has('status'))
				<div>
					<p class="alert alert-info">{{ Session::get('status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true" style="font-size:20px">×</span>
						</button>
					</p>
				</div>

			@endif
                @if (Session::has('destory'))
                    <div>
                        <p class="alert alert-danger">{{ Session::get('destory') }}
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
                                <h4 class="widget-title col-md-11">All Company Information </h4>
                                <a href="{{ route('companyInfo.create') }}" class="btn btn-primary btn-sm pull-right"><i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Location</th>
                                        <th>Email</th>
                                        <th>Call</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companyInfo as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->company_location }}</td>
                                            <td>{{ $item->company_email }}</td>
                                            <td>{{ $item->company_call }}</td>
                                            <td>
                                                @if ($item->status == '1')
                                                    Active  
													
                                                @else
                                                    Deactive
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('companyInfo.edit', $item->id) }}">
                                                    <button class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                @if (count($companyInfo) > 0)
                <span class="pull-right">
                    <ul class="pagination">
                        <li class=" @if ($companyInfo->appends(request()->query())->currentPage() == 1) disabled @endif">
                            <a class="" href=" {{ $companyInfo->appends(request()->query())->url(1) }}">← First</a>
                        </li>
            
                        <li class=" @if ($companyInfo->appends(request()->query())->currentPage() == 1) disabled @endif">
                            <a class="" href=" {{ $companyInfo->appends(request()->query())->previousPageUrl() }}"><i
                                    class="fa fa-angle-double-left"></i></a>
                        </li>
                        @foreach(range(1, $companyInfo->appends(request()->query())->lastPage()) as $i)
                        @if ($i >= $companyInfo->appends(request()->query())->currentPage() - 4 && $i <= $companyInfo->appends(request()->query())->currentPage() + 4)
                            @if ($i == $companyInfo->appends(request()->query())->currentPage())
                                <li class="active"><span>{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $companyInfo->appends(request()->query())->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endif
            @endforeach
            
            <li class=" @if ($companyInfo->appends(request()->query())->lastPage() == $companyInfo->appends(request()->query())->currentPage()) disabled @endif">
                <a class="" href=" {{ $companyInfo->appends(request()->query())->nextPageUrl() }}"><i
                        class="fa fa-angle-double-right"></i></a>
            </li>
            <li class=" @if ($companyInfo->appends(request()->query())->lastPage() == $companyInfo->appends(request()->query())->currentPage()) disabled @endif">
                <a class="" href=" {{ $companyInfo->appends(request()->query())->url($companyInfo->lastPage()) }}">Last
                    →</a>
            </li>
            </ul>
            </span>
            @endif
            
            </div>
        @endsection
