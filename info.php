<html>
<head>
    <title>Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$num=$_GET["round"];
$restrict=file_get_contents("log/log.txt");
$restrict=(int)$restrict;
$num=(int)$num;
/*Read Array*/
if ($num<=$restrict) {
$file = fopen('log/write'.$num.'.csv','r');
while ($data = fgetcsv($file)) {
    $mainarray[] = $data;
}
fclose($file);
/*Write Array*/

    $length = count($mainarray);
    $content = "";
    for ($i = 0; $i < $length; $i++) {
        $stuname = $mainarray[$i][0];
        $stunum = $mainarray[$i][1];
        $everyone = "<tr><td>" . $stuname . "</td><td>" . $stunum . "</td></tr>";

        $content = $content . $everyone;
    }
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
    <table style="text-align: center" class="table table-striped"><tr>
        <th style="text-align: center">Name</th>
        <th style="text-align: center">stunum</th>
    </tr>';
    echo $content1.$content;
}
else{
    echo "<script>alert(\"Contestants haven't matched!\");</script>";
    header("Refresh: 0;url=index.php");
}
?></table></div>
</body>
</html>