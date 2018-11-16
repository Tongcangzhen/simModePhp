<?php
/**
 * Created by PhpStorm.
 * User: 93441
 * Date: 2018/11/13
 * Time: 14:23
 */
require_once("mysql.php");
set_time_limit(0);
session_write_close();
$i=0;
while (true){
    if (!connection_aborted()) {
        sleep(1);
        $id = $_COOKIE["id"];
        $query = 'SELECT * FROM result_data where work_id = '.$id;
        $result = $user->query($query);
        $jsonArray=array();
        while($rows=$result->fetch_assoc())
        {
            array_push($jsonArray,$rows);
        }
        echo json_encode($jsonArray);
    }
    if(!connection_aborted()){
        $user->close();
        exit();
    }
}