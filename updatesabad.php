<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
    include "fucs.php";
	$sid=$_SESSION["sid"];
	if(isset($_POST["sabt"]))
	{
		$q=$_POST["txtq"];	
		$id=$_POST["txtid"];	
		$r=rand();
		$d="00/00/00";
    	for($i=0;$i<=count($id);$i++)
		{
			$sql="update tbl_order set qty='$q[$i]' where (id='$id[$i]' and sid='$sid')";
			$result=mysqli_query($connect,$sql);
		}
		if($result)
		{
			$sql2="update tbl_order set status=1 where sid='$sid'";
			$res=mysqli_query($sql2);
			$sql1="insert into tbl_factor (coder,sid,dateins)values('$r','$sid','$d')";
			$result1=mysqli_query($sql1);
			
			unset($_SESSION["sid"]);
			header("location:index.php?msg=1");
			
		}		
	}		
?>

</body>
</html>