<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Are you sure to delete? you can't get it back.</p>
                <input type="hidden" class="d-none" id="deleteID"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="modal-close-delete" class="btn btn-success mx-2" data-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn btn-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function itemDelete(){ 
        let id=document.getElementById('deleteID').value;
        document.getElementById('modal-close-delete').click();
        showPreLoader();
        let result=await axios.post("/delete-product",{product_id:id})
        hidePreLoader();
        if(result.status == 200 && result.data['status']=='success'){
            getInput('message').innerText=result.data['message'];
            showMessage(3000);
            await getProduct();
        }
        else{
            errorToast("Request fail!")
        } 
    }

</script>
