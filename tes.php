<?php
function pow($x,$y){
	if($y==0){
		return 1;
	}else{
		return $x*pow($x,$y-1);
	}
}

$pow = pow(2,1000000000000000);
var_dump($pow);

?>