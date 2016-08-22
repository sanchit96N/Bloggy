<?php
session_start();
if(isset($_GET['topic']))
$topic=$_GET['topic'];
else
$topic='home';
?>
<html>
<head>
</head>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<body>
<div class="header">
	<div class="heading_box">
    	<div class="heading">
        Blog App
        </div>
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
    	<li><a href="?topic=home" <?php if($topic=="home") echo 'style="border-bottom:3px solid #ffffe5;color:#ffffff;"';?>>Home</a></li>
        <li><a href="?topic=login" <?php if($topic=="login") echo 'style="border-bottom:3px solid #ffffe5;color:#ffffff;"';?>>Login</a></li>
        <li><a href="?topic=post" <?php if($topic=="post") echo 'style="border-bottom:3px solid #ffffe5;color:#ffffff;"';?>>Post</a></li>
        <li><a href="?topic=contact" <?php if($topic=="contact") echo 'style="border-bottom:3px solid #ffffe5;color:#ffffff;"';?>>Contact Us</a></li>
    </ul>
    </div>
</div>
<div class="body">
<?php
switch($topic)
{
	case 'contact':
	include('contact_us.php');
	break;
	case 'login':
	include('login.php');
	break;
	case 'post':
	include('post.php');
	break;
	default:
	include('home_page.php');
}
?>
</div>
<div class="footer">
</div>
</body>
</html>