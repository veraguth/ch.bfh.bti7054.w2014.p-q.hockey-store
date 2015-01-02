<?php
class Converter {
	public function __construct() {
		//todo...
	}

	public function getF($c){
		$c = sanitizeString($c);
		$f = (9 / 5) * $c + 32;
		return $f;
	}
	
	public function getC($f) {
		$f = sanitizeString($f);
		$c = (5 / 9) * ($f - 32);
		return $c;
	}
	
	function sanitizeString($var) {
		$var = stripslashes($var);
		$var = htmlentities($var); // remove html characters
		$var = strip_tags($var); // remove html tags
		return $var;
	}
}
?>