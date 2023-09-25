$(document).ready(function(){
 $(document).keyup(function(event){
  if(event.which==37){
   document.getElementById("left").submit();
  }
  else if(event.which==38){
   document.getElementById("up").submit();
  }
  else if(event.which==39){
   document.getElementById("right").submit();
  }
  else if(event.which==40){
   document.getElementById("down").submit();
  }  
 });
});