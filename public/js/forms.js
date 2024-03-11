const doLogin = document.getElementById('doLogin');
const loginnone = document.getElementById('loginnone');
const login= document.getElementById('login');
const formlogin=document.getElementById('formlogin');
const closelogin=document.getElementsByName('closelogin');
const doSignup= document.getElementById('doSignup');
const signupnone = document.getElementById('signupnone');
const signup = document.getElementById('signup');
const formsignup = document.getElementById('formsignup');
const closesignup = document.getElementsByName('closesignup');

function dologin(){
    loginnone.click();
}
function loginformshow(){
    formlogin.style.display='block';
    formsignup.style.display='none';

}
function closeloginform(){
    formlogin.style.display='none';
}
function dosignup(){
    signupnone.click();
}
function signupformshow(){
    formsignup.style.display='block';
    formlogin.style.display='none';
}
function closesignupform(){
    formsignup.style.display='none';
}


for(let i = 0; i < closelogin.length; i++){
    closelogin[i].addEventListener('click',closeloginform);
}
for(let i = 0; i < closesignup.length; i++){
    closesignup[i].addEventListener('click',closesignupform);
}
doLogin.addEventListener('click',dologin);
login.addEventListener('click',loginformshow);
signup.addEventListener('click',signupformshow);
doSignup.addEventListener('click',dosignup)
