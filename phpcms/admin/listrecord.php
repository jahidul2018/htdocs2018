<?php

// PHP-cms
//
//Developed by: 	Humayun Shabbir Bhutta
//Email:			humayun_sa@hotmail.com
//website:			hm.munirbrothers.net
//Location:			Pakistan
//
include("cn.php");
include("common.php");
checklogin();
$msg = "";

if(isset($_POST['Submit']))
{
	$total = $_POST['total'];
	$td = 0;
	$i = 0;
	
	for($i = 1; $i <= $total; $i++)
	{
		if(isset($_POST["d$i"]))
		{
			mysql_query("DELETE FROM categories WHERE catid=".$_POST["d$i"],$link);
			$td++;
		}
	}

	$msg = "$td record(s) deleted!";
}



$result = mysql_query("Select * from categories",$link);
$num = mysql_num_rows($result);
$n = 0;
?>


<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h3>List of Records</h3>
<p><?php echo $msg?></p>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="49%" border="1" cellpadding="1" cellspacing="1" bordercolor="#000000">
    <tr bgcolor="#CCCCCC"> 
      <td width="3%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td width="97%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Category</strong></font></td>
    </tr>
    <?php while($row = mysql_fetch_array($result, MYSQL_BOTH)){
$n++;
?>
    <tr> 
      <td><input type="checkbox" name="d<?php echo $n;?>" value="<?php echo $row['catid'];?>"></td>
      <td><a href="newrecord.php?catid=<?php echo $row['catid']?>"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row['catname'];?></font></a></td>
    </tr>
    <?php

 }?>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Delete"> <input name="total" type="hidden" id="total" value="<?php echo $n?>"></td>
    </tr>
  </table>
<p>&nbsp;</p></form>
<p>&nbsp;</p>
<p><a href="admin.php">Main</a></p>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
