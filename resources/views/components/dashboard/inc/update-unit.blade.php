
<div class="form-group input-control">
    <label for="upUnit" class="col-form-label ">Unit name</label>
    <select id="upUnit" class="form-control  chosen-select" msg="Unit name is required.">
        <option value="">Select unit</option>
    </select>
    <br>
    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
    <i class="fa-regular fa-circle-check success-icon"></i>
    <small class="error"></small>
</div>
<script type="text/javascript">
    geUnit();
    async function geUnit(){
        let url="/get-unit";
        try{
            const response = await axios.get(url);
            response.data.forEach((item, index)=>{
                var row = `<option value="${item['id']}">${item['name']}</option>`;
                $("#upUnit").append(row);
                $("#upUnit").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>