<?php
/**
 * Created by PhpStorm.
 * User: 93441
 * Date: 2018/11/23
 * Time: 10:19
 */
require_once("../DB/mysql.php");
set_time_limit(0);
session_write_close();
$i=0;
while (true){
    if (!connection_aborted()) {
        sleep(1);
        $query = 'SELECT a.xtrans,c.name,b.name as app_name,a.createdt,a.status FROM xtrans_info a,xm_app b,xfc_contract c where a.xfc=c.xfc and a.triggerappid=b.xapp and a.status=00 order by a.createdt desc limit 10';
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