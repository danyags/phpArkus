<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once("config.php");

try
{
	$post = new Posts($db);
	$result = $post->getPosts();
	header("Content-Type: application/json");
	echo json_encode($result, JSON_PRETTY_PRINT);
}
catch (Throwable $e)
{
	echo "An error occurs:".$e->getMessage();
}
?>