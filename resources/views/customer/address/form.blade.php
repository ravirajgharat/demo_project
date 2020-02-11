<div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-sm-3 col-form-label">{{ 'Address' }}</label>
    <div class="col-sm-6">
        <input class="form-control" name="address" placeholder="Address" type="text" id="address" value="{{ isset($address->address) ? $address->address : ''}}" >
    </div>
    <strong>{!! $errors->first('address', '<p class="help-block">:message</p>') !!}</strong>
</div>
<div class="form-group row {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="col-sm-3 col-form-label">{{ 'City' }}</label>
    <div class="col-sm-6">
        <input class="form-control" name="city" type="text" placeholder="City" id="city" value="{{ isset($address->city) ? $address->city : ''}}" >
    </div>
    <strong>{!! $errors->first('city', '<p class="help-block">:message</p>') !!}</strong>
</div>
<div class="form-group row {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="col-sm-3 col-form-label">{{ 'State' }}</label>
    <div class="col-sm-6">
        <input class="form-control" name="state" type="text" placeholder="State" id="state" value="{{ isset($address->state) ? $address->state : ''}}" >
    </div>
    <strong>{!! $errors->first('state', '<p class="help-block">:message</p>') !!}</strong>
</div>
<div class="form-group row {{ $errors->has('pin_code') ? 'has-error' : ''}}">
    <label for="pin_code" class="col-sm-3 col-form-label">{{ 'Pin Code' }}</label>
    <div class="col-sm-6">
        <input class="form-control" name="pin_code" type="number" placeholder="Pin Code" id="pin_code" value="{{ isset($address->pin_code) ? $address->pin_code : ''}}" >
    </div>
    <strong>{!! $errors->first('pin_code', '<p class="help-block">:message</p>') !!}</strong>
</div>
<div class="form-group row {{ $errors->has('landmark') ? 'has-error' : ''}}">
    <label for="landmark" class="col-sm-3 col-form-label">{{ 'Landmark' }}</label>
    <div class="col-sm-6">
        <input class="form-control" name="landmark" type="text" placeholder="Landmark" id="landmark" value="{{ isset($address->landmark) ? $address->landmark : ''}}" >
    </div>
    <strong>{!! $errors->first('landmark', '<p class="help-block">:message</p>') !!}</strong>
</div>
{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($address->user_id) ? $address->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Proceed To Payment">
</div>
