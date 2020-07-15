<?php
include "fucs.php";
session_start();
$sid=$_SESSION["sid"];
$id=$_GET["id"];
$sql="delete from tbl_order where (sid='$sid' and id='$id')";
$result=mysqli_query($connect,$sql);
if($result)
header("location:index.php");
?>
