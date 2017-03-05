<!DOCTYPE html>
<html>
<head>
    <title>Match</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
        var arr=new Array();
        arr=<?php
                $number1=file_get_contents("log/log.txt");
                $number1=(int)$number1;
                $number2=$number1-1;
        $path="log/array".$number1.".txt";
        $content=file_get_contents($path);
        echo $content;
        ?>;
        window.onload=function() {
            var long=arr.length;
            var r=0;
            for ( var i = 0; i < long; i++) {
               var stuname1 = document.getElementById("name" + r);
               var stunum1 = document.getElementById("stuid" + r);
                var stuname2 = document.getElementById("name" + (++r));
                var stunum2 = document.getElementById("stuid" + r);
                stuname1.value = arr[i][0];
                stunum1.value = arr[i][1];
                stuname2.value = arr[i][2];
                stunum2.value = arr[i][3];
                r++;
            }
            console.log(r);
        };
    </script>
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
    <h1>Round<?php
        $roundnum=file_get_contents("log/log.txt");
        echo $roundnum;
        ?></h1>
    <table class="table table-condensed" style="text-align: center;">
    <?php
    /*Read Array*/
    $file = fopen("log/write".$number2.".csv","r");
    while ($data = fgetcsv($file)) {
        $mainarray[] = $data;
    }
    fclose($file);
    /*write frame*/
    $content1='<tr><td>
<form action="delstu.php" method="post">
	<input type="text" name="name" class="form-control" id="name';
    $content2='" readonly="true" value="">
	<input type="text" name="stuid" class="form-control" id="stuid';
    $content3='" readonly="true" value="">
	<input type="submit" value="Delete" class="btn btn-danger btn-block">
</form>
</td><td>V.S</td>
<td><form action="delstu.php" method="post">
	<input type="text" name="name" class="form-control" id="name';
    $content4='" readonly="true" value="">
	<input type="text" name="stuid" class="form-control" id="stuid';
    $content5='" readonly="true" value="">
	<input type="submit" value="Delete" class="btn btn-danger btn-block">
</form></td>
</tr>';
    $length=count($mainarray);
    for($i=0;$i<$length;$i++){
        echo $content1.$i.$content2.$i.$content3.(++$i).$content4.$i.$content5;
    }
    ?>
</table></div>
</body>
</html>