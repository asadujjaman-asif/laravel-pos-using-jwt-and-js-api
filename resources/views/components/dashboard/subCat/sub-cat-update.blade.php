
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update sub category</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="form-up">
        <div class="modal-body">
        @include('components.dashboard.inc.update-cat')
          <div class="form-group input-control">
            <label for="recipient-name" class="col-form-label">Brand name</label>
            <input type="text" class="form-control" id="updateSubCatName" placeholder="Sub Category name...." msg="Sub category name is required.">
            <input type="hidden"id="subCat_id">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="brandDescription" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" rows="5" id="updateSubCatDescription" placeholder="Description...." msg="Description is required."></textarea>
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

        getInput('subCat_id').value=id;
        let url="sub-category-by-id";
        showPreLoader();
        var result=await axios.post(url,{subCat_id:id});
        hidePreLoader();
        getInput('updateSubCatName').value=result.data['name'];
        getInput('updateSubCatDescription').value=result.data['description'];
        getInput('upCategory').value=result.data['category_id'];
        $("#upCategory").trigger("chosen:updated");
    }
    async function update(){
        const updateSubCatName=getInput('updateSubCatName');
        const updateSubCatDescription=getInput('updateSubCatDescription');
        const upCategory=getInput('upCategory');
        let required=isRequired(
            [updateSubCatName, updateSubCatDescription, upCategory]
        );
        if(required==true){
            let formData={
              category_id:upCategory.value,
              name:updateSubCatName.value,
              description:updateSubCatDescription.value,
              subCat_id:subCat_id.value,
            }
            getInput('up-modal-close').click();
            let URL="/update-sub-category";
            showPreLoader();
            showMessage(3000);
            let res = await axios.post(URL,formData);
            hidePreLoader();
            if(res.status == 200 && res.data['status']=='success'){
               getInput('message').innerText=res.data['message'];
               showMessage(3000);
               getInput('form-up').reset();
               await subCatList();
               
            }
        }
    }
  </script>