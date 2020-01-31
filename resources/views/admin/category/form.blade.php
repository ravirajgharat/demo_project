<div class="card-body">
    <div class="form-group row {{ $errors->has('categoryname') ? 'has-error' : ''}}">
        <label for="categoryname" class="col-sm-2 col-form-label">{{ 'Category' }}</label>
        <div class="col-sm-10">
            <input class="form-control" name="categoryname" type="text" id="categoryname" value="{{ isset($category->categoryname) ? $category->categoryname : ''}}" placeholder="Category">
        </div>
        <strong>{!! $errors->first('categoryname', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
    <div class="form-group row {{ $errors->has('category_id') ? 'has-error' : ''}}">
        <label for="category_id" class="col-sm-2 col-form-label">{{ 'Parent Category' }}</label>
        <div class="col-sm-10">
            {{-- <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($category->category_id) ? $category->category_id : ''}}" > --}}
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Main Category</option>
                {{-- @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old($category->category_id) == $category->category_id ? 'selected' : '') }}>-{{ $category->categoryname }}</option>
                @endforeach --}}

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"><strong>{{ $category->categoryname }}</strong></option>
                    
                    @foreach ($category->childrenCategories as $childCategory)
                        @include('admin.category.parent_category', ['child_category' => $childCategory])
                    @endforeach        
                @endforeach



            </select>
        </div>
        <strong>{!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}</strong>
    </div>
</div>

<div class="card-footer">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a href="{{ url('/admin/category') }}" title="Back" class="btn btn-secondary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>