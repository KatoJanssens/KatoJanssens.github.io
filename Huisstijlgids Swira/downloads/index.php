<?php

if(!isset($_GET['file'])) {
	http_response_code(400);
	exit;
}

$re = '/[\/](.*)|(php)/';
$str = trim($_GET['file']);

if( preg_match($re, $str) ) { // Suspect hacker
	http_response_code(400);
	exit;
}

header("Content-Disposition: attachment;filename='".$_GET['file']."'");
readfile($_GET['file']);
?>