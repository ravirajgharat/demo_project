
<option value="{{ $child_category->id }}">{{ $child_category->categoryname }}</option>

@if ($child_category->categories)
    
        @foreach ($child_category->categories as $childCategory)
        @include('admin.category.parent_category', ['child_category' => $childCategory])
        @endforeach
    
@endif