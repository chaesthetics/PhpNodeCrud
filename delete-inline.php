<?php 
include("config.php");

$stuid = $_GET['id'];

$url = "http://localhost:3000/data/{$stuid}";
var_dump($url);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);
curl_close($ch);
var_dump($result);

header("location:index.php");
?>