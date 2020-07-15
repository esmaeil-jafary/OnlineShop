
<body>
	<div class="row">
<?php include "header.php" ?>
</div>
<div class="navbar-brand col-12">
	<?php
	 	include "template.php";
     ?>
	</div>
    <div class="row">
		
	</div> 

<!--
    <div class="content">
    	<span class="kala"> 	
-->
	<div class="row">
<!--		سبد سفارشات-->
		<div class="col-md-3">
		<div class="row card-header">	
	
        <table width="100%">
        <tr>
        	<th class=" card-header text-center bg-success"  colspan="3">سبد سفارش شما</th>
        </tr>
        <tr class="card-body">
        	<th>کد کالا</th>
            <th>نام کالا</th>
            <th>حذف</th>
        </tr>
        <?php
		 $sid=$_SESSION['sid'];
		 $sql="select tbl_kala.id,name,tbl_order.id as id1,status,idk from tbl_order,tbl_kala where (sid='$sid' and tbl_order.idk=tbl_kala.id and status=0)";
		 $result=mysqli_query($connect,$sql);
		 while($rows=mysqli_fetch_array($result))
		 {?>
         <tr>
         	<td><?php echo $rows["id1"]; ?></td>
            <td><?php echo $rows["name"]; ?></td>
            <td><a href="delsabad.php?id=<?php echo $rows["id1"]; ?>"> حذف</a></td>
           
         </tr>
		<?php } ?>
        </table>
        
        <button class="btn btn-warning">
        	<a href="showfactor.php?sid=<?php echo $sid; ?>">نهایی کردن سفارش</a>
        </button>
        
      
			</div>
			<div class="row card-header mt-5 bg-info ">
			<h5 class="text-center">محل تبلیغات</h5>
			</div>
		</div>
<!--		product-->
		<div class="col-md-7">
		  <?php
			if(isset($_GET["idc"]))
			{
				$idc=$_GET["idc"];
				$sql="select * from tbl_kala where idc='$idc'";
			}
			else
			{
			$sql="select * from tbl_kala";
			}
			$res=mysqli_query($connect,$sql);
			while($rows1=mysqli_fetch_array($res))
			{
			 $rows2=mysqli_fetch_array($res); 
             if($rows1["id"])
             { ?>
	<div class="row">
             <span class="col-md-6">
                <img class="img-fluid h-75 mt-2" src="image/product/<?php echo $rows1["aks"]; ?>" width="400px" height="200px">
                <br>
                <h5 class="text-center card-header">نام محصول: <?php echo $rows1["name"]; ?><br></h5>
                <h5 class="text-center card-header">قیمت محصول : <?php  echo $rows1["price"]; ?> <br></h5> 
                <a class="btn btn-primary mb-1" href="addsabad.php?id=<?php echo $rows1['id']; ?>">افزودن به سبد خرید</a>
           </span>
             <?php } 
			 if($rows2["id"])
            { ?>

             <span class="col-md-6">
                <img class="img-fluid h-75 mt-2" src="image/product/<?php echo $rows2["aks"]; ?>" width="400px" height="200px">
                <br>
               <h5 class="text-center card-header"> نام محصول:<?php echo $rows2["name"]; ?><br></h5>
                <h5 class="text-center card-header">قیمت محصول :<?php echo $rows2["price"]; ?>  
					<br></h5>
					 <a class="btn btn-primary mb-3" href="addsabad.php?id= <?php echo $rows2['id']; ?>">افزودن به سبد خرید</a>
           </span>
	</div>
            <?php } 
			?>
          <?php } ?>
		
		</div>
		
<!--		سایدبار چپ-->
		<div class="col-md-2">
		<h5 class="card-header bg-secondary">محصولات جدید</h5>
		</div>
<!--		<span class=" col-md-9">-->
		
         
		
	
          
       
			
</div>
   
        <?php
			include "footer.php";
     	?>
	   

</body>
</html>