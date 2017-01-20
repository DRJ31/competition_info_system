<html>
<head>
    <title>Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
</head>
<body>
<table border="1px solid black" cellspacing="0">
    <tr>
        <th>Contestant1</th>
        <th></th>
        <th>Contestant2</th>
    </tr>
    <?php
    $num=$_GET["round"];
    /*Read Array*/
    $file = fopen('log/result'.$num.'.csv','r');
    while ($data = fgetcsv($file)) {
        $mainarray[] = $data;
    }
    fclose($file);

    /*Write Array*/
    $length=count($mainarray);
    $content="";
    for ($i=0;$i<$length;$i++){
        $stuname1=$mainarray[$i][0];
        $stunum1=$mainarray[$i][1];
        $stuname2=$mainarray[$i][2];
        $stunum2=$mainarray[$i][3];
        $everyone="<tr><td>".$stuname1."</td><td rowspan='2'>V.S</td><td>".$stuname2."</td></tr><tr><td>".$stunum1."</td><td>".$stunum2."</td></tr>";

        $content=$content.$everyone;
    }
    echo $content;
    ?></table>
</body>
</html>
