<?php //crea_imagen.php

$im = imagecreatefrompng("arcoiris_mini.png");

//imagesetpixel(image, x, y, color)
$color = imagecolorallocate($im, 0, 0, 0);
imagesetpixel($im, 10, 10, $color);


header("Content-type: image/png;");
imagepng($im);

?>