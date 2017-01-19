<?php
/*Read Array*/
$file = fopen('write.csv','r');
while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
    //print_r($data); //此为一个数组，要获得每一个数据，访问数组下标即可
    $mainarray[] = $data;
}
fclose($file);

/*Write Array*/
$length=count($mainarray);
$content1='<html>
<head>
	<title>Information</title>
	<meta charset="utf-8">
</head>
<body>
<table border="1px solid black" cellspacing="0">
	<tr>
		<th>Name</th>
		<th>stunum</th>
	</tr>';
$content="";
for ($i=0;$i<$length;$i++){
    $stuname=$mainarray[$i][0];
    $stunum=$mainarray[$i][1];
    $everyone="<tr><td>".$stuname."</td><td>".$stunum."</td></tr>";

        $content=$content.$everyone;
}
$content2='</table>
</body>
</html>';
$content=$content1.$content.$content2;
$path="info.html";
$file=fopen($path,"w+");
fwrite($file,$content);
fclose($file);
$url="info.html";
header("Location: $url");