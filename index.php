<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://example.com" . $_SERVER['REQUEST_URI']);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);
$type = curl_getinfo($ch,CURLINFO_CONTENT_TYPE);
// close curl resource to free up system resources
curl_close($ch);
header('Content-Type: ' . $type);
header("Cache-control: public");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 60*60*24) . " GMT");

echo $output;
