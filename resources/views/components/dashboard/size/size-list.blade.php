<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Color List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="margin-top:-8px">Create</button>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" id="unitTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Color name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="unitList">
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
    var unitLists=[];
    getUnit();
    async function getUnit(){
        let url="/get-unit";
        try{
            const response = await axios.get(url);
            let unitTable=$("#unitTable");
            let unitList=$("#unitList");
    
            unitTable.DataTable().destroy();
            unitList.empty();
            unitLists=response.data;
            unitLists.data.forEach((item, index)=>{
                var row = `<tr class="odd gradeX">
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    <td>
                        <button data-id="${item['id']}"class="btn btn-sm btn-success editBtn"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                        <button data-id="${item['id']}" class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash-o"></i> Delete</button>
                    </td>
                </tr>`
                unitList.append(row);
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
        new DataTable('#unitTable',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
        });
    }
</script>