<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Slider List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="margin-top:-8px">Create</button>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" id="sliderTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="sliderList">
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
    getSlider();
    async function getSlider(){
        let url="/get-slider";
        try{
            const response = await axios.get(url);
            let sliderTable=$("#sliderTable");
            let sliderList=$("#sliderList");
    
            sliderTable.DataTable().destroy();
            sliderList.empty();
            
            response.data.forEach((item, index)=>{
                var row = `<tr class="odd gradeX">
                    <td>${index+1}</td>
                    <td>${item['title']}</td>
                    <td>${item['price']}</td>
                    <td>${item['description']}</td>
                    <td><img src="${item['image']}" style="width: 50%;"/></td>
                    <td>
                        <button data-path="${item['image']}" data-id="${item['id']}"class="btn btn-sm btn-success editBtn"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button data-path="${item['image']}" data-id="${item['id']}" class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>`
                sliderList.append(row);
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
        new DataTable('#sliderTable',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
        });
    }
</script>