<?php    
include('connect.php');
session_start(); 
$sid = $_SESSION['ID'];?>

<html>
  <head>
       <title> My Music </title>
	 	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	   <link rel="stylesheet" href="css/musicshop.css" >
	 
	   <?php
if(isset($_SESSION['user']))
{ 
    $ses = $sid; //tell freichat the userid of the current user

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
<script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
	<link type="text/css" href="assets/css/themicons.css" rel="stylesheet" media="all">
		<link type="text/css" href="assets/css/style.css" rel="stylesheet" media="all">
<?php 
$s=mysql_query("SELECT * FROM logins WHERE UserID='{$sid}'");
$info=mysql_fetch_array($s);
$lol=$info['mid'];
if($lol==0)
	$lol=1;
$m=mysql_query("SELECT * FROM music_db WHERE id='{$lol}'");
$info=mysql_fetch_array($m);
$mpath = $info['path'];
?> 
      <script type="text/javascript">
        $(document).ready(function(){
          $("#jquery_jplayer_1").jPlayer({
            ready: function () {
              $(this).jPlayer("setMedia", {
                title: "Sad music",
                m4a: "<?php echo $mpath;?>",
       
              });
            },
            cssSelectorAncestor: "#jp_container_1",
            swfPath: "/js",
            supplied: "m4a",	
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            keyEnabled: true,
            remainingDuration: true,
            toggleDuration: true,
						         

          });
        });

      </script>
	  <script>
$(document).ready(function(){
    $(".tgl").click(function(){
       
		$("#playerlocation").animate({width:'toggle'},350);
    });
});
</script>
 <script type="text/javascript">
$(document).ready(function() {
    $("li [href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("current");
        }
    });
});
</script> 
  </head>
  <?php if (isset($_SESSION['user'])){
$pp = mysql_query("SELECT * FROM stud_prog WHERE UserID ='{$_SESSION['ID']}'");
$ppic = mysql_fetch_array($pp);

  ?>
<body>
<?php
  if(isset($_POST['submit'])){
  $musicid=$_POST['musicid'];
  $con = mysqli_connect("localhost","root","","user_login");
  $x=mysqli_query($con,"SELECT * FROM music_db WHERE id='$musicid'");
  $row=mysqli_fetch_array($x);
  $mprice=$row['price'];
  $name=$row['name'];
  $y=mysqli_query($con,"SELECT * FROM logins WHERE UserID='$sid'");
  $info=mysqli_fetch_array($y);
  $gold=$info['gold'];
  $leftover=$gold-$mprice;
  if($leftover<0)
 echo '<script>alert("Insufficient Gold!"); window.location= "musicshop.php";</script>';
else{
  $x=mysqli_query($con,"UPDATE logins SET gold ='{$leftover}' WHERE UserID='".$_SESSION['ID']."'");
  $w= mysqli_query($con,"INSERT INTO musicpurchase VALUES ('$sid','$musicid','$name',NOW())");
  $q = mysqli_query($con,"UPDATE logins SET mid = '{$musicid}' WHERE UserID = '".$_SESSION['ID']."'");
echo '<script>alert("Music successfuly purchased!"); window.location= "musicshop.php";</script>';
  }
  }
 if(isset($_POST['submit1'])){
$selectid=$_POST['musicid'];
  $con = mysqli_connect("localhost","root","","user_login");
$q = mysqli_query($con,"UPDATE logins SET mid = '{$selectid}' WHERE UserID = '".$_SESSION['ID']."'");
echo '<script>alert("Music successfuly changed!"); window.location= "musicshop.php";</script>';
  }


$username = $_SESSION['user'];
$identity = $_SESSION['identity'];
?>
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
   <?php
                        $sub = mysql_query("SELECT * FROM stud_prog WHERE UserID ='{$_SESSION['ID']}'");
                        $subj = mysql_fetch_array($sub);
						$subject = $subj['selected_subj'];
						
 if($subj['selected_subj'] == ""){ ?>
<li><a href="selectlesson.php">Lesson</a></li>
<?php } else { ?>				
	 <li><a href="selectchapter.php">Lesson</a></li>								
 
									  
                               <?php } 
                                ?> 
  <li><a href="assess.php?a=1">Assessment</a></li>
   <li><a href="musicshop.php">Music</a></li>
    <li><a href="game.php">Game</a></li>
</ul>
<div class="background">
<div class="musicshop">


<table class="table-fill">
<form action="" method="post">	
<thead><tr><th colspan="4" class="text-center">♪♪♪ Music shop ♪♪♪</th></tr>
<tr> <th> No. </th> <th> Music Name </th> <th> Price </th> <th>Select </th></tr></thead>
<tbody>
<?php 
$c=1;
$m=mysql_query("SELECT * FROM music_db WHERE id NOT IN(SELECT mid FROM musicpurchase WHERE UserID='$sid')");
while($row = mysql_fetch_array($m))  
{
$id=$row['id'];
$name=$row['name'];
$price=$row['price'];
?> <tr><td><?php echo $c++?></td>
<td> <?php echo $name; ?> </td>
<td> <?php echo $price; ?><img src="pictures/music/gold.png" height="15" width="15"> </td> 
<td style="text-align:center"><?php echo '<input type="radio" name="musicid" value="'.$id.'"></option>'; ?></td></tr>
<?php
} $c=0;
?>

 <tr><td colspan="4" class="text-center"><input class ="submit" type="submit" name="submit" value="Submit"></td></tr></tbody>
</form>
 </table>
 <?php 
  $goldsql=mysql_query("SELECT * FROM logins WHERE UserID='{$_SESSION['ID']}'");
  $gold=mysql_fetch_array($goldsql);
 $gold=$gold['gold'];?>
 <h3 class="music"> Your available gold: <?php echo $gold;?> <img src="pictures/music/gold.png" height="20" width="20"></h3>
 </div>

<?php
$xx=mysql_query("SELECT * FROM musicpurchase WHERE UserID='{$sid}'");
$info=mysql_fetch_array($xx);
if(is_array($info)){
?>
<div class="ownedmusic">
<table class="owned">
<form action="" method="post">	
<thead><tr><th colspan="3" style="text-align:center">♪♪♪ Your Music ♪♪♪</th></tr>	
<tr> <th> No. </th> <th> Music Name</th><th>Select </th></tr></thead><tbody>
<?php
$c=1;
$m=mysql_query("SELECT * FROM musicpurchase WHERE UserID='$sid' ORDER BY mid ASC");
while($row = mysql_fetch_array($m))  
{
$id=$row['mid'];
$name=$row['mname'];
?> <tr><td><?php echo $c++?></td>
<td> <?php echo $name; ?> </td> 
<td style="text-align:center"><?php echo '<input type="radio" name="musicid" value="'.$id.'"></option>'; ?></td></tr>
<?php
} $c=0;
?>

 <tr><td colspan="3" style="text-align:center"><input class="submit" type="submit" name="submit1" value="Submit"></td></tr></tbody>
</form>
 </table>
 </div>
<?php


}
?><button class="tgl"><</button>
	<div class="playerlocation" id="playerlocation">



		

			<div class="demo-player">

				<div id="jquery_jplayer_1" class="jp-jplayer"></div>

				<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
					<div class="jp-interface">
						<div class="jp-button jp-playpause-button">
							<button class="jp-play" role="button" tabindex="0">play</button>
						</div>
						<div class="jp-time-rail">
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>
						</div>
						<div class="jp-button jp-volume-button">
							<button class="jp-mute" role="button" tabindex="0">max volume</button>
						</div>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
	
					<div class="jp-no-solution">
						<span>Update Required</span>
						To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
					</div>
				</div>

			</div>

	
	</div> 
 </div> <?php
}
else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>