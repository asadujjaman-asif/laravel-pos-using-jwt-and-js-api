<section class="main-area">
		<form action="" id="form" class="form">
			<h2>SEND OTP</h2>
			<div class="input-control">
				<label for="email">Email</label>
				<input type="text" class="input-field" id="email" msg="Email is required." placeholder="Enter Email">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error" id="error-email" ></small>
			</div>
			<button class="submit-button">send OTP</button>
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
		const email=getInput('email');

		formElement.addEventListener('submit', async function(e){
			e.preventDefault();
			let required=isRequired(
				[email]
			);
			let vEmail=isValidateEmail(email);
			if(required==true && vEmail==true){
				let formData={
					email:email.value,
				}
				let URL="/otp-sent";
				showPreLoader();
				let result = await axios.post(URL,formData);
				hidePreLoader();
				if(result.status == 200 && result.data['status']=='success'){
					sessionStorage.setItem('email',email.value);
					getInput('message').innerText=result.data['message'];
					showMessage(3000);
					setTimeout(() => {
						window.location.href="/auth/verify/otp";
					}, "3000");
				}else{
					getInput('error-email').style.fontWeight="bold";
					getInput('error-email').innerText=result.data['message'];
				}
			}
		});
	</script>