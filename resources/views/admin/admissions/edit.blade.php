@extends('admin.app')
@section('title') Edit Admission @endsection

@section('header')
    <link href="{{ asset('admin_tmpl/css/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="user_create_page">
        <h1 class="page-title"> Edit Admission
            <small>Here you can edit admission</small>
        </h1>

        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::model($admission, ['method' => 'PATCH', 'files' => true, 'action' => ['Admin\AdmissionsController@update', $admission->id]]) !!}
                {!! Form::hidden('id', $admission->id) !!}

                <div class="form-body">
                    @include('admin.admissions.form')
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn green">Update</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>

    </div>
@endsection

@section('footer')
    <script src="{{ asset('admin_tmpl/js/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection