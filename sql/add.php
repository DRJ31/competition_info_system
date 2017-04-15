<?php
include 'function.php';
$conn=logsql($dbhost,$dbuser,$dbpass);
mysql_select_db('demonist');//database name
$addnum=$_POST["stunum"];
$addname=$_POST["name"];
$insert="INSERT INTO hearthstone (name,stuid) VALUES ('$addname','$addnum')";
mysql_query($insert);
echo "<script>alert('Success!');window.location.href='index.php';</script>";