<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 1:00
 */
require_once("mysql.php");
$query = 'SELECT * FROM new_table';
$result = $user->query($query);

$jsonArray=array();
while($rows=$result->fetch_assoc())
{
    array_push($jsonArray,$rows);
}
echo json_encode($jsonArray);
$user->close();
