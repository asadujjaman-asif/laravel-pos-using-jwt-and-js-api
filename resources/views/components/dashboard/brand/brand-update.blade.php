
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form-up">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="recipient-name" class="col-form-label">Brand name</label>
            <input type="text" class="form-control" id="updateBrandName" placeholder="Brand name...." msg="Brand name is required.">
            <input type="hidden"id="brandId">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="brandDescription" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" rows="5" id="updateBrandDescription" placeholder="Description...." msg="Description is required."></textarea>
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up-modal-close">Close</button>
          <button type="button" onclick="update()" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    
    async function fillUpInputField(id){
        getInput('brandId').value=id;
        let url="brand-by-id";
        showPreLoader();
        var result=await axios.post(url,{brand_id:id});
        console.log(result);
        hidePreLoader();
        getInput('updateBrandName').value=result.data['name'];
        getInput('updateBrandDescription').value=result.data['description'];
    }
    async function update(){
        const brandName=getInput('updateBrandName');
        const brandDescription=getInput('updateBrandDescription');
        let required=isRequired(
            [brandName, brandDescription]
        );
        if(required==true){
            let formData={
              name:brandName.value,
              description:brandDescription.value,
              brand_id:brandId.value,
            }
            getInput('up-modal-close').click();
            let URL="/update-brand";
            showPreLoader();
            showMessage(3000);
            let res = await axios.post(URL,formData);
            hidePreLoader();
            if(res.status == 200 && res.data['status']=='success'){
               getInput('message').innerText=res.data['message'];
               showMessage(3000);
               getInput('form-up').reset();
               await getBrand();
               
            }
        }
    }
  </script>