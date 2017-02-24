<?php 
include('connect.php'); 
session_start();

        
?>	
	
<html> 
<head>
       <title> Change Picture </title>
	 	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
<link rel="stylesheet" href="css/mainpagecss.css" >
<link rel="stylesheet" href="css/uploadpic.css" >
  </head>
<?php if (isset($_SESSION['user'])){
$pp = mysql_query("SELECT * FROM logins WHERE UserID ='{$_SESSION['ID']}'");
$ppic = mysql_fetch_array($pp);
$username = $_SESSION['user'];
$identity = $_SESSION['identity'];

        if(isset($_POST['submit'])){
                move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
                $con = mysqli_connect("localhost","root","","user_login");
               if( $q = mysqli_query($con,"UPDATE logins SET image = '".$_FILES['file']['name']."' WHERE UserID = '".$_SESSION['ID']."'") )
				   echo '<script>alert("Profile picture changed!"); window.location="uploadpic.php";</script>';
			   else {
            echo '<script>alert("Profile picture not changed!"); window.location="uploadpic.php";</script>';
  
        }
				} ?>
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

<?php if($_SESSION['identity']=="student"){ ?>
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
</ul>
<?php }
if($_SESSION['identity']=="teacher"){ ?>
 <ul class="aa">
  <li><a href="index.php">Home</a></li>
 <li><a href="uploadpdf.php?a=def">Lesson</a></li>
  <li><a href="uploadassess.php?a=def">Assessment</a></li>
<li><a href="postannounce.php?a=def">Announcement</a></li>
    <li><a href="report.php?s=def">View Report</a></li>
</ul>
<?php } ?>
	<form class="profpic" action="" method="post" enctype="multipart/form-data">
						<p style="font-size:20px">Upload photo:   </p>
						<p> 	<?php if($ppic['image'] == ""){
                                        echo "<img width='250' height='250' class='pic' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='250' height='250' class='pic' src='pictures/".$ppic['image']."' alt='Profile Pic'>";
                                }
                                ?> </p>
                        <input type="file" name="file">
						<input type="button" value="Back" onClick="history.go(-1);return true;">
                        <input type="submit" name="submit" value ="Submit">
                </form>
				
		<?php } else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}
?>				
				
				
				</body>
