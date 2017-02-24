<?php    
include('connect.php');
session_start(); 
$id = $_SESSION['ID'];?>

<html>
  <head>
       <title> Home </title>
	 	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
	   <link  rel="stylesheet" href="css/teacher.css"/>
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>	
<script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
	<link type="text/css" href="assets/css/themicons.css" rel="stylesheet" media="all">
		<link type="text/css" href="assets/css/style.css" rel="stylesheet" media="all">
<?php 
$s=mysql_query("SELECT * FROM logins WHERE UserID='{$id}'");
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
<body>
<?php
if (isset($_SESSION['user'])){

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
<img src="pictures/index.png" class="indexbg">
<img src="pictures/line.png" class="indexline">

<?php if ($identity=="student"){ ?>
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

<nav class ="anc">
<table class="anc"  width="100%" border="1">
<tr> <td> <img src="pin.png" width=20 height=20> Announcement</td></tr>
<?php 
while($info = mysql_fetch_array($suc)){
$tname=$info['username'];
$i=mysql_query("SELECT * FROM logins WHERE Username ='{$tname}'");
$irow=mysql_fetch_array($i);
	?>
<tr>
<td class="anclol">
<?php 
echo "<b>".$info['title']."</b>";
echo "<br>".$info['comment'];
echo "<br><br>";
if($irow['image'] == ""){
                                        echo "<img width='30' height='30' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='30' height='30' src='pictures/".$irow['image']."' alt='Profile Pic'>";
                                }

echo $info['username']." | ".$info['date'];

?>
</tr>
</td>
<?php }?>
</table>
</nav>
 <?php
 
                        $sub = mysql_query("SELECT * FROM stud_prog WHERE UserID ='{$_SESSION['ID']}'");
                        $subj = mysql_fetch_array($sub);
						$subject = $subj['selected_subj'];
						$chapter=$subj['selected_chap'];
						$schapter=$subj['subchap'];
 if($subject == ""||$chapter=="0"||$schapter=="0.0"){ ?>
<div class="cont">
<a href="selectlesson.php"><img src="pictures/mainlogin/book.png" width="350" height="400"> </a>	

<div class="content1">You have yet</br> start a class</div>
</div>

<?php } else { 
	$chap=$subj['selected_chap'];
	$subchap=$subj['subchap'];
$nextpage = "dcn_".$subchap.".php";
$qq=mysql_query("SELECT * FROM stud_prog WHERE UserID='{$id}'");
$info=mysql_fetch_array($qq);
$studprog=$info['subchap'];
$studchap=floor($studprog);
$ch="dcn_".$studchap;
$xx=mysql_query("SELECT COUNT(subchap) as total FROM stu_lesson WHERE UserID='{$id}' AND chap='{$studchap}'");
$xxx=mysql_fetch_assoc($xx);
$chcount=$xxx['total'];
$qqq=mysql_query("SELECT COUNT(subchap) as total1 FROM {$ch}");
$info=mysql_fetch_assoc($qqq);
$totalsub=$info['total1'];
$progressmeter = $chcount/$totalsub;
$meterperc = round((float)$progressmeter * 100 ) . '%';
$left=mysql_query("SELECT * FROM {$ch} WHERE subchap='{$studprog}'");
$lleft=mysql_fetch_array($left);
$classname=$lleft['subchap_name'];
?>		
<div class="cont">		
<a href="<?php echo $nextpage;?>"><img src="pictures/mainlogin/book.png" width="350" height="400"> </a>	

<div class="content1">Continue?</br><font style="font-size:15px;"><?php echo "Chapter ".$studprog.": ".$classname; ?></font></div>
</div>
<div class="progmeter">
<p class="progp">Progression </p>
<span style="width: <?php echo $meterperc;?>"></span>
</div>							  
                               <?php } 
                                ?> 
<div class="startnew">
<a href="selectlesson.php"><img src="pictures/mainlogin/book.png" width="350" height="400" </a>
<div class="content1">Start new?</div>
</div>

<?php } else if($identity=="teacher"){?>
 <ul class="aa">
  <li><a href="index.php">Home</a></li>
  <li><a href="uploadpdf.php?a=def">Lesson</a></li>
  <li><a href="uploadassess.php?a=def">Assessment</a></li>
 <li><a href="postannounce.php?a=def">Announcement</a></li>
    <li><a href="report.php?s=def">View Report</a></li>
</ul>

<nav class ="anc">
<table class="anc"  width="100%" border="1">
<tr> <td> <img src="pin.png" width=20 height=20> Announcement</td></tr>
<?php 
while($info = mysql_fetch_array($suc)){
$tname=$info['username'];
$i=mysql_query("SELECT * FROM logins WHERE Username ='{$tname}'");
$irow=mysql_fetch_array($i);
	?>
<tr>
<td class="anclol">
<?php 
echo "<b>".$info['title']."</b>";
echo "<br>".$info['comment'];
echo "<br><br>";
if($irow['image'] == ""){
                                        echo "<img width='30' height='30' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='30' height='30' src='pictures/".$irow['image']."' alt='Profile Pic'>";
                                }

echo $info['username']." | ".$info['date'];

?>
</tr>
</td>
<?php }?>
</table>
</nav>

<div class="lastlog1">
<img src="pictures/teacher/timer.png" width="80" height="80">
<div class="tag1"><font class="teachfont">Last active students.</font></div> </br></br>
<table class="teachtable">
<?php //for last login
$iden="student";
$t=mysql_query("SELECT * FROM logins WHERE identity ='$iden' ORDER BY lastlogin DESC limit 5");
?>
<thead><tr><th class="red">&nbsp;No.</th><th class="red">Student ID</th><th class="red">Student name</th><th class="red">Last Logged in: </th></tr></thead>
<tbody>
<?php
$cnt="1";
while($row = mysql_fetch_array($t)){ 
$lastlogin =$row['lastlogin'];
$studname=$row['Username'];
$studid=$row['UserID'];
$ppp = mysql_query("SELECT * FROM logins WHERE UserID ='{$studid}'");
$pppic = mysql_fetch_array($ppp);
echo '<tr><td>&nbsp;'.$cnt++.'</td><td><a href="report.php?s=overview&id='.$studid.'">'.$studid.'</td><td>';
if($pppic['image'] == ""){
                                        echo "<img width='40' height='40' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='40' height='40' src='pictures/".$pppic['image']."' alt='Profile Pic'>";
                                }
echo $studname.'</td><td>'.$lastlogin.'</td></tr>';

}
?></tbody></table></div>

<div class="highmark1">
<img src="pictures/teacher/trophy.png" width="80" height="80">
<div class="tag2"><font class="teachfont">Highest Assessment Score this for <?php echo date('F'); ?>. </font></div> </br></br>
<table class="teachtable">
<?php //for highest marks this month
$t=mysql_query("SELECT * FROM rank ORDER BY score DESC limit 5");
?>
<thead><tr><th class="green">&nbsp;No.</th><th class="green">Student ID</th><th class="green">Student name</th><th class="green">Total Marks </th></tr></thead>
<tbody>
<?php
$cnt="1";
while($row = mysql_fetch_array($t)){ 
$score=$row['score'];
$studid=$row['UserID'];
$x=mysql_query("SELECT * FROM logins WHERE UserID ='$studid'");
$info =mysql_fetch_array($x);
$studname=$info['Username'];
$ppp = mysql_query("SELECT * FROM logins WHERE UserID ='{$studid}'");
$pppic = mysql_fetch_array($ppp);
echo '<tr><td>&nbsp;'.$cnt++.'</td><td><a href="report.php?s=overview&id='.$studid.'">'.$studid.'</td><td>';
if($pppic['image'] == ""){
                                        echo "<img width='40' height='40' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='40' height='40' src='pictures/".$pppic['image']."' alt='Profile Pic'>";
                                }
echo $studname.'</td><td>'.$score.'</td></tr>';
}
?></tbody></table></div>

<div class="logintime1">
<img src="pictures/teacher/time.png" width="90" height="90">
<div class="tag3"><font class="teachfont"> Highest Login Time this for <?php echo date('F'); ?>. </font></div></br></br>
<table class="teachtable">
<?php //for highest login time
$iden="student";
$t=mysql_query("SELECT * FROM logins WHERE identity ='$iden' ORDER BY totallog DESC limit 5");
?>
<thead><tr><th class="blue">&nbsp;No.</th><th class="blue">Student ID</th><th class="blue">Student name</th><th class="blue">Total Logged time </th></tr></thead>
<tbody>
<?php
$cnt="1";
while($row = mysql_fetch_array($t)){ 
$logintime =$row['totallog'];
$loginhour = (int)($logintime/60);
$loginmin = $logintime % 60;
$studname=$row['Username'];
$studid=$row['UserID'];
$ppp = mysql_query("SELECT * FROM logins WHERE UserID ='{$studid}'");
$pppic = mysql_fetch_array($ppp);
echo '<tr><td>&nbsp;'.$cnt++.'</td><td><a href="report.php?s=overview&id='.$studid.'">'.$studid.'</td><td>';
if($pppic['image'] == ""){
                                        echo "<img width='40' height='40' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='40' height='40' src='pictures/".$pppic['image']."' alt='Profile Pic'>";
                                }
echo $studname.'</td><td>'.$loginhour." hour(s) ".$loginmin." minute(s)".'</td></tr>';

}
?></tbody></table>
</div>
<?php } 

?>
<button class="tgl"><</button>
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
<?php



}

else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>