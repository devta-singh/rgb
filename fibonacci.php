<?php //fibonacci.php
/*
0
1
1
2
3
5
8
11
*/
function mi_fibonacci($i){
	$inicio = 1;
	$siguiente = 1;
	for($f = 0; $f <= $i; $f++){
		//genera el inicio con el siguiente actual
		$actual = $siguiente + $inicio;
		$inicio = $siguiente;		
		print "<br>fibonacci $i $f : $inicio + $siguiente = $actual";
		$siguiente = $actual;
	}

	return($actual);
}
mi_fibonacci(8);


/*
2
3
5
8
13
21
34
55
89
55
34
21
13
8
5
3
2
2
3
5
8
13
21
34
55
89
55
34
21
13
8
5
3
2
3
5
8
13
21
34
55
89
55
34
21
13
8
5
3
2
*/


$_intervalos=("2,3,5,8,13,21,34,55,89,55,34,21,13,8,5,3,2,2,3,5,8,13,21,34,55,89,55,34,21,13,8,5,3,2,3,5,8,13,21,34,55,89,55,34,21,13,8,5,3");
$intervalos=explode(",", $_intervalos);


function mi_fibonacci2($i,$limite){
	$inicio = 1;
	$siguiente = 1;
	for($f = 0; $f <= $i; $f++){
		//genera el inicio con el siguiente actual
		if($siguiente + $inicio > $limite){
			$actual = $siguiente + $inicio;
			$inicio = $siguiente;
			print "<br>fibonacci2a $i $f : $inicio + $siguiente = $actual";
			$siguiente = $actual;
		}else{
			$actual = $siguiente - $inicio;
			$inicio = $siguiente;
			print "<br>fibonacci2b $i $f : $inicio + $siguiente = $actual";
			$siguiente = $actual;
		}
	}
	return($actual);
}
mi_fibonacci2(8,100);
exit();