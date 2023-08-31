
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new Product</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form">
        <div class="modal-body">
          @include('components.dashboard.inc.category')
          @include('components.dashboard.inc.create-sub-cat')
          @include('components.dashboard.inc.create-brand')
          @include('components.dashboard.inc.create-unit')
          <div class="form-group input-control">
            <label for="productName" class="col-form-label">Product name</label>
            <input type="text" class="form-control" id="productName" placeholder="Product name...." msg="Product name is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="purchasePrice" class="col-form-label">Purchase Price</label>
            <input type="text" class="form-control" id="purchasePrice" placeholder="Purchase Price..." msg="Purchase Price is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="salePrice" class="col-form-label">Sale Price</label>
            <input type="text" class="form-control" id="salePrice" placeholder="Sale Price..." msg="Sale Price is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="productDescription" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" rows="5" id="productDescription" placeholder="Description...." msg="Description is required."></textarea>
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="quantity" class="col-form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" placeholder="Product Quantity..." msg="Product Quantity is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div><img id="demoImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 25%;"/></div>
          <div class="form-group input-control">
            <label for="productImage" class="col-form-label">Product Image</label>
            <input type="file" id="productImage" msg="Product Quantity is required." oninput="demoImg.src=window.URL.createObjectURL(this.files[0])">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small id="img-error" class="error"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#category").on("change", async function(){
    let catId=$(this).val();
    let URL="/get-sub-cat-by-cat-id";
    $("#subCategory").empty();
    showPreLoader();
    let response = await axios.post(URL,{catId:catId});
    hidePreLoader();
    response.data.forEach((item, index)=>{
        var row = `<option value="${item['id']}">${item['name']}</option>`;
        $("#subCategory").append(row);
        $("#subCategory").trigger("chosen:updated");
    });
  });
    const formElement=getInput('form');
    const categoryName=getInput('category');
    const subCategory=getInput('subCategory');
    const createBrand=getInput('createBrand');
    const productName=getInput('productName');
    const unit=getInput('unit');
    const purchasePrice=getInput('purchasePrice');
    const salePrice=getInput('salePrice');
    const productDescription=getInput('productDescription');
    const quantity=getInput('quantity');
    
    
    formElement.addEventListener('submit',async function(e){
      e.preventDefault();
      const productImage=getInput('productImage').files[0];
      let required=isRequired(
        [
          categoryName, 
          subCategory,
          createBrand,
          unit,
          purchasePrice,
          productName, 
          salePrice, 
          productDescription, 
          quantity
        ]
      );
      if(!productImage){
        getInput('img-error').innerHTML="Image feild is required"; 
        return false;
      }
      
      if(required==true){
        let formData=new FormData();
        let data=[];
        data.push({
            category_id:categoryName.value,
            sub_category_id:subCategory.value,
            brand_id:createBrand.value,
            unit_id:unit.value,
            productName:productName.value,
            purchasePrice:purchasePrice.value,
            salePrice:salePrice.value,
            qty:quantity.value,
            productDescription:productDescription.value,
          });
          alert(categoryName.value);
          formData.append('category_id',categoryName.value);
          formData.append('sub_category_id',subCategory.value);
          formData.append('brand_id',createBrand.value);
          formData.append('unit_id',unit.value);
          formData.append('productName',productName.value,);
          formData.append('purchasePrice',purchasePrice.value);
          formData.append('salePrice',salePrice.value);
          formData.append('qty',quantity.value);
          formData.append('productDescription',productDescription.value);
          formData.append('image',productImage);
          getInput('modal-close').click();
          let URL="/create-product";
          showPreLoader();
          let result = await axios.post(URL,formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          });
          hidePreLoader();
          console.log(result);
          if(result.status == 200 && result.data['status']=='success'){
              getInput('message').innerText=result.data['message'];
              showMessage(3000);
              getInput('form').reset();
              await getProduct();
              
          }
      }
    });
  </script>