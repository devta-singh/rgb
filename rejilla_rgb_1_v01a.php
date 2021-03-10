<?php //rejilla_rgb_1_v01a.php

ini_set("display_errors", 1);
error_reporting(15);
$version = "rejilla_rgb_1_v01a.php";

$ancho = 20;
$alto = 20;

//creación de una imagen a todo color de 20 x 20 pixeles
$im = imagecreatetruecolor($ancho,$alto);

//creamos los colores
//el primer color que creamos es asignado como color de fondo


//el color blanco
$blanco = imagecolorallocate($im, 255,255,255);
$negro = imagecolorallocate($im, 0,0,0);
$rojo = imagecolorallocate($im, 255,0,0);
$verde = imagecolorallocate($im, 0,255,0);
$azul = imagecolorallocate($im, 0,0,255);


//ponemos algún pixel de color
imagesetpixel($im, 10,10,$rojo);
imagesetpixel($im, 11,10,$rojo);
imagesetpixel($im, 12,10,$rojo);
imagesetpixel($im, 13,10,$rojo);
imagesetpixel($im, 14,10,$rojo);
imagesetpixel($im, 15,10,$rojo);

imagesetpixel($im, 10,10,$rojo);
imagesetpixel($im, 10,11,$rojo);
imagesetpixel($im, 10,12,$rojo);
imagesetpixel($im, 10,13,$rojo);
imagesetpixel($im, 10,14,$rojo);
imagesetpixel($im, 10,15,$rojo);

imagesetpixel($im, 10,15,$rojo);
imagesetpixel($im, 11,15,$rojo);
imagesetpixel($im, 12,15,$rojo);
imagesetpixel($im, 13,15,$rojo);
imagesetpixel($im, 14,15,$rojo);
imagesetpixel($im, 15,15,$rojo);

imagesetpixel($im, 15,10,$rojo);
imagesetpixel($im, 15,11,$rojo);
imagesetpixel($im, 15,12,$rojo);
imagesetpixel($im, 15,13,$rojo);
imagesetpixel($im, 15,14,$rojo);
imagesetpixel($im, 15,15,$rojo);

imagefill($im, 13, 13, $rojo);




//mandamos la cabecera
//header("Content-type: image/png");


$ahora = time();
$nombre = $ahora.".png";
//$nombre = $ahora.".jpeg";
//generamos la imagen
imagepng($im, "img/".$nombre);
//imagejpeg($im, $nombre);

print<<<fin
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>$version</title>
</head>
<body>
	$version
	<br>
	img/$nombre
	<br>
	<br>
		<table>
			<tr>
				<td><image src="pixel.php?x=0&y=0&color=rojo" width="10" height="10"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
			</tr>
			<tr>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
			</tr>
			<tr>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
			</tr>
			<tr>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
			</tr>
			<tr>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
				<td><image src="img/transp.png"></td>
			</tr>												
		</table>
	<br>
	<img src="img/$nombre" width="100" height="100">
</body>
</html>
fin;

?>