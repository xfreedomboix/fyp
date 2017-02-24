<?php    
include('connect.php');
session_start(); 
$id = $_SESSION['ID'];?>

<html>
  <head>
       <title> Lesson Selection </title>
	   	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/selectmaterial.css" >
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
$(document).ready(function()
{
$("#chap").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "selectch.php",
data: dataString,
cache: false,
success: function(html)
{
$("#subchap").html(html);
}
});

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
  if(isset($_POST['submit'])){
	$chap=$_POST['chap'];
	$subchap=$_POST['subchap'];
	$con = mysqli_connect("localhost","root","","user_login");
	if($chap=="99"){
		header("Location: viewpdf.php?v=".$subchap);
	}
	else {
    $q = mysqli_query($con,"UPDATE stud_prog SET selected_chap = '{$chap}' WHERE UserID = '".$_SESSION['ID']."'");
	$w = mysqli_query($con,"UPDATE stud_prog SET subchap = '{$subchap}' WHERE UserID = '".$_SESSION['ID']."'");
	
	$nextpage = "dcn_".$subchap.".php";
	header("Location: ".$nextpage);
  }
  }
if (isset($_SESSION['user'])){
$subj = mysql_query("SELECT * FROM stud_prog WHERE UserID ='{$_SESSION['ID']}'");
$sub = mysql_fetch_array($subj);    

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


<?php

if($sub['selected_subj'] =="dcn"){
 
	?>
<img class="bg" src="pictures/select/background.png" width="1920" height="900">
<img class="book" src="pictures/select/frame.png" width="1100" height="600">	
<form action="" method="post">
<div class="title1">	
Select a chapter:	
</div>
<div class="firstselect">
Chapter: </br></br>
<div class="styled-select blue rounded">
<select name="chap" class="form-control"  id="chap" style="font-family:arial">
<option selected="selected">--Select chapter--</option>
<?php
	$ch = mysql_query("SELECT * FROM dcn");
	while($row = mysql_fetch_array($ch))  
{
$id=$row['chap'];
$data=$row['chap_name'];
echo '<option value="'.$id.'">'.$data.'</option>';
} ?>
</select>
</div>
</div>
<div class="secselect">
Subchapter: </br></br>
<div class="styled-select blue rounded">
<select name="subchap"  class="form-control selcls" id="subchap" style="font-family:arial">
<option selected="selected"><font class="aa">--Select subchapter--</font></option>
</select>
</div>
 </div>
 <div class="submitselect">
 <input class="submit" type="submit" name="submit" value="Submit">
	</div>
</form>

<?php

}
else if($sub['selected_subj']=="tcp"){
	echo "fuck tcp la";
}


}

else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>