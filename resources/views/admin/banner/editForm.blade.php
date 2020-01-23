<div class="card-body">
    <div class="form-group row {{ $errors->has('bannername') ? 'has-error' : ''}}">
        <label for="bannername" class="col-sm-2 col-form-label">{{ 'Banner Name' }}</label>
        <div class="col-sm-10">
            <input class="form-control" name="bannername" type="text" id="bannername" value="{{ isset($banner->bannername) ? $banner->bannername : ''}}" >
        </div>
        <strong>{!! $errors->first('bannername', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('bannerimage') ? 'has-error' : ''}}">
        <label for="bannerimage" class="col-sm-2 col-form-label">{{ 'Banner Image' }}</label><br>
        <div class="col-sm-10">
            <img src="{{ url('/storage/' . $banner->bannerimage) }}" style="max-width:100%;max-height:100%;">
            <input class="form-control" name="bannerimage" type="file" id="bannerimage" value="{{ isset($banner->bannerimage) ? $banner->bannerimage : ''}}" >
        </div>
        <strong>{!! $errors->first('bannerimage', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
</div>    
    
    <div class="card-footer">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        <a href="{{ url('/admin/banner') }}" title="Back" class="btn btn-default float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>