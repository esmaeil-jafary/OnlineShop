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
	if(isset($_GET["msg"]))
	{
		$msg=$_GET["msg"];
		if($msg==2)
		  echo 'این نام کاربری قبلا ثبت نام شده است <br>';
		if($msg==1)
	  	  echo 'عملیات ثبت موفقیت آمیز بود';	  
	    else
		  echo 'عملیات ثبت ناموفق بود';	  
	}
	    // edit record
		if(isset($_POST["edit"]))
		{
			$id=$_POST["txtid"];
			$n=$_POST["txtn"];
	        $f=$_POST["txtf"];
	     	$p=$_POST["txtp"];
	        $j=$_POST["j"];
	        $c=$_POST["txtc"];
			
			$sql="update tbl_user set name='$n',family='$f',password='$p',gender='$j',city='$c' where id='$id'";
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
			$sql2="delete from tbl_user where id='$id'";
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
			$sql="select * from tbl_user where id='$id'";
			$result=mysqli_query($connect,$sql);
			$rows=mysqli_fetch_array($result);
			$idcity=$rows["city"];
			?>
			<form action="../register.php" method="post" name="frmsabt" onSubmit="return check_data()" >
    	<table width="500px" height="400px" dir="rtl" align="center" border="1px" cellspacing="0" style="     font-family:Tahoma; text-align:center">
        	<th colspan="2" style=" background:#00bbff; font-family:Tahoma"> فرم  ویرایش اعضاء</th>
            <tr> 
            	<td></td><td><input type="hidden" id="txtid" name="txtid" value="<?php echo $rows["id"];?>"></td>
            </tr>
            <tr>
           		<td>نام</td><td><input type="text" id="txtn" name="txtn" value="<?php echo $rows["name"];?>" ></td>
             </tr>
             <tr>
           		<td>نام خانوادگی</td><td><input type="text" id="txtf" name="txtf" value="<?php echo $rows["family"];?>" ></td>
             </tr>
             <tr>
           		<td>کلمه عبور</td>
                <td><input type="password" id="txtp" name="txtp" value="<?php echo $rows["password"];?>" ></td>
             </tr>
             <tr>
           		<td>جنسیت</td>
                <td>
                <?php
					if($rows["gender"]==0)
					{
					?>
                    	<input type="radio"  id="j1" name="j" checked value="0"> مرد
                    	<input type="radio" id="j2" name="j" value="1" > زن
					<?php } 
					else
					{ ?>
						<input type="radio"  id="j1" name="j" value="0"> مرد
                    	<input type="radio" id="j2" name="j" value="1" checked > زن
					
                	<?php } ?>
                </td>
             </tr>
             <td>محل تولد</td>
                <td>
                	<select style="font-family:Tahoma" id="txtc" name="txtc">
                    	<option value="0">لطفا از لیست انتخاب نمائید</option>
                        <option value="1">کرج</option>
                        <option value="2">تهران</option>
                        <option value="3">اصفهان</option>
                        <option value="4">شهرکرد</option>
                        <option value="5">رشت</option>
                         
                    </select>
                    <script type="text/javascript" language="javascript">
						var element=document.getElementById("txtc");
						var n=element.length;
						for(var i=1; i<n; i++)
		                	if(element[i].value==<?php echo $idcity; ?>)
								document.getElementById("txtc").selectedIndex=i;
					</script>
                </td>
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
	<form action="add.php" method="post" name="frmsabt" onSubmit="return check_data()" >
    	<table width="500px" height="400px" dir="rtl" align="center" border="1px" cellspacing="0" style="font-family:Tahoma; text-align:center">
        	<th colspan="2"> فرم  ثبت نام اعضاء</th>
            <tr>
           		<td>نام</td><td><input type="text" id="txtn" name="txtn" ></td>
             </tr>
             <tr>
           		<td>نام خانوادگی</td><td><input type="text" id="txtf" name="txtf" ></td>
             </tr>
             <tr>
           		<td>نام کاربری</td><td><input type="text" id="txtu" name="txtu" ></td>
             </tr>
             <tr>
           		<td>کلمه غبور</td><td><input type="password" id="txtp" name="txtp" ></td>
             </tr>
             <tr>
           		<td>جنسیت</td>
                <td>
                	<input type="radio"  id="j1" name="j" checked value="0"> مرد
                    <input type="radio" id="j2" name="j" value="1" > زن
                </td>
             </tr>
             <td>محل تولد</td>
                <td>
                	<select style="font-family:Tahoma" id="txtc" name="txtc">
                    	<option value="0">لطفا از لیست انتخاب نمائید</option>
                        <option value="1">کرج</option>
                        <option value="2">تهران</option>
                        <option value="3">اصفهان</option>
                        <option value="4">شهرکرد</option>
                        <option value="5">رشت</option>
                         
                    </select>
                </td>
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
    	<th>کد کاربر</th>
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>نام کاربری</th>
        <th>کلمه عبور</th>
        <th>جنسیت</th>
        <th>شهر محل تولد</th>
        <th>حذف</th>
        <th>ویرایش</th>
    </tr>
    <?php
		$sql1="select * from tbl_user";
		$result=mysqli_query($connect,$sql1);
		while($rows=mysqli_fetch_array($connect,$result))
		{?>
			<tr>
				<td><?php echo $rows["id"]; ?></td>
                <td><?php echo $rows["name"]; ?></td>
                <td><?php echo $rows["family"]; ?></td>
                <td><?php echo $rows["user_name"]; ?></td>
                <td><?php echo $rows["password"]; ?></td>
                <td><?php
						if($rows["gender"]==0)
				 			echo 'مرد'; 
						else
						    echo 'زن';	
					?>
                 </td>
                <td><?php echo $rows["city"]; ?></td>
                <td><a href="showusers.php?idd=<?php echo $rows["id"]; ?>" >حذف</a></td>
                <td><a href="showusers.php?ide=<?php echo $rows["id"]; ?>">ویرایش</a></td>
			</tr>
		<?php }
		?>

    </table>
</body>
</html>