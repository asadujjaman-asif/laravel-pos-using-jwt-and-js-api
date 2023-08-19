
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="recipient-name" class="col-form-label">Category name</label>
            <input type="text" class="form-control" id="categoryName" placeholder="Category name" msg="Category name is required.">
            <input type="hidden"id="categoryId">
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
    
    async function fillUpInputField(id){
        getInput('categoryId').value=id;
    }
    /*const formElement=getInput('form');
    const categoryName=getInput('categoryName');
    formElement.addEventListener('submit',async function(e){
        e.preventDefault();
        let required=isRequired(
            [categoryName]
        );
        if(required==true){
            let formData={
              category_name:categoryName.value,
            }
            getInput('modal-close').click();
            let URL="/update-category";
            showPreLoader();
            showMessage(3000);
            let result = await axios.post(URL,formData);
            hidePreLoader();
            if(result.status == 200 && result.data['status']=='success'){
                getInput('message').innerText=result.data['message'];
                showMessage(3000);
                getInput('form').reset();
                await getCategory();
               
            }
        }
    });*/
  </script>