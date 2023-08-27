
<div class="form-group input-control">
    <label for="createBrand" class="col-form-label ">Brand name</label>
    <select id="createBrand" class="form-control  chosen-select" msg="Brand name is required.">
        <option value="">Select brand</option>
    </select>
    <br>
    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
    <i class="fa-regular fa-circle-check success-icon"></i>
    <small class="error"></small>
</div>
<script type="text/javascript">
    getCategory();
    async function getCategory(){
        let url="/get-brand";
        try{
            const response = await axios.get(url);
            response.data.forEach((item, index)=>{
                var row = `<option value="${item['id']}">${item['name']}</option>`;
                $("#createBrand").append(row);
                $("#createBrand").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>