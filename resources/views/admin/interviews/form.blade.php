<div class="form-group  {{ $errors->has('name') ? 'has-error' : ''}}">
    <label class="control-label">Name</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter interview name...']) !!}
    @if($errors->first('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label class="control-label">Interview type</label>
    {!! Form::select('type', $types, isset($interview) ? $interview->type_id : null, ['class' => 'form-control', 'id' => 'type',  'placeholder' => 'Choose interview type...']) !!}
    @if($errors->first('type'))
        <span class="help-block">{{ $errors->first('type') }}</span>
    @endif
</div>
