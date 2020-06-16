<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once("config.php");

try
{
	$post = new Posts($db);
	$parameters = array(
		filtering($_POST["description"],"input","text"),
		filtering($_POST["postDate"],"input","text")
	);
	$result = $post->addPost($parameters);
	echo $result;
}
catch (Throwable $e)
{
	echo "An error occurs:".$e->getMessage();
}
?>