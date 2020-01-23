<li style="list-style:none;">{{ $child_category->categoryname }}</li>
@if ($child_category->categories)
    
        @foreach ($child_category->categories as $childCategory)
        <ul>@include('admin.category.child_category', ['child_category' => $childCategory])</ul>
        @endforeach
    
@endif