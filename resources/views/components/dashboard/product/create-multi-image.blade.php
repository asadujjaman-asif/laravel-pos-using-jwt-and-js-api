
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
                    <input type="hidden" class="d-none" id="filePathOne">
                </div>
                <div class="form-group input-control" for="imageTwo" style="width: 48%;margin-left:4%">
                    <img id="imageTwoOldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 100%;height:200px"/>
                    <input type="file" id="imageTwo" oninput="imageTwoOldImg.src=window.URL.createObjectURL(this.files[0])">
                    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                    <i class="fa-regular fa-circle-check success-icon"></i>
                    <small id="img-error" class="error"></small>
                    <input type="hidden" class="d-none" id="filePathTwo">
                </div>
            </div>
            <div style="width: 100%; display:flex">
                <div class="form-group input-control" for="imageThree" style="width: 48%;">
                    <img id="imageThreeOldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 100%;height:200px"/>
                    <input type="file" id="imageThree" oninput="imageThreeOldImg.src=window.URL.createObjectURL(this.files[0])">
                    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                    <i class="fa-regular fa-circle-check success-icon"></i>
                    <small id="img-error" class="error"></small>
                    <input type="hidden" class="d-none" id="filePathThree">
                </div>
                <div class="form-group input-control" for="imageFour" style="width: 48%;margin-left:4%">
                    <img id="imageFourOldImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 100%;height:200px"/>
                    <input type="file" id="imageFour" oninput="imageFourOldImg.src=window.URL.createObjectURL(this.files[0])">
                    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                    <i class="fa-regular fa-circle-check success-icon"></i>
                    <small id="img-error" class="error"></small>
                    <input type="hidden" class="d-none" id="filePathFour">
                    <input type="hidden" class="d-none" id="productId">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="image-up-modal-close">Close</button>
          <button type="button" onclick="updateProductMultiImage()" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  async function fillUpInputField(id,path){
      getInput('productId').value=id;
      let url="product-image-by-id";
      showPreLoader();
      var result=await axios.post(url,{product_id:id});
      let results=result.data.data;
      console.log(results);
      getInput('imageOneOldImg').src=results.imageOne;
      getInput('filePathOne').value=results.imageOne;
      
      getInput('imageTwoOldImg').src=results.imageTwo;
      getInput('filePathTwo').value=results.imageTwo;

      getInput('imageThreeOldImg').src=results.imageThree;
      getInput('filePathThree').value=results.imageThree;

      getInput('imageFourOldImg').src=results.imageFour;
      getInput('filePathFour').value=results.imageFour;
      hidePreLoader();
  }
    async function updateProductMultiImage(){
      const imageOne=getInput('imageOne').files[0];
      const imageTwo=getInput('imageTwo').files[0];
      const imageThree=getInput('imageThree').files[0];
      const imageFour=getInput('imageFour').files[0];
      const productId=getInput('productId');
      const filePathOne=getInput('filePathOne');
      const filePathTwo=getInput('filePathTwo');
      const filePathThree=getInput('filePathThree');
      const filePathFour=getInput('filePathFour');
      let required=isRequired(
        [
          productId, 
        ]
      );
      if(required==true){
        let formData=new FormData();
          formData.append('product_id',productId.value);
    
          formData.append('filePathOne',filePathOne.value);
          formData.append('filePathTwo',filePathTwo.value);
          formData.append('filePathThree',filePathThree.value);
          formData.append('filePathFour',filePathFour.value);

          formData.append('imageOne',imageOne);
          formData.append('imageTwo',imageTwo);
          formData.append('imageThree',imageThree);
          formData.append('imageFour',imageFour);

          getInput('image-up-modal-close').click();
          let URL="/update-product-multi-image";
          showPreLoader();
          let result = await axios.post(URL,formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          });
          console.log(result);
          hidePreLoader();
          if(result.status == 200 && result.data['status']=='success'){
              getInput('message').innerText=result.data['msg'];
              showMessage(3000);
              getInput('image-up-modal-close').reset();
              await getProduct();
              
          }else{
            alert('Something went wrong');
          }
      }
    }
  </script>