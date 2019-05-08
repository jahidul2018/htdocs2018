<?php

// PHP-CMS
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
$catname = "";
$catdesc = "";



if(isset($_POST['Submit']))
{

	$catname = $_POST['catname'];
	$catdesc = $_POST['catdesc'];
	
	if(!isset($_GET['catid']))
	{
		$result = mysql_query("Insert into categories(catname,catdesc) values('$catname','$catdesc')");
		$msg = "New record is saved";
	}
	else
	{
		$result = mysql_query("Update categories set catname='$catname', catdesc='$catdesc' where catid=".$_GET['catid']);
		$msg = "Record is updated";
	}
}
if(isset($_GET['catid']))
{
	$result = mysql_query("Select * From categories where catid=".$_GET['catid'],$link);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$catname = $row['catname'];
	$catdesc = $row['catdesc'];
}
?>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h3>New/Edit Record</h3>
<p><a href="listrecord.php">List Records</a><br>
  <a href="admin.php">Main</a></p>
<p><?php echo $msg?></p>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="54%" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#000000">
    <tr> 
      <td width="42%"><strong>Data</strong></td>
      <td width="58%"><input name="catname" type="text" id="catname" value="<?php echo $catname?>"></td>
    </tr>
    <tr> 
      <td><strong>Description</strong></td>
      <td><textarea name="catdesc" id="textarea2"><?php echo $catdesc?></textarea></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit">
        <input type="reset" name="Submit2" value="Reset"></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <p>&nbsp;</p>
</form>
<p><a href="admin.php">Main</a></p>
</body>
</html>
