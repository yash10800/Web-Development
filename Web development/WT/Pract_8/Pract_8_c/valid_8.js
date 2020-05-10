var firstname = document.forms['signupForm']['firstname'];
var lastname = document.forms['signupForm']['lastname'];
var email = document.forms['signupForm']['email'];
var password = document.forms['signupForm']['password'];
var cpassword = document.forms['signupForm']['cpassword'];
var regName = /^[a-zA-Z]$/;
var regEmail = /^([a-zA-Z0-9]+)@nirmauni.ac.in$/;

var signup_error = document.querySelector('.signup_error');

firstname.addEventListener('textInput', fstnameVerify);
lastname.addEventListener('textInput', lstnameVerify);
email.addEventListener('textInput', emailVerify);
password.addEventListener('textInput', passwordVerify);
cpassword.addEventListener('textInput', cpasswordVerify);

function signupValid(){
	if (firstname.value.length <= 2) {
		signup_error.style.display = "block";
		firstname.style.border = "1px solid red";
		signup_error.innerText = "Please Fill up Your Firstname";
		firstname.focus();
		return false;
	}
	if (lastname.value.length <= 2) {
		if(!regName.test(firstname)){

		}
		signup_error.style.display = "block";
		lastname.style.border = "1px solid red";
		signup_error.innerText = "Please Fill up Your Lastname";
		lastname.focus();
		return false;
	}
	if (email.value.length <= 8) {
		signup_error.style.display = "block";
		email.style.border = "1px solid red";
		signup_error.innerText = "Please Fill up Your Email or Phone";
		email.focus();
		return false;
	}
	if (password.value.length <= 3) {
		signup_error.style.display = "block";
		password.style.border = "1px solid red";
		signup_error.innerText = "Please Fill up Your Password";
		password.focus();
		return false;
	}
	if (cpassword.value.length <= 3) {
		signup_error.style.display = "block";
		cpassword.style.border = "1px solid red";
		signup_error.innerText = "Please Fill up Your Password";
		cpassword.focus();
		return false;
	}
	if(password.value!=cpassword.value){
		signup_error.style.display = "block";
		cpassword.style.border = "1px solid red";
		signup_error.innerText = "Both Password should match";
		cpassword.focus();
		return false;
	}
	if(!regName.test(firstname.value)){
		signup_error.style.display = "none";
		firstname.style.border = "1px solid #3498db";
		alert("xyznsjnsh");
		signup_error.innerText = "name contains only latters";
        return false;
	}
	if(!regEmail.test(email.value)){
		signup_error.style.display = "none";
		firstname.style.border = "1px solid #3498db";
		signup_error.innerText = "check email formate";
        return false;
    }
}
function fstnameVerify(){

	if (firstname.value.length > 1) {
		signup_error.style.display = "none";
		firstname.style.border = "1px solid #3498db";
		signup_error.innerText = "";
		return true;
	}
	
}
function lstnameVerify(){
	if (lastname.value.length > 1) {
		signup_error.style.display = "none";
		lastname.style.border = "1px solid #3498db";
		signup_error.innerText = "";
		return true;
	}
}
function emailVerify(){
	if (email.value.length > 7) {
		signup_error.style.display = "none";
		email.style.border = "1px solid #3498db";
		signup_error.innerText = "";
		return true;
	}
}
function passwordVerify(){
	if (password.value.length > 2) {
		signup_error.style.display = "none";
		password.style.border = "1px solid #3498db";
		signup_error.innerText = "";
		return true;
	}
}