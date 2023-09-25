<?php
//name????

class NameRecipe {
	var $init = array();
	var $vowel = array();
	var $cons = array();
	var $extra = array();
	
	function __construct($value=0){
		$initTemp = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","Ch","Th","Ph","Pt","Wh","Ll","Sh","Sc","St");
		$vowelTemp = array("a","e","i","o","u","ae","ee","ai","ou","oo","y","ey","ie","ye","ia");
		$consTemp = array("b","p","c","k","z","ck","ch","q","x","d","t","th","f","v","ph","pt","g","gh","j","h","w","wh","l","r","ll","rr","m","n","mn","s","sh","sc","st","sth","sch","ss","cs","ks");
		$extraTemp = array("-","'");
		
		$vTemp = round($value/5);
		
		$initCount = $vTemp + 10;
		$vowelCount = $vTemp + 8;
		$consCount = $vTemp + 10;
		
		$coinflip = rand(0,99);
		if($coinflip == 0)
			$extraCount = 1;
		else
			$extraCount = 0;
			
		for($i=0;$i<$initCount;$i++){
			$this->init[]=oneOf($initTemp);
			}
		for($v=0;$v<$vowelCount;$v++){
			$this->vowel[]=oneOf($vowelTemp);
			}
		for($c=0;$c<$consCount;$c++){
			$this->cons[]=oneOf($consTemp);
			}
		for($e=0;$e<$extraCount;$e++){
			$this->extra[]=oneOf($extraTemp);
			}
		}
	
	function init(){
		return oneOf($this->init);
		}
	function vowel(){
		return oneOf($this->vowel);
		}
	function cons(){
		return oneOf($this->cons);
		}
	function extra(){
		if(count($this->extra)>0)
			return oneOf($this->extra);
		}
	
	function syl($key=""){
		$syl = "";
		if($key == "init")
			$syl .= $this->init() . $this->vowel();
		else{
			if(count($this->extra)>0){
				$a = rand(0,9);
				if($a == 0)
					$syl .= $this->extra();
				}
			
			$b = rand(0,6);
			
			switch ($b) {
				case 0:
					$syl .= $this->vowel();
					break;
				case 1:
					$syl .= $this->vowel() . $this->cons();
					break;
				case 2:
					$syl .= $this->cons() . $this->vowel();
					break;
				case 3:
					$syl .= $this->vowel() . $this->cons() . $this->vowel();
					break;
				case 4:
					$syl .= $this->vowel() . $this->cons() . $this->cons();
					break;
				case 5:
					$syl .= $this->cons() . $this->vowel() . $this->cons();
					break;
				case 6:
					$syl .= $this->cons() . $this->cons() . $this->vowel();
					break;
				
				}
			}
		return $syl;
		}
	
	function cookName($size=2){
		$name = "";
		for($a=0;$a<$size;$a++){
			if($a==0)
				$name .= $this->syl("init");
			else
				$name .= $this->syl();
			}
		return $name;
		}

	}

?>