<?php
session_start();
//-------config.php------------//
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
//---------------------------------//
select($res,'post_id',$_GET['post_id']);
$post=mysqli_fetch_array($res);
if(isset($_POST['add_comment']))
{
	$query="INSERT INTO comments_table(comment_author,comment_message,post_id) 
	VALUES
	('".$_SESSION['username']."',
	'".$_POST['comment_message']."',
	'".$_GET['post_id']."'
	)";;
	mysqli_query($dbconn,$query);
}
$query="SELECT * FROM comments_table WHERE post_id='{$_GET['post_id']}';";
$comments=mysqli_query($dbconn,$query);
?>
<html>
<head>
</head>
<link href="css/view.css" rel="stylesheet" type="text/css" />
<body>
<div class="header">
	<div class="heading_box">
    	<div class="heading">Blog App</div>
        <div class="log_info">
        <?php
		if(!isset($_SESSION['login']))
		echo "You are currently logged out";
		else
		echo "You have successfully logged in as {$_SESSION['username']}";
        ?>
    	</div>
    </div>
    <div class="nav_bar">
    <ul>
    	<li><a href="index.php?topic=home">&#8678;</a></li>
    </ul>
    </div>
</div>
<div class="body">
    <div class="post_section">
        <div class="title">
        <?php echo $post['post_title'];?>
        </div>
        <div class="author">
        <div class="author_label">Post by</div> 
        <?php echo $post['post_by'];?>
        </div>
        <div class="post_on">
        <div class="post_on_label">Post on</div>
        <?php echo $post['post_on'];?>
        </div>
        <div class="tag">
        <div class="tag_label">tag</div> 
        <div class="tag_box">
        <?php echo $post['post_tag'];?>
        </div>
        </div>
        <div class="message">
        <?php echo $post['post_message'];?>
        </div>
    </div>
    <div class="comments_section">
    <div class="comm_heading">Recent Comments</div>
        <?php
        $theme=1;
        while($comment=mysqli_fetch_array($comments))
        {
            ?>
            <div class="comment">
                <div class="comment_author"><div class="author_tag">Comment By :</div>
                <?php echo $comment['comment_author'];?>
                </div>
                <div class="comment_message <?php echo "theme{$theme}";?>">
                <?php echo $comment['comment_message'];?>
                </div>
            </div>
        <?php
        $theme=($theme)%3+1;
        }
        ?>
        <div class="add_comment">
        <?php
		if(isset($_SESSION['login']))
		{
			?>
			<form method="post">
				<textarea rows="5" cols="80" name="comment_message">
				Leave your mark here....
				</textarea>
				<input type="submit" name="add_comment" value="Add Comment" />
			</form>
			<?php
		}
		else
		{
        	?>
            <div class="err_msg">
            You need to login to post a comment
            </div>
            <?php
		}
		?>        
        </div>
    </div>
</div>
<div class="footer">
</div>
</body>
</html>