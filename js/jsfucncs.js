function check_data()
{
	var n=document.getElementById("txtn");
	var f=document.getElementById("txtf");
	var u=document.getElementById("txtu");
	var p=document.getElementById("txtp");
	var c=document.getElementById("txtc");
	 
	if(n.value=="")
	{
		alert("لطفا نام را وارد نمائید");
		n.focus();
		return false;
	}
	else if(f.value=="")
	{
		alert("لطفا نام خانوادگی را وارد نمائید");
		f.focus();
		return false;
	}
	else if(u.value=="")
	{
		alert("لطفا نام کاربری را وارد نمائید");
		u.focus();
		return false;
	}
	else if(p.value=="")
	{
		alert("لطفا کلمه عبور را وارد نمائید");
		p.focus();
		return false;
	}
	else if(c.value==0)
	{
		alert("لطفا شهر تولد را از لیست انتخاب نمائید");
		c.focus();
		return false;
	}
	else
	{
		return true;
	}
}