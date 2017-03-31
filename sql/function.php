<?php
$list=array();
$dbhost='localhost:3306';
$dbuser='demonist';
$dbpass='008691';
function logsql($dbhost,$dbuser,$dbpass){
    $conn=mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$conn){
        die("Could not connect");
    }
    return $conn;
}