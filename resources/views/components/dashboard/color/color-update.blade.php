
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Color Unit</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form-up">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="updateColor" class="col-form-label">Color name</label>
            <input type="text" class="form-control" id="updateColor" placeholder="Color name...." msg="Color name is required.">
            <input type="hidden"id="colorId">
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
        getInput('colorId').value=id;
        let url="color-by-id";
        showPreLoader();
        var result=await axios.post(url,{color_id:id});
        hidePreLoader();
        getInput('updateColor').value=result.data['name'];
    }
    async function update(){
        const updateColor=getInput('updateColor');
        const colorId=getInput('colorId');
        let required=isRequired(
            [updateColor]
        );
        if(required==true){
            let formData={
              name:updateColor.value,
              color_id:colorId.value,
            }
            getInput('up-modal-close').click();
            let URL="/update-color";
            showPreLoader();
            showMessage(3000);
            let res = await axios.post(URL,formData);
            hidePreLoader();
            if(res.status == 200 && res.data['status']=='success'){
               getInput('message').innerText=res.data['msg'];
               showMessage(3000);
               getInput('form-up').reset();
               await getColor();
               
            }
        }
    }
  </script>