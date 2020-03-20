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
