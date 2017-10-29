@extends('admin.app')
@section('title') Users @endsection

@section('header')
    <link href="{{ asset('admin_tmpl/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin_tmpl/css/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin_tmpl/css/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="users_listing_page">
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Manage Interview
            <small>Here you can create, edit and delete some Interviews</small>
        </h1>
        <!-- END PAGE TITLE-->

        <div class="clearfix add_user_box">
            <div class="col-md-6">
                <div class="btn-group">
                    <a href="{{ url('/admin/interviews/create') }}" class="btn sbold green"><i class="fa fa-plus"></i> Add New Interview</a>
                </div>
            </div>
        </div>

        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box white">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-group"></i>Interviews table</div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="users_table">
                    <thead>
                    <tr>
                        <th> Name </th>
                        <th> Type </th>
                        <th> Confirm number </th>
                        <th> Cancelled number </th>
                        <th> Created </th>
                        <th> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($interviews)
                        @foreach($interviews as $interview)
                            <tr>
                                <td> {{ $interview->name }} </td>
                                <td>
                                    @if($interview->type)
                                        {{ $interview->type->name }}
                                    @endif
                                </td>
                                <td>{{ $interview->admission()->accepted()->count() }}</td>
                                <td>{{ $interview->admission()->canceled()->count() }}</td>
                                <td> {{ date('d M. Y', strtotime($interview->created_at)) }} </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs blue-chambray dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                            <li>
                                                <a href="{{ url("admin/interviews/$interview->id/edit") }}">
                                                    <i class="fa fa-file-text"></i> Edit Interview </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" onclick="userDelete(this);" >
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['interviews.destroy', $interview->id]]) !!}
                                                    <i class="fa fa-trash"></i> Delete Interview
                                                    {!! Form::close() !!}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>

@endsection

@section('footer')
    <script src="{{ asset('admin_tmpl/js/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_tmpl/js/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_tmpl/js/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection