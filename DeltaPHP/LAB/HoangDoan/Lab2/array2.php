<?php
/**
 * @author HoangDoan
 */
/**
In the folder create a web page using PHP with the following:
An associative multi-dimensional array containing the names of your family as the values. Use the relationship as the associative key. E.g. Father, Mother, Brother, Sister, , Aunt, Cousin, Grandfather, Grandmother.
Display the number and names of family for each relationship using a foreach loop.
E.g. Sisters: 3 Emily, Rose, April
Brothers: 2 Jack, John
**/

$myBigFamily =array(
"Father" => array("Long"),
"Mother" => array("Van"),
"Brothers" => null,
"Sisters" => array("Phuong", "Hang", "Nga", "Tuyet"),
"Aunts" => array("Thao", "Huong", "Cam", "Hao"),
"Cousins" => array("Den", "Yen", "Quynh", "Jenny"),
"Grandfathers" => array("Phuc", "Do"),
"Grandmothers" => array("Di", "Minh")
);
$keys = array_keys($myBigFamily); 

for($i = 0; $i < count($myBigFamily); $i++) { 
    echo $keys[$i] . ": "; 
	if(($myBigFamily[$keys[$i]]) == null){
		echo "0". " ";
	}
	else{
		echo count($myBigFamily[$keys[$i]])." ";
	}
	if(($myBigFamily[$keys[$i]]) != null){
		foreach($myBigFamily[$keys[$i]] as $key => $value) {
			//$lastValue = end($myBigFamily[$keys[$i]]);
			$lastKey = array_key_last($myBigFamily[$keys[$i]]);	
			echo  $value . ($lastKey!=$key ? ', ' : '');
		}
	}
    echo "<br/>";
}
//print_r($myBigFamily);
?>