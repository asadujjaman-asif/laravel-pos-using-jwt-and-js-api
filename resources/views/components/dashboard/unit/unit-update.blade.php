
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Unit</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form-up">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="updateUnitName" class="col-form-label">Unit name</label>
            <input type="text" class="form-control" id="updateUnitName" placeholder="Unit name...." msg="Unit name is required.">
            <input type="hidden"id="unitId">
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
        getInput('unitId').value=id;
        let url="unit-by-id";
        showPreLoader();
        var result=await axios.post(url,{unit_id:id});
        console.log(result);
        hidePreLoader();
        getInput('updateUnitName').value=result.data['name'];
    }
    async function update(){
        const updateUnitName=getInput('updateUnitName');
        let required=isRequired(
            [updateUnitName]
        );
        if(required==true){
            let formData={
              name:updateUnitName.value,
              unit_id:unitId.value,
            }
            getInput('up-modal-close').click();
            let URL="/update-unit";
            showPreLoader();
            showMessage(3000);
            let res = await axios.post(URL,formData);
            hidePreLoader();
            if(res.status == 200 && res.data['status']=='success'){
               getInput('message').innerText=res.data['message'];
               showMessage(3000);
               getInput('form-up').reset();
               await getUnit();
               
            }
        }
    }
  </script>