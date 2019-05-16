<?php
require_once "Database.php";

$conn=ConnectDatabase::getInstance()->connection();
define('MAX_ITEM', 10);

if(isset($_POST['page']))
{
	$page=$_POST['page'];
}else
{
	echo "param not found.";
	die();
}

$limit=MAX_ITEM;
$offset=($page-1) * MAX_ITEM;

$sql="SELECT * FROM medicine LIMIT $limit OFFSET $offset";

//echo $sql;

$allData=$conn->query($sql);


$data=array();
$i=0;
while($x = mysqli_fetch_assoc($allData))
{
	array_push($data,$x);
	$i=$i+1;;
}
if(empty($data))
{
 echo json_encode(array("status"=>false,"count"=>$i,"medicine_list"=>$data));
 die();
}
sleep(5);
echo json_encode(array("status"=>true,"count"=>$i,"medicine_list"=>$data),false);

?>