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
	  //add record
	  
	    if(isset($_POST["add"]))
		{
			$idc=$_POST["cat"];
			$n=$_POST["txtn"];
			$p=$_POST["txtp"];
			$q=$_POST["txtq"];
			$f=$_FILES["aks"]["name"];
			$type=$_FILES["aks"]["type"];
			$passvand=array("image/jpeg","image/gif","image/png");
			if(in_array($type,$passvand))
			{
				$aksh=md5($f.microtime()).substr($f,-5,5);
				$sql="insert into tbl_kala(idc,name,price,qty,aks) values('$idc','$n','$p','$q','$aksh')";
        		$result=mysqli_query($connect,$sql); 
				if($result)
				{
					move_uploaded_file($_FILES['aks']['tmp_name'],"../image/product/".$aksh) or 
					die("can not move pictur");
					echo 'کالای شما با موفقیت اضافه شد';
				    //unlink("../image/product".$aks);
				}
				else
				{
					echo 'خطا در درج کالا';
				}
			}
			else
			{
				echo 'لطفاً فایل از نوع عکس انتخاب نمائید';
			}
		}

	    // edit record
		if(isset($_POST["edit"]))
		{
			$id=$_POST["txtid"];
			$aksold=$_POST["aksold"];
			$idc=$_POST["cat"];
			$n=$_POST["txtn"];
			$p=$_POST["txtp"];
			$q=$_POST["txtq"];
			$f=$_FILES["aks"]["name"];
			$type=$_FILES["aks"]["type"];
			$passvand=array("image/jpeg","image/gif","image/png");
			if(!empty($f))
			    {
				    if(in_array($type,$passvand))
					    {
						   $aksh=md5($f.microtime()).substr($f,-5,5);
				           $sql="update tbl_kala set idc='$idc',name='$n',price='$p',qty='$q',aks='$aksh' where id='$id'";
				           $result3=mysqli_query($connect,$sql);
				           if($result3)
				              {
						       move_uploaded_file($_FILES['aks']['tmp_name'],"../image/product/".$aksh) or 
					           die("can not move pictur");	
					           unlink("../image/product".$aksold);
						       echo 'عملیات ویرایش با موفقیت انجام شد';	
				              }
				           else
				              {
					           echo 'عملیات ویرایش با شکست مواجه شد';	
				              }
			            }
			        else
			            {
			            	$sql="update tbl_kala set idc='$idc',name='$n',price='$p',qty='$q' where id='$id'";
				            $result3=mysqli_query($connect,$sql);
				            if($result3)
				              {
							   unlink("../image/product".$aks);  
						       echo 'عملیات ویرایش با موفقیت انجام شد';	
				              }
				            else
				              {
					          echo 'عملیات ویرایش با شکست مواجه شد';	
				              }
			            }
				}
	    } 
	    // delete record
		if(isset($_GET["idd"]))
		{
			
			$id=$_GET["idd"];
			$aks=$_GET["aks"];
			$sql2="delete from tbl_kala where id='$id'";
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

		if(isset($_GET["ide"]))
		{	
			$id=$_GET["ide"];
			$aksold=$_GET["aksold"];
			$sql="select * from tbl_kala where id='$id'";
			$result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);
			$idc=$row["idc"];
		?>
			<form  action="showproduct.php" method="post" name="frmsabt" enctype="multipart/form-data">
    	<table width="50%" dir="rtl" align="center" style="font-family:Tahoma">
        <tr>
        <td></td><td><input type="hidden" name="aksold" id="aksold" value="<?php echo $aksold; ?>"/></td>
        </tr>
        <tr>
        <td></td><td><input type="hidden" name="txtid" id="txtid" value="<?php echo $idc; ?>"/></td>
        </tr>
        
        <tr> 
        <td> نام دسته</td>
        <td><select name="cat" id="cat">
              <option value="0">لطفاً از لیست انتخاب نمائید</option>
               <?php
			   $sql="select * from tbl_cat";
			   $result=mysqli_query($connect,$sql);
			   while($rows=mysqli_fetch_array($result))
			   { ?>
			 <option value="<?php echo $rows["id"]; ?>"><?php echo $rows["catname"]; ?></option>
             <?php } ?>
           </select>               	
            <script language="javascript">
			  var element=document.getElementById("cat");
			  var n=element.length;
			  for(var i=1;i<n;i++)
				if(element[i].value==<?php echo $idc; ?>)
				  document.getElementById("cat").selectedIndex=i;
			  
			</script>                          
          </td>
         </tr>
         <tr>
         <td>نام کالا</td><td><input type="text" name="txtn" id="txtn"  value="<?php echo $row["name"]; ?>"/></td>
         </tr>
         <tr>
         <td>قیمت کالا</td><td> <input type="text" name="txtp" id="txtp" value="<?php echo $row["price"]; ?>"/></td>
         </tr>
         <tr>
         <td>تعداد کالا</td><td> <input type="text" name="txtq" id="txtq" value="<?php echo $row["qty"]; ?>"/></td>
         </tr>
         <tr>
         <td>عکس کالا</td><td> <input type="file" name="aks" id="aks"/></td>
         </tr>
         <tr>
         <td colspan="2"><input type="submit" value="ویرایش" name="edit" /></td>
         </tr>
        </table>
    </form>
		<?php }
		
	else {?>
	<form action="showproduct.php" method="post" name="frmsabt" enctype="multipart/form-data" >
    	<table width="500px" height="400px" dir="rtl" align="center" border="1px" cellspacing="0" style="             font-family:Tahoma; text-align:center">
        	
            <tr>
           		<td> نام دسته</td>
                <td><select name="cat" id="cat">
                	<option value="0">لطفاً از لیست انتخاب نمائید</option>
                    <?php
						$sql="select * from tbl_cat";
						$result=mysqli_query($connect,$sql);
						while($rows=mysqli_fetch_array($result))
						{ ?>
							<option value="<?php echo $rows["id"]; ?>">
                            	<?php echo $rows["catname"]; ?>
                            </option>
                       
						<?php } ?>
                    </select>
                </td>
             </tr>
             <tr>
             	<td>نام کالا</td><td> <input type="text" name="txtn" id="txtn"/></td>
             </tr>
             <tr>
             	<td>قیمت کالا</td><td> <input type="text" name="txtp" id="txtp" /></td>
             </tr>
             <tr>
             	<td>تعداد کالا</td><td> <input type="text" name="txtq" id="txtq" /></td>
             </tr>
             <tr>
             	<td>عکس کالا</td><td> <input type="file" name="aks" id="aks" /></td>
             </tr>
             <tr >
           		<td colspan="2"><input type="submit" value="ذخیره" name="add" ></td>
             </tr>
        </table>
    </form>
    <?php } ?>
    <hr><hr>
    <!--نمایش--> 
    <table width="100%" align="center" border="1" dir="rtl">
    <tr>
    	<th colspan="9" style="background:#1b1fdd; color:#f3f903">لیست محصولات سایت</th>
    </tr>
    <tr>
    	<th>کد کالا</th>
        <th>کد دسته</th>
        <th>نام کالا</th>
        <th>قیمت</th>
        <th>تعداد</th>
        <th>عکس</th>
        <th>حذف</th>
        <th>ویرایش</th>
    </tr>
    <?php
		$sql1="select tbl_cat.id as 'id1',tbl_kala.id as 'id2',idc,catname,name,price,qty,aks from               tbl_cat,tbl_kala where  tbl_cat.id=idc";
		$result=mysqli_query($connect,$sql1);
		while($rows=mysqli_fetch_array($result))
		{?>
		<tr>
		 <td><?php echo $rows["id1"]; ?></td>
         <td><?php echo $rows["catname"]; ?></td>
         <td><?php echo $rows["name"]; ?></td>
         <td><?php echo $rows["price"]; ?></td>
         <td><?php echo $rows["qty"]; ?></td>
         <td><?php echo $rows["aks"]; ?></td>         
         <td><a href="showproduct.php?idd=<?php echo $rows['id2']; ?> & aks=<?php $rows['aks']; ?>">حذف</a></td>
        <td><a href="showproduct.php?ide=<?php echo $rows['id2']; ?> & aksold=<?php $rows['aks']; ?>">ویرایش</a></td>
		</tr>
		<?php } ?>
    </table>
</body>
</html>