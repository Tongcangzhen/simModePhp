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
            $query1 = 'SELECT a.xtrans,c.name,b.name as app_name,a.createdt,a.status FROM xtrans_info a,xm_app b,xfc_contract c where a.xfc=c.xfc and a.triggerappid=b.xapp and a.xtrans='.$xtrans;
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