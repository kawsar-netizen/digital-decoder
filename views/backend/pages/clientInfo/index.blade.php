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
                    <li class="active">Client Information</li>
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
                                <h4 class="widget-title col-md-11">All Client Information </h4>
                                {{-- <a href="{{ route('companyInfo.create') }}" class="btn btn-primary btn-sm pull-right"><i
                                        class="fas fa-plus"></i></a> --}}
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Client Subject</th>
                                        <th>Client Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Client_contact as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->client_name }}</td>
                                            <td>{{ $item->client_email }}</td>
                                            <td>{{ $item->client_subject }}</td>
                                            <td>{{ $item->client_message }}</td>
                                            <td>
                                                <a href="{{ route('clientInfo.show', $item->id) }}">
                                                    <button class="tooltip-success" data-rel="tooltip" title="view details">
                                                        <span class="green">
                                                            View Details
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
                @if (count($Client_contact) > 0)
                <span class="pull-right">
                    <ul class="pagination">
                        <li class=" @if ($Client_contact->appends(request()->query())->currentPage() == 1) disabled @endif">
                            <a class="" href=" {{ $Client_contact->appends(request()->query())->url(1) }}">← First</a>
                        </li>
            
                        <li class=" @if ($Client_contact->appends(request()->query())->currentPage() == 1) disabled @endif">
                            <a class="" href=" {{ $Client_contact->appends(request()->query())->previousPageUrl() }}"><i
                                    class="fa fa-angle-double-left"></i></a>
                        </li>
                        @foreach(range(1, $Client_contact->appends(request()->query())->lastPage()) as $i)
                        @if ($i >= $Client_contact->appends(request()->query())->currentPage() - 4 && $i <= $Client_contact->appends(request()->query())->currentPage() + 4)
                            @if ($i == $Client_contact->appends(request()->query())->currentPage())
                                <li class="active"><span>{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $Client_contact->appends(request()->query())->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endif
            @endforeach
            
            <li class=" @if ($Client_contact->appends(request()->query())->lastPage() == $Client_contact->appends(request()->query())->currentPage()) disabled @endif">
                <a class="" href=" {{ $Client_contact->appends(request()->query())->nextPageUrl() }}"><i
                        class="fa fa-angle-double-right"></i></a>
            </li>
            <li class=" @if ($Client_contact->appends(request()->query())->lastPage() == $Client_contact->appends(request()->query())->currentPage()) disabled @endif">
                <a class="" href=" {{ $Client_contact->appends(request()->query())->url($Client_contact->lastPage()) }}">Last
                    →</a>
            </li>
            </ul>
            </span>
            @endif
            
            </div>
        @endsection
