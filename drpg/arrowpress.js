document.onkeydown = checkKey;
function checkKey(a){
	a = a || window.event;
	if(a.keyCode=='37'){
		document.getElementById("leftArrow").submit();
		}
	if(a.keyCode=='38'){
		document.getElementById("upArrow").submit();
		}
	if(a.keyCode=='39'){
		document.getElementById("rightArrow").submit();
		}
	if(a.keyCode=='40'){
		document.getElementById("downArrow").submit();
		}
	}