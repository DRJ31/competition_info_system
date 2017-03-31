<html>
<head>
    <title>Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php
    $num=$_POST["round"];
    $restrict=file_get_contents("log/log.txt");
    $restrict=(int)$restrict;
    $num=(int)$num;
    /*Read Array*/
    if($num<=$restrict) {
    $file = fopen('log/result'.$num.'.csv','r');
    while ($data = fgetcsv($file)) {
        $mainarray[] = $data;
    }
    fclose($file);
    /*Write Array*/
    $length = count($mainarray);
    $content = "";
    $content1='<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
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
    </nav><div class="container" style="margin-top: 80px">
    <h1>Round'.$num.'</h1>
    <table style="text-align: center" class="table table-striped">
<tr>
        <th style="text-align: center">Contestant1</th>
        <th></th>
        <th style="text-align: center">Contestant2</th>
    </tr>';
    for ($i = 0; $i < $length; $i++) {
        $stuname1 = $mainarray[$i][0];
        $stunum1 = $mainarray[$i][1];
        $stuname2 = $mainarray[$i][2];
        $stunum2 = $mainarray[$i][3];
        $everyone = "<tr><td>" . $stuname1 . "</td><td rowspan='2'>V.S</td><td>" . $stuname2 . "</td></tr><tr><td>" . $stunum1 . "</td><td>" . $stunum2 . "</td></tr>";

        $content = $content . $everyone;
    }
    echo $content1.$content;
}
else{
    echo "<script>alert(\"Contestants haven't matched!\");</script>";
    header("Refresh: 0;url=index.php");
}
    ?></table></div>
</body>
</html>
