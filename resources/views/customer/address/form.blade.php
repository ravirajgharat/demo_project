<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($address->address) ? $address->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="control-label">{{ 'City' }}</label>
    <input class="form-control" name="city" type="text" id="city" value="{{ isset($address->city) ? $address->city : ''}}" >
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="control-label">{{ 'State' }}</label>
    <input class="form-control" name="state" type="text" id="state" value="{{ isset($address->state) ? $address->state : ''}}" >
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pin_code') ? 'has-error' : ''}}">
    <label for="pin_code" class="control-label">{{ 'Pin Code' }}</label>
    <input class="form-control" name="pin_code" type="number" id="pin_code" value="{{ isset($address->pin_code) ? $address->pin_code : ''}}" >
    {!! $errors->first('pin_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('landmark') ? 'has-error' : ''}}">
    <label for="landmark" class="control-label">{{ 'Landmark' }}</label>
    <input class="form-control" name="landmark" type="text" id="landmark" value="{{ isset($address->landmark) ? $address->landmark : ''}}" >
    {!! $errors->first('landmark', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($address->user_id) ? $address->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
