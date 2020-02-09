function matchpasswords() {
    var pass = document.querySelector("#password").value;
    var conf_pass = document.querySelector("#conf_password").value;
    if(pass != conf_pass){
        var node = document.createTextNode("passwords do not match");
        var errorSpan = document.querySelector("#error");
        errorSpan.append(node);

    }else{
        document.querySelector("#error").innerHTML = '';
        var node = document.createTextNode(" ")
    }
}