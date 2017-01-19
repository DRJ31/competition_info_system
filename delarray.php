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
$file = fopen('write.csv','r');
while ($data = fgetcsv($file)) {
    $mainarray[] = $data;
}
fclose($file);
/*delete array*/
$stu=$_GET["delnum"];
$position=deep_in_array($stu,$mainarray);
if ($position==false){
    echo "Sorry, the number does not exist.";
    header("Refresh: 3;url=arraytest.php");
}
else{
    array_splice($mainarray,$position,1);
    echo "Success!";
    header("Refresh: 3;url=arraytest.php");
  }

  /*write array*/
$file = fopen('write.csv','w+');
foreach ($mainarray as $value){
    fputcsv($file,$value);
}
fclose( $file);
/*Write Array*/
$length=count($mainarray);
$content="[";
for ($i=0;$i<$length;$i++){
    $stuname=$mainarray[$i][0];
    $stunumber=$mainarray[$i][1];
    $everyone="[\"".$stuname."\",\"".$stunumber."\"]";
    if($i==$length-1){
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