
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new unit</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="unitName" class="col-form-label">Unit name</label>
            <input type="text" class="form-control" id="unitName" placeholder="Unit name" msg="Unit name is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
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
    const unitName=getInput('unitName');
    formElement.addEventListener('submit',async function(e){
        e.preventDefault();
        let required=isRequired(
            [unitName]
        );
        if(required==true){
            let formData={
              name:unitName.value
            }
            getInput('modal-close').click();
            let URL="/create-unit";
            showPreLoader();
            showMessage(3000);
            let result = await axios.post(URL,formData);
            hidePreLoader();
            if(result.status == 200 && result.data['status']=='success'){
                getInput('message').innerText=result.data['message'];
                showMessage(3000);
                getInput('form').reset();
                await getUnit();
               
            }else{
              getInput('message').innerText="Failed! something went wrong";
            }
        }
    });
  </script>