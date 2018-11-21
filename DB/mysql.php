<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/18
 * Time: 22:39
 */
//function connect()
//{
header('Content-type: text/html; charset=utf-8');
    $user = new mysqli("localhost", "localuser", "toch1997za1.","jinghang");
    //mysqli_query($user, ‘set names utf8');
    if ($user->connect_error) {
        die("connection failed: " . $user->connect_error);
        echo $user->connect_error;
    }
//    return $link;
//}

//function insert($table,$array,$link){
//    $keys=join(",",array_keys($array));
//    $vals="'".join("','",array_values($array))."'";
//    $sql="insert {$table}($keys) values({$vals})";
//    if ($link->query($sql) === true) {
//        echo "insert success";
//    } else {
//        echo("insert failed: " . $sql . "<br>" . $link->error);
//    }
//}
