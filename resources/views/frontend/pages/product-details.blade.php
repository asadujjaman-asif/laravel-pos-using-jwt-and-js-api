@extends('frontend.home')
@section('title')
Product details
@endsection
@section('content')
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">With Sidebar</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav -->
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery">
                                        <figure class="product-main-image">
                                            <span class="product-label label-top">Top</span>
                                            <img id="product-zoom" src="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/1.jpg" data-zoom-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/1-big.jpg" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/1-big.jpg" data-zoom-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/1-big.jpg">
                                                <img src="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/1-small.jpg" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/2-big.jpg" data-zoom-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/2-big.jpg">
                                                <img src="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/2-small.jpg" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/3-big.jpg" data-zoom-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/3-big.jpg">
                                                <img src="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/3-small.jpg" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/4-big.jpg" data-zoom-image="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/4-big.jpg">
                                                <img src="{{asset('assets/frontend/')}}/assets/images/products/single/sidebar-gallery/4-small.jpg" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details product-details-sidebar">
                                        <h1 class="product-title">Black faux leather chain trim sandals</h1><!-- End .product-title -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                        </div><!-- End .rating-container -->

                                        <div class="product-price">
                                            $90.00
                                        </div><!-- End .product-price -->

                                        <div class="product-content">
                                            <p>Sed egestas, ante et vulputate volutpat, eros semper est, vitae luctus metus libero eu augue.</p>
                                        </div><!-- End .product-content -->

                                        <div class="details-filter-row details-row-size">
                                            <label>Color:</label>

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                                <a href="#" style="background: #efe7db;"><span class="sr-only">Color name</span></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .details-filter-row -->

                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Size:</label>
                                            <div class="select-custom">
                                                <select name="size" id="size" class="form-control">
                                                    <option value="#" selected="selected">Select a size</option>
                                                    <option value="s">Small</option>
                                                    <option value="m">Medium</option>
                                                    <option value="l">Large</option>
                                                    <option value="xl">Extra Large</option>
                                                </select>
                                            </div><!-- End .select-custom -->

                                            <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                        </div><!-- End .details-filter-row -->

                                        <div class="product-details-action">
                                            <div class="details-action-col">
                                                <label for="qty">Qty:</label>
                                                <div class="product-details-quantity">
                                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->

                                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .details-action-col -->

                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                                <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->

                                        <div class="product-details-footer details-footer-col">
                                            <div class="product-cat">
                                                <span>Category:</span>
                                                <a href="#">Women</a>,
                                                <a href="#">Dresses</a>,
                                                <a href="#">Yellow</a>
                                            </div><!-- End .product-cat -->

                                            <div class="social-icons social-icons-sm">
                                                <span class="social-label">Share:</span>
                                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                            </div>
                                        </div><!-- End .product-details-footer -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-details-top -->

                        @include('frontend.components.product-details.product-review')
                        @include('frontend.components.product-details.likes-items')
                    </div><!-- End .col-lg-9 -->
                    @include('frontend.components.product-details.related-product')
                </div><!-- End .row -->

            </div><!-- End .container -->
        </div><!-- End .page-content -->
@endsection
