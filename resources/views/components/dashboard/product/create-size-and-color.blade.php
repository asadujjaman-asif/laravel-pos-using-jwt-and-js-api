
<div class="modal fade" id="colorSize-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update/Create Product Size and Color</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="margin-top:-20px">&times;</span>
        </button>-->
      </div>
      <form id="up-discount-modal">
        <div class="modal-body">
            <div class="form-group input-control">
                <label for="colorList" class="col-form-label ">Product Color</label>
                <select id="colorList" class="form-control  chosen-select" change="chooseColor">
                    <option value="">Select a one</option>
                </select>
                <br>
                <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                <i class="fa-regular fa-circle-check success-icon"></i>
                <small class="error"></small>
            </div>
            <table class="table  table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">Color</th>
                  <th scope="col">Size</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody id="sizeAndColor">
                
              </tbody>
            </table>
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
    getColor();
    getSize();
    var count=0;
    var sizeListsmMain=""
    async function getSize() {
      let url="/get-size";
      const response = await axios.get(url);
      let sizeList="";
      sizeLists=response.data;
      
      sizeLists.data.forEach((item, index)=>{
      var size=`<li>
          <input type="checkbox" class="checkboxOne_${count}" id="checkboxOne_${count}" value="${item['id']}">
          <label id="label_${count}" for="checkboxOne_${count}">${item['name']}</label>
        </li>`;
        sizeList+=size;
        count=count+1;
      });
      sizeListsmMain=sizeList;
    }
    async function getColor(){
      let url="/get-color";
      try{
          const response = await axios.get(url);
          colorLists=response.data;
          colorLists.data.forEach((item, index)=>{
              var row = `<option data-name="${item['name']}" value="${item['id']}">${item['name']}</option>`;
              $("#colorList").append(row);
              $("#colorList").trigger("chosen:updated");
          });
      }catch(error){
          alert(error);
      }
  }
  var index=0;
  $("#colorList").change(async function(){
    
    let color=$(this).val();
    let colorName=$(this).children(":selected").text();
    let colorList=$("#sizeAndColor");
    let exists=$(`#colorId_${color}`);

    if(exists.length){
      alert("Color has already been selected");
    }else{
     var row = `<tr id="remove_${index}">
        <td>
        ${colorName}
        <input type="hidden" id="colorId_${color}" value="${color}">
        </td>
        <td>
          <ul class="ks-cboxtags sizeList" id="size_list_${index}">
          ${sizeListsmMain}
          </ul>
        </td>
        <td>
          <button type="button" onclick="removeItem(${index})" class="btn btn-sm btn-danger">Del</button>
        </td>
      </tr>
      `;
    }
    colorList.append(row);
    var f="checkboxOne_"+index;
    var is="checkboxOne_"+index;
    var items=$(`#size_list_${index}`).children().length;
    for (var i=0; i<items; i++){
        $(`#label_${i}`).attr('for',f);
        $(`.checkboxOne_${i}`).attr('id',is);
    }
    index=index+1;
  });
  function removeItem(id){
    getInput(`remove_${id}`).remove();
  }
  async function fillUpInputField(id){
      getInput('productId').value=id;
      let url="product-discount-by-id";
      showPreLoader();
      var result=await axios.post(url,{product_id:id});
      result=result.data;
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