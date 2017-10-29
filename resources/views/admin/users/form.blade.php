<div class="form-group  {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label class="control-label">First Name</label>
    {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Enter your first name...']) !!}
    @if($errors->first('first_name'))
        <span class="help-block">{{ $errors->first('first_name') }}</span>
    @endif
</div>

<div class="form-group  {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label class="control-label">Last Name</label>
    {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Enter your last name...']) !!}
    @if($errors->first('last_name'))
        <span class="help-block">{{ $errors->first('last_name') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label class="control-label">Email Address</label>
    <div class="input-group">
    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter email...']) !!}
    <span class="input-group-addon">
    <i class="fa fa-envelope"></i>
    </span>
    </div>
    @if($errors->first('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group  {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label class="control-label">Phone Number</label>
    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Enter your phone number...']) !!}
    @if($errors->first('phone'))
        <span class="help-block">{{ $errors->first('phone') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label class="control-label">User role</label>
    {!! Form::select('role', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null, ['class' => 'form-control', 'id' => 'role',  'placeholder' => 'Choose user role...']) !!}
    @if($errors->first('role'))
        <span class="help-block">{{ $errors->first('role') }}</span>
    @endif
</div>

<div class="form-group">
    <label>User status</label>
    {!! Form::select('status', [ '1' => 'Active', '2' => 'Panding', '3' => 'Blocked' ], null, ['class' => 'form-control', 'id' => 'role']) !!}
</div>

<div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="Password" class="control-label">Password</label>
    <div class="input-group">
        {!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Enter password...']) !!}
        <span class="input-group-addon">
            <i class="fa fa-user font-silver"></i>
        </span>
    </div>
    @if($errors->first('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="password_confirmation" class="control-label"> Password Confirm</label>
    <div class="input-group">
        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Enter password confirmation...']) !!}
        <span class="input-group-addon">
            <i class="fa fa-user font-silver"></i>
        </span>
    </div>
</div>
