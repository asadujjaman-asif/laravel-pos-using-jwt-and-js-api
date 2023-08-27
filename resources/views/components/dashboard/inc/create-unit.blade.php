
<div class="form-group input-control">
    <label for="createUnit" class="col-form-label ">Unit name</label>
    <select id="createUnit" class="form-control  chosen-select" msg="Unit name is required.">
        <option value="">Select unit</option>
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
                $("#createUnit").append(row);
                $("#createUnit").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>