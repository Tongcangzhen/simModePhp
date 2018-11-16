<?php
/**
 * Created by PhpStorm.
 * User: 93441
 * Date: 2018/11/13
 * Time: 9:47
 */
require_once("../DB/mysql.php");
$query = "select * from work_data;";
$result = $user->query($query);
$jsonArray=array();
while($rows=$result->fetch_assoc())
{
    array_push($jsonArray,$rows);
}
echo json_encode($jsonArray);
$user->close();