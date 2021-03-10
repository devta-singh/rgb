<?php //crea_imagen_png_fib.php

ini_set("display_errors", 1);
error_reporting(15);

session_name("imagenes");
session_start();
//ob_start();

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



//$origen = "arcoiris_100.png";
$im = imagecreatefrompng("$origen");



//imagesetpixel(image, x, y, color)
$colores=array();
//$color = imagecolorallocate($im, 0, 0, 0);

if(isset($_REQUEST["texto"])){
	$texto= $_REQUEST["texto"];
	print "<br>texto: $texto";
}else{
	$texto="texto";
}

//obtenemos la longitud de la cadena de texto
$l = strlen($texto);
print "<br>Longitud: $l";

function lee_color_pixel($im, $x, $y){
	$rgb = imagecolorat($im, $x, $y);
	$r = ($rgb >> 16) & 0xFF;
	$g = ($rgb >> 8) & 0xFF;
	$b = $rgb & 0xFF;

	//var_dump($r, $g, $b);
	return(array($r, $g, $b));
}

$intervalos="";

$pares = array();
for($i=0;$i<=$l;$i++){
	//leemos el color de un pixel

	$x = $x_origen + ($i * $x_paso);
	$y = $y_origen + ($i * $y_paso);

	$pares[]=array($x,$y);

	print "<br>i: $i, X: $x , Y: $y";
	
	list($r,$g,$b) = lee_color_pixel($im, $x, $y);
	print " Pixel $x, $y > RGB: $r/$g/$b ";
	//exit();

	$char = substr($texto, $i,1);
	print " (char: $char) ";

	$ascii = ord($char);
	print " ASCII: $ascii ";

	if($r + $ascii < 255){
		//el valor cambiado es menor a a 255
		$nr= $r + $ascii;	
	}else{
		//el valor coambiado es mayor a 255
		$nr= $r - $ascii;
	}

	if($g + $ascii < 255){
		//el valor cambiado es menor a a 255
		$ng= $g + $ascii;	
	}else{
		//el valor coambiado es mayor a 255
		$ng= $g - $ascii;
	}

	if($b + $ascii < 255){
		//el valor cambiado es menor a a 255
		$nb= $b + $ascii;	
	}else{
		//el valor coambiado es mayor a 255
		$nb= $b - $ascii;
	}

	print " > $nr/$ng/$nb ";

	// $nr= $r + $i;
	// $ng= $g + $i;
	// $nb= $b + $i;


	$colores[$i] = imagecolorallocate($im, $nr, $ng, $nb);
	imagesetpixel($im, $x, $x, $colores[$i]);
}
print "<br>";


//header("Content-type: image/png;");
imagepng($im, $destino);




//ahora leemos las dos imagenes y las comparamos
//leemos la primera
$imc1 = imagecreatefrompng("$origen");
$imc2 = imagecreatefrompng("$destino");
$n = sizeof($pares);
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

		<div id="div_origen">
			Origen:<br>
			<a href="$origen"><img src="$origen" width="200"/></a>
		</div>
		<div id="div_destino">
			Destino:<br>
			<a href="$destino"><img src="$destino" width="200"/></a>
		</div>
		<br>
		Ahora leemos los datos de las imágenes:
		<br>
		Leyendo en los puntos: 		
	</div>
</body>
</html>
fin;

header("Content-type: text/html;");
print $html;



?>