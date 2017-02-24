<?php
include ('connect.php');
session_start();
$username = $_SESSION['user'];
$identity = $_SESSION['identity'];
$con= new mysqli('localhost','root','','user_login');

if (isset($_SESSION['user'])&&$identity=="teacher"){
if(isset($_POST['submit'])){

$mysqli = new mysqli("localhost","root","","user_login");
$date = date("Y-m-d");
$title=$_POST['title'];
$username = $_SESSION['user'];
$comments = $_POST['comments'];


$insert = "INSERT  INTO `announcements` (`username`, `title`,`comment`, `date`) VALUES ('{$username}','{$title}', '{$comments}', '{$date}')"; 
if ($mysqli->query($insert)) 
	echo '<script>alert("Announcement made!"); window.location="postannounce.php?a=def";</script>';

else {
    echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
    exit();
        }
}

if(isset($_POST['submit1'])){
$ancid=$_POST['ancid'];
$username = $_SESSION['user'];
$sql = mysqli_query($con,"DELETE FROM announcements WHERE username='$username' AND id='$ancid'") or die('Error');
		echo '<script>alert("Announcement removed!"); window.location="postannounce.php?a=def";</script>';
				} ?>

<html>
  <head>
  	   <?php
	   $id=$_SESSION['ID'];
if(isset($_SESSION['user']))
{ 
    $ses = $id; //tell freichat the userid of the current user

    setcookie("freichat_user", "LOGGED_IN", time()+3600, "/"); // *do not change -> freichat code
}
else {
    $ses = null; //tell freichat that the current user is a guest

    setcookie("freichat_user", null, time()+3600, "/"); // *do not change -> freichat code
} 

if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file("C:/xampp/htdocs/freichat/hardcode.php")){

               require "C:/xampp/htdocs/freichat/hardcode.php";

               $temp_id =  $ses . $uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not
found!');</script>";
       }

       return 0;
}
}
?>
<script type="text/javascript" language="javascipt" src="http://localhost:81/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="http://localhost:81/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">    
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>	
       <title> Announcement </title>
	   	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	   <link rel="stylesheet" href="css/postanc.css" >
	   <link rel="stylesheet" href="css/dlt.css" >
	   <link rel="stylesheet" href="css/teach.css" >

  </head>
<body>
<div class="mainhead"><font style="font-family:cursive;font-size:15px;">&nbsp;&nbsp; Welcome Back</font><div class="title"><img src="mmu2.png" border="0" height="20" width="30"><font style="font-family:cursive;font-size:15px;">Data Communications And Networking Learning App</font></div>
<div class="dropdown">
<button class="dropbtn"><?php echo $username; ?></button>
	<div class="dropdown-content">
	<a href="profile.php?a=def">Profile</a>
    <a href="Logout.php">Logout</a>
	</div>

</div>
</div>
<div class="prof">

<table> 
 <?php
                        $pp = mysql_query("SELECT * FROM logins WHERE UserID ='{$_SESSION['ID']}'");
                        $ppic = mysql_fetch_array($pp);
						$bb=mysql_query("SELECT * FROM badge WHERE UserID ='{$_SESSION['ID']}'");
                        $badge=mysql_fetch_array($bb);
                ?>
