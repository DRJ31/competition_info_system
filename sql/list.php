<html>
<head>
    <title>Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">Contestant System</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container" style="margin-top: 80px">
    <h1>Round<?php $roundnum=$_POST["round"];echo $roundnum;?></h1>
    <table style="text-align: center" class="table table-striped">
        <tr>
            <th style="text-align: center">Name</th>
            <th style="text-align: center">stunum</th>
        </tr>
<?php
include 'function.php';
$conn=logsql('localhost:3306','demonist','008691');
$getnum="SELECT number FROM counting WHERE type='hearthstone'";
$getdata="SELECT * FROM hearthstone WHERE round='$roundnum'";
mysql_select_db('demonist');
$retval=mysql_query($getdata);
if(!$retval){
    die("Could not get data");
}
$num=mysql_query($getnum);
$num=mysql_fetch_row($num);
if($roundnum>$num[0]){
    echo "<script>alert('Haven\'t matched');window.location.href='index.html';</script>";
}
else {
    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
        echo "<tr><td>" . $row['englishname'] . "</td><td>" . $row['stuid'] . "</td></tr>";
    }
}
?>
    </table>
</div>
</body>
</html>
