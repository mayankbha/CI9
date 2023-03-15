<?php   
	$string = '';
	foreach($searchuser as $mem){ 
		$string .= $mem->id."+"; 
	}  
	if($string){
		$string = substr($string,0,-1);
	}
	echo $string;
?>