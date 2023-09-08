<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Category List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="margin-top:-8px">Create</button>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" id="categoryTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="categoryList">
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
    var categoryLists = [];
    getCategory();
    async function getCategory(){
        let url="/get-category";
        try{
            const response = await axios.get(url);
            categoryLists=response.data;
            let categoryTable=$("#categoryTable");
            let categoryList=$("#categoryList");
    
            categoryTable.DataTable().destroy();
            categoryList.empty();
            
            categoryLists.data.forEach((item, index)=>{
                var row = `<tr class="odd gradeX">
                    <td>${index+1}</td>
                    <td>${item['category_name']}</td>
                    <td>
                        <button data-id="${item['id']}"class="btn btn-sm btn-success editBtn">Edit</button>
                        <button data-id="${item['id']}" class="btn btn-sm btn-danger deleteBtn">Delete</button>
                    </td>
                </tr>`
                categoryList.append(row);
            });
        }catch(error){
            alert(error);
        }
        $(".editBtn").on('click',async function() {
            let id = $(this).data('id');
            await fillUpInputField(id);
            $("#update-modal").modal("show");
        });
        $(".deleteBtn").on('click',async function() {
            let id = $(this).data('id');
            $("#delete-modal").modal("show");
            $("#deleteID").val(id);
        });
        new DataTable('#categoryTable',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
        });
    }
</script>