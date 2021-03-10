<?php //html_tabla.php

ini_set("display_errors", 1);
error_reporting(15);

print "INICIO";



$ancho = 10;
$alto = 10;


$html_tabla=<<<fin
<table border="1">
fin;

print "FIN";

for($x = 0; $x < 10; $x++){

	$html_tabla=<<<fin
	<tr>
fin;

	for($y = 0; $y < 10; $y++){

		$html_tabla=<<<fin
		<td><image src="pixel.php?x=$x&y=$y&color=rojo" width="10" height="10"/></td>
fin;	
	}	

	$html_tabla=<<<fin
	</tr>
fin;

}
/*
$html_tabla=<<<fin
</table>
fin;

header("Content-type: text/html");
print $html_tabla;
*/
print "SE ACABO";

?>