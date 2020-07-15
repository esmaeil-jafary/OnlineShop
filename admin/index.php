<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت پنل</title>
<link type="text/css" rel="stylesheet" href="../Css/stylesheet.css">
</head>

<body>
	<?php
		include "../fucs.php";
		if(isset($_POST["send"]))
		{
			$u=$_POST["txtu"];
			$p=$_POST["txtp"];
			$sql="select * from tbl_user where (user_name='$u' and password='$p')";
			$result=mysqli_query($connect,$sql);
			$nums=mysqli_num_rows($result);
			if($nums>0)
			{
				$row=mysqli_fetch_array($result);
				$_SESSION["user"]=$row["name"].' '.$row["family"];
				$_SESSION["login"]=1;
				header("location:panel.php");
			}
			else
			{
				echo 'نام گاربری یا کلمه عبور صحیح نمی باشد';
			}
		}
	?>
	<div class="login">
        <div><img src="../image/login.png"></div>   
        <div class="acc"><br><label class="acc">ورود به حساب کاربری</label><br></div> 
        
    	<div class="myform">
        
    		<form name="frm" method="post" action="">
              <label>نام کاربری</label><br>
        	  <input class="pass" type="text" name="txtu" id="txtu" required placeholder="نام کاربری:" size="50%"><br>
              <label>کلمه عبور</label><br>
              <input class="pass" type="password" name="txtp" id="txtp" required placeholder="کلمه عبور:" size="50%">              <br><br>
              <input class="form-submit-button" type="submit" name="send" id="send" value=" ورود به حساب کاربری"><br>
              <label>
              	<a href=""> رمز عبور خود را فراموش کرده اید؟</a> 
              </label><input type="checkbox" name="chk" id="chk"><br>
              <button class="form-submit-button" type="button" name="sabt" id="sabt">
              	ثبت حساب کاربری جدید
              </button>
        	</form>
        </div>    
    </div> 
</body>
</html>