<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Profiles Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="form">
                            <div class="form-group col-md-4 input-control">
                                <label class="control-label" for="inputSuccess">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="First Name.." msg="First name is required">
                                <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                                <i class="fa-regular fa-circle-check success-icon"></i>
                                <small class="error"></small>
                            </div>
                            <div class="form-group col-md-4 input-control">
                                <label class="control-label" for="inputWarning">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Last Name.." msg="Last name is required">
                                <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                                <i class="fa-regular fa-circle-check success-icon"></i>
                                <small class="error"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label" for="inputError">Email Address</label>
                                <input type="text" class="form-control" readonly id="email" placeholder="Email Address..">
                                <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                                <i class="fa-regular fa-circle-check success-icon"></i>
                                <small class="error"></small>
                            </div>
                            <div class="form-group col-md-4 input-control">
                                <label class="control-label" for="inputError">Mobile</label>
                                <input type="text" class="form-control" id="mobile" placeholder="Mobile.." msg="Mobile number is required">
                                <i class="fa-solid fa-circle-exclamation failure-icon"></i>
                                <i class="fa-regular fa-circle-check success-icon"></i>
                                <small class="error"></small>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- End Form Elements -->
    </div>
</div>
<script type="text/javascript">
    getUserProfile();
    async function getUserProfile() {
        let url="/get-profile";
        showPreLoader();
        let result = await axios.get(url);
        hidePreLoader();
        if(result.status == 200 && result.data['status']=='success'){
            let data=result.data['data'];
            getInput("firstName").value=data['firstName'];
            getInput("lastName").value=data['lastName'];
            getInput("email").value=data['email'];
            getInput("mobile").value=data['mobile'];
           // getInput("password").value=data['password'];
        }
    }
    const formElement=getInput('form');
    const firstName=getInput('firstName');
    const lastName=getInput('lastName');
    const mobile=getInput('mobile');
    //const password=getInput('password');
    formElement.addEventListener('submit',async function(e){
        e.preventDefault();
        let required=isRequired(
            [firstName,lastName,mobile]
        );
        //let length=checkLength(password,8,12,"Password");
        //let mPassword=checkPasswordMatch(password,confirmPass);
        if(required==true){
            let formData={
                firstName:firstName.value,
                lastName:lastName.value,
                mobile:mobile.value,
                //password:password.value,
            }
            let URL="/update-user-profile";
            showPreLoader();
            let result = await axios.post(URL,formData);
            hidePreLoader();
            if(result.status == 200 && result.data['status']=='success'){
                getInput('message').innerText="You have successfully uploaded";
                showMessage(3000);
                await getUserProfile();
               
            }
        }
    });
</script>