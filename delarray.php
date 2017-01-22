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
$file = fopen('log/write0.csv','r');
while ($data = fgetcsv($file)) {
    $mainarray[] = $data;
}
fclose($file);
/*delete array*/
$stu=$_GET["delnum"];
$position=deep_in_array($stu,$mainarray);
if ($position==false && $position!=0){
    echo "<script>alert(\"Sorry, the number does not exist.\");</script>";
    header("Refresh: 0;url=index.php");
}
else{
    array_splice($mainarray,$position,1);
    echo "<script>alert(\"Success!\");</script>";
    header("Refresh: 0;url=index.php");
  }

  /*write array*/
$file = fopen('log/write0.csv','w+');
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
$path="log/array0.txt";
$file=fopen($path,"w+");
fwrite($file,$content);
fclose($file);
?>