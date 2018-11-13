<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 10:31
 */
require_once("../DB/mysql.php");
set_time_limit(0);
session_write_close();
$i=0;
while (true){
    if (!connection_aborted()) {
        sleep(1);
        $query = 'SELECT * FROM new_table';
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
