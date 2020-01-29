<div class="card-body">
    <div class="form-group row {{ $errors->has('product_parameter') ? 'has-error' : ''}}">
        <label for="product_parameter" class="col-sm-2 col-form-label">{{ 'Parameter' }}</label>
        <div class="col-sm-10">
            <input class="form-control" name="product_parameter" placeholder="Parameter" type="text" id="product_parameter" value="{{ isset($product_parameter->product_parameter) ? $product_parameter->product_parameter : ''}}" >
        </div>
        <strong>{!! $errors->first('product_parameter', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
</div>


<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/product_parameter') }}" title="Back" class="btn btn-default float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>
