<?php
include_once 'dbConfig.php';
if(isset($_POST['reply']))
{
    $comment=$_POST['reply'];
    $name=$_POST['username'];
	$cid=$_POST['cid'];
    $insert=$connect->query("insert into subcomments values('','{$cid}','$name','$comment',CURRENT_TIMESTAMP)");

 



header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
    echo "No Data Is set";
}

?>