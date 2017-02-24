<?php    
include('connect.php');
session_start(); 
$id = $_SESSION['ID'];
$sesid= session_id();?>

<html>
  <head>
       <title> Assessment </title>
	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>

	   <?php
	   
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
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
<?php
if (isset($_SESSION['user'])){
$subj = mysql_query("SELECT * FROM stud_prog WHERE UserID ='{$_SESSION['ID']}'");
$sub = mysql_fetch_array($subj);    
 $suc = mysql_query("SELECT * FROM announcements ORDER BY date DESC LIMIT 5");  

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

<?php 
$con= new mysqli('localhost','root','','user_login');
if(@$_GET['a']==1) { //assessment menu
$q=mysqli_query($con,"DELETE FROM `answer_record` WHERE ses_id='$sesid' ");
$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC");
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>No.</b></td><td><b>Assessment Title</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$correct = $row['correct'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND UserID='$id'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$correct*$total.'</td>
	<td><b><a href="assess.php?a=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32">&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;</td><td>'.$total.'</td><td>'.$correct*$total.'</td>
	<td><b><a href="update.php?a=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red">&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div>';
?><img class="main" src="pictures/assess/main.png" height="400" width="400"><?php
}?>

<?php //display questions
if(@$_GET['a']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
?> <div class="backgroundassess"><img src="pictures/assess/questionbackground.png" height="700" width="1400"></div> <?php
echo '<div class="panel1" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<font size="5"><b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b></font><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="update.php?a=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';
$count='A';
while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<font size="5"><input type="radio" name="ans" value="'.$optionid.'">'."&nbsp;&nbsp;&nbsp;".$count++.".&nbsp; ".$option.'</font><br /><br />';
}
echo'<br /><button type="submit" class="btn btn-primary">Submit</button></form></div>';
?> <div class="assesspad"><img src="pictures/assess/notepad.png" height="400" width="400"> </div> <?php
}

//display result
if(@$_GET['a']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND UserID='$id' " )or die('Error157');
?><div class="reviewpic"><img src="pictures/assess/result.png" height="200" width="400"> </div> <?php
echo  '<div class="panelresult"><br /><br /><br /><br /><br /><br /><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['correct'];
$qa=$row['level'];
echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td>right Answer</td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>Wrong Answer</td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Score</td><td>'.$s.'</td></tr>';
}
$result = mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'");
$aaa = mysqli_fetch_array($result);
$total = $aaa['total'];
echo '</table></div>';
?> <div class="aresult"> <?php
echo '<b><a href="assess.php?a=review&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#D3D3D3"><span class="title1"><b>Review</b></span></a></b>';
?> </div> 
<div class="bresult"> <?php
echo '<a href="update.php?a=exit&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:#D3D3D3"><span class="title1"><b>Exit</b></span></a></b></td>';
?> </div> 

<?php

}

if(@$_GET['a']== 'review' && @$_GET['eid']) //review
{
	$eid=@$_GET['eid'];
	$sn=@$_GET['n'];
	$total=@$_GET['t'];
	$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
?> <div class="backgroundassess"><img src="pictures/assess/questionbackground.png" height="700" width="1400"></div> <?php
echo '<div class="panel1" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<font size="5"><b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</font></b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );

echo '<form action="update.php?a=quiz&step=99&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';
$count='A';
while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
$qid=$row['qid'];
$c=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid'");
$lol=mysqli_fetch_array($c);
$ansid=$lol['ansid'];

$d=mysqli_query($con,"SELECT * FROM answer_record WHERE ses_id='$sesid' AND qid='$qid'");
$dd=mysqli_fetch_array($d);
$userans=$dd['userans'];
$correct=mysqli_query($con,"SELECT * FROM options where qid='$qid' AND optionid='$ansid'");
$xd=mysqli_fetch_array($correct);
$cans= $xd['option']; 
$uans=mysqli_query($con,"SELECT * FROM options where qid='$qid' AND optionid='$userans'");
$uuans=mysqli_fetch_array($uans);
$userchoice= $uuans['option']; 
if($option==$cans&&$option==$userchoice)
	echo '<b><font size="5" color="green">'.$count++.". ".$option.'&nbsp;&nbsp;</font></b><img src="pictures/assess/correct.png" height="25" width="25"> <br /><br />';
else if($option==$cans)
	echo '<b><font size="5" color="green">'.$count++.". ".$option.'&nbsp;&nbsp;</font></b><img src="pictures/assess/correct.png" height="25" width="25"><br /><br />';
else if($option==$userchoice)
	echo '<b><font size="5" color="red">'.$count++.". ".$option.'&nbsp;&nbsp;</font></b><img src="pictures/assess/wrong.png" height="25" width="25"><br /><br />';
else	
	echo '<font size="5">'.$count++.". ".$option.'</font><br /><br />';
}
if($sn==$total)
echo'<br /><button type="submit" class="btn btn-primary">Finish</button></form>';
if($sn<$total)
echo'<br /><button type="submit" class="btn btn-primary">Next</button></form>';

echo '</div>';
?> <div class="assessreview"><img src="pictures/assess/review.png" height="400" width="400"> </div> 
<?php
}
?>

<?php
}
else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>