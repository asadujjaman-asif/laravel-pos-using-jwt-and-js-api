<div class="intro-slider-container mb-5">
    <div id="slider-list" class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
        data-owl-options='{
            "dots": true,
            "nav": false, 
            "responsive": {
                "1200": {
                    "nav": true,
                    "dots": false
                }
            }
        }'>
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->
<script type="text/javascript">
      getSlider();
      async function getSlider(){
        let url="/get-slider-list";
        try{
            const response = await axios.get(url);
            const sliderList=response.data;
        
            sliderList.data.forEach((item,i)=>{
                let slider=document.getElementById('slider-list');
                let img=item['image'];
                let textColor=(i%2==0)?"text-third":"text-primary";
                slider.innerHTML+=(`<div class="intro-slide" style="background-image: url({{asset('/${img}')}});">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle ${textColor}">${item['title']}</h3><!-- End .h3 intro-subtitle -->
                        <h3 class="intro-title" title="${item.product['productName']}">${item.product['productName'].slice(0,10)} ...</h3>
                        <h1 class="intro-title" title="${item['description']}">${item['description'].slice(0,13)}..</h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup class="intro-old-price">BDT ${item['price']}</sup>
                            <span class="${textColor}">
                            BDT ${item['price']-100}<sup>.00</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="category.html" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-11 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div>`);
        
            });
        }catch(error){
          alert(error);
        }
      }
    </script>