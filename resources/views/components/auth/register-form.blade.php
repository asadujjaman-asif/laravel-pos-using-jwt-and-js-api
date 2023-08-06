<section class="main-area">
		<form action="" id="form" class="form">
			<h2>SIGN UP</h2>
			<div class="input-control">
				<label for="first-name">First Name</label>
				<input type="text" class="input-field" id="first-name" placeholder="Enter first name" msg="First name is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<div class="input-control">
				<label for="last-name">Last Name</label>
				<input type="text" class="input-field" id="last-name" placeholder="Enter last name" msg="Last name is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<div class="input-control">
				<label for="email">Email</label>
				<input type="text" class="input-field" id="email" msg="Email is required." placeholder="Enter Email">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<div class="input-control">
				<label for="mobile">Mobile</label>
				<input type="text" class="input-field" id="mobile" placeholder="Mobile Number" msg="Mobile number is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<div class="input-control">
				<label for="password">Password</label>
				<input type="password" class="input-field" id="password" placeholder="Password" msg="Password is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<div class="input-control">
				<label for="confirm-password">Confirm Password</label>
				<input type="password" class="input-field" id="confirm-password" placeholder="Confirm Password" msg="Confirm Password is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<button class="submit-button">sign Up</button>
		</form>
		<hr>
        <div class="have-account">	
            <a href="{{route('login')}}">Sign In</a>
            <a>|</a>
            <a href="{{route('otp')}}">Forget Password</a>
        </div>
	</section>
	<script type="text/javascript">
		const formElement=getInput('form');
		const firstName=getInput('first-name');
		const lastName=getInput('last-name');
		const email=getInput('email');
		const mobile=getInput('mobile');
		const password=getInput('password');
		const confirmPass=getInput('confirm-password');

		formElement.addEventListener('submit',async function(e){
			e.preventDefault();
			let required=isRequired(
				[firstName,lastName,email,mobile,password,confirmPass]
			);
			let length=checkLength(password,8,12,"Password");
			let vEmail=isValidateEmail(email);
			let mPassword=checkPasswordMatch(password,confirmPass);
			if(required==true && length==true && vEmail==true && mPassword==true){
				let formData={
					firstName:firstName.value,
					lastName:lastName.value,
					email:email.value,
					mobile:mobile.value,
					password:password.value,
				}
				let URL="/user-registration";
				showPreLoader();
				let result = await axios.post(URL,formData);
				hidePreLoader();
				if(result.status == 200 && result.data['status']=='success'){
					getInput('message').innerText="You have successfully registered";
					showMessage(3000);
					setTimeout(() => {
						window.location.href="/auth/login";
					}, "3000");
				}
			}
		});
	</script>