
<div class="form-group input-control">
    <label for="upProductId" class="col-form-label ">Product name</label>
    <select id="upProductId" class="form-control  chosen-select" msg="Product name is required.">
        <option value="">Select a one</option>
    </select>
    <br>
    <i class="fa-solid fa-circle-exclamation failure-icon"></i>
    <i class="fa-regular fa-circle-check success-icon"></i>
    <small class="error"></small>
</div>
<script type="text/javascript">
    var productList=[];
    getProduct();
    async function getProduct(){
        let url="/get-product";
        try{
            const response = await axios.get(url);
            var productList=response.data;
            productList.data.forEach((item, index)=>{
                var row = `<option value="${item['id']}">${item['productName']}</option>`;
                $("#upProductId").append(row);
                $("#upProductId").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>