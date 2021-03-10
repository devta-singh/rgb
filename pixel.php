<?php //pixel.php

//pixel.php?x=0&y=0=color=rojo

$im = imagecreatetruecolor(1,1);

$negro = imagecolorallocate($im, 0,0,0);
$blanco = imagecolorallocate($im, 0,0,0);
$rojo = imagecolorallocate($im, 255,0,0);
$verde = imagecolorallocate($im, 0,255,0);
$azul = imagecolorallocate($im, 0,0,255);


if($color=="rojo"){
	$color = $rojo;
}elseif($color=="azul"){
	$color = $azul;
}elseif($color=="verde"){
	$color = $verde;
}elseif($color=="blanco"){
	$color = $blanco;
}elseif($color=="negro"){
	$color = $negro;
}else{
	$color = $negro;
}

header("Content-type: image/png");
imagepng($im);

?>