<?php
// function pow($x, $y){
// 	$result = 0;
// 	if ($y == 0) {
// 		return 1;
// 	} else {
// 		$result =  ($x * pow($x, $y-1));
// 	}
// 	return $result;
// }

function g($str){
	$i = 0;
	$new_str = "";
	while ($i < strlen($str)-1) {
		$new_str = $new_str + $str[i+1];
		$i = $i + 1;
	}
	return $new_str;
}

function f($str2){
	if (strlen($str2) == 0) {
		return "";
	} elseif (strlen($str2) == 1) {
		return $str2;
	} else {
		return f(g($str2)) + $str2[0];
	}
}

function h($n, $str3){
	while ($n != 1) {
		if ($n % 2 == 0) {
			$n = $n / 2;
		} else {
			$n = 3 * $n + 1;
		}
		$str3 = f($str3);
	}
	return $str3;
}

echo h(1, "fruits");
echo h(2, "fruits");
echo h(5, "fruits");
?>