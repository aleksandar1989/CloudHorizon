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
        <h1 class="page-title"> Manage Admissions
            <small>Here you can update, edit and delete some admission</small>
        </h1>
        <!-- END PAGE TITLE-->

        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box white">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-group"></i>Admissions table</div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="users_table">
                    <thead>
                    <tr>
                        <th> User </th>
                        <th> Title </th>
                        <th> Start date </th>
                        <th> End date </th>
                        <th> Status </th>
                        <th> Created At </th>
                        <th> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($admissions)
                            @foreach($admissions as $admission)
                                <tr>
                                    <td>
                                        {{ $admission->user->first_name  }}
                                    </td>
                                    <td> {{ $admission->title }} </td>
                                    <td> {{ $admission->start_date }} </td>
                                    <td> {{ $admission->end_date }} </td>
                                    <td>
                                        @if( $admission->status == 1 )
                                            <span class="label label-sm label-success"> Approved </span>
                                        @elseif( $admission->status == 0 )
                                            <span class="label label-sm label-warning"> Inactive </span>
                                        @elseif( $admission->status == 2 )
                                            <span class="label label-sm label-danger"> Reject  </span>
                                        @endif
                                    </td>
                                    <td> {{ date('d M. Y h:i', strtotime($admission->created_at)) }} </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs blue-chambray dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="{{ url("admin/admissions/$admission->id/edit") }}">
                                                        <i class="fa fa-file-text"></i> Edit Admission </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="admissionDelete(this);" >
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admissions.destroy', $admission->id]]) !!}
                                                        <i class="fa fa-trash"></i> Delete User
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