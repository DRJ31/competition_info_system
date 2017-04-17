<html>
<head>
    <title>Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Contestant System</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container" style="margin-top: 80px">
<h1>Round<?php
    include 'function.php';
    $conn=logsql($dbhost,$dbuser,$dbpass);
    $getnum="SELECT * FROM counting WHERE type='hearthstone'";
    mysql_select_db('used');
    $num=mysql_query($getnum);
    $num=mysql_fetch_row($num);
    $number=$_POST["number"];
    if($number>$num[0]){
        die("<script>alert('Haven\'t matched!');window.location.href='index.php';</script>");
    }
    echo $number;
    ?></h1>
    <table style="text-align: center" class="table table-striped">
        <tr>
            <th style="text-align: center">Contestant1</th>
            <th></th>
            <th style="text-align: center">Contestant2</th>
        </tr>
        <?php
$getdata="SELECT * FROM hearthstoneback WHERE round='$number'";
$retval=mysql_query($getdata);
if(!$retval){
    die("Could not get data");
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
    array_push($list,array($row["name"],$row["stuid"],$row["serial"]));
}
$long=ceil(count($list)/2);
for($i=0;$i<$long;$i++){
    $arr=array();
    for($j=0;$j<count($list);$j++){
        if($list[$j][2]==$i){
            array_push($arr,$list[$j]);
        }
    }
    if(count($arr)==2) {
        echo "<tr><td>" . $arr[0][0] . "</td><td rowspan='2'>V.S</td><td>" . $arr[1][0] . "</td></tr><tr><td>" . $arr[0][1] . "</td><td>" . $arr[1][1] . "</td></tr>";
    }
    else{
        echo "<tr><td>" . $arr[0][0] . "</td><td rowspan='2'>V.S</td><td></td></tr><tr><td>" . $arr[0][1] . "</td><td></td></tr>";
    }
}
?>
    </table>
</div>
</body>
</html>
