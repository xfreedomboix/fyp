<?php
  session_start();
include('connect.php');

if(isset($_POST['login'])) {
	$uid=$_POST['loginid'];
	$pass5=$_POST['pass'];
	$pass= md5($pass5);
	$sql =mysql_query("SELECT * FROM logins WHERE UserID='$uid'");
	$db= mysql_fetch_array($sql);
	$UID1 = $db['UserID'];
	$pass1 =$db['Password'];
	$uname=$db['Username'];
	$identity=$db['identity'];
	$email=$db['email'];
  if($uid==$UID1 && $pass==$pass1){
  $_SESSION['starttime']= time();
  $_SESSION['user']= $uname;
  $_SESSION['ID']=$UID1;
  $_SESSION['identity']=$identity;
  $_SESSION['email']=$email;


header("Location: index.php");
}


else{
    echo '<script language="javascript">';
  echo 'alert("Invalid ID or Password. Please try again.");';
   echo 'window.location= "mainlogin.html";';

  echo '</script>';

  }

}
?>