<nav class="main-nav">
    <ul class="menu sf-arrows" id="menu-list">
        
        <li>
            <a href="elements-list.html" class="sf-with-ul">N.Ghuri</a>

            <ul>
                <li><a href="elements-products.html">About Us</a></li>
                <li><a href="elements-typography.html">Contact Us</a></li>
                <li><a href="elements-titles.html">Blog</a></li>
                <li><a href="elements-banners.html">Comming Soon</a></li>
                <li><a href="elements-product-category.html">Payment Method</a></li>
            </ul>
        </li>
    </ul><!-- End .menu -->
</nav><!-- End .main-nav -->
<script type="text/javascript">
      getMenu();
      async function getMenu(){
        let url="/item-category";
        try{
            const response = await axios.get(url);
            const menuList=response.data;
            
            menuList.data.forEach((item,i)=>{
                let menu=document.getElementById('menu-list');
                menu.innerHTML+=(`<li>
            <a href="#" class="sf-with-ul">${item['category_name']}</a>
            <div class="megamenu megamenu-sm">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <div class="menu-col">
                            <div class="menu-title">Product Category</div><!-- End .menu-title -->
                            <ul id="sub-cat-${i}">
                            <!-- <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li> -->
                            </ul>
                        </div><!-- End .menu-col -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="banner banner-overlay">
                            <a href="category.html">
                                <img src="{{asset('assets/frontend/')}}/assets/images/menu/banner-2.jpg" alt="Banner">

                                <div class="banner-content banner-content-bottom">
                                    <div class="banner-title text-white">New Trends<br><span><strong>spring 2023</strong></span></div><!-- End .banner-title -->
                                </div><!-- End .banner-content -->
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .megamenu megamenu-sm -->
        </li>`);
        item.sub_categories.forEach((sub_cat,i2)=>{
            let sub_menu=document.getElementById(`sub-cat-${i}`);
            console.log(sub_cat);
            sub_menu.innerHTML+=(`<li><a href="product.html">${sub_cat['name']}</a></li>`);
        });
        
            });
        }catch(error){
          alert(error);
        }
      }
    </script>