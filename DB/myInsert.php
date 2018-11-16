<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 1:46
 */
require_once("mysql.php");
$xfc=$_POST['xfc'];
$term=$_POST['term'];
$appid=$_POST['appid'];
//$xtrans = $_POST['xtrans'];
$param = $_POST['param'];
$query = "insert into work_data (xfc,term,appid,param) VALUES ('$xfc','$term','$appid','$param')";
$user->query($query);
$id = $user->insert_id;
echo 'id:'.$id;
setcookie("id", $id);
$user->close();
