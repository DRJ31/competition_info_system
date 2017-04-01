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
    mysql_select_db('demonist');
    $num=mysql_query($getnum);
    $num=mysql_fetch_row($num);
    echo ++$num[0];
    ?></h1>
    <table style="text-align: center" class="table table-striped">
        <tr>
            <th style="text-align: center">Contestant1</th>
            <th></th>
            <th style="text-align: center">Contestant2</th>
        </tr>
<?php
$result=array();
$getdata="SELECT * FROM hearthstone";
$retval=mysql_query($getdata);
if(!$retval){
    die("Could not get data");
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
    array_push($list,array($row["name"],$row["stuid"]));
}
$judge=count($list);
$long=floor($judge/2);
for ($i=0;$i<$long;$i++)
{
    do{
        $a=rand(0,count($list)-1);
        $b=rand(0,count($list)-1);
    }while($a==$b);
    array_push($result,array($list[$a],$list[$b]));
    array_splice($list,$a,1);
    if($a>$b){
        array_splice($list,$b,1);
    }
    else{
        array_splice($list,$b-1,1);
    }
}
if(count($list)==1){
    array_push($result,$list[0]);
}
$insert="INSERT INTO hearthstoneback (name,stuid,round,serial) VALUES";
$update="UPDATE counting SET number='$num[0]' WHERE type='hearthstone'";
for($j=0;$j<count($result);$j++)
{
    if($j<count($result)-1) {
        $insert=$insert."(\"".$result[$j][0][0]."\",".$result[$j][0][1].",".$num[0].",".$j."),";
        $insert = $insert."(\"" . $result[$j][1][0] . "\"," . $result[$j][1][1] . "," . $num[0] . "," . $j . "),";
        echo "<tr><td>" . $result[$j][0][0] . "</td><td rowspan='2'>V.S</td><td>" . $result[$j][1][0] . "</td></tr><tr><td>" . $result[$j][0][1] . "</td><td>" . $result[$j][1][1] . "</td></tr>";
    }
    else if($j==count($result)-1&&$judge%2==0){
        $insert=$insert."(\"".$result[$j][0][0]."\",".$result[$j][0][1].",".$num[0].",".$j."),";
        $insert = $insert."(\"" . $result[$j][1][0] . "\"," . $result[$j][1][1] . "," . $num[0] . "," . $j . ")";
        echo "<tr><td>" . $result[$j][0][0] . "</td><td rowspan='2'>V.S</td><td>" . $result[$j][1][0] . "</td></tr><tr><td>" . $result[$j][0][1] . "</td><td>" . $result[$j][1][1] . "</td></tr>";
    }
    else{
        $insert=$insert."(\"".$result[$j][0]."\",".$result[$j][1].",".$num[0].",".$j.")";
        echo "<tr><td>" . $result[$j][0] . "</td><td rowspan='2'>V.S</td><td></td></tr><tr><td>".$result[$j][1]."</td><td></td></tr>";
    }
}
$retval1=mysql_query($insert);
if(!$retval1){
    die(mysql_error());
}
mysql_query($update);
mysql_close($conn);
?>
    </table>
</div>
<br/>
</body>
</html>
