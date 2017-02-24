<?php    
include('connect.php');
session_start(); 
$id = $_SESSION['ID'];?>

<html>
  <head>
       <title> Game </title>
	 	<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
	   <link rel="stylesheet" href="css/mainpagecss.css" >
	    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
	   <link  rel="stylesheet" href="css/game.css"/>
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
                title: "Fun",
                m4a: "music/game.m4a",
       
              }).jPlayer("play");
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
			loop: true,
						         

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
<div class="puzzle">
<iframe src='https://en.educaplay.com/en/learningresources/2800189/html5/dcn_puzzle.htm' width='1200' height='725' frameborder='0'></iframe>
</div>
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
<?php }
else{

echo '<script>alert("Please login!"); window.location= "mainlogin.html";</script>';

}


?>


</body>