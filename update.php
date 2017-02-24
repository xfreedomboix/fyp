<?php
include('connect.php');
session_start();
$id=$_SESSION['ID'];
$sesid= session_id();
$con= new mysqli('localhost','root','','user_login');

//remove quiz

if(@$_GET['a']== 'rm' && $_SESSION['identity']=='teacher') {
$eid=@$_GET['eid'];
$result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}
$r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');

echo '<script>alert("Assessment successfuly removed!"); window.location="uploadassess.php?a=def";</script>';
}


//add quiz

if(@$_GET['a']== 'addassess' && $_SESSION['identity']=='teacher') {
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$total = $_POST['total'];
$correct = 100/$total;
$tag = $_POST['tag'];
$id=uniqid();
$q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('','$id','$name' , '$correct' ,'$total','$tag', NOW())");

header("location:uploadassess.php?a=1&step=2&eid=$id&n=$total");
}


//add question

if(@$_GET['a']== 'addqns' && $_SESSION['identity']=='teacher') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];

for($i=1;$i<=$n;$i++)
 {
 $qid=uniqid();
 $qns=$_POST['qns'.$i];
$q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')");
$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')");
$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')");
$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')");
$aa=$_POST['ans'.$i];
switch($aa)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

}

echo '<script>alert("Assessment successfuly uploaded!"); window.location="uploadassess.php?a=def";</script>';
}


//quiz start
if(@$_GET['a']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$qid=@$_GET['qid'];

$q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
$w=mysqli_query($con,"INSERT INTO answer_record VALUES('$sesid','$eid' ,'$qid','$ans')");
while($row=mysqli_fetch_array($q) ) //load correct answer
{
$ansid=$row['ansid'];
}
if($ans == $ansid) //if user answer correct
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
while($row=mysqli_fetch_array($q) ) //fetch score addition
{
$correct=$row['correct'];
}
if($sn == 1) //if its first question
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$id','$eid' ,'0','0','0','0',NOW())")or die('Error');

}
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND UserID='$id' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['correct'];
}
$r++;
$s=$s+$correct;
$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  UserID = '$id' AND eid = '$eid'")or die('Error124');

} 
else // if user answer wrong
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

if($sn == 1) //if its 1st question
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$id','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
}
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND UserID='$id' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$q=mysqli_query($con,"UPDATE `history` SET `level`=$sn,`wrong`=$w, date=NOW() WHERE  UserID = '$id' AND eid = '$eid'")or die('Error147');
}
if($sn != $total) //while not last question
{
$sn++;
header("location:assess.php?a=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
}
else //else last question+ admin
{
	$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND UserID='$id'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"SELECT * FROM rank WHERE UserID='$id'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($con,"INSERT INTO rank VALUES('$id','$s',NOW(),'1')")or die('Error165');
}
else //already got record in rank
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
$num=$row['count'];
}
$sun=$s+$sun;
$num=$num+1;
$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW(),`count`=$num WHERE UserID= '$id'")or die('Error174');
}
$w=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'");
$ww=mysqli_fetch_array($w);
$quizid= $ww['id'];
$q=mysqli_query($con,"INSERT INTO stu_assess VALUES ('$id','$eid','$s',NOW(),'$quizid')");
header("location:assess.php?a=result&eid=$eid");
}
}

//restart quiz
if(@$_GET['a']== 'quizre' && @$_GET['step']== 25 ) {
$eid=@$_GET['eid'];
$n=@$_GET['n'];
$t=@$_GET['t'];
$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND UserID='$id'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND UserID='$id' " )or die('Error184');
header("location:assess.php?a=quiz&step=2&eid=$eid&n=1&t=$t");
}

//review question
if(@$_GET['a']== 'quiz' && @$_GET['step']== 99) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$qid=@$_GET['qid'];

if($sn != $total) //while not last question
{
$sn++;
header("location:assess.php?a=review&eid=$eid&n=$sn&t=$total")or die('Error152');
}
else //else last question+ admin
{
header("location:assess.php?a=result&eid=$eid");
}
}
if(@$_GET['a']== 'exit'){
$eid=@$_GET['eid'];
$q=mysqli_query($con,"DELETE FROM `answer_record` WHERE eid='$eid' AND ses_id='$sesid' " )or die('Error184');
header("location:assess.php?a=1");
}
?>



