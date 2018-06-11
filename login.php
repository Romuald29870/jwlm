<?php
	$hn = 'localhost';
	//$db = 'jwlm';
	$db = 'id4254718_jwlm';
	//$un = 'jwlm';
	$un = 'id4254718_jwlm';
	$pw = 'jwlm123';
	$mapskey='AIzaSyA9YoyVJrwT5-6DrUqla3VWEq7DpibxPNE';

$conn = new mysqli($hn, $un, $pw, $db);
$conn->set_charset("utf8");
if($conn->connect_error) die($conn->connect_error);
?>