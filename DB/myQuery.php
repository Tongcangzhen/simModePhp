<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 1:54
 */
require_once("mysql.php");
$name=$_POST['mname'];
$age=$_POST['age'];
$job=$_POST['job'];
$query="select * from new_table where 1=1 ";
if ($name!="")
{
    $query.=' and mname=\''.$name.' \' ';
}if ($age!="")
{
    $query.= 'and  age = ' .$age;
}if ($job!="")
{
    $query.=' and  job =\''.$job.'\'';
}
$result = $user->query($query);

$jsonArray=array();
while($rows=$result->fetch_assoc())
{
    array_push($jsonArray,$rows);
}
echo json_encode($jsonArray);
$user->close();
