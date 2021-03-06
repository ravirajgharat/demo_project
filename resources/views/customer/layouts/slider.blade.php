<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-5">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>{{ $ban->category->categoryname }}</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <a href="{{ url('/cust/category/' . $ban->category->parent->categoryname . '/' . $ban->category->categoryname) }}" class="btn btn-default get">Get it now</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ url('/storage/' . $ban->bannerimage) }}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <?php $i = 1; ?>
                        @foreach($banners as $banner)
                            <div class="item">
                                <div class="col-sm-5">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>{{ $banner->category->categoryname }}</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <a href="{{ url('/cust/category/' . $banner->category->parent->categoryname . '/' . $banner->category->categoryname) }}" class="btn btn-default get">Get it now</a>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ url('/storage/' . $banner->bannerimage) }}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            @if($i++ == 2) <?php break; ?> @endif
                        @endforeach
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section>
