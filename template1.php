<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>insert-update-delete in sql by php</title>
<link type="text/css" rel="stylesheet" href="Css/stylesheet.css">
<script language="javascript" type="text/javascript" src="js/jsfucncs.js"></script>
</head>
<body>
	<div class="row" >
    	<span class="title" >
        	<h3>فروشگاه اینترنتی آوارین</h3>
        </span>
        <span class="services">
        	<h2>ارائه کننده جدیدترین محصولات آموزشی در زمینه برنامه نویسی وب ، ویندوز، موبایل </h2>
        </span>
        <span class="logo" ><img src="image/logo.png"></span>
    </div>
    <div class="menu">
    	<ul>
        	<li><a href="index.php"> صفحه اصلی</a></li>
            <li><a href="">محصولات</a>
            	<ul>
                <?php
				$sql="select * from tbl_cat";
				$result=mysqli_query($connect,$sql);
				while($rows=mysqli_fetch_array($result))
				{?>
                	<li><a href="index.php?idc=<?php echo $rows["id"];?>"><?php echo $rows["catname"]; ?></a></li>
                <?php } ?>    
                   
                </ul>
            </li>
            <li><a href="">درباره ما</a></li>
            <li><a href="">تماس با ما</a></li>
        </ul>
    </div>
</body>
</html>