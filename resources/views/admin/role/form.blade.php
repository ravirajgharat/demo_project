<div class="card-body">
    <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="col-sm-2 col-form-label">{{ 'Name' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="name" type="text" id="name"placeholder="Role"  value="{{ isset($role->name) ? $role->name : ''}}" >
        </div>
        <strong>{!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
</div>

<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/role') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>
