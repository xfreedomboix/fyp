<?php
include_once 'dbConfig.php';
if(isset($_POST['comment']))
{
    $comment=$_POST['comment'];
    $name=$_POST['username'];
	$page=$_POST['page'];
    $insert=$connect->query("insert into comments values('','$name','$comment',CURRENT_TIMESTAMP,'$page')");






header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
    echo "No Data Is set";
}

?>