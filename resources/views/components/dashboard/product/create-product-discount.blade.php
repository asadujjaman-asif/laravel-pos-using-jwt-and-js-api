
<div class="modal fade" id="discount-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update/Create Product Discount</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="up-discount-modal">
        <div class="modal-body">
          <div class="form-group input-control">
            <label for="startDate" class="col-form-label">Start Date</label>
            <input type="text" class="form-control date" id="startDate" placeholder="01-07-1996" msg="Stare Date is required.">
            <input type="hidden" id="productId">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="endDate" class="col-form-label">End Date</label>
            <input type="text" class="form-control date" id="endDate" placeholder="01-07-1996" msg="End Date is required.">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
          <div class="form-group input-control">
            <label for="discount" class="col-form-label">Discount(%)</label>
            <input type="text" class="form-control" id="discount" placeholder="50%..." msg="Discount is required.">
            <input type="hidden" class="form-control" id="productId">
            <i class="fa-solid fa-circle-exclamation failure-icon"></i>
            <i class="fa-regular fa-circle-check success-icon"></i>
            <small class="error"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up-discount-modal-close">Close</button>
          <button type="button" onclick="updateProductDiscount()" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  async function fillUpInputField(id){
      getInput('productId').value=id;
      let url="product-discount-by-id";
      showPreLoader();
      var result=await axios.post(url,{product_id:id});
      result=result.data;
      console.log(result);
      hidePreLoader();
      getInput('startDate').value=moment().format('DD-MM-YYYY',result.data['startDate']);
      getInput('endDate').value=result.data['endDate'];//moment().format('DD-MM-YYYY',result.data['endDate']);
      getInput('discount').value=result.data['discount'];
  }
    async function updateProductDiscount(){
      const startDate=getInput('startDate');
      const endDate=getInput('endDate');
      const discount=getInput('discount');
      const product_id=getInput('productId');
      let required=isRequired(
        [
          startDate, 
          endDate,
          discount
        ]
      );
      if(required==true){
        let formData={
            startDate:startDate.value,
            endDate:endDate.value,
            discount:discount.value,
            product_id:product_id.value,
         }
          getInput('up-discount-modal-close').click();
          let URL="/update-product-discount";
          showPreLoader();
          let result = await axios.post(URL,formData);
          hidePreLoader();
          if(result.status == 200 && result.data['status']=='success'){
              getInput('message').innerText=result.data['msg'];
              showMessage(3000);
              getInput('up-discount-modal').reset();
              await getProduct();
              
          }else{
            alert('Something went wrong');
          }
      }
    }
  </script>