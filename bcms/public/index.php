<?php 
echo"this is index.php";
if(!isset($_GET['url']))
{
$url = "index.php";
}
else
{
	$url = $_GET['url'];
}
	echo "\n" . $url ; 
?>