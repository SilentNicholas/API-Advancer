<?php

function likes( $names ) {
$count = count($names);
if($count === 0){
	echo "no one likes this";
}elseif($count === 1){
	echo "$names[0] likes this";
}elseif($count === 2){
	echo "$names[0] and $names[1] like this";
}elseif($count === 3){
	echo "$names[0], $names[1] and $names[2] like this";
}else{
	$new = array_splice($names, 0, 2);
	$diff = count($names);
	echo "$new[0], $new[1] and $diff others like this";
}
}


likes([]);
?>