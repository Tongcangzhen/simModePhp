<?php
/**
 * Created by PhpStorm.
 * User: 93441
 * Date: 2018/11/12
 * Time: 11:16
 *
 */
require_once("../DB/mysql.php");
set_time_limit(0);
session_write_close();
$i=0;
while (true){
    if (!connection_aborted()) {
        sleep(0.5);
        $query = 'SELECT * FROM work_data where xtrans is not null ';
        $result = $user->query($query);

        $jsonArray=array();
        while($rows=$result->fetch_assoc())
        {
           $xtrans=$rows['xtrans'];
            $query1 = 'SELECT * FROM xtrans_info where xtrans = '.$xtrans;
            $result1 = $user->query($query1);
            while ($rows1 = $result1->fetch_assoc()) {
                array_push($jsonArray,$rows1);
            }
        }
        echo json_encode($jsonArray);
    }
    if(!connection_aborted()){
        $user->close();
        exit();
    }
}