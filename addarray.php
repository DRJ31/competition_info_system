<?php
/*functions*/
function deep_in_array($value, $array) {
    foreach($array as $item) {
        if(!is_array($item)) {
            if ($item == $value) {
                return true;
            } else {
                continue;
            }
        }

        if(in_array($value, $item)) {
            return array_search($item,$array);
        } else if(deep_in_array($value, $item)) {
            return true;
        }
    }
    return false;
}
/*Read Array*/
$file = fopen('write.csv','r');
while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
    //print_r($data); //此为一个数组，要获得每一个数据，访问数组下标即可
    $mainarray[] = $data;
}
fclose($file);
/*add array*/
$length=count($mainarray);
$addname=$_GET["name"];
$addstunum=$_GET["stunum"];
$mainarray[$length]=array(0=>$addname,1=>$addstunum);

/*show array*/
/*write array*/
$file = fopen('write.csv','w+');
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
$path="array.txt";
$file=fopen($path,"w+");
fwrite($file,$content);
fclose($file);
$url="arraytest.php";
header("Location: $url");
?>