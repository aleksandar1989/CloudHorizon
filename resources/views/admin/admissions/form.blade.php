<div class="form-group">
    <label class="control-label">Admission User Name</label>
    {!! Form::text('first_name', $admission->user->first_name ?? $admission->user->first_name, ['class' => 'form-control', 'disabled' => 'disabled', 'id' => 'first_name']) !!}
</div>
<div class="form-group">
    <label class="control-label">Interview Title</label>
    {!! Form::text('title', $admission->title, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>
<div class="form-group">
    <label class="control-label">Start Date</label>
    {!! Form::text('start_date', $admission->start_date , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>
<div class="form-group">
    <label class="control-label">End Date</label>
    {!! Form::text('end_date', $admission->end_date , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<div class="form-group">
    <label>User status</label>
    {!! Form::select('status', [ '1' => 'Active', '0' => 'Inactive', '2' => 'Rejected' ], $admission->status, ['class' => 'form-control', 'id' => 'role']) !!}
</div>


