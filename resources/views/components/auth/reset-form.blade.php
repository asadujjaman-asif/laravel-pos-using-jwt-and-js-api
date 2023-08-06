<section class="main-area">
		<form action="" id="form" class="form">
			<h2>SET NEW PASSWORD</h2>
			<div class="input-control">
				<label for="password">Password</label>
				<input type="password" class="input-field" id="password" placeholder="Password" msg="Password is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error" id="error-pass"></small>
			</div>
			<div class="input-control">
				<label for="confirm-password">Confirm Password</label>
				<input type="password" class="input-field" id="confirm-password" placeholder="Confirm Password" msg="Confirm Password is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<button class="submit-button">Reset password</button>
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
		const password=getInput('password');
		const confirmPass=getInput('confirm-password');

		formElement.addEventListener('submit',async function(e){
			e.preventDefault();
			let required=isRequired(
				[password,confirmPass]
			);
			let length = checkLength(password,8,12,"Password");
			let match  = checkPasswordMatch(password,confirmPass);
			if(required==true && length==true && match==true) {
				let formData={
					password:password.value,
				}
				let URL="/reset-password";
				showPreLoader();
				let result = await axios.post(URL,formData);
				hidePreLoader();
				if(result.status == 200 && result.data['status']=='success'){
					getInput('message').innerText=result.data['message'];
					showMessage(3000);
					setTimeout(() => {
						window.location.href="/auth/login";
					}, "3000");
				}else{
					getInput('error-pass').style.fontWeight="bold";
					getInput('error-pass').innerText=result.data['message'];
				}
			}
		});
	</script>