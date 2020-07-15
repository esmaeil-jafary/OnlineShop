<?php
	session_start();
	if(isset($_GET["msg"]))
	{
		unset($_GET["sid"]);
		
	}
    if(!isset($_SESSION["sid"]))
	{
	   $_SESSION["sid"]=session_id();
    }
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>فروشگاه اینترنتی آوارین</title>
<!--<link type="text/css" rel="stylesheet" href="Css/stylesheet.css">-->
	<link rel="stylesheet" href="Css/bootstrap-4.4.1-dist/css/bootstrap.min.css">

<script language="javascript" type="text/javascript" src="js/jsfucncs.js"></script>
</head>
    <?php
		include "fucs.php";
		
    ?>