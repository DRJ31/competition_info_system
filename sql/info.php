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
    <table style="text-align: center" class="table table-striped">
        <tr>
            <th style="text-align: center">Name</th>
            <th style="text-align: center">stunum</th>
        </tr>
        <?php
        include 'function.php';
        $conn=logsql($dbhost,$dbuser,$dbpass);
        $getdata="SELECT * FROM hearthstone";
        mysql_select_db('demonist');
        $retval=mysql_query($getdata);
        if (!$retval){
            die(mysql_error());
        }
        while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
        {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['stuid'] . "</td></tr>";
        }
?>
    </table>
</div>
</body>
</html>