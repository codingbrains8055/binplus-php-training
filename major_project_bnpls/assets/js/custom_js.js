function matchpasswords() {
    var pass = document.querySelector("#password").value;
    var conf_pass = document.querySelector("#conf_password").value;
    if(pass != conf_pass){
       
        var errorSpan = document.querySelector("#error");
        errorSpan.innerHTML="passwords do not match";

    }else{
        document.querySelector("#error").innerHTML = '';
    }
}

function checkthebox() {
    var spn = document.querySelector("#checkit");
    spn.innerHTML = '<i class="mdi mdi-checkbox-multiple-marked-circle"></i>';
}