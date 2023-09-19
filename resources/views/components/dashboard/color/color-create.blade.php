
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new color</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="colorName" class="col-form-label">Color name</label>
            <input type="text" class="form-control" id="colorName" placeholder="Color name" msg="Color name is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="colorCode" class="col-form-label">Color code</label>
            <input type="text" class="form-control" id="colorCode" placeholder="Color code" msg="Color code is required.">
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
    const colorName=getInput('colorName');
    const colorCode=getInput('colorCode');
    formElement.addEventListener('submit',async function(e){
        e.preventDefault();
        let required=isRequired(
            [colorName,colorCode]
        );
        if(required==true){
            let formData={
              name:colorName.value,
              color_code:colorCode.value
            }
            getInput('modal-close').click();
            let URL="/create-color";
            showPreLoader();
            showMessage(3000);
            let result = await axios.post(URL,formData);
            hidePreLoader();
            if(result.status == 200 && result.data['status']=='success'){
                getInput('message').innerText=result.data['msg'];
                showMessage(3000);
                getInput('form').reset();
                await getColor();
               
            }else{
              getInput('message').innerText="Failed! something went wrong";
            }
        }
    });
  </script>