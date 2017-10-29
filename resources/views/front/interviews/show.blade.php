@extends('layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container home_page">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">List of interviews for {{ $type->name }}</div>

                    <div class="panel-body">
                        @if($type->interviews->count())
                            <ul>
                                @foreach($type->interviews as $interview)

                                    <li><a href="{{ url('admin/interviews/'.$interview->id) }}">{{ $interview->name }}</a></li>
                                @endforeach
                            </ul>
                        @else
                            <p>There are no existing interviews</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
