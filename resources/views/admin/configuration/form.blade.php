<div class="card-body">
    <div class="form-group row {{ $errors->has('configname') ? 'has-error' : ''}}">
        <label for="configname" class="col-sm-2 col-form-label">{{ 'Configuration Name' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="configname" type="text" placeholder="Configuration Name" id="configname" value="{{ isset($configuration->configname) ? $configuration->configname : ''}}" >
        </div>
        <strong>{!! $errors->first('configname', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('configvalue') ? 'has-error' : ''}}">
        <label for="configvalue" class="col-sm-2 col-form-label">{{ 'Configuration Value' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="configvalue" placeholder="Configuration Value" type="text" id="configvalue" value="{{ isset($configuration->configvalue) ? $configuration->configvalue : ''}}" >
        </div>
        <strong>{!! $errors->first('configvalue', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
</div>

<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/configuration') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>
