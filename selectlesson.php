<?php    
include('connect.php');
session_start(); 
$id = $_SESSION['ID'];?>

<html>
  <head>
       <title> Subject Selection </title>
	   	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	   		<link rel="stylesheet" href="css/selectmaterial.css" >
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

        if(isset($_POST['submit'])){
			$subject = $_POST['subject'];
			
                $con = mysqli_connect("localhost","root","","user_login");
                $q = mysqli_query($con,"UPDATE stud_prog SET selected_subj = '{$subject}' WHERE UserID = '".$_SESSION['ID']."'");
				header("Location: selectchapter.php");
		}
		
				} ?>
  
<body>
<?php
if (isset($_SESSION['user'])){

$username = $_SESSION['user'];
$identity = $_SESSION['identity'];
?>


<ul class="aa">
  <li><a href="index.php">Home</a></li>
  <li><a href="selectchapter.php">Lesson</a></li>								
  <li><a href="assess.php?a=1">Assessment</a></li>
   <li><a href="musicshop.php">Music</a></li>
   <li><a href="Logout.php">Sign Out</a></li>
</ul>
<img class="bg" src="pictures/select/background.png" width="1920" height="900">
<img class="book" src="pictures/select/frame.png" width="1100" height="600">
<img class="point" src="pictures/select/point.png" width="300" height="200">
<form action="" method="post">
<div class="title1">
Select desired subject:
</div>
<div class="secselect">
</br></br>
<div class="styled-select blue rounded">
<select id="subject" name="subject" style="font-family:arial">
	<option selected="selected">--Select Subject--</option>
    <option value="dcn">Data Commn and Networking</option>
    <option value="tcp">TCP IP Prog</option>
  </select> </div>
</div>

   <div class="submitselect" style="margin-top: 450;">
  <input class="submit" style="padding:15px 35px;" type="submit" name="submit" value="Submit">
  </div>
</form>


<?php



}

else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>