<?php
include 'function.php';
$conn=logsql($dbhost,$dbuser,$dbpass);
mysql_select_db('demonist');
$delnum=$_POST["stunum"];
$delete="DELETE FROM hearthstone WHERE stuid='$delnum'";
mysql_query($delete);
echo "<script>alert('Success!');window.location.href='index.php';</script>";