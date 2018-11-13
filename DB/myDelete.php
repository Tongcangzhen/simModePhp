<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 1:47
 */
require_once("mysql.php");
$myId=$_POST['id'];
$query="delete from new_table where id=".$myId;
$user->query($query);
$user->close();