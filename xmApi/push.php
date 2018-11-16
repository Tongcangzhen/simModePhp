<?php
/**
 * Created by PhpStorm.
 * User: 93441
 * Date: 2018/11/13
 * Time: 9:47
 */
require_once("../DB/mysql.php");
$work_id=$_POST['work_id'];
$result_txt=$_POST['result_txt'];
$query = "insert into result_data (work_id,result_txt) VALUES ('$work_id','$result_txt')";
$user->query($query);
$query1="delete from work_data where id=".$work_id;
$user->query($query1);
$user->close();