<div class="card-body">
    <div class="form-group row {{ $errors->has('coupon_code') ? 'has-error' : ''}}">
        <label for="coupon_code" class="col-sm-2 col-form-label">{{ 'Coupon' }}</label>
        <div class="col-sm-10">
            <input class="form-control" name="coupon_code" type="text" placeholder="Coupon Code" id="coupon_code" value="{{ isset($coupon->coupon_code) ? $coupon->coupon_code : ''}}" >
        </div>
        <strong>{!! $errors->first('coupon_code', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('discount') ? 'has-error' : ''}}">
        <label for="discount" class="col-sm-2 col-form-label">{{ 'Discount' }}</label>
        <div class="col-sm-10">
            <input class="form-control" name="discount" type="number" placeholder="Discount" id="discount" value="{{ isset($coupon->discount) ? $coupon->discount : ''}}" >
        </div>
        <strong>{!! $errors->first('discount', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('format') ? 'has-error' : ''}}">
        <label for="format" class="col-sm-2 col-form-label">{{ 'Format' }}</label>
        <div class="radio ml-2">
        <label><input name="format" type="radio" value="1" {{ (isset($coupon) && 1 == $coupon->format) ? 'checked' : '' }}> % </label>
    </div>
    <div class="radio ml-2">
        <label><input name="format" type="radio" value="0" @if (isset($coupon)) {{ (0 == $coupon->format) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Rs. </label>
    </div>
    <strong>{!! $errors->first('format', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
</div>


<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/coupon') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>