<tr> <td rowspan="4"> <?php 					   
					   $xp=mysql_query("SELECT * FROM logins WHERE UserID='{$_SESSION['ID']}'");
					   $xxp=mysql_fetch_array($xp);
					   $exp=$xxp['experience'];
					   $lvl=$xxp['level'];
					   $expwidth=$exp/1000;
					   $expperc= round((float)$expwidth * 100 ) . '%';
							if($ppic['image'] == ""){
                                        echo "<img width='140' height='140' src='pictures/default.png' alt='Default Profile Pic' border='3'>";
                                } else {
                                        echo "<img width='140' height='140' src='pictures/".$ppic['image']."' alt='Profile Pic' style='border:5px; border-radius: 10px 10px 10px 10px;'>";
                                }
                          if(is_array($badge)){ ?> 
								</td></tr><tr class="userbadge"><td> <?php echo "<div style ='font-size:20px;Arial;	color: white;text-shadow:-1px -1px 0 #000;1px -1px 0 #000;-1px 1px 0 #000;1px 1px 0 #000  '>$username</div>";?> </td></tr>
						<?php
						$bbb=mysql_query("SELECT * FROM badge WHERE UserID ='{$_SESSION['ID']}' ORDER BY badge_id ASC");
                       echo '<tr><td>';
					   while($bbadge = mysql_fetch_array($bbb)){
						$badgepath=$bbadge['badge_path'];
						$badgename=$bbadge['badge_name'];
						echo "&nbsp;&nbsp;&nbsp;&nbsp;<img width='70' height='70' src='pictures/badge/".$badgepath."' alt='badge' title='".$badgename."'>";
					   }
					   echo '</td></tr>';
					   ?> <tr class="xpbar"><td>
					   <div id='xp-bar'>
						<div id='xp-bar-fill' style='width:<?php echo $expperc;?>'>
       
						</div>
						</div>
						</td><td style="font-size:20px;	color: white;text-shadow:-1px -1px 0 #000;1px -1px 0 #000;-1px 1px 0 #000;1px 1px 0 #000;position:relative;left:10;">Level <?php echo $lvl; ?></td>	</tr>
						<?php
					   }
					   else{ ?>
						   </td></tr><tr class="username"><td> <?php echo "<div style ='font-size:20px;Arial;	color: white;text-shadow:-1px -1px 0 #000;1px -1px 0 #000;-1px 1px 0 #000;1px 1px 0 #000  '>$username</div>";?> </td></tr>
						   <tr class="useridentity"><td> <?php echo "<div style ='font-size:20px;Arial;	color: white;text-shadow:-1px -1px 0 #000;1px -1px 0 #000;-1px 1px 0 #000;1px 1px 0 #000  '>$identity</div>";?> </td></tr>
						   <tr class="xpbar"><td>
					   <div id='xp-bar'>
						<div id='xp-bar-fill' style='width:<?php echo $expperc;?>'>
       
						</div>
						</div>
						</td><td style="font-size:20px;	color: white;text-shadow:-1px -1px 0 #000;1px -1px 0 #000;-1px 1px 0 #000;1px 1px 0 #000;position:relative;left:10;">Level <?php echo $lvl; ?></td>	</tr>
						<?php }
						  
?>
</table>
</div>
 <ul class="aa">
  <li><a href="index.php">Home</a></li>
  <li><a href="uploadpdf.php?a=def">Lesson</a></li>
  <li><a href="uploadassess.php?a=def">Assessment</a></li>
  <li><a class="current" href="postannounce.php?a=def">Announcement</a></li>
    <li><a href="report.php?s=def">View Report</a></li>
</ul>
<?php //default
if(@$_GET['a']=="def") { ?>
<div class="cont">		
<a href="postannounce.php?a=post"><img src="pictures/mainlogin/book.png" width="350" height="400"> </a>	
<div class="content1">Make </br>Announcements</div>
</div> 
<div class="startnew">
<a href="postannounce.php?a=remove"><img src="pictures/mainlogin/book.png" width="350" height="400" </a>
<div class="content1">Delete </br>Announcements</div>
</div>

<?php
}
?>
<?php if(@$_GET['a']=="post") { ?>
<form class="postanc" action="<?=$_SERVER['PHP_SELF']?>" method="post">
  <p class="label"><strong> Announcement title: </strong></p>
  <p>
    <label class="label">
    <textarea name="title" id="title" cols="50" rows="1"></textarea>
    </label>
  </p>
  <p class="label"><strong>Announcement contents: </strong></p>
  <p>
    <label class="label">
    <textarea name="comments" id="comments" cols="70" rows="8"></textarea>
    </label>
  </p>

    <label>
    <input type="submit" name="submit" value="Submit" />
    </label>


</form>
<?php
}
?>
<?php //remove anc
if(@$_GET['a']=="remove") {
$id=$_SESSION['ID'];
$username = $_SESSION['user'];
$result = mysqli_query($con,"SELECT * FROM announcements WHERE username='$username' ORDER BY date DESC");
$check1 = mysqli_query($con,"SELECT * FROM announcements WHERE username='$username'");
$check = mysqli_fetch_array($check1);
if(is_array($check)){
$c=1;
?>
<div class="panel">
<table class="table table-striped">
<form action="" method="post">
<tr><td> No. </td><td> Announcement Title </td> <td> Announcement Contents</td><td> Date Posted </td><td>&nbsp; </td></tr>
<tr><?php while($row = mysqli_fetch_array($result)) {
$ancname=$row['title'];
$ancdesp=$row['comment'];
$ancid=$row['id'];
$date=$row['date'];
echo '<td>'.$c++.'</td><td>'.$ancname.'</td><td>'.$ancdesp.'</td><td>'.$date.'</td>';
?> <input type="hidden" name="ancid" value="<?php echo $ancid?>"><td><input class="remove1" type="submit" name="submit1" value="Remove"></td></tr> 

<?php } ?>


</form>
</table>
</div>
<?php } 
else echo "You have yet to upload any PDF";
}?>
<?php }
else {
echo '<script>alert("Please login as teacher!"); window.location= "mainlogin.html";</script>';
}?>
</body>
</html>