<?php
/**
 * Created by PhpStorm.
 * User: 93441
 * Date: 2018/11/23
 * Time: 13:38
 */
require_once("../DB/mysql.php");
set_time_limit(0);
session_write_close();
$i=0;
while (true){
    if (!connection_aborted()) {
        sleep(0.5);
        $query = 'SELECT * FROM xtrans_log order by createdt desc limit 10;';
        $result = $user->query($query);

        $jsonArray=array();
        while($rows=$result->fetch_assoc())
        {
            $xtrans=$rows['xtrans'];
            $coordtype=$rows['coordtype'];
            $instid = $rows['instid'];

            mysqli_query($user,'set names utf8');
            switch ($coordtype) {
                case "Datasource":
                    $query1='select a.instid, a.xtrans,a.createdt,a.xstatus,b.name as xfc_name,a.operation,a.coordtype ,d.name as coord_name from xtrans_log a,xfc_contract b,xfc_datasource c,xm_ds d where a.xfc=b.xfc and a.coordentityid=c.instid and c.xds=d.xds and a.instid ='.$instid;
                    break;
                case "Application":
                    $query1 = 'select a.instid, a.xtrans,a.createdt,a.xstatus,b.name as xfc_name,a.operation,a.coordtype ,c.name as coord_name from xtrans_log a,xfc_contract b,xm_app c where a.xfc=b.xfc and a.coordentityid=c.xapp and a.instid = ' . $instid;
                    break;
                case "Fusion Container":
                    $query1 = 'select a.instid, a.xtrans,a.createdt,a.xstatus,b.name as xfc_name,a.operation,a.coordtype ,c.name as coord_name from xtrans_log a,xfc_contract b,xm_model c where a.xfc=b.xfc and a.coordentityid=c.xmodel and a.instid = ' . $instid;
            }
           // $query1 = 'SELECT a.xtrans,c.name,b.name as app_name,a.createdt,a.status FROM xtrans_info a,xm_app b,xfc_contract c where a.xfc=c.xfc and a.triggerappid=b.xapp and a.xtrans='.$xtrans;
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
