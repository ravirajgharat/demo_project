<div class="card-body">
    <div class="form-group row {{ $errors->has('firstname') ? 'has-error' : ''}}">
        <label for="firstname" class="col-sm-2 col-form-label">{{ 'Firstname' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="firstname" type="text" id="firstname" placeholder="Firstname" value="{{ isset($user->firstname) ? $user->firstname : ''}}" >
        </div>
        <strong>{!! $errors->first('firstname', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('lastname') ? 'has-error' : ''}}">
        <label for="lastname" class="col-sm-2 col-form-label">{{ 'Lastname' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="lastname" type="text" id="lastname" placeholder="Lastname" value="{{ isset($user->lastname) ? $user->lastname : ''}}" >
        </div>
        <strong>{!! $errors->first('lastname', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="col-sm-2 col-form-label">{{ 'Email' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="email" type="text" id="email" placeholder="Email" value="{{ isset($user->email) ? $user->email : ''}}" >
        </div>
        <strong>{!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="col-sm-2 col-form-label">{{ 'Password' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="password" type="password" id="password" placeholder="Password">
        </div>
        <strong>{!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('confirmpassword') ? 'has-error' : ''}}">
        <label for="confirmpassword" class="col-sm-2 col-form-label">{{ 'Confirm Password' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="confirmpassword" type="password" id="confirmpassword" placeholder="Re-Enter Password">
        </div>
        <strong>{!! $errors->first('confirmpassword', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('status') ? 'has-error' : ''}}">
        <label for="status" class="col-sm-2 col-form-label">{{ 'Status' }}</label>
        <div class="radio pl-2">
        <label><input name="status" type="radio" value="1" {{ (isset($user) && 1 == $user->status) ? 'checked' : '' }}> Active</label>
    </div>
    <div class="radio pl-2">
        <label><input name="status" type="radio" value="0" @if (isset($user)) {{ (0 == $user->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Inactive</label>
    </div>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group row {{ $errors->has('category') ? 'has-error' : ''}}">
        <label for="category" class="col-sm-2 col-form-label">{{ 'Role' }}</label>
        <div class="col-sm-6">
            <select name="category" class="form-control" id="category" >
            @foreach (App\Role::orderBy('id','desc')->get() as $role)
                <option value="{{ $role->name }}" {{ (isset($user->category) && $user->category == $optionKey) ? 'selected' : ''}}>{{ $role->name }}</option>
            @endforeach
            </select>
        </div>
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/user') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>


