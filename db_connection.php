<?php
//to create function to connect shop database.....................
function connection(){
    $host='localhost';
    $user='root';
    $pass='';
    $db_name='SHOP';

    $con= new mysqli($host,$user,$pass,$db_name);
    return $con;
}

?>