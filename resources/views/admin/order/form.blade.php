<div class="card-body">
    {{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($order->user_id) ? $order->user_id : ''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div> --}}

    <div class="form-group row {{ $errors->has('order_status') ? 'has-error' : ''}}">
        <label for="order_status" class="col-sm-2 col-form-label">{{ 'Order Status' }}</label>
        <div class="col-sm-6">
            <input class="form-control" name="order_status" type="text" id="order_status" value="{{ isset($order->order_status) ? $order->order_status : ''}}" >
        </div>
        <strong>{!! $errors->first('order_status', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    
    {{-- <div class="form-group {{ $errors->has('payment_mode') ? 'has-error' : ''}}">
        <label for="payment_mode" class="control-label">{{ 'Payment Mode' }}</label>
        <input class="form-control" name="payment_mode" type="text" id="payment_mode" value="{{ isset($order->payment_mode) ? $order->payment_mode : ''}}" >
        {!! $errors->first('payment_mode', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('order_price') ? 'has-error' : ''}}">
        <label for="order_price" class="control-label">{{ 'Order Price' }}</label>
        <input class="form-control" name="order_price" type="number" id="order_price" value="{{ isset($order->order_price) ? $order->order_price : ''}}" >
        {!! $errors->first('order_price', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('coupon') ? 'has-error' : ''}}">
        <label for="coupon" class="control-label">{{ 'Coupon' }}</label>
        <input class="form-control" name="coupon" type="text" id="coupon" value="{{ isset($order->coupon) ? $order->coupon : ''}}" >
        {!! $errors->first('coupon', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
        <label for="discount" class="control-label">{{ 'Discount' }}</label>
        <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($order->discount) ? $order->discount : ''}}" >
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div> --}}
</div>

<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/order') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>
