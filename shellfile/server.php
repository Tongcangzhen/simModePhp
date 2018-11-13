<?php
require_once ("mysql.php");
$port;
while (1) {
    $aport = rand(7000, 8000);
    $query="select * from portlist where port= ".$aport." limit 1";
    $arr=$user->query($query);
    $rst=$arr->fetch_assoc();
    if (!$rst) {
        $port=$aport;
       break;
    }

}

if (isset($_POST['action']))
{
    switch($_POST['action'])
    {
        case "btn1":btn1();break;
        case "btn2":btn2();break;
        default:break;
    }
}

function btn1()
{
    global $user,$port;

   // $a=system('sudo docker run -p '.$port.':80 -v /docker-demo:/var/www/html -d phpwithmysql');
   $a=rand(9999,99999);

    $query = 'insert into portlist (port,docker_id) VALUES (\''.$port.'\',\''.$a.'\')';
    $user->query($query);
    $user->close();
    echo "localhost:".$port;
}
function btn2()
{
    echo "hello 按钮2";
}

?>