
<?php
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
$num=file_get_contents("log/log.txt");
$file = fopen('log/write'.$num.'.csv','r');
while ($data = fgetcsv($file)) {
    $mainarray[] = $data;
}
fclose($file);
$stu=$_POST["name"];
$position=deep_in_array($stu,$mainarray);
$position1=array_search($stu,$mainarray[$position]);
var_dump($position);
array_splice($mainarray[$position],$position1,2);
/*write array*/
$file = fopen('log/write'.$num.'.csv','w+');
foreach ($mainarray as $value){
    fputcsv($file,$value);
}
fclose( $file);
/*Write Array*/
$length=count($mainarray);
$content="[";
/*Write Array*/
$content="[";
$length=count($mainarray);
for ($i=0;$i<$length;$i++){
    $stuname1=$mainarray[$i][0];
    $stunumber1=$mainarray[$i][1];
    $stuname2=$mainarray[$i][2];
    $stunumber2=$mainarray[$i][3];
    $everyone="[\"".$stuname1."\",\"".$stunumber1."\",\"".$stuname2."\",\"".$stunumber2."\"]";
    if($i==$length-1){
        $content=$content.$everyone."]";
    }
    else {
        $content = $content.$everyone . ",";
    }
}
$path="log/array".$num.".txt";
$file=fopen($path,"w+");
fwrite($file,$content);
fclose($file);
$url="match.php";
header("Location: $url");