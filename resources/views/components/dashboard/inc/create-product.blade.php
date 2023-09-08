
<div class="form-group input-control">
    <label for="productId" class="col-form-label ">Product name</label>
    <select id="productId" class="form-control  chosen-select" msg="Product name is required.">
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
            productList=response.data;
            productList.data.forEach((item, index)=>{
                var row = `<option value="${item['id']}">${item['productName']}</option>`;
                $("#productId").append(row);
                $("#productId").trigger("chosen:updated");
            });
        }catch(error){
            alert(error);
        }
    }
</script>