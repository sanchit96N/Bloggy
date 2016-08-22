<link href="css/form.css" rel="stylesheet" type="text/css" />
<div class="content">
<?php
if(!isset($_SESSION['login']))
display_form("You need to login to post article");
else if(isset($_POST['post']))
try_insert_post();
else display_form();
function try_insert_post()
{
	$_POST['title']=trim($_POST['title']);
	$_POST['tag']=trim($_POST['tag']);
	$_POST['message']=trim($_POST['message']);
	if((($_POST['title']=="")||($_POST['tag']=="")||($_POST['message']=="")))
	display_form("Empty fields are not allowed");
	else
	insert_post();
}
function insert_post()
{
	$dbserver="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="blog_db";
	$dbconn=mysqli_connect($dbserver,$dbusername,$dbpassword,$dbname);
	$query="INSERT 
	INTO post_table(post_title,post_by,post_tag,post_message) 
	VALUES
	(
	'".addcslashes(htmlspecialchars($_POST['title']),"'")."',
	'".$_SESSION['username']."',
	'".addcslashes(htmlspecialchars($_POST['tag']),"'")."',
	'".nl2br(addcslashes(htmlspecialchars($_POST['message']),"'"))."'
	);";
	mysqli_query($dbconn,$query);
	display_form("Your post has been successfullly added","+");
}
function display_form($msg=NULL,$res="-")
{
?>
	<div class="form">
    <form method="post">
	<input type="text" name="title" class="txt" placeholder="Enter title"/>
    <input type="text" name="tag"  class="txt" placeholder="Enter tag"/>
    <textarea rows="10" cols="30" name="message" class="txt_area"/>
    Insert your article here...
    </textarea>
    <input type="submit" name="post" value="Post"  class="btn"/>
    </form>
    <?php
	if(isset($msg))
	{
		?>
        <div class="<?php if($res=="+") echo "not_msg"; else echo "err_msg";?>">
        <?php echo $msg;?>
        </div>
        <?php
	}
    ?>
    </div>
<?php
}
?>
</div>