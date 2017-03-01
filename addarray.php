<?php

/*Read Array*/
$file = fopen('log/write0.csv','r');
while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
    //print_r($data); //此为一个数组，要获得每一个数据，访问数组下标即可
    $mainarray[] = $data;
}
fclose($file);
/*add array*/
$length=count($mainarray);
$addname=$_POST["stuname"];
$addstunum=$_POST["stunum"];
$mainarray[$length]=array(0=>$addname,1=>$addstunum);

/*show array*/
/*write array*/
$file = fopen('log/write0.csv','w+');
foreach ($mainarray as $value){
    fputcsv($file,$value);
}
fclose( $file);
/*Write Array*/
$content="[";
for ($i=0;$i<$length+1;$i++){
    $stuname=$mainarray[$i][0];
    $stunumber=$mainarray[$i][1];
    $everyone="[\"".$stuname."\",\"".$stunumber."\"]";
    if($i==$length){
        $content=$content.$everyone."]";
    }
    else {
        $content = $content.$everyone . ",";
    }
}
$path="log/array0.txt";
$file=fopen($path,"w+");
fwrite($file,$content);
fclose($file);
echo "<script>alert(\"Success!\");</script>";
$url="index.php";
header("Location: $url");
?>