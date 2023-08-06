<section class="main-area">
		<form action="" id="form" class="form">
			<h2>SIGN IN</h2>
			<div class="input-control">
				<label for="email">Email</label>
				<input type="text" class="input-field" id="email" msg="Email is required." placeholder="Enter Email">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
                <i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error" id="invalid"></small>
			</div>
			<div class="input-control">
				<label for="password">Password</label>
				<input type="password" class="input-field" id="password" placeholder="Password" msg="Password is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
                <i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<button class="submit-button">Login</button>
		</form>
        <hr>
        <div class="have-account">	
            <a href="{{route('register')}}">Sign Up</a>
            <a>|</a>
            <a href="{{route('otp')}}">Forget Password</a>
        </div>
        
	</section>
	<script type="text/javascript">
		const formElement=getInput('form');
		const email=getInput('email');
		const password=getInput('password');

		formElement.addEventListener('submit',async function(e){
			e.preventDefault();
			let required=isRequired(
				[email,password]
			);
			let valid=isValidateEmail(email);

			if(required==0) {
				let formData={
					email:email.value,
					password:password.value,
				}
				let URL="/user-login";
				getInput('loader').style.display='block';
				let result = await axios.post(URL,formData);
				getInput('loader').style.display='none';
				if(result.status===200 && result.data['status']==='success'){
					window.location.href="/dashboard";
				}else{
					getInput('invalid').innerText="You have entered an invalid email or password";
					getInput('invalid').style.fontWeight="bold";
				}
			}

		});
		function getInput(id){
			const input = document.getElementById(id);
			return input;
		}
		function isRequired(inputArr){
			var i=0;
			inputArr.forEach(function(inputField){
				if(inputField.value===''){
					showErrorMessage(inputField,inputField.getAttribute("msg"));
					i=i+1;	
				}else{
					showSuccessMessage(inputField);
				}
				//inputField.value===''?showErrorMessage(inputField,inputField.getAttribute("msg")):showSuccessMessage(inputField);
			});
			return i;
		}
		function checkLength(input,min,max,message){
			if(input.value.length<min){
				showErrorMessage(input,message+" must be atleast "+min+" characters");
			}else if(input.value.length>max){
				showErrorMessage(input,message+" must be less than "+max+" characters");
			}else{
				showSuccessMessage(input);
			}
		}
		function isValidateEmail(input){
			const regex=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		  	
			(regex.test(input.value.trim()))?showSuccessMessage(input):showErrorMessage(input,'Enter a valid email');
		}
		function showErrorMessage(inputName,message){
			var elementName=inputName.parentElement;
			elementName.className='input-control error-msg show-msg';
			elementName.querySelector('small').innerText=message;
			elementName.getElementsByClassName('failure-icon')[0].style.opacity = '1';
			elementName.getElementsByClassName('success-icon')[0].style.opacity = '0';
			return false;
		}
		function showSuccessMessage(inputName){
			var elementName=inputName.parentElement;
			elementName.className='input-control success-msg show-msg';
			elementName.querySelector('small').innerText='';
			elementName.getElementsByClassName('success-icon')[0].style.opacity = '1';
			elementName.getElementsByClassName('failure-icon')[0].style.opacity = '0';
			return true;
		}
	</script>