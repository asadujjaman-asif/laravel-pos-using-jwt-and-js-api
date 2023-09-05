
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update slider</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="up-form">
      <div class="modal-body">
          @include('components.dashboard.inc.update-product')
          <div class="form-group input-control">
            <label for="upTitle" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="upTitle" placeholder="Title..." msg="Title is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="upDescription" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" rows="5" id="upDescription" placeholder="Description...." msg="Description is required."></textarea>
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="upPrice" class="col-form-label">Price</label>
            <input type="text" class="form-control" id="upPrice" placeholder="Product Price..." msg="Price is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div><img id="oldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 25%;"/></div>
          <div class="form-group input-control">
            <label for="upSliderImage" class="col-form-label">Slider Image</label>
            <input type="file" id="upSliderImage" msg="Product Quantity is required." oninput="oldImg.src=window.URL.createObjectURL(this.files[0])">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small id="img-error" class="error"></small>
          </div>
          <input type="hidden" class="form-control" id="sliderId" >
          <input type="hidden" class="form-control" id="filePath" >
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
      getInput('sliderId').value=id;
      getInput('oldImg').src=path;
      getInput('filePath').value=path;
      let url="slider-by-id";
      showPreLoader();
      var result=await axios.post(url,{slider_id:id});
      hidePreLoader();
      getInput('upTitle').value=result.data['title'];
      getInput('upDescription').value=result.data['description'];
      getInput('upPrice').value=result.data['price'];
      getInput('upProductId').value=result.data['product_id'];
      $("#upProductId").trigger("chosen:updated");
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
      const upTitle=getInput('upTitle');
      const upDescription=getInput('upDescription');
      const upPrice=getInput('upPrice');
      const upProductId=getInput('upProductId');
      const sliderId=getInput('sliderId');
      const filePath=getInput('filePath');
      const sliderImage=getInput('upSliderImage').files[0];
      let required=isRequired(
        [
          upTitle, 
          upDescription,
          upPrice,
          upProductId
        ]
      );
      if(required==true){
        let formData=new FormData();
        formData.append('product_id',upProductId.value);
        formData.append('title',upTitle.value);
        formData.append('description',upDescription.value);
        formData.append('price',upPrice.value);
        formData.append('slider_id',sliderId.value);
        formData.append('file_path',filePath.value);
        formData.append('image',sliderImage);
        getInput('up-modal-close').click();
        let URL="/update-slider";
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
              getInput('up-form').reset();
              await getSlider();
              
          }else{
            alert('Something went wrong');
          }
      }
    }
  </script>