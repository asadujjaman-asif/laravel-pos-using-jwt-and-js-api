<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
        Brands <i class="icon-angle-down"></i>
    </a>

<div class="dropdown-menu">
    <nav class="side-nav">
        <ul class="menu-vertical sf-arrows" id="brand-list">
        </ul><!-- End .menu-vertical -->
    </nav><!-- End .side-nav -->
</div><!-- End .dropdown-menu -->
<script type="text/javascript">
      getBrand();
      async function getBrand(){
        let url="/get-brand-list";
        try{
            const response = await axios.get(url);
            const brandList=response.data;
            brandList.data.forEach((item,i)=>{
                let brand=document.getElementById('brand-list');
                let slug=item['slug'];
                let classData = (i%2==0)?"item-lead":"";
                brand.innerHTML+=(`<li class="${classData}"><a href="{{url('product/brand/${slug}')}}">${item['name'].toUpperCase()}</a></li>`);
            });
        }catch(error){
          alert(error);
        }
      }
    </script>