function checkpass() {
    'use strict';
    var span = document.querySelector("#pass_strength");
    var pass = document.querySelector("#password").value; 
    if (pass.length < 8) {
        span.innerHTML = "password must be 8 charecter long";
    } else {
        span.innerHTML = '';
    }
}

function matchpasswords() {
    'use strict';
    var pass = document.querySelector("#password").value;
    var conf_pass = document.querySelector("#conf_password").value;
    if (pass !== conf_pass) {
       
        var errorSpan = document.querySelector("#error");
        errorSpan.innerHTML = "passwords do not match";

    } else {
        document.querySelector("#error").innerHTML = '';
    }
}

function checkanswer(option, answer, no){
        var ans = document.querySelector(`#${no}`);
    if(option == answer){
        ans.className = "mdi mdi-check";
        clearInput(no);
    }else{
        ans.className = "mdi mdi-close";
        clearInput(no);

    }
}

function remember(){
    var email = document.querySelector("#userEmail").value;
    window.localStorage.setItem('userEmail', email);
}

function tell(){
    var email = window.localStorage.getItem('userEmail');
    var inputEmail = document.querySelector("#userEmail");
    inputEmail.value = email;
}

function clearInput(no){
    setTimeout(function(){
        var ans = document.querySelector(`#${no}`);
        ans.className = " ";
    }, 2000);
}

function say(){
    window.alert("hii");
}