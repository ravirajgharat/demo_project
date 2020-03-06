<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->               
            @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{ $category->id }}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{ $category->categoryname }}
                            </a>
                        </h4>
                    </div>
                    <div id="{{ $category->id }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->categories as $subcategory)
                                    <li>
                                        <a href="{{ url('/cust/category/' . $category->categoryname . '/' . $subcategory->categoryname) }}">
                                            {{ $subcategory->categoryname }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    
        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($brands as $brand)
                        <li>
                            <a href="{{ url('/cust/brand/' . $brand->product_brand) }}">
                                <span class="pull-right">({{ App\Product::where('product_brand', $brand->product_brand)->count() }})</span>
                                {{ $brand->product_brand }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div><!--/brands_products-->  
    </div>
</div>