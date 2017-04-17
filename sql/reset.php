
<?php
include 'function.php';
$conn=logsql($dbhost,$dbuser,$dbpass);
mysql_select_db('used');
$getnum="SELECT * FROM counting WHERE type='hearthstone'";
$num=mysql_query($getnum);
$num=mysql_fetch_row($num);
$delete="DELETE FROM hearthstoneback WHERE round='$num[0]'";
$num[0]--;
$reset="UPDATE counting SET number='$num[0]' WHERE type='hearthstone'";
mysql_query($delete);
mysql_query($reset);
mysql_close($conn);
echo "<script>alert('Success!');window.location.href='index.php';</script>";
