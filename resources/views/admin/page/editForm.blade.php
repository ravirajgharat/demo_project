<div class="card-body">
    <div class="form-group row {{ $errors->has('page') ? 'has-error' : ''}}">
        <label for="page" class="col-sm-2 col-form-label">{{ 'Page' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="page" type="text" placeholder="Page" id="page" value="{{ isset($page->page) ? $page->page : ''}}" >
        </div>
        <strong>{!! $errors->first('page', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>

    <div class="form-group row {{ $errors->has('page') ? 'has-error' : ''}}">
        <label for="point" class="col-sm-2 col-form-label">{{ 'Content' }}</label>
        <div class="col-sm-6">
            <textarea name="point" id="point" class="form-control" rows="10" placeholder="Content">{{ $page->content }}</textarea>
            {{-- <input class="form-control" name="page" type="text" id="page" value="{{ isset($page->page) ? $page->page : ''}}" > --}}
        </div>
        <strong>{!! $errors->first('point', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>

</div>

<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/page') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>