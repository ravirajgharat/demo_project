<div class="card-body">
        <div class="form-group row {{ $errors->has('product_name') ? 'has-error' : ''}}">
            <label for="product_name" class="col-sm-2 col-form-label">{{ 'Product' }}</label>
            <div class="col-sm-6">
                <input class="form-control" name="product_name" placeholder="Product Name" type="text" id="product_name" value="{{ isset($product->product_name) ? $product->product_name : ''}}" >
            </div>
            <strong>{!! $errors->first('product_name', '<p class="help-block text-danger">:message</p>') !!}</strong>
        </div>
        <div class="form-group row {{ $errors->has('product_description') ? 'has-error' : ''}}">
            <label for="product_description" class="col-sm-2 col-form-label">{{ 'Description' }}</label>
            <div class="col-sm-6">
                <textarea rows="4" cols="50" class="form-control" placeholder="Description" name="product_description" type="textarea" id="product_description">{{ isset($product->product_description) ? $product->product_description : ''}}</textarea>
            </div>
            <strong>{!! $errors->first('product_description', '<p class="help-block text-danger">:message</p>') !!}</strong>
        </div>
        <div class="form-group row {{ $errors->has('price') ? 'has-error' : ''}}">
            <label for="price" class="col-sm-2 col-form-label">{{ 'Price' }}</label>
            <div class="col-sm-6">
                <input class="form-control" name="price" type="number" placeholder="Price" id="price" value="{{ isset($product->price) ? $product->price : ''}}" >
            </div>
            <strong>{!! $errors->first('price', '<p class="help-block text-danger">:message</p>') !!}</strong>
        </div>
        <div class="form-group row {{ $errors->has('product_brand') ? 'has-error' : ''}}">
            <label for="product_brand" class="col-sm-2 col-form-label">{{ 'Product Brand' }}</label>
            <div class="col-sm-6">
                <input class="form-control" name="product_brand" placeholder="Product Brand" type="text" id="product_brand" value="{{ isset($product->product_brand) ? $product->product_brand : ''}}" >
            </div>
            <strong>{!! $errors->first('product_brand', '<p class="help-block text-danger">:message</p>') !!}</strong>
        </div>
    
        <div class="form-group row {{ $errors->has('product_image') ? 'has-error' : ''}}">
            <label for="product_image" class="col-sm-2 col-form-label">{{ 'Product Image' }}</label>
            <div class="col-sm-6">
                @foreach($product->images as $image)
                    <div style="float:left;" class="text-center">
                        <img style="width:100px;height:100px;" src="{{ url('/storage/' . $image->product_image) }}" alt="">
                        <br><input type="radio" name="selected_image" value="{{ $image->id }}">
                    </div>
                @endforeach
                <input class="form-control" name="product_image[]" type="file" id="product_image" value="{{ isset($product_image->product_image) ? $product_image->product_image : ''}}" multiple>
            </div>
            <strong>{!! $errors->first('product_image', '<p class="help-block text-danger">:message</p>') !!}</strong>
        </div>
    
        <div class="form-group row {{ $errors->has('parameter') ? 'has-error' : ''}}">
            <label for="parameter" class="col-sm-2 col-form-label">{{ 'Parameters' }}</label>
            <div class="col-sm-6">
    
                {{--  --}}
    
                @foreach ($product->parameters as $parameter)
                    <?php $pp[] = $parameter->product_parameter ?>
                @endforeach
    
                {{-- {{dd($pp)}} --}}
    
                {{-- <input class="form-control" name="parameter" placeholder="Parameter" type="text" id="parameter" value="{{ isset($parameter->parameter) ? $parameter->parameter : ''}}" > --}}
                {{-- {{dd($parameters)}} --}}
                <select class="form-control" name="parameter[]" id="parameter" multiple>
    
                    @foreach ($parameters as $parameter)
                        <option value="{{ $parameter->product_parameter }}" <?php if(in_array($parameter->product_parameter, $pp)) { echo ' disabled="disabled"'; } ?>>
                            {{ $parameter->product_parameter }}
                        </option>
                    @endforeach
    
                </select>
            </div>
            <strong>{!! $errors->first('parameter', '<p class="help-block text-danger">:message</p>') !!}</strong>
        </div>
        <div class="form-group row {{ $errors->has('categories') ? 'has-error' : ''}}">
            <label for="categories" class="col-sm-2 col-form-label">{{ 'Category' }}</label>
            <div class="col-sm-6">
                {{-- <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($category->category_id) ? $category->category_id : ''}}" > --}}
                <select class="form-control" name="categories" id="categories">
                    <option value="">Main Category</option>
    
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" <?php if(is_object($product->category) && ($product->category->id == $category->id)) { echo ' selected="selected"'; } ?>>
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
        <a href="{{ url('/admin/product') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>