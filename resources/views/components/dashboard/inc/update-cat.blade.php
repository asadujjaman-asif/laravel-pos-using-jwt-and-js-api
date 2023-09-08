
<div class="form-group input-control">
    <label for="brandName" class="col-form-label ">Category name</label>
    <select id="upCategory" class="form-control  chosen-select" msg="Category name is required.">
        <option value="">Select Category</option>
    </select>
    <br>
    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
    <i class="fa-regular fa-circle-check success-icon"></i>
    <small class="error"></small>
</div>
<script type="text/javascript">
    var categoryList=[];
    getCategory();
    async function getCategory(){
        let url="/get-category";
        try{
            const response = await axios.get(url);
            var categoryList=response.data;
            categoryList.data.forEach((item, index)=>{
                var row = `<option value="${item['id']}">${item['category_name']}</option>`;
                $("#upCategory").append(row);
                $("#upCategory").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>