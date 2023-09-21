
<div class="modal fade" id="multiImg-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create/update multi product image</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="up-form">
        <div class="modal-body">
            <div style="width: 100%; display:flex">
                <div class="form-group input-control" for="imageOne" style="width: 48%;">
                    <img id="imageOneOldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 100%;height:200px"/>
                    <input type="file" id="imageOne" oninput="imageOneOldImg.src=window.URL.createObjectURL(this.files[0])">
                    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                    <i class="fa-regular fa-circle-check success-icon"></i>
                    <small id="img-error" class="error"></small>
                    <input type="hidden" class="d-none" id="filePath">
                </div>
                <div class="form-group input-control" for="imageTwo" style="width: 48%;margin-left:4%">
                    <img id="imageTwoOldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 100%;height:200px"/>
                    <input type="file" id="imageTwo" oninput="imageTwoOldImg.src=window.URL.createObjectURL(this.files[0])">
                    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                    <i class="fa-regular fa-circle-check success-icon"></i>
                    <small id="img-error" class="error"></small>
                    <input type="hidden" class="d-none" id="filePath">
                </div>
            </div>
            <div style="width: 100%; display:flex">
                <div class="form-group input-control" for="imageThree" style="width: 48%;">
                    <img id="imageThreeOldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 100%;height:200px"/>
                    <input type="file" id="imageThree" oninput="imageThreeOldImg.src=window.URL.createObjectURL(this.files[0])">
                    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                    <i class="fa-regular fa-circle-check success-icon"></i>
                    <small id="img-error" class="error"></small>
                    <input type="hidden" class="d-none" id="filePath">
                </div>
                <div class="form-group input-control" for="imageFour" style="width: 48%;margin-left:4%">
                    <img id="imageFourOldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 100%;height:200px"/>
                    <input type="file" id="imageFour" oninput="imageFourOldImg.src=window.URL.createObjectURL(this.files[0])">
                    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                    <i class="fa-regular fa-circle-check success-icon"></i>
                    <small id="img-error" class="error"></small>
                    <input type="hidden" class="d-none" id="filePath">
                </div>
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