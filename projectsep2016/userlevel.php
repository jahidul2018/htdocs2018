<h3>user level setting</h3>
<?php
if($_SESSION['user_id']!=true)
{
	echo"<p>Invalid loging !<br/></p>";
	echo "<a href='login.php' > Try again</a>";

	}
 ?>	
<?php 
if($user_level !=1){
	header('location: profile.php');
	}
?>
<p>
<a href='admin.php?type=user' >User setting</a>|
<a href='userlevel.php?type=user'>user level</a>|
</p>
<p>
<?php 
if(isset($_GET['user_level']) &&!empty($_GET['user_level'])){
?>	
<table>
<tr><td width='150px'>user</td><td>Options</td></tr>
<?php 
$list_query=mysql_query("select id,username, type,user_level from users");
while($run_list=mysql_fetch_array($list_query)){
	$u_id=$run_list['id'];
	$u_username=$run_list['username'];
	$u_type=$run_list['type'];
	$u_level=$run_list['user_level'];
	
?>
<tr><td><?php echo $u_username?></td>
<td>
<?php 
if($u_level==1){
	echo "<a href='option.php?u_id=$u_id&user_level=$u_level' >Admin</a>";
	}
	else{
	echo "<a href='option.php?u_id=$u_id&user_level=$u_level' >Member</a>";
		}
?>

</td>
</tr>
<?php
}
?>
</table>
<?php	
} else{
	echo "select option above !";
	
	
}
	
?>
</p>
</body>
</html>