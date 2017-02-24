<?php   session_start();  
include('connect.php');
?>

<html>
  <head>
       <title> Report </title>
	  	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
<link rel="stylesheet" href="css/report.css" >
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
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
  </head>
<body>
<?php
if (isset($_SESSION['user'])){

 $suc = mysql_query("SELECT * FROM logins WHERE identity ='student' ORDER BY Username");  
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
  <li><a href="uploadpdf.php?a=def">Lesson</a></li>
  <li><a href="uploadassess.php?a=def">Assessment</a></li>
  <li><a href="postannounce.php?a=def">Announcement</a></li>
    <li><a class="current" href="report.php?s=def">View Report</a></li>
</ul>
<?php if(@$_GET['s']=='def') {
?>
<div class="reporttable">
<table class="table-fill">
<thead><tr> <th colspan=100 class="text-center"> Report</th></tr>
<tr><th> ID</th> <th> Name</th> <th> Logged in time </th> <th>Assessments Done</th><th>Average Marks</th><th>Last Assessment Done </th></tr> </thead>
<?php 
//$qresult=mysql_query("SELECT * FROM (SELECT * FROM stu_assess WHERE UserID='{$id}' GROUP BY TIME DESC) AS t GROUP BY qid");
while($info = mysql_fetch_array($suc)){ 
	$logintime = $info['totallog'];
	$loginhour = (int)($logintime/60);
	$loginmin = $logintime % 60;
	$id=$info['UserID'];?>
	
<tr>
<td>
<?php 
echo '<a href="report.php?s=search&id='.$id.'">'.$info['UserID'];
?>

</td>
<td>
<?php 
echo $info['Username'];
?>
</td>
<td>
<?php 
echo $loginhour; 
?> hour(s) <?php  echo $loginmin; 
?> minute(s) in <?php echo date('F'); ?>

</td>
<?php 
$qresult=mysql_query("SELECT * FROM rank WHERE UserID='{$id}'");
$info=mysql_fetch_array($qresult);
if(is_array($info)){
$assnum=$info['count'];
$totalscore=$info['score'];
$avgscore=$totalscore/$assnum;
$avgscore=round($avgscore,2);
$lastlog=$info['time'];
}
?>


<td> <?php  if(is_array($info)){
           echo $assnum; }
			 else echo "Not Available"; ?> </td>
<td><?php  if(is_array($info)){
           echo $avgscore; }
			 else echo "Not Available"; ?> </td>
<td> <?php  if(is_array($info)){
           echo $lastlog; }
			 else echo "Not Available"; ?></td>
</tr>
<?php }?>
</table>
</div>
<?php
}

if(@$_GET['s']=='overview') {
	$sid=@$_GET['id'];
	$ii=mysql_query("SELECT * FROM logins WHERE UserID='{$sid}'");
	$iii=mysql_fetch_array($ii);
	$logintime = $iii['totallog'];
	$loginhour = (int)($logintime/60);
	$loginmin = $logintime % 60;

?>	
<div class="reporttable">
<table class="table-fill">
<thead><tr> <th colspan=100 class="text-center"> Report for <?php echo $sid; ?></th></tr>
<tr><th> Name</th> <th> Logged in time </th> <th>Assessments Done</th><th>Average Marks</th><th>Last Assessment Done </th><th> Last logged in</th></tr> </thead>
<tr><td><?php echo $iii['Username'];?></td><td> <?php echo $loginhour; ?> hour(s) <?php  echo $loginmin; ?> minute(s) in <?php echo date('F'); ?></td>
<?php 
$qresult=mysql_query("SELECT * FROM rank WHERE UserID='{$sid}'");
$info=mysql_fetch_array($qresult);
if(is_array($info)){
$assnum=$info['count'];
$totalscore=$info['score'];
$avgscore=$totalscore/$assnum;
$avgscore=round($avgscore,2);
$lastlog=$info['time'];
}
?>


<td> <?php  if(is_array($info)){
           echo $assnum; }
			 else echo "Not Available"; ?> </td>
<td><?php  if(is_array($info)){
           echo $avgscore; }
			 else echo "Not Available"; ?> </td>
<td> <?php  if(is_array($info)){
           echo $lastlog; }
			 else echo "Not Available"; ?></td>
<td><?php echo $iii['lastlogin']; ?></td>
</tr>
</table>
</div>
<button onclick="window.location.href='index.php'" class="button1">OK</button>
<?php	
}

if(@$_GET['s']=='search') {
	$sid=@$_GET['id'];
	$qq=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}'");
	$qqq=mysql_fetch_array($qq);
	if(is_array($qqq)){
	?>
<div class="reporttable">
	<table class="table-fill" >
<thead><tr> <th colspan=100 class="text-center"> Report for <?php echo $sid; ?></th></tr></thead>
<tr><td> Quiz</td><?php $qresult=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}' GROUP BY qid");
while($info = mysql_fetch_array($qresult)){ $quizno=$info['qid'];

?> <td> <?php echo '<a href="report.php?s=detail&id='.$sid.'&qid='.$quizno.'">'."Quiz ".$quizno;?> </td> <?php }?> </tr>

<tr><td> Marks </td> <?php $qresult=mysql_query("SELECT * FROM (SELECT * FROM stu_assess WHERE UserID='{$sid}' GROUP BY TIME DESC) AS t GROUP BY qid");
while($info = mysql_fetch_array($qresult)){ $score=$info['score'];
?> <td> <?php echo $score; ?> </td> <?php } ?> </tr>
</table></div>
<button onclick="window.location.href='report.php?s=def'" class="button1">OK</button>


	<?php }
else echo "Not available";
}
if(@$_GET['s']=='detail') {
$sid=@$_GET['id'];
$qid=@$_GET['qid'];
$qq=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}' AND qid='{$qid}'");
$qqq=mysql_fetch_array($qq);
if(is_array($qqq)){?>
<div class="reporttable">
<table class="table-fill" >
<thead><tr> <th colspan=100 class="text-center"><?php echo $sid;?> Quiz <?php echo $qid;?> Marks</th></tr> </thead>
<tr><td>Done On</td> <?php $lol=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}' AND qid='{$qid}' ORDER BY TIME ASC");
while ($info = mysql_fetch_array($lol)){ $timedone =$info['time'];?>
<td><?php echo $timedone; ?> </td> <?php } ?> </tr>
<tr><td> Marks </td> <?php $lol=mysql_query("SELECT * FROM stu_assess WHERE UserID='{$sid}' AND qid='{$qid}' ORDER BY TIME ASC");
while ($info = mysql_fetch_array($lol)){ $marks =$info['score'];?>
<td><?php echo $marks; ?> </td> <?php } ?> </tr></table>
</div>
<button onclick="history.go(-1);return true;" class="button1">OK</button>
<?php }
}
}
else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>