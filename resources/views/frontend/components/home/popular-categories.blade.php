<div class="container">
<h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->

<div class="cat-blocks-container">
    <div class="row" id="category-list"> 
    </div><!-- End .row -->
</div><!-- End .cat-blocks-container -->
</div><!-- End .container -->
<script type="text/javascript">
      getPopularCategory();
      async function getPopularCategory(){
        let url="/get-popular-category";
        try{
            const response = await axios.get(url);
            const pCategoryList=response.data;
        
            pCategoryList.data.forEach((item,i)=>{
                let catList=document.getElementById('category-list');
                let img=item['image'];
                let url=item['slug'];
                catList.innerHTML+=(`<div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{url('/category/${url}')}}" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{asset('${img}')}}" alt="${item['name']}">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">${item['name']}</h3><!-- End .cat-block-title -->
                    </a>
                </div>`);
            });
        }catch(error){
          alert(error);
        }
      }
    </script>