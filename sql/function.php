<?php
$list=array();
function logsql($dbhost,$dbuser,$dbpass){
    $conn=mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$conn){
        die("Could not connect");
    }
    return $conn;
}