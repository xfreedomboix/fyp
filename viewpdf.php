<?php    
include('connect.php');
session_start(); 
$id = $_SESSION['ID'];?>

<html>
  <head>
       <title> View PDF </title>
	   	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	   <link rel="stylesheet" href="css/viewpdf.css" >
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
  </head>

  
<body>
<?php
  
if (isset($_SESSION['user'])){
$subj = mysql_query("SELECT * FROM stud_prog WHERE UserID ='{$_SESSION['ID']}'");
$sub = mysql_fetch_array($subj);    
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
</ul>
<?php 	
	$pdfid=@$_GET['v'];
	$pdf = mysql_query("SELECT * FROM dcn_99 WHERE subchap ='{$pdfid}'");
	$pdfp = mysql_fetch_array($pdf);
	$nextpage = "viewer.html?file=pdf/".$pdfp['pdfpath'];
	$downloadpdf = "pdf/".$pdfp['pdfpath'];
	?> 
	<div class="chselect">
	<div class="styled-select blue rounded">
<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <option selected="selected" value="">View Other PDF</option>
<?php 
$m=mysql_query("SELECT * FROM dcn_99");
while($row = mysql_fetch_array($m)){
$pdfname=$row['subchap_name'];
$subchap=$row['subchap'];?>
<option value="viewpdf.php?v=<?php echo $subchap;?>"><?php echo $pdfname; ?></option>

<?php	

 }?>  

</select></div></div>
<div class="bg">
<img src="pictures/pdf/background.png" width="1210" height="760">	
<div class="pdfdisplay">
<img src="pictures/pdf/pdficon.png" width="200" height="250">
<p style="position:absolute; top:230; left:10;width:550;"> Pdf name: </br><?php echo $pdfp['subchap_name'];?> </p>
<p style="position:absolute; top:0; left:455;width:450;"> Pdf description:</br> <?php echo $pdfp['pdfdescp'];?> </p>
<p style="position:absolute;top:400;"><a  href="<?php echo $nextpage;?>" target="_blank"><img src="pictures/pdf/pdfview.png" width="100" height="100"></a></p>
 <p style="position:absolute;top:400;left:100;"><a  href="<?php echo $downloadpdf;?>" download><img src="pictures/pdf/pdfdl.png" width="100" height="100"></a> </p>
</div>
</div>
<?php
}

else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>