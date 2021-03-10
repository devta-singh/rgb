<?php //lee_imagen_png.php

$im = imagecreatefrompng("arcoiris_100.png");

//imagesetpixel(image, x, y, color)
$colores=array();
//$color = imagecolorallocate($im, 0, 0, 0);

function lee_color_pixel($im, $x, $y){
	$rgb = imagecolorat($im, $x, $y);
	$r = ($rgb >> 16) & 0xFF;
	$g = ($rgb >> 8) & 0xFF;
	$b = $rgb & 0xFF;

	//var_dump($r, $g, $b);
	return($r, $g, $b);
}

for($i=0;$i<25;$i++){
	//leemos el color de un pixel

	$x = 10 + $i;
	$y = 10 + $i;
	
	list($r,$g,$b) = lee_color_pixel($im, $x, $y);
	
	$colores[$i] = imagecolorallocate($im, $i, $i, $i);
	imagesetpixel($im, $x, $x, $colores[$i]);
}


$destino = "arcoiris_100_2.png";
//header("Content-type: image/png;");
imagepng($im, $destino);

print <<<fin
<a href="?"><img src="$destino"/></a>
fin;


?>