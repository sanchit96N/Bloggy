<?php
$dbserver="localhost";
$dbusername="root";
$dbpassword="";
$dbname="blog_db";
$dbconn=mysqli_connect($dbserver,$dbusername,$dbpassword,$dbname);
function select(&$res,$field=NULL,$val=NULL)
{
	global $dbconn;
	$condition=(is_null($field))? "":"WHERE $field='$val'";
	$query="SELECT * 
			FROM post_table
			".$condition."ORDER BY post_on DESC;";
	$res=mysqli_query($dbconn,$query);
}
$query="SELECT post_id,post_tag FROM post_table GROUP BY post_tag ORDER BY post_id;";
$data=mysqli_query($dbconn,$query);
$tags=NULL;
while($tag=mysqli_fetch_array($data))
 $tags[$tag['post_id']]=$tag['post_tag'];
?>