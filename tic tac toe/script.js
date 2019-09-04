
//players
var player1 = {
 isPlaying:true,
};

var player2 = {
 isPlaying:true,
};


//function to play
function change(idt) {
 var btn = document.querySelector(idt);
 var pl1 = document.querySelector("#p1");
 var pl2 = document.querySelector("#p2"); 
 //console.log(p2.isPlaying);
 btn.className = "clicked";
 if(player1.isPlaying == true){
   pl1.className = "player";
  pl2.className = "player_active";
  btn.innerHTML = "X";
  player1.isPlaying = false;
  player2.isPlaying = true;

 } else if(player2.isPlaying == true){
  pl1.className = "player_active";
  pl2.className = "player";  
  btn.innerHTML = "O";
  player2.isPlaying = false;
  player1.isPlaying = true;

 }   
     }

if(player1.isPlaying == true){
 var pl1 = document.querySelector("#p1");
 var pl2 = document.querySelector("#p2");
 pl1.className = "player_active";
}else if(player2.isPlaying == true){
 var pl1 = document.querySelector("#p1");
 var pl2 = document.querySelector("#p2");
 pl2.className = "player_active";
 pl1.className = "player";
}


 //Player{
 //Constructor(status){
  //this.isPlaying = status;
 //}
//}





