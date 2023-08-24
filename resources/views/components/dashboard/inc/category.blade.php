
<div class="form-group input-control">
    <label for="brandName" class="col-form-label ">Category name</label>
    <select id="category" class="form-control  chosen-select" msg="Brand name is required.">
        <option value="">Select Category</option>
    </select>
    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
    <i class="fa-regular fa-circle-check success-icon"></i>
    <small class="error"></small>
</div>
<script type="text/javascript">
    getCategory();
    async function getCategory(){
        let url="/get-category";
        try{
            const response = await axios.get(url);
            response.data.forEach((item, index)=>{
                var row = `<option value="${item['id']}">${item['category_name']}</option>`;
                $("#category").append(row);
                $("#category").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>