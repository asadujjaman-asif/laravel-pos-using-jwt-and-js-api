<section class="main-area">
		<form action="" id="form" class="form">
			<h2>Verify OTP</h2>
			<div class="input-control">
				<label for="otp">OTP Code</label>
				<input type="text" class="input-field" id="otp" placeholder="Enter your OTP here" msg="OTP code is required.">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error" id="error-otp"></small>
			</div>
			<button class="submit-button">Verify OTP</button>
		</form>
		<hr>
        <div class="have-account">	
            <a href="{{route('login')}}">Sign In</a>
            <a>|</a>
            <a href="{{route('register')}}">Sign Up</a>
        </div>
	</section>
	<script type="text/javascript">
		const formElement=getInput('form');
		const otp=getInput('otp');
		formElement.addEventListener('submit',async function(e){
			e.preventDefault();
			let required=isRequired(
				[otp]
			);
			if(required==true){
				let formData={
					otp:otp.value,
					email:sessionStorage.getItem('email'),
				}
				let URL="/verify-otp";
				showPreLoader();
				let result = await axios.post(URL,formData);
				hidePreLoader();
				if(result.status == 200 && result.data['status']=='success'){
					getInput('message').innerText=result.data['message'];
					showMessage(3000);
					setTimeout(() => {
						window.location.href="/auth/reset-password";
					}, "3000");
				}else{
					getInput('error-otp').style.fontWeight="bold";
					getInput('error-otp').innerText=result.data['message'];
				}
			}
		});
	</script>