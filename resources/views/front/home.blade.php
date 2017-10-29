@extends('layouts.app')

@section('content')
<div class="container home_page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of interviews types</div>

                <div class="panel-body">
                    @if($types)
                        <ul>
                            @foreach($types as $type)
                                <li><a href="{{ url('admin/types/'.$type->id) }}">{{ $type->name }}</a> {{ $type->description ? '- '.$type->description : '' }}</li>
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
