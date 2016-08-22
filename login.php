<div class="content">
<?php
include('user_validator.php');
if(isset($_POST['logout']))
log_out();
else if(isset($_SESSION['login']))
logged_in();
else if(isset($_POST['login']))
try_login();
else if(isset($_POST['signup']))
display_signup_form();
else if(isset($_POST['submit']))
signup();
else
display_form();
function display_signup_form($msg=NULL)
{
	?>
	<div class="form">
    <form method="post">
    <input type="text" name="username" placeholder="Enter Username" class="txt"/>
    <input type="password" name="password" placeholder="Enter Password" class="txt"/>
    <input type="password" name="re_password" placeholder="Re-Enter Password" class="txt"/>
    <input type="submit" name="submit" value="Submit" class="btn"/>
    </form>
    <?php
	if(isset($msg)) 
	{
		?>
			<div class="err_msg">
			<?php echo $msg;?>
			</div>
		<?php
	}
    ?>
    </div>
    <?php
}
function signup()
{
	if(($_POST['password']=="")||($_POST['username']=="")||($_POST['re_password']==""))
	{
		display_signup_form("Empty fields are not allowed");
		return;
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$_POST['username']))
	{
		display_signup_form("Username can contain only letters and spaces");
		return;
	}
	else if($_POST['password']!=$_POST['re_password'])
	{
		display_signup_form("The re-entered password doesn't match the previous one");
		return;
	}
	$dbserver="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="blog_db";
	$dbconn=mysqli_connect($dbserver,$dbusername,$dbpassword,$dbname);
	$query="INSERT INTO user_table(user_name,user_password) VALUES('".$_POST['username']."','".$_POST['password']."');";
	mysqli_query($dbconn,$query);
	display_form("You have successfully signed up","+");
}
function try_login()
{
	if(($_POST['username']=="")||($_POST['password']==""))
	display_form("Username or password cannot be empty");
	else if(is_valid_user($_POST['username'],$_POST['password']))
	login();
	else
	display_form("Invalid username or password");
}
function logged_in()
{
	?>
    <div class="form">
    <div class="login_msg">
    You have successfully logged in <?php $_SESSION['username'];?><br />
    Do you want to log out?
    </div>
    <form method="post">
    <input type="submit" name="logout" value="Log Out" class="btn"/>
    </form>
    </div>
    <?php
}
function log_out()
{
	if ( isset( $_COOKIE[session_name()] ) ) 
	{
		setcookie(session_name(),"",time()-3600,"/");
	}
	$_SESSION = array();
	session_destroy();
	header("location:index.php?topic=login");
}
function login()
{
	session_start();
	$_SESSION['login']=true;
	$_SESSION['username']=$_POST['username'];
	header('location:index.php?topic=login');
}
function display_form($msg=NULL,$res="-")
{
	
	?>
    <div class="form">
    <form method="post">
    <input type="text" name="username" placeholder="Enter Username" class="txt"/>
    <input type="password" name="password" placeholder="Enter Password" class="txt"/>
    <input type="submit" name="login" value="Login" class="btn"/>
    <input type="submit" name="signup" value="Sign Up" class="btn"/>
    </form>
    <?php
	if(isset($msg)) {
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