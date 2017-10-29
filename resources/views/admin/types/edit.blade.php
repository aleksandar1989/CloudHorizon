@extends('admin.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <h1 class="page-title"> Edit Type
                        <small>Here you can edit your type</small>
                    </h1>

                    <!-- form start -->
                    {!! Form::model($type, ['method' => 'PATCH', 'action' => ['Admin\TypesController@update', $type->id]]) !!}
                    {!! Form::hidden('id', $type->id) !!}
                    <div class="box-body">
                        @include('admin.types.form')
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn green">Update</button>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box -->
            </div>
        </div>
    </section>
@endsection