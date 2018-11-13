<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 11:14
 */
require_once ("mysql.php");
$mname=$_POST['mname'];
$age=$_POST['age'];
$job=$_POST['job'];
$query='update new_table set mname = \''.$mname.'\',age =  '.$age.',job=\''.$job.'\' where mname=\''.$mname.'\'';
$user->query($query);
$user->close();
