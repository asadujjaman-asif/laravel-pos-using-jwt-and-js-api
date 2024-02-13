
<div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container quickView-container">
                    <div class="quickView-content">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="row">
                                    <div class="product-left">
                                        <a href="#one" class="carousel-dot active">
                                            <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="short_image_1">
                                        </a>
                                        <a href="#two" class="carousel-dot">
                                            <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="short_image_2">
                                        </a>
                                        <a href="#three" class="carousel-dot">
                                            <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="short_image_3">
                                        </a>
                                        <a href="#four" class="carousel-dot">
                                            <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="short_image_4">
                                        </a>
                                    </div>
                                    <div class="product-right">
                                        <div class="owl-carousel owl-theme owl-nav-inside owl-light mb-0" data-toggle="owl" data-owl-options='{
                                            "dots": false,
                                            "nav": false, 
                                            "URLhashListener": true,
                                            "responsive": {
                                                "900": {
                                                    "nav": true,
                                                    "dots": true
                                                }
                                            }
                                        }'>
                                            <div class="intro-slide" data-hash="one">
                                                <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_1" alt="Image Desc">
                                                <a href="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_link_1" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->

                                            <div class="intro-slide" data-hash="two">
                                                <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_2" alt="Image Desc">
                                                <a href="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_link_2" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->

                                            <div class="intro-slide" data-hash="three">
                                                <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_3" alt="Image Desc">
                                                <a href="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_link_3" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->

                                            <div class="intro-slide" data-hash="four">
                                                <img src="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_4" alt="Image Desc">
                                                <a href="{{asset('assets/backend/img/demo-image.jpg')}}" id="image_link_4" class="btn-fullscreen">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </div><!-- End .intro-slide -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <h2 class="product-title" id="productName" style="font-size: 15px;text-align:justify"></h2>
                                <h3 class="product-price" id="productPrice">00.00</h3>

                                <div class="ratings-container" id="ratingsInfo">
                                    
                                </div><!-- End .rating-container -->

                                <p class="product-txt" id="shortDescription"></p>


                                <div class="details-filter-row product-nav product-nav-thumbs">
                                    <label for="size">color:</label>
                                   <span id="colorList" style="width:100%">
                                        
                                    </span>
                                </div><!-- End .product-nav -->

                                <div class="details-filter-row details-row-size">
                                    <label for="size">Size:</label>
                                    <div class="select-custom">
                                        <select name="size" id="size" class="form-control">
                                           
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div>

                                
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <!--<div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                    </div> End .details-action-wrapper -->
                                    <input type="hidden" id="setColor">
                                    <input type="hidden" id="productId">
                                    <a href="#" class="btn-product btn-cart" onclick="addToCart()"><span>add to cart</span></a>
                                </div>

                               <!-- <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div>

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->
<script type="text/javascript">
    async function productById(slug){
        let url = `/get-product-by-id/${slug}`;
        try{
            let response=await axios.get(url);
            const results=response.data.data;

            
            var rattings=0;
            if(results['ratings']){
                rattings=(results['ratings']*10)*2;
            }
            
            document.getElementById("image_1").src=results['image'];
            document.getElementById("image_link_1").href=results['image'];
            //
            document.getElementById("image_2").src=results.shortImages['imageOne'];
            document.getElementById("image_link_2").href=results.shortImages['imageOne'];
            document.getElementById("short_image_1").src=results.shortImages['imageOne'];
            //
            document.getElementById("image_3").src=results.shortImages['imageTwo'];
            document.getElementById("image_link_3").href=results.shortImages['imageTwo'];
            document.getElementById("short_image_2").src=results.shortImages['imageTwo'];
            //
            document.getElementById("image_4").src=results.shortImages['imageThree'];
            document.getElementById("image_link_4").href=results.shortImages['imageThree'];
            document.getElementById("short_image_3").src=results.shortImages['imageThree'];
            document.getElementById("short_image_4").src=results.shortImages['imageFour'];

            document.getElementById("productId").value=results['id'];
            document.getElementById("productName").innerHTML=results['productName'];
            document.getElementById("productPrice").innerHTML="BDT "+results['salePrice'];
            document.getElementById("ratingsInfo").innerHTML=(`<div class="ratings">
                <div class="ratings-val" style="width: ${rattings}%;"></div><!-- End .ratings-val -->
                </div><!-- End .ratings -->
                <span class="ratings-text">( ${results['votes']} Reviews )</span>`);

            document.getElementById("shortDescription").innerHTML=results['shortDescription'];
            if(results['colors']){
                let colorList="";
               let result=results['colors'];
               result.forEach((colors, index)=>{
                let ac=(index==0)?"active":"";
                colorList+=(`<a class="${ac}" href="#" onclick="chooseColor(${colors.color.id})" value="${colors.color.id}" style="background: #${colors.color.color_code};"><span class="sr-only">${colors.color.name}</span></a>`); 
               });
               document.getElementById("colorList").innerHTML=colorList;
            }
            let sizes=results.sizes;
            let sizeList='<option value="" selected="selected">Select a size</option>';
            sizes.forEach((size, index)=>{
                
                sizeList+=(`<option value="${size.size.id}">${size.size.name}</option>`);
            });
            document.getElementById("size").innerHTML=sizeList;
            
        }catch(error){
            alert(error.message);
        }
    }
    function chooseColor(color){
        document.getElementById("setColor").value=color;
    }
    async function addToCart(e){
        let productId=document.getElementById("productId").value;
        let colorId=document.getElementById("setColor").value;
        let sizeId=document.getElementById("size").value;
        let qty=document.getElementById("size").value;
        if(productId==""){
            return false;
        }
        if(colorId==""){
            alert("Please choose a color");
            return false;
        }
        if(sizeId==""){
            alert("Please choose a size");
            return false;
        }
        let formData={
            product_id: productId,
            color_id: colorId,
            size_id: sizeId,
            qty:qty,
            store_id:1,
        };
        let url = "/add-to-cart/";
        let response=await axios.post(url, formData);
        console.log(response);
        if(response.status == 200 && response.data['status']=='success'){
            let msg=response.data['msg'];
            document.getElementById("productId").value;
            document.getElementById("setColor").value;
            document.getElementById("size").value;
            $("#add-to-cart").modal("hide");
            alert(msg);
        }else{
            getInput('message').innerText="Failed! something went wrong";
        }

    }
</script> 