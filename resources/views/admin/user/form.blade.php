<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
    <label for="firstname" class="control-label">{{ 'Firstname' }}</label>
    <input class="form-control" name="firstname" type="text" id="firstname" value="{{ isset($user->firstname) ? $user->firstname : ''}}" >
    <strong>{!! $errors->first('firstname', '<p class="help-block text-danger">:message</p>') !!}</strong>
</div>
<div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
    <label for="lastname" class="control-label">{{ 'Lastname' }}</label>
    <input class="form-control" name="lastname" type="text" id="lastname" value="{{ isset($user->lastname) ? $user->lastname : ''}}" >
    <strong>{!! $errors->first('lastname', '<p class="help-block text-danger">:message</p>') !!}</strong>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : ''}}" >
    <strong>{!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}</strong>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control" name="password" type="password" id="password">
    <strong>{!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}</strong>
</div>
<div class="form-group {{ $errors->has('confirmpassword') ? 'has-error' : ''}}">
    <label for="confirmpassword" class="control-label">{{ 'Confirm Password' }}</label>
    <input class="form-control" name="confirmpassword" type="password" id="confirmpassword">
    <strong>{!! $errors->first('confirmpassword', '<p class="help-block text-danger">:message</p>') !!}</strong>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($user) && 1 == $user->status) ? 'checked' : '' }}> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" @if (isset($user)) {{ (0 == $user->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Role' }}</label>
    <select name="category" class="form-control" id="category" >
    @foreach (App\Role::orderBy('id','desc')->get() as $role)
        <option value="{{ $role->name }}" {{ (isset($user->category) && $user->category == $optionKey) ? 'selected' : ''}}>{{ $role->name }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
