<div class="container new-arrivals">
<div class="heading heading-flex mb-3">
    <div class="heading-left">
        <h2 class="title">New Arrivals</h2><!-- End .title -->
    </div><!-- End .heading-left -->

    <div class="heading-right" >
        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist" id="menu-link">
            <li class="nav-item">
                <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
            </li>
        </ul>
    </div><!-- End .heading-right -->
</div><!-- End .heading -->

<div class="tab-content tab-content-carousel just-action-icons-sm" id="menu-product-list">
    <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": true, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1200": {
                        "items":5
                    }
                }
            }'>
            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="{{asset('assets/frontend/')}}/assets/images/demos/demo-4/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        $1,199.99
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-2">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="{{asset('assets/frontend/')}}/assets/images/demos/demo-4/products/product-2.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        $79.99
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 6 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-new">New</span>
                    <a href="product.html">
                        <img src="{{asset('assets/frontend/')}}/assets/images/demos/demo-4/products/product-3.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                    <div class="product-price">
                        $899.99
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-dots">
                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div><!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <span class="product-label label-circle label-sale">Sale</span>
                    <a href="product.html">
                        <img src="{{asset('assets/frontend/')}}/assets/images/demos/demo-4/products/product-4.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Cell Phone</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL  128GB</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        <span class="new-price">$35.41</span>
                        <span class="old-price">Was $41.67</span>
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 10 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div><!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="{{asset('assets/frontend/')}}/assets/images/demos/demo-4/products/product-5.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">TV & Home Theater</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Samsung - 55" Class  LED 2160p Smart</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        $899.99
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 5 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-2">
                <figure class="product-media">
                    <span class="product-label label-circle label-top">Top</span>
                    <a href="product.html">
                        <img src="{{asset('assets/frontend/')}}/assets/images/demos/demo-4/products/product-1.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        $1,199.99
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .owl-carousel -->
    </div><!-- .End .tab-pane -->
</div><!-- End .tab-content -->
</div><!-- End .container -->
<script type="text/javascript">
      getNewArrival();
      async function getNewArrival(){
        let url="/get-new-arrival";
        try{
            const response = await axios.get(url);
            const results=response.data;
            let productLs=document.getElementById("menu-product-list");
            results.data.forEach((item,i)=>{
                let menuLink=document.getElementById('menu-link');
                menuLink.innerHTML+=(`<li class="nav-item">
                    <a class="nav-link" id="new-link_${item['slug']}" data-toggle="tab" href="#new-tab_${item['slug']}" role="tab" aria-controls="new-tab_${item['slug']}" aria-selected="false">${item['name']}</a>
                </li>`);

                
                let catUrl=item['slug'];
                productLs.innerHTML+=(`<div class="tab-pane p-0 fade" id="new-tab_${item['slug']}" role="tabpanel" aria-labelledby="new-link_${item['slug']}">
                    <div id="${item['slug']}" class="product-${i} owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": true, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":5
                                }
                            }
                        }' >
                        
                    </div><!-- End .owl-carousel -->
                </div>`);
     
                console.log(item['slug']);
                let proItems=document.getElementById(`${item['slug']}`);
                item.product.forEach((item2,i2)=>{
                    var status="";
                    if(item2['sale_status']==1){
                        status='<span class="product-label label-circle label-top">Top</span>';
                    }
                    if(item2['sale_status']==2){
                        status='<span class="product-label label-circle label-sale">Sale</span>';
                    }
                    if(item2['sale_status']==3){
                        status='<span class="product-label label-circle label-new">New</span>';
                    }
                    let url=item2['slug'];
                    let img=item2['image'];
                    proItems.innerHTML+=(`<div class="product product-2">
                            <figure class="product-media">
                                ${status}
                                <a href="{{url('/category/${url}')}}">
                                    <img src="{{asset('${img}')}}" alt="${item2['productName']}" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="{{url('/category/${catUrl}')}}">${item['name']}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{url('/product-detail/${url}')}}">${item2['productName']} </a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    BDT ${item2['salePrice']} 
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                    <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->`);
                        //document.getElementsByClassName('owl-stage-outer').firstChild.style.display="none";
                });
                
            });
        }catch(error){
          alert(error);
        }
      }
    </script>