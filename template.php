<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>فروشگاه اینترنتی آوارین</title>
<link type="text/css" rel="stylesheet" href="Css/stylesheet.css">
<script language="javascript" type="text/javascript" src="js/jsfucncs.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="header" ></div>
    <div class="animtext"><marquee direction="right">ارائه کننده جدیدترین لوازم خانگی،بهداشتی آرایشی،
    صوتی و تصویری،لوازم ورزشی،مواد غذایی و پوشاک هفت روز هفته ، 24 ساعنه</marquee></div>
    
  <div class="navbar">
  	<a href="index.php">خانه</a>
    	<div class="subnav">
    		<button class="subnavbtn">دسته بندی محصولات <i class="fa fa-caret-down"></i></button>
        	<div class="subnav-content">
        		<ul>
                	<?php
					$sql="select * from tbl_cat";
					$result=mysqli_query($connect,$sql);
					while($rows=mysqli_fetch_array($result))
					{?>
                	<li><a href="index.php?idc=<?php echo $rows["id"];?>"><?php echo $rows["catname"]; ?></a></li>
                	<?php } ?>      
                </ul>
        	</div>   
    	</div>    
        <div class="subnav">
        	<button class="subnavbtn">درباره ما <i class="fa fa-caret-down"></i></button>
        </div>
        <a href="">تماس با ما</a>
        <a style="text-align:right" href="login.php">ورود/خروج</a>
    </div>
</body>
</html>