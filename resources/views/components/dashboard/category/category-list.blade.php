<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Category List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="category-list">
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
      getCategory();
      async function getCategory(){
        let url="/get-category";
        try{
          const response = await axios.get(url);
          response.data.forEach((item, index)=>{
            let eventList=document.getElementById('category-list');
            eventList.innerHTML+=(`
                <tr class="odd gradeX">
                    <td>${index+1}</td>
                    <td>${item['category_name']}</td>
                    <td>
                        <button class="btn btn-sm btn-success">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            `);

          });
        }catch(error){
          alert(error);
        }
      }
    </script>