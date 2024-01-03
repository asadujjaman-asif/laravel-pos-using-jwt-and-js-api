<style type="text/css">
   .sign_error{
        color:red;
        font-size: 12px;
        font-style: italic;
    }
  </style>
<div class="modal fade" id="otp-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="otp-tab" data-toggle="tab" href="#otp" role="tab" aria-controls="otp" aria-selected="true">OTP Verify</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="otp" role="tabpanel" aria-labelledby="otp-tab">
                                    <form id="otp-verification">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="otp-email" name="register-email" required>
                                            <span class="sign_error" id="email_ee_message"></span>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="singin-email">OTP Code*</label>
                                            <input type="text" class="form-control" id="otp-code" name="singin-email" required>
                                            <span class="sign_error" id="otp_message"></span>
                                        </div><!-- End .form-group -->
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Verify OTP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
    <script type="text/javascript">
        const formElement=document.getElementById('otp-verification');
        formElement.addEventListener('submit',async function(e){
            e.preventDefault();
            try{
                let url="/verify-customer-otp";
                let otp=document.getElementById("otp-code").value;
                let email=document.getElementById("otp-email").value;
                if(email==""){
                    document.getElementById("email_ee_message").innerHTML="Email address required";
                    return false;
                }else{
                    document.getElementById("email_ee_message").style.display="none";
                }
                if(otp==""){
                    document.getElementById("otp_message").innerHTML="Email address required";
                    return false;
                }else{
                    document.getElementById("otp_message").style.display="none";
                }

                let formData={
                    otp:otp,
                    email:email
                }
               let response=await axios.post(url,formData);
               if(response.status == 200 && response.data['status']=='success'){
                    window.location.reload();
                }else{
                    document.getElementById("otp_message").style.display="block";
                    document.getElementById("otp_message").innerHTML="You have entered an invalid OTP Or Email.";
                }
            }catch(error){
                alert(error.message);
            }
        });
    </script> 