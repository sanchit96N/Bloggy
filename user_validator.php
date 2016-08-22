<?php
$dbserver="localhost";
$dbuser="root";
$dbpass="";
$dbname="blog_db";
$dbconn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
function is_valid_user($username,$password)
{
	global $dbconn;
	$query="SELECT user_password FROM user_table WHERE user_name='$username';";
	$res=mysqli_query($dbconn,$query);
	$user=mysqli_fetch_array($res);
	if($user)
	{
		if($user['user_password']==$password)
		return true;
		else
		return false;
	}
	else
	return false;
}
?>