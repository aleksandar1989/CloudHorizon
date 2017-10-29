<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name">Name</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter name...']) !!}
    @if($errors->first('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description">Description</label>
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Enter description...']) !!}
    @if($errors->first('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="form-group">
    <label>Status tatus</label>
    {!! Form::select('status', [ '1' => 'Active', '0' => 'Inactive' ], null, ['class' => 'form-control', 'id' => 'status']) !!}
</div>