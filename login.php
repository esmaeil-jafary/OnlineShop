<?php
	session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>پنل مدیدیت</title>
	<link type="text/css" rel="stylesheet" href="../Css/stylesheet.css">
</head>

<body>
	<?php
		if(isset($_SESSION["login"]))
		{?>
        	<div class="welcome">
            	<span class="user"> کاربر محترم: <?php echo $_SESSION["user"]; ?> خوش آمدید </span>
                <span class="exit"><a href="exit.php"><img src="image/425929_preview.png"></a></span>
            </div>
            <div class="navbar">
            	<ul>
	                <li><a href="showusers.php" target="myframe">مدیریت کاربران</a></li>
                    <li><a href="showcat.php" target="myframe">دسته بندی کالاها</a></li>
                    <li><a href="showproduct.php" target="myframe">مدیریت کالا</a></li>
                    <li><a href="showorder.php" target="myframe">مدیریت سفارشات</a></li>
                    <li><a href="showorderb.php" target="myframe">سفارشات بایگانی شده</a></li>
                </ul>
            </div>
            <iframe name="myframe" id="myframe" class="myframe"></iframe>
   
            <?php
		}
        else
	    {
			echo 'شما کاربر مجاز نیستید...!';
		}?>
</body>
</html>