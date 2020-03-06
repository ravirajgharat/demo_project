<div class="card-body">
    <div class="form-group row {{ $errors->has('bannername') ? 'has-error' : ''}}">
        <label for="bannername" class="col-sm-2 col-form-label">{{ 'Banner Name' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="bannername" placeholder="Banner Name" type="text" id="bannername" value="{{ isset($banner->bannername) ? $banner->bannername : ''}}" >
        </div>
        <strong>{!! $errors->first('bannername', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('bannerimage') ? 'has-error' : ''}}">
        <label for="bannerimage" class="col-sm-2 col-form-label">{{ 'Banner Image' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="bannerimage" type="file" id="bannerimage" value="{{ isset($banner->bannerimage) ? $banner->bannerimage : ''}}" >
        </div>
        <strong>{!! $errors->first('bannerimage', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('categories') ? 'has-error' : ''}}">
        <label for="categories" class="col-sm-2 col-form-label">{{ 'Category' }}</label>
        <div class="col-sm-6">
            <select class="form-control" name="categories" id="categories" required="required">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->categoryname }}
                    </option>
                @endforeach
            </select>
        </div>
        <strong>{!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
</div>

<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/banner') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>