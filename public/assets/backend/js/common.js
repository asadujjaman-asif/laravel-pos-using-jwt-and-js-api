var countSuccess = 0;
var counterrow = 0;
function getInput(id){
    const input = document.getElementById(id);
    return input;
}
function isRequired(inputArr){
    var i=true;
    inputArr.forEach(function(inputField){
        if(inputField.value===''){
            showErrorMessage(inputField,inputField.getAttribute("msg"));
            i=false;	
        }else{
            showSuccessMessage(inputField);
        }
    });
    counterrow = 0;
    countSuccess = 0;
    return i;
}
function checkLength(input,min,max,message){
    var i=true;
    if(input.value.length<min){
        showErrorMessage(input,message+" must be atleast "+min+" characters");
        i=false;
    }else if(input.value.length>max){
        showErrorMessage(input,message+" must be less than "+max+" characters");
        i=false;
    }else{
        showSuccessMessage(input);
    }
    counterrow = 0;
    countSuccess = 0;
    return i;
}
function isValidateEmail(input){
    const regex=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var i=true;
    if(regex.test(input.value.trim())){
        showSuccessMessage(input);
    }else{
        showErrorMessage(input,'Please enter a valid email address');
        i=false;
    }
   return i;
}
function checkPasswordMatch(passowrd,confirmPassword){
    var i=true;
    if(passowrd.value!==confirmPassword.value){
        showErrorMessage(confirmPassword,'Password do not match.');
        i=false;
    }else{
        showSuccessMessage(confirmPassword); 
    }
    counterrow = 0;
    countSuccess = 0;
    return i;
}
function showErrorMessage(inputName,message){
    var elementName=inputName.parentElement;
    var element = document.getElementsByClassName("input-control")[counterrow];
    element.classList.add("error-msg");
    element.classList.add("show-msg");
    //elementName.className='input-control error-msg show-msg';
    elementName.querySelector('small').innerText=message;
    elementName.getElementsByClassName('failure-icon')[0].style.opacity = '1';
    elementName.getElementsByClassName('success-icon')[0].style.opacity = '0';
    counterrow=counterrow+1;
}

function showSuccessMessage(inputName){
    var elementName=inputName.parentElement;
    var element = document.getElementsByClassName("input-control")[countSuccess];
    element.classList.add("success-msg");
    element.classList.add("show-msg");
    //elementName.className='input-control success-msg show-msg';
    elementName.querySelector('small').innerText='';
    elementName.getElementsByClassName('success-icon')[0].style.opacity = '1';
    elementName.getElementsByClassName('failure-icon')[0].style.opacity = '0';
    countSuccess=countSuccess+1;
}
//show PreLoader
function showPreLoader(){
    getInput('loader').style.display='block';
}
//Hide PreLoader
function hidePreLoader(){
    getInput('loader').style.display='none'; 
}
//Show Message
function showMessage(time=5000){
    getInput("success").classList.add("show");
    getInput("success").classList.add("alert");
    getInput("success").classList.remove("hide");
    setTimeout(function(){
        getInput("success").classList.add("hide");
        getInput("success").classList.remove("show");
    },time);
}
function hideMessage() {
    getInput("success").classList.add("hide");
    getInput("success").classList.remove("show");
}