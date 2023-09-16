
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product size</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form-up">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="updateSize" class="col-form-label">Size name</label>
            <input type="text" class="form-control" id="updateSize" placeholder="Product size...." msg="Product size is required.">
            <input type="hidden"id="sizeId">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="upSizeDescription" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" rows="5" id="upSizeDescription" placeholder="Description...." msg="Description is required."></textarea>
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
        getInput('sizeId').value=id;
        let url="size-by-id";
        showPreLoader();
        var result=await axios.post(url,{size_id:id});
        hidePreLoader();
        getInput('updateSize').value=result.data['name'];
        getInput('upSizeDescription').value=result.data['description'];
    }
    async function update(){
        const updateSize=getInput('updateSize');
        const upSizeDescription=getInput('upSizeDescription');
        const sizeId=getInput('sizeId');
        let required=isRequired(
            [updateSize,upSizeDescription]
        );
        if(required==true){
            let formData={
              name:updateSize.value,
              size_id:sizeId.value,
              description:upSizeDescription.value,
            }
            getInput('up-modal-close').click();
            let URL="/update-size";
            showPreLoader();
            showMessage(3000);
            let res = await axios.post(URL,formData);
            hidePreLoader();
            if(res.status == 200 && res.data['status']=='success'){
               getInput('message').innerText=res.data['msg'];
               showMessage(3000);
               getInput('form-up').reset();
               await getSize();
               
            }
        }
    }
  </script>