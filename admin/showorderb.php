<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت دسته ها و کالا ها</title>
</head>
<script language="javascript" type="text/javascript" src="../js/jsfucncs.js"></script>
<?php
	include "../fucs.php";
?>
<body>
     
	<?php

	    // delete record
		if(isset($_GET["idd"]))
		{
			
			$id=$_GET["idd"];
			$sql2="delete from tbl_factor where id='$id'";
			$result1=mysqli_query($connect,$sql2);
			if($result1)
			{
				
				@unlink("../image/product".$aks);
				echo '<div style="color:red;text-align:center;">رکورد مورد نظر با موفقیت حذف شد</div>';
		    }
			else
			{
				echo '<div style="color:red;text-align:center;">عملیات حذف با شکست مواجه شد</div>';
			} 
		}
		if(isset($_GET["sidb"]))
		{
		  $sid=$_GET["sidb"]; 	
		  $sql="update tbl_factor set status=0 where sid='$sid'";
		  $result=mysqli_query($connect,$sql);
		  echo 'فاکتور انتخابی شما فعال شد.';
		}
		if(isset($_GET["sid"]))
		{
		$sid=$_GET["sid"];
		?>
		    <table border="1" width="60%" align="center" dir="rtl">  
         	<tr><th colspan="5" style="color:blue">فاکتور فروش شما </th></tr>
            <tr>
            	<th>ردیف</th>
                <th>نام کالا</th>
                <th>تعداد</th>
                <th>قیمت</th>
                <th>قیمت کل</th>
            </tr>
            <?php
			$sql="select tbl_kala.id as id1,name,price,tbl_order.id as id2,tbl_order.qty as q,idk from tbl_order,tbl_kala where (sid='$sid' and tbl_order.idk=tbl_kala.id)";
			$result=mysqli_query($connect,$sql);
			$i=1;
			$sum=0;
		    while($rows=mysqli_fetch_array($result))
		    {
				$sum=$sum+$rows["q"]*$rows["price"];
				?>
            <tr>
               <td><?php echo $i++; ?></td>
               <td><?php echo $rows["name"]; ?></td>
               <td><?php echo $rows["q"]; ?></td>
               <td><?php echo $rows["price"]; ?></td>
               <td><?php echo $rows["price"]*$rows["q"]; ?></td>
            </tr>
		<?php } ?>
        <tr><th colspan="2">جمع کل : </th><th colspan="3"><?php echo $sum; ?></th></tr>
         </table>	
		<?php }?>
    <hr><hr>
    <!--نمایش--> 
    <table width="100%" align="center" border="1" dir="rtl">
    <tr>
    	<th colspan="9" style="background:#1b1fdd; color:#f3f903">لیست فاکتورها</th>
    </tr>
    <tr>
    	<th>کد </th>
        <th>کد رهگیری</th>
        <th>sid</th>
        <th>تاریخ</th>
        <th>حذف</th>
        <th>بایگانی</th>
        <th>جزئیات</th>
    </tr>
    <?php
		$sql1="select * from tbl_factor where status=1";
		$result=mysqli_query($connect,$sql1);
		while($rows=mysqli_fetch_array($result))
		{?>
		<tr>
		 <td><?php echo $rows["id"]; ?></td>
         <td><?php echo $rows["coder"]; ?></td>
         <td><?php echo $rows["sid"]; ?></td>
         <td><?php echo $rows["dateins"]; ?></td>
                 
         <td><a href="showorderb.php?idd=<?php echo $rows['id']; ?>">حذف</a></td>
         <td><a href="showorderb.php?sidb=<?php echo $rows['sid']; ?>">فعال</a></td>
         <td><a href="showorderb.php?sid=<?php echo $rows['sid']; ?>">جزئیات</a></td>
		</tr>
		<?php } ?>
    </table>
</body>
</html>