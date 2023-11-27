<?php 
$arr = array();
$exit_code = null;
$res = exec("./cli server getwalletaddress -apiport 8080", $arr, $exit_code);
// /Users/emanuelsjovall/lth/websec/simpleBlockchain/cli server getwalletaddress -apiport 8080

print_r($arr);
echo "</br>";
echo $res . "</br>";
echo $exit_code . "</br>";

?>