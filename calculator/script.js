function disp( val){
    document.getElementById("result").value += val; 
}

function clr(){
    document.getElementById("result").value = "";
}

function solve(){
    var exp = document.getElementById("result").value;
    var answer = eval(exp);
    document.getElementById("result").value = answer;
}