
<div class="form-group input-control">
    <label for="brandName" class="col-form-label ">Sub category name</label>
    <select id="subCategory" class="form-control  chosen-select" msg="Sub category name is required.">
        <option value="">Select One</option>
    </select>
    <br>
    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
    <i class="fa-regular fa-circle-check success-icon"></i>
    <small class="error"></small>
</div>
<script type="text/javascript">
    var subCategoryList=[];
   getSubCategory();
    async function getSubCategory(){
        let url="/get-sub-category";
        try{
            const response = await axios.get(url);
            subCategoryList=response.data;
            subCategoryList.data.forEach((item, index)=>{
                var row = `<option value="${item['id']}">${item['name']}</option>`;
                $("#subCategory").append(row);
                $("#subCategory").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>