<?php
	session_start();
	if(!isset($_SESSION["sid"]))
	{
	$_SESSION["sid"]=session_id();
	}
?>
<!doctype html>
<html>
<head>
<script>
function changeprice()
{
 q1=document.getElementsByName("txtq[]");
 p1=document.getElementsByName("txtp[]");
 p2=document.getElementsByName("txtp1[]");
 sum=0;
 for(i=0;i<q1.length;i++)
 {
  p=q1[i].value;
  q=p1[i].value;
  pnew=p*q;
  p2[i].value=pnew;
  sum=sum+parseInt(p2[i].value);
  document.getElementById("sump").innerHTML="[جمع کل فاکتور:]+sum+"  ریال";
 }
 
}
</script>
<meta charset="utf-8">
<title>insert-update-delete in sql by php</title>
<link type="text/css" rel="stylesheet" href="Css/stylesheet.css">
<script language="javascript" type="text/javascript" src="js/jsfucncs.js"></script>
</head>
    <?php
		include "fucs.php";
    ?>
<body>
     <?php
	 	include "template.php";
     ?>
    <div class="content">
    <br><br>
      <?php
	   if(isset($_GET["sid"]))
	   {
         $sid=$_GET["sid"];
		 ?>
         <form name="frm" action="updatesabad.php" method="post">
         <table border="1" width="60%" align="center" dir="rtl">  
         	<tr><th colspan="5" style="color:blue">فاکتور فروش شما </th></tr>
            <tr style="background:#83bcf1">
            	<th>ردیف</th>
                <th>نام کالا</th>
                <th>تعداد</th>
                <th>قیمت</th>
                <th>قیمت کل</th>
            </tr>
            <?php
			$sql="select tbl_kala.id as id1,name,price,tbl_order.id as id2,idk from tbl_order,tbl_kala where (sid='$sid' and tbl_order.idk=tbl_kala.id)";
			$result=mysqli_query($connect,$sql);
			$i=1;
		    while($rows=mysqli_fetch_array($result))
		    {?>
            <tr>
               <td><?php echo $i++; ?></td>
               <input type="hidden" name="txtid" id="txtid" value="<?php echo $rows["id1"]; ?>">
               <td><?php echo $rows["name"]; ?></td>
               <td><input type="number" name="txtq[]" id="txtq[]" value="1" onChange="changeprice()"></td>
               <td><input type="text" name="txtp[]" id="txtp[]" value="<?php echo $rows['price']; ?>" readonly></td>
               <td><input type="text" name="txtp1[]" id="txtp1[]" value="<?php echo $rows['price']; ?>" readonly></td>
            </tr>
		<?php } ?>
        <tr>
        	<th style="background:#83bcf1;text-align:right" colspan="5">
            	<input  class="form-submit-button" type="submit" name="sabt" value="ثبت سفارش" >
            </th>
        </tr>
         </table>
         </form>
         <?php
	   }
	  ?> 
    <div style="color:blue; font-size:16px; margin-right:64%" id="sump"></div>
    <br><br> 
    </div>
        <?php
			include "footer.php";
     	?>

</body>
</html>