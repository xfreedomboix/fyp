<?php    
include('connect.php');
session_start(); 
$id = $_SESSION['ID'];
$con = mysqli_connect("localhost","root","","user_login");
$chap="3";
$subchap="3.1";
$q = mysqli_query($con,"UPDATE stud_prog SET selected_chap = '{$chap}' WHERE UserID = '".$_SESSION['ID']."'");
$w = mysqli_query($con,"UPDATE stud_prog SET subchap = '{$subchap}' WHERE UserID = '".$_SESSION['ID']."'");
$check =mysql_query("SELECT * FROM stu_lesson WHERE UserID='{$_SESSION['ID']}' AND subchap='{$subchap}'");
$check1=mysql_fetch_array($check);
if(!is_array($check1)){
	$q = mysqli_query($con,"INSERT  INTO `stu_lesson` (`UserID`, `chap`, `subchap`)
                VALUES ('{$id}', '{$chap}','{$subchap}')");
	
}
?>

<html>
  <head>
       <title> Chapter 3.1 Digital Transmission Mode </title>
	 	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	  <link rel="stylesheet" href="css/dcn_1.0.css" >
	   <link  rel="stylesheet" href="css/bootstrap.min.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>

<script type="text/javascript">//page navigation jscript
$(document).ready(function(){
    $('#page a').each(function(){
        id = $(this).attr('href');
        id = id.substring(id.lastIndexOf('/'));
        id = id.substring(0,id.indexOf('.'));
        $(this).attr('rel',id);
    });
    $('#one').show();
    $('#page a').click(function(e){
        e.preventDefault();
        $('.content').hide();
        $('#'+$(this).attr('rel')).show();
        location.hash = '#!/'+$(this).attr('rel');
        return false;
    });
});

</script>
	   <?php //freichat
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
	<!-- Below is jplayer section-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
	<link type="text/css" href="assets/css/themicons.css" rel="stylesheet" media="all">
	<link type="text/css" href="assets/css/style.css" rel="stylesheet" media="all">
	  
<script type="text/javascript">
        $(document).ready(function(){
          $("#jquery_jplayer_1").jPlayer({
            ready: function () {
              $(this).jPlayer("setMedia", {
                title: "Sad music",
                m4a: "music/1.m4a",
       
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
<!-- jplayer section ended --> 
</head>
<body>
<?php
if (isset($_SESSION['user'])){ //check if logged in
$username = $_SESSION['user'];
$identity = $_SESSION['identity'];
?>





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
	
  <li><a href="Logout.php">Sign Out</a></li>
</ul>



<div id="one" class="content">
<div class="prevpg">
<a href="dcn_3.0.php"><img src="pictures/prev.png" width="200" height="200"></a>
</div>
<div id="page">
<p style="font-size:25px;position:absolute;top:-20;left:720;"> Chapter 3.1 Transmission Mode </p>
<a href="one.html"><img src="pictures/dcn3/head.png" style="position:absolute; top:50;left:700;"></a>
<a href="two.html"><img src="pictures/dcn3/paral.png"  style="position:absolute; top:160;left:655;"></a>
<a href="three.html"><img src="pictures/dcn3/serial.png"  style="position:absolute; top:160;left:1001;"></a>
<a href="four.html"><img src="pictures/dcn3/sync.png"  style="position:absolute; top:300;left:957;"></a>
<a href="five.html"><img src="pictures/dcn3/async.png"  style="position:absolute; top:300;left:1125;"></a>
</div>
<div style="position:absolute; top:410;left:580;">
<p style="font-size:20px"> <img src="pictures/dcn1/tick.png" width="20" height="20">&nbsp;Data Transmission is divided into serial and parallel transmission. (click on image to learn more)</p>
</div>
</div>
</div>


<div id="two" class="content">
<p style="font-size:25px;position:absolute;top:0;left:580;"> Parallel transmission: </p>
<img src="pictures/dcn3/paral1.png" width="700" height="300" style="position:absolute; top:80;left:550;">
<div style="position:absolute; top:390;left:580;">
<p style="font-size:25px;"><img src="pictures/dcn1/tick.png" width="20" height="20">&nbsp; In parallel transmission, we can send data n bits at a time.</br> The advantage of parallel transmission is speed; whereas the disadvantage is cost.
</p>

</div>
</div>

<div id="three" class="content">
<p style="font-size:25px;position:absolute;top:0;left:580;"> Serial transmission: </p>
<img src="pictures/dcn3/serial1.png" width="700" height="300" style="position:absolute; top:80;left:550;">
<div style="position:absolute; top:390;left:580;">
<p style="font-size:25px;"><img src="pictures/dcn1/tick.png" width="20" height="20">&nbsp; In serial transmission one bit follows another, so we need only one communication </br> channel rather than n to transmit data between two communicating devices.

</p>

</div>
</div>

<div id="four" class="content">
<p style="font-size:25px;position:absolute;top:0;left:580;"> Synchronous transmission: </p>
<img src="pictures/dcn3/sync1.png" width="700" height="300" style="position:absolute; top:80;left:550;">
</div>

<div id="five" class="content">
<p style="font-size:25px;position:absolute;top:0;left:580;"> Asynchronous transmission: </p>
<img src="pictures/dcn3/async1.png" width="700" height="300" style="position:absolute; top:80;left:550;">

<div class="nextpg">
<a href="dcn_3.2.php"><img src="pictures/next.png" width="200" height="200"></a>
</div>
</div>

<div id="page" class="page">
    Page <a href="one.html">1</a> -
    <a href="two.html">2</a> -
	<a href="three.html">3</a> -
	<a href="four.html">4</a> -
	<a href="five.html">5</a> -

</div>
<div class="cmt" style="left:1000"> <a href="#comment"> Discussions</a> </div>

<div class="chselect">
<select id="gray" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <option selected="selected" value="">Go To</option>
<?php 
$m=mysql_query("SELECT * FROM dcn");
while($row = mysql_fetch_array($m)){
$chname=$row['chap_name'];
$chid=$row['chap'];
$subchap="dcn_".$chid;
?>
<optgroup label="<?php echo $chname;?>">
<?php	
$y=mysql_query("SELECT * FROM $subchap");
while($row = mysql_fetch_array($y)){
	$schapname=$row['subchap_name'];
	$subid=$row['subchap'];
	$schapid="dcn_".$subid.".php";
	?>
<option value="<?php echo $schapid;?>"><?php echo $schapname; ?></option> 
<?php } }?>  
</optgroup> 
</select></div>


<div class="lol" id="comment">
<form action='post_comment.php' method='post'>
<textarea id="comment" name="comment" placeholder="Write Your Comment Here....."></textarea>
<input type="hidden" name="username" value="<?php echo $_SESSION['user'];?>">
<input type="hidden" name="page" value="<?php echo $_SERVER['REQUEST_URI'];?>">
<br>
<input type="submit" class="commentbutton" value="Comment">

</form>

<div align="center" id="all_comments">
    
	<?php
   include_once 'dbConfig.php';
    $comm = $connect->query("select * from comments where page = '{$_SERVER['REQUEST_URI']}' order by post_time desc limit 5");
	            
                        
    while($row=$comm->fetch_array(MYSQLI_ASSOC))
    {
        $name=$row['name'];
        $comment=$row['comment'];
        $time=$row['post_time'];
		$cid=$row['id'];
		           $cp = mysql_query("SELECT * FROM logins WHERE Username ='{$name}'");
                        $cpic = mysql_fetch_array($cp);
 
		
        ?>

        <div class="comment_div">
            <p class="name"><?php if($cpic['image'] == ""){
                                        echo "<img width='30' height='30' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='30' height='30' src='pictures/".$cpic['image']."' alt='Profile Pic'>";
                                }
                                ?> <?php echo $name;?> posted on: <?php echo $time;?></p>
            <p class="comment"><?php echo $comment;?></p>
 
        </div>
		<div class="kappa1">
		<div>
<form action="post_reply.php" method="post">
<textarea style="width:390px;height:50px" id="reply" name="reply" placeholder="Write a reply"></textarea><br />
<input type="hidden" name="username" value="<?php echo $_SESSION['user'];?>">
<input type="hidden" name="cid" value="<?php echo $cid;?>">
<input type="submit" class="replybutton" value=" Reply "/>
</form>
</div>
		<?php $scomm = $connect->query("select * from subcomments where cid = '{$cid}' order by post_time desc limit 2 ");
	
 
            
		while($row=$scomm->fetch_array(MYSQLI_ASSOC))
    {
	
        $name=$row['name'];
        $comment=$row['comment'];
        $time=$row['post_time'];
		$cid=$row['cid'];
		     $cp = mysql_query("SELECT * FROM logins WHERE Username ='{$name}'");
                        $cpic = mysql_fetch_array($cp);
        ?>

        <div class="kappa">
            <p class="name"> <?php if($cpic['image'] == ""){
                                        echo "<img width='30' height='30' src='pictures/default.png' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='30' height='30' src='pictures/".$cpic['image']."' alt='Profile Pic'>";
                                }
                                ?> <?php echo $name;?> posted on: <?php echo $time;?></p>
            <p class="comment"><?php echo $comment;?></p>
 
        </div>

        <?php
    }?>
		</div>
        <?php
    }
    ?>
</div>
</div>


<button class="tgl"><</button>
	<div class="playerlocation" id="playerlocation" >		

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