<html>
<head>
    <title>Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
</head>
<body>
<table border="1px solid black" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>stunum</th>
    </tr>
<?php
$num=$_GET["round"];
/*Read Array*/
$file = fopen('log/write'.$num.'.csv','r');
while ($data = fgetcsv($file)) {
    $mainarray[] = $data;
}
fclose($file);

/*Write Array*/
$length=count($mainarray);
$content="";
for ($i=0;$i<$length;$i++){
    $stuname=$mainarray[$i][0];
    $stunum=$mainarray[$i][1];
    $everyone="<tr><td>".$stuname."</td><td>".$stunum."</td></tr>";

        $content=$content.$everyone;
}
echo $content;
?></table>
</body>
</html>