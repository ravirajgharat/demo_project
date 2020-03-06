<div class="card-body">
    <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="template_name" class="col-sm-2 col-form-label">{{ 'Name' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="template_name" type="text" id="template_name" placeholder="Template Name"  value="{{ isset($template->template_name) ? $template->template_name : ''}}" >
        </div>
        <strong>{!! $errors->first('template_name', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group {{ $errors->has('template') ? 'has-error' : ''}}">
        <label for="template" class="control-label">{{ 'Template' }}</label>
        <textarea class="form-control" rows="20" name="template" type="textarea" id="template" >{!! $template->template !!}</textarea>
        <strong>{!! $errors->first('template', '<p class="help-block">:message</p>') !!}</strong>
    </div>
</div>
    
    
    <div class="card-footer">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        <a href="{{ url('/admin/template') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>
    