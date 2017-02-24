 <?php
include('connect.php');

if($_POST['id'])
{
$id=$_POST['id'];
$rid="dcn_".$id;
$sql=mysql_query("select * from $rid");
while($row=mysql_fetch_array($sql))
{
$id=$row['subchap'];
$data=$row['subchap_name'];
echo '<option value="'.$id.'">'.$data.'</option>';
}
}
?>