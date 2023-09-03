
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="up-form">
        <div class="modal-body">
          @include('components.dashboard.inc.update-cat')
          @include('components.dashboard.inc.update-sub-cat')
          @include('components.dashboard.inc.update-brand')
          @include('components.dashboard.inc.update-unit')
          <div class="form-group input-control">
            <label for="upProductName" class="col-form-label">Product name</label>
            <input type="text" class="form-control" id="upProductName" placeholder="Product name...." msg="Product name is required.">
            <input type="hidden" id="productId">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="upPurchasePrice" class="col-form-label">Purchase Price</label>
            <input type="text" class="form-control" id="upPurchasePrice" placeholder="Purchase Price..." msg="Purchase Price is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="upSalePrice" class="col-form-label">Sale Price</label>
            <input type="text" class="form-control" id="upSalePrice" placeholder="Sale Price..." msg="Sale Price is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="upProductDescription" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" rows="5" id="upProductDescription" placeholder="Description...." msg="Description is required."></textarea>
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="upQuantity" class="col-form-label">Quantity</label>
            <input type="text" class="form-control" id="upQuantity" placeholder="Product Quantity..." msg="Product Quantity is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div><img id="oldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 25%;"/></div>
          <div class="form-group input-control">
            <label for="upProductImage" class="col-form-label">Product Image</label>
            <input type="file" id="upProductImage" msg="Product Quantity is required." oninput="oldImg.src=window.URL.createObjectURL(this.files[0])">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small id="img-error" class="error"></small>
            <input type="hidden" class="d-none" id="filePath">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up-modal-close">Close</button>
          <button type="button" onclick="updateProduct()" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  async function fillUpInputField(id,path){
      getInput('productId').value=id;
      getInput('oldImg').src=path;
      getInput('filePath').value=path;
      let url="product-by-id";
      showPreLoader();
      var result=await axios.post(url,{product_id:id});
      hidePreLoader();
      getInput('upProductName').value=result.data['productName'];
      getInput('upPurchasePrice').value=result.data['purchasePrice'];
      getInput('upSalePrice').value=result.data['salePrice'];
      getInput('upProductDescription').value=result.data['shortDescription'];
      getInput('upQuantity').value=result.data['qty'];
      getInput('updateBrand').value=result.data['brand_id'];
      getInput('upCategory').value=result.data['category_id'];
      getInput('upSubCategory').value=result.data['sub_category_id'];
      getInput('upUnit').value=result.data['unit_id'];
      $("#updateBrand").trigger("chosen:updated");
      $("#upCategory").trigger("chosen:updated");
      $("#upSubCategory").trigger("chosen:updated");
      $("#upUnit").trigger("chosen:updated");
  }
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
    async function updateProduct(){
      const upProductName=getInput('upProductName');
      const upPurchasePrice=getInput('upPurchasePrice');
      const upSalePrice=getInput('upSalePrice');
      const upProductDescription=getInput('upProductDescription');
      const upQuantity=getInput('upQuantity');
      const updateBrand=getInput('updateBrand');
      const upCategory=getInput('upCategory');
      const upSubCategory=getInput('upSubCategory');
      const upUnit=getInput('upUnit');
      const productId=getInput('productId');
      const file_path=getInput('filePath');
      const productImage=getInput('upProductImage').files[0];
      let required=isRequired(
        [
          upProductName, 
          upPurchasePrice,
          upSalePrice,
          upProductDescription,
          upQuantity,
          updateBrand, 
          upCategory, 
          upSubCategory, 
          upUnit
        ]
      );
      if(required==true){
        let formData=new FormData();
          formData.append('category_id',upCategory.value);
          formData.append('sub_category_id',upSubCategory.value);
          formData.append('brand_id',updateBrand.value);
          formData.append('unit_id',upUnit.value);
          formData.append('productName',upProductName.value,);
          formData.append('purchasePrice',upPurchasePrice.value);
          formData.append('salePrice',upSalePrice.value);
          formData.append('qty',upQuantity.value);
          formData.append('productDescription',upProductDescription.value);
          formData.append('file_path',file_path.value);
          formData.append('product_id',productId.value);
          formData.append('image',productImage);
          getInput('modal-close').click();
          let URL="/update-product";
          showPreLoader();
          let result = await axios.post(URL,formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          });
          hidePreLoader();
          if(result.status == 200 && result.data['status']=='success'){
              getInput('message').innerText=result.data['message'];
              showMessage(3000);
              getInput('up-modal-close').reset();
              await getProduct();
              
          }else{
            alert('Something went wrong');
          }
      }
    }
  </script>