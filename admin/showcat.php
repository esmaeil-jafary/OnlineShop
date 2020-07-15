<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>insert-update-delete in sql by php</title>
</head>
<script language="javascript" type="text/javascript" src="../js/jsfucncs.js"></script>
<?php
	include "../fucs.php";
?>
<body>
	<?php
	    if(isset($_POST["add"]))
		{
			$n=$_POST["txtn"];
			$sql="insert into tbl_cat(catname) values('$n')";
        	$result=mysqli_query($connect,$sql); 
			if($result)
			{
				echo 'نام دسته شما با موفقیت اضافه شد';
			}
			else
			{
				echo 'خطا در درج عنوان دسته';
			}
		
		}
	    // edit record
		if(isset($_POST["edit"]))
		{
			$id=$_POST["txtid"];
			$n=$_POST["txtn"];
			
			$sql="update tbl_cat set catname='$n' where id='$id'";
			$result3=mysqli_query($connect,$sql);
			
			if($result3)
			{
				echo 'عملیات ویرایش با موفقیت انجام شد';	
			}
			else
			{
				echo 'عملیات ویرایش با شکست مواجه شد';	
			}
		}
	    // delete record
		if(isset($_GET["idd"]))
		{
			
			$id=$_GET["idd"];
			$sql2="delete from tbl_cat where id='$id'";
			$result1=mysqli_query($connect,$sql2);
			if($result1)
			{
				echo '<div style="color:red;text-align:center;">رکورد مورد نظر با موفقیت حذف شد</div>';
		    }
			else
			{
				echo '<div style="color:red;text-align:center;">عملیات حذف با شکست مواجه شد</div>';
			} 
		}
		if(isset($_GET["ide"]))
		{	
			$id=$_GET["ide"];
			$sql="select * from tbl_cat where id='$id'";
			$result=mysqli_query($connect,$sql);
			$rows=mysqli_fetch_array($result);
			?>
			<form action="showcat.php" method="post" name="frmsabt" >
    	<table width="500px" height="400px" dir="rtl" align="center" border="1px" cellspacing="0" style="     font-family:Tahoma; text-align:center">
        	<th colspan="2" style=" background:#00bbff; font-family:Tahoma"> فرم  ویرایش دسته های کالا</th>
            <tr> 
            	<td></td><td><input type="hidden" id="txtid" name="txtid" value="<?php echo $rows["id"];?>"></td>
            </tr>
            <tr>
           		<td>نام</td><td><input type="text" id="txtn" name="txtn" value="<?php echo $rows["catname"];?>" ></td>
             </tr>
             <tr >
           		<td colspan="2"><input type="submit" value="ویرایش" name="edit" ></td>
             </tr>
        </table>
    </form>
		<?php
		}
		 else {
	
	?>
	<form action="showcat.php" method="post" name="frmsabt" >
    	<table width="500px" height="400px" dir="rtl" align="center" border="1px" cellspacing="0" style="font-family:Tahoma; text-align:center">
        	<th colspan="2"> فرم افزودن دسته های کالا</th>
            <tr>
           		<td>نام</td><td><input type="text" id="txtn" name="txtn" ></td>
             </tr>
             <tr >
           		<td colspan="2"><input type="submit" value="ثبت" name="add" ></td>
             </tr>
        </table>
    </form>
    <?php } ?>
    <hr><hr>
    <table width="100%" align="center" border="1" dir="rtl">
    <tr>
    	<th colspan="9" style="background:#1b1fdd; color:#f3f903">لیست کاربران سایت</th>
    </tr>
    <tr>
    	<th>کد دسته</th>
        <th>عنوان دسته</th>
        <th>حذف</th>
        <th>ویرایش</th>
    </tr>
    <?php
		$sql1="select * from tbl_cat";
		$result=mysqli_query($connect,$sql1);
		while($rows=mysqli_fetch_array($result))
		{?>
			<tr>
				<td><?php echo $rows["id"]; ?></td>
                <td><?php echo $rows["catname"]; ?></td>
                <td><a href="showcat.php?idd=<?php echo $rows["id"]; ?>" >حذف</a></td>
                <td><a href="showcat.php?ide=<?php echo $rows["id"]; ?>">ویرایش</a></td>
			</tr>
		<?php }
		?>

    </table>
</body>
</html>