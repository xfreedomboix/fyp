<?php
include('connect.php');
session_start();
$uid = $_SESSION['ID'];
	$totallogin = ( time() -$_SESSION['starttime'])/60;
	$gold=floor($totallogin);
	$earnedexp=(floor($totallogin))*2;
	$aa = mysql_query("SELECT * FROM logins WHERE UserID='$uid'");
	$sql= mysql_fetch_array($aa);
	$logintime = $sql['totallog'];
    $existgold=$sql['gold'];
	$finalgold = $existgold+$gold;
	$finallogin = $logintime +$totallogin;
	$exp=$sql['experience'];
	$totalexp=$exp+$earnedexp;
	$levelup = (int)($totalexp/1000);
	$leftoverexp = $totalexp % 1000;
	$currentlevel=$sql['level'];
	$finallevel=$currentlevel+$levelup;
	$insert = "UPDATE `logins` SET `totallog` = '{$finallogin}',`gold`='{$finalgold}',`lastlogin`=NOW(),`experience`='{$leftoverexp}',`level`='{$finallevel}' WHERE `logins`.`UserID`='{$uid}'"; 
	$result = mysql_query($insert);
    $_SESSION['user'] = NULL;
    $_SESSION['ID'] = NULL;
    $_SESSION['identity']=NULL;
unset($_SESSION['user']); 
unset($_SESSION['ID']); 
unset($_SESSION['identity']);
$sql = mysql_query("DELETE FROM frei_session where session_id = '$uid'");
echo '<script>alert("You are logged out!"); window.location= "mainlogin.html";</script>';

?>