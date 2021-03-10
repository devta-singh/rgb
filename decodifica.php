<?php //crea_imagen_png.php

ini_set("display_errors", 1);
error_reporting(15);

session_name("imagenes");
session_start();
ob_start();

function lee_color_pixel($im, $x, $y){
	$rgb = imagecolorat($im, $x, $y);
	$r = ($rgb >> 16) & 0xFF;
	$g = ($rgb >> 8) & 0xFF;
	$b = $rgb & 0xFF;

	//var_dump($r, $g, $b);
	return(array($r, $g, $b));
}

$origen = "arcoiris_100.png";
$destino = "arcoiris_100_2.png";
$x_origen = 10;
$y_origen = 10;
$x_paso = 1;
$y_paso = 1;


if(isset($_REQUEST["x_origen"])){
	$x_origen= $_REQUEST["x_origen"];
}
if(isset($_REQUEST["y_origen"])){
	$y_origen= $_REQUEST["y_origen"];
}
if(isset($_REQUEST["x_paso"])){
	$x_paso= $_REQUEST["x_paso"];
}
if(isset($_REQUEST["y_paso"])){
	$y_paso= $_REQUEST["y_paso"];
}

if(isset($_REQUEST["origen"])){
	$origen= $_REQUEST["origen"];	
}
if(isset($_REQUEST["destino"])){
	$destino= $_REQUEST["destino"];	
}

print "<br>origen: $origen";
print "<br>destino: $destino";

print "<br>x_origen: $x_origen";
print ", y_origen: $y_origen";
print ", x_paso: $x_paso";
print ", y_paso: $y_paso";





//ahora leemos las dos imagenes y las comparamos
//leemos la primera
$imc1 = imagecreatefrompng("$origen");
$imc2 = imagecreatefrompng("$destino");
$n = 80;
$cadena=array();
for($i = 0; $i <= $n; $i++ ){


	$x = $x_origen + ($i * $x_paso);
	$y = $y_origen + ($i * $y_paso);

	print "<br>i: $i, X: $x , Y: $y";
	
	//leemos el color de un pixel
	list($r,$g,$b) = lee_color_pixel($imc1, $x, $y);
	print " Lectura 1 Pixel $x, $y > RGB: $r/$g/$b ";
	list($dr,$dg,$db) = lee_color_pixel($imc2, $x, $y);
	print " Lectura 2 Pixel $x, $y > RGB: $dr/$dg/$db ";
	$ir = abs($dr - $r);
	$ig = abs($dg - $g);
	$ib = abs($db - $b);

	$tr = chr($ir);
	$tg = chr($ig);
	$tb = chr($ib);

	$cadena[]=$tr;

	print " $tr ";

}
$_cadena = implode("", $cadena);
print "<br>Cadena: $_cadena";


$salida = ob_get_clean();

$html=<<<fin
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo imagenes modificadas</title>
	<style>
		#div_origen, #div_destino{
			float:left;
			border: 3px solid black;
			padding: 3px;
		}
	</style>
	<script language="javascript" src="js/jquery.js"></script>
	<script language="javascript">
		function grabar_imagen(){
			
		}
	</script>
</head>
<body>
	<div id="contenido">
		$salida
		<br>

		Ahora leemos los datos de las imágenes:
		<br>
		Leyendo en los puntos $n	
	</div>
</body>
</html>
fin;

header("Content-type: text/html;");
print $html;



?>