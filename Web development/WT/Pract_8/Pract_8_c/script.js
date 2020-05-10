
var l_mail=document.form['login']['l_email'];
var l_pass=document.form['login']['l_pass'];
var s_mail=document.form['signup']['s_email'];
var s_p=document.form['signup']['s_pass'];
var s_cp=document.form['signup']['s_cpass'];

var error_lmail=document.getElementsByClassName(error_email);
var error_lpass=document.getElementsByClassName(error_pass);
var error_smail=document.getElementsByClassName(error_email_s);
var error_spass=document.getElementsByClassName(error_pass_s);
var error_scpass=document.getElementsByClassName(error_cpass);


l_mail.addEventListener('blur',emailverify,true);
l_pass.addEventListener('blur',passwordverify,true);

function validation(){
  if(l_mail.value=''){
    l_mail.style.border='1px solid red';
    error_lmail.textContent='Email is required';
    l_mail.focus();
    return false;
  }
  if(l_pass.value=''){
    l_pass.style.border='1px solid red';
    error_lpass.textContent='Email is required';
    l_pass.focus();
    return false;
  }
  if(s_mail.value=''){
    s_mail.style.border='1px solid red';
    error_smail.textContent='Email is required';
    s_mail.focus();
    return false;
  }
  if(s_p.value=''){
    s_p.style.border='1px solid red';
    error_spass.textContent='Email is required';
    s_p.focus();
    return false;
  }
  if(s_cp.value=''){
    s_cp.style.border='1px solid red';
    error_scpass.textContent='Email is required';
    s_cp.focus();
    return false;
  }
  if(s_p.value!=s_cp.value){
    s_p.style.border='1px solid red'
    s_cp.style.border='1px solid red'
    error_spass=error_scpass='both password should match'
  }
}
}


