
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new slider</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form">
        <div class="modal-body">
          @include('components.dashboard.inc.create-product')
          <div class="form-group input-control">
            <label for="title" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title..." msg="Title is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="description" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" rows="5" id="description" placeholder="Description...." msg="Description is required."></textarea>
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="price" class="col-form-label">Price</label>
            <input type="text" class="form-control" id="price" placeholder="Product Price..." msg="Price is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div><img id="demoImg" src="{{asset('assets/backend/img/demo-image.jpg')}}" style="width: 25%;"/></div>
          <div class="form-group input-control">
            <label for="sliderImage" class="col-form-label">Slider Image</label>
            <input type="file" id="sliderImage" msg="Product Quantity is required." oninput="demoImg.src=window.URL.createObjectURL(this.files[0])">
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
    const formElement=getInput('form');
    const productId=getInput('productId');
    const title=getInput('title');
    const description=getInput('description');
    const price=getInput('price');
    
    formElement.addEventListener('submit',async function(e){
      e.preventDefault();
      const sliderImage=getInput('sliderImage').files[0];
      let required=isRequired(
        [
            productId, 
            title,
            description,
            price
        ]
      );
      if(!sliderImage){
        getInput('img-error').innerHTML="Image feild is required"; 
        return false;
      }
      
      if(required==true){
        let formData=new FormData();
        let data=[];
          formData.append('product_id',productId.value);
          formData.append('title',title.value);
          formData.append('description',description.value);
          formData.append('price',price.value);
          formData.append('image',sliderImage);
          getInput('modal-close').click();
          let URL="/create-slider";
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
              await getSlider();
              
          }
      }
    });
  </script>