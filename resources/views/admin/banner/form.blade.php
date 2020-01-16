<div class="form-group {{ $errors->has('bannername') ? 'has-error' : ''}}">
    <label for="bannername" class="control-label">{{ 'Banner Name' }}</label>
    <input class="form-control" name="bannername" type="text" id="bannername" value="{{ isset($banner->bannername) ? $banner->bannername : ''}}" >
    <strong>{!! $errors->first('bannername', '<p class="help-block alert-danger">:message</p>') !!}</strong>
</div>
<div class="form-group {{ $errors->has('bannerimage') ? 'has-error' : ''}}">
    <label for="bannerimage" class="control-label">{{ 'Banner Image' }}</label>
    <input class="form-control" name="bannerimage" type="file" id="bannerimage" value="{{ isset($banner->bannerimage) ? $banner->bannerimage : ''}}" >
    <strong>{!! $errors->first('bannerimage', '<p class="help-block alert-danger">:message</p>') !!}</strong>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
