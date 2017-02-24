<?php session_start();
include('connect.php'); 
$uid = $_SESSION['ID'];
$aa = mysql_query("SELECT totallog FROM logins WHERE UserID='$uid'");
	$sql= mysql_fetch_array($aa);
	$logintime = $sql['totallog'];
	$loginhour = (int)($logintime/60);
	$loginmin = $logintime % 60;



if (isset($_SESSION['user'])){
	$username = $_SESSION['user'];
$identity = $_SESSION['identity'];
                        $pp = mysql_query("SELECT * FROM logins WHERE UserID ='{$_SESSION['ID']}'");
                        $ppic = mysql_fetch_array($pp);
						?>

<html> 
<head>
       <title> Profile </title>
		<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
<link rel="stylesheet" href="css/mainpagecss.css" >
<link rel="stylesheet" href="css/profiletable.css" >
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

<?php if($_SESSION['identity']=="teacher"){ ?>
 <ul class="aa">
  <li><a href="index.php">Home</a></li>
 <li><a href="uploadpdf.php?a=def">Lesson</a></li>
  <li><a href="uploadassess.php?a=def">Assessment</a></li>
<li><a href="postannounce.php?a=def">Announcement</a></li>
    <li><a href="report.php?s=def">View Report</a></li>
	
</ul>
<?php if(@$_GET['a']=='def') { ?>
<div class="mainprofile">
<table>
<tr rowspan="4">	<?php if($ppic['image'] == ""){
                                        echo "<img class='picdisplay' width='200' height='200' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img class='picdisplay' width='200' height='200' src='pictures/".$ppic['image']."' alt='Profile Pic'>";
                                }
                                ?> 	<a href="uploadpic.php"><img class="picchanger" src="pictures/profile/camera.png" width="30" height="30"></a></tr>
								
								<tr class="infolol"><td><img class="picchanger" src="pictures/profile/identity.png" width="30" height="30"><?php echo 'ID: '; echo $_SESSION['ID']; ?></td></tr>
								<tr class="infolol2"><td><img class="picchanger" src="pictures/profile/email.png" width="30" height="30"><?php echo 'Email: '; echo $_SESSION['email']; ?></td></tr>
								<tr class="infolol3"><td><img class="picchanger" src="pictures/profile/login1.png" width="30" height="30"><?php echo $_SESSION['identity'];  ?> </td></tr>
								<tr class="infolol4"><td><img class="picchanger" src="pictures/profile/timer.png" width="30" height="30"> You have logged in for <?php echo $loginhour; ?> hour(s) <?php  echo $loginmin; ?> minute(s) in <?php echo date('F'); ?></td></tr>
						
								<tr><td style="font-size:20px;font-family:cursive;"><?php echo $_SESSION['user']; ?> </td></tr>


</table>
</div>
<img class="frame" src="pictures/profile/frame.png" width="1200" height="600">
<?php }}?>
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
    <li><a href="game.php">Game</a></li>
</ul>
<?php if(@$_GET['a']=='def') { ?>
<div class="mainprofile">
<table>
<tr rowspan="4">	<?php if($ppic['image'] == ""){
                                        echo "<img class='picdisplay' width='200' height='200' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img class='picdisplay' width='200' height='200' src='pictures/".$ppic['image']."' alt='Profile Pic'>";
                                }
                                ?> 	<a href="uploadpic.php"><img class="picchanger" src="pictures/profile/camera.png" width="30" height="30"></a></tr>
								
								<tr class="infolol"><td><img class="picchanger" src="pictures/profile/identity.png" width="30" height="30"><?php echo 'ID: '; echo $_SESSION['ID']; ?></td></tr>
								<tr class="infolol2"><td><img class="picchanger" src="pictures/profile/email.png" width="30" height="30"><?php echo 'Email: '; echo $_SESSION['email']; ?></td></tr>
								<tr class="infolol3"><td><img class="picchanger" src="pictures/profile/login1.png" width="30" height="30"><?php echo $_SESSION['identity'];  ?> </td></tr>
								<tr class="infolol4"><td><img class="picchanger" src="pictures/profile/timer.png" width="30" height="30"> You have logged in for <?php echo $loginhour; ?> hour(s) <?php  echo $loginmin; ?> minute(s) in <?php echo date('F'); ?></td></tr>
						
								<tr><td style="font-size:20px;font-family:cursive;"><?php echo $_SESSION['user']; ?> </td></tr>


</table>
</div>
<img class="frame" src="pictures/profile/frame.png" width="1200" height="600">
<?php

	$id=$_SESSION['ID'];
	$qq=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$id}'");
	$qqq=mysql_fetch_array($qq);
	if(is_array($qqq)){
	?>
<table class="table-fill" >
<thead><tr> <th colspan=100 class="text-center"> Your latest Quiz Marks</th></tr></thead>
<tbody class="table-hover">
<tr><?php $qresult=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$id}' GROUP BY qid");
while($info = mysql_fetch_array($qresult)){ $quizno=$info['qid'];

?> <td> <?php echo '<a href="profile.php?a=detail&qid='.$quizno.'">'."Quiz ".$quizno;?> </td> <?php }?> </tr>

<tr> <?php $qresult=mysql_query("SELECT * FROM (SELECT * FROM stu_assess WHERE UserID='{$id}' GROUP BY TIME DESC) AS t GROUP BY qid");
while($info = mysql_fetch_array($qresult)){ $score=$info['score'];
?> <td> <?php echo $score; ?> </td> <?php } ?> </tr></tbody></table>
<?php
} if(!is_array($qqq)){}

}


if(@$_GET['a']=='detail') {
$sid=$_SESSION['ID'];
$qid=@$_GET['qid'];
$qq=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}' AND qid='{$qid}'");
$qqq=mysql_fetch_array($qq);
if(is_array($qqq)){?>
<div class="yourquiz">
<table class="table-fill1">
<thead><tr> <th colspan=100 style="text-align:center">Your Quiz <?php echo $qid;?> Marks</th></tr></thead>
<tr><td>Done On</td> <?php $lol=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}' AND qid='{$qid}' ORDER BY TIME ASC");
while ($info = mysql_fetch_array($lol)){ $timedone =$info['time'];?>
<td><?php echo $timedone; ?> </td> <?php } ?> </tr>
<tr><td> Marks </td> <?php $lol=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}' AND qid='{$qid}' ORDER BY TIME ASC");
while ($info = mysql_fetch_array($lol)){ $marks =$info['score'];?>
<td><?php echo $marks; ?> </td> <?php } ?> </tr></div>

<button onclick="window.location.href='profile.php?a=def'" class="button1">OK</button>
<?php }
else echo "Not available";
}

}


}else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>

</body>
</html>