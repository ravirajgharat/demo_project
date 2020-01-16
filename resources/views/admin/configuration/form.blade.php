<div class="form-group {{ $errors->has('configname') ? 'has-error' : ''}}">
    <label for="configname" class="control-label">{{ 'Configuration Name' }}</label>
    <input class="form-control" name="configname" type="text" id="configname" value="{{ isset($configuration->configname) ? $configuration->configname : ''}}" >
    <strong>{!! $errors->first('configname', '<p class="help-block text-danger">:message</p>') !!}</strong>
</div>
<div class="form-group {{ $errors->has('configvalue') ? 'has-error' : ''}}">
    <label for="configvalue" class="control-label">{{ 'Configuration Value' }}</label>
    <input class="form-control" name="configvalue" type="text" id="configvalue" value="{{ isset($configuration->configvalue) ? $configuration->configvalue : ''}}" >
    <strong>{!! $errors->first('configvalue', '<p class="help-block text-danger">:message</p>') !!}</strong>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
