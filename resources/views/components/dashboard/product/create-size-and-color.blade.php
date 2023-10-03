
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
  $("#colorList").change(function(){

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
        <ul class="ks-cboxtags">
    <li>
    	<input type="checkbox" id="checkboxOne" value="Rainbow Dash">
    	<label for="checkboxOne">HTML</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxTwo" value="Cotton Candy" checked>
    	<label for="checkboxTwo">CSS</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxThree" value="Rarity" checked>
    	<label for="checkboxThree">JAVASCRIPT</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxFour" value="Moondancer">
    	<label for="checkboxFour">AJAX</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxFive" value="Surprise">
    	<label for="checkboxFive">JSON</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxSix" value="Twilight Sparkle" checked>
    	<label for="checkboxSix">REACT</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxSeven" value="Fluttershy">
    	<label for="checkboxSeven">RIOT</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxEight" value="Derpy Hooves">
    	<label for="checkboxEight">VUE</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxNine" value="Princess Celestia">
    	<label for="checkboxNine">ANGULAR</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxTen" value="Gusty">
    	<label for="checkboxTen">NODE JS</label>
    </li>
    <li class="ks-selected">
    	<input type="checkbox" id="checkboxEleven" value="Discord">
    	<label for="checkboxEleven">REACT NATIVE</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxTwelve" value="Clover">
    	<label for="checkboxTwelve">RIOT</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxThirteen" value="Baby Moondancer">
    	<label for="checkboxThirteen">JQUERY</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxFourteen" value="Medley">
    	<label for="checkboxFourteen">TYPE SCRIPT</label>
    </li>
    <li>
    	<input type="checkbox" id="checkboxFifteen" value="Firefly">
    	<label for="checkboxFifteen">GITHUB</label>
    </li>
  </ul>
        </td>
        <td>
          <button type="button" onclick="removeItem(${index})" class="btn btn-sm btn-danger">Del</button>
        </td>
      </tr>
      `;
    }
    colorList.append(row);
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