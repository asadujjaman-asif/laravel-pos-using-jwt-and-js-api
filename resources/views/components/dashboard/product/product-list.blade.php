<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Product List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="margin-top:-8px">Create</button>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" id="productTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product name</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="productList">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<!-- /. ROW  -->
 <script type="text/javascript">
    getProduct();
    async function getProduct(){
        let url="/get-product";
        try{
            const response = await axios.get(url);
            let productTable=$("#productTable");
            let productList=$("#productList");
    
            productTable.DataTable().destroy();
            productList.empty();
            
            response.data.forEach((item, index)=>{
                var row = `<tr class="odd gradeX">
                    <td>${index+1}</td>
                    <td>${item['productName']}</td>
                    <td>${item['purchasePrice']}</td>
                    <td>${item['salePrice']}</td>
                    <td>${item['qty']}</td>
                    <td><img src="${item['image']}" style="width: 50%;"/></td>
                    <td>
                        <button data-path="${item['image']}" data-id="${item['id']}"class="btn btn-sm btn-success editBtn"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button data-path="${item['image']}" data-id="${item['id']}" class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>`
                productList.append(row);
            });
        }catch(error){
            alert(error);
        }
        $(".editBtn").on('click',async function() {
            let id = $(this).data('id');
            let path = $(this).data('path');
            await fillUpInputField(id,path);
            $("#update-modal").modal("show");
        });
        $(".deleteBtn").on('click',async function() {
            let id = $(this).data('id');
            let path = $(this).data('path');
            $("#delete-modal").modal("show");
            $("#deleteID").val(id);
            $("#filePath").val(path);
        });
        new DataTable('#productTable',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
        });
    }
</script>