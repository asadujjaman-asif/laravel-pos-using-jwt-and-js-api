<div class="container new-arrivals">
<div class="heading heading-flex mb-3">
    <div class="heading-left">
        <h2 class="title">New Arrivals</h2><!-- End .title -->
    </div><!-- End .heading-left -->

    <div class="heading-right" >
        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist" id="menu-link">
           
        </ul>
    </div><!-- End .heading-right -->
</div><!-- End .heading -->

<div class="tab-content tab-content-carousel just-action-icons-sm" id="menu-product-list">
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
                var active="";
                var menuActive="";
                if(i==0){
                    active="show active";
                    menuActive="active";
                }
                menuLink.innerHTML+=(`<li class="nav-item">
                    <a class="nav-link ${menuActive}" id="new-link_${item['slug']}" data-toggle="tab" href="#new-tab_${item['slug']}" role="tab" aria-controls="new-tab_${item['slug']}" aria-selected="false">${item['name']}</a>
                </li>`);

                
                let catUrl=item['slug'];
                productLs.innerHTML+=(`<div class="tab-pane p-0 fade ${active}" id="new-tab_${item['slug']}" role="tabpanel" aria-labelledby="new-link_${item['slug']}">
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
     
               
                let proItems=document.getElementById(`${item['slug']}`);
                item.product.forEach((item2,i2)=>{
                    var ratings=0;
                    if(item2['ratings']){
                        ratings = (item2['ratings']*10)*2;
                    }
                   
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
                                    <a href="#signin-modal" data-toggle="modal" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
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
                                        <div class="ratings-val" style="width: ${ratings}%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( ${item2['votes']} Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots" id="${item['slug']}_color_${i2}">
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->`);

                     item2.colors.forEach((color,cl)=>{
                        var cls="";
                        if(cl==0){
                            cls="active";
                        }
                        let colorsId=document.getElementById(`${item['slug']}_color_${i2}`);
                        colorsId.innerHTML+=(`<a class="${cls}" href="{{url('/product-detail/${url}')}}" style="background: #${color.color.color_code};"><span class="sr-only">Color name</span></a>`);
                    });
                });
            });
        }catch(error){
          alert(error);
        }
      }
    </script>