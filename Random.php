<?php
$num=$_POST["round"];
$num1=$num-1;
/*Read Array*/
$file = fopen("log/write".$num1.".csv","r");
while ($data = fgetcsv($file)) {
    $mainarray[] = $data;
}
fclose($file);
$filecheck="log/log.txt";
$check=file_get_contents($filecheck);
$check=(int)$check+1;
if($num==$check) {
    $long = count($mainarray) / 2;
    for ($i = 0; $i < $long; $i++) {
        $long1 = count($mainarray) - 1;
        $num2 = rand(0, $long1);
        $array1[$i] = [$mainarray[$num2][0], $mainarray[$num2][1]];
        array_splice($mainarray, $num2, 1);
        $num3 = rand(0, $long1 - 1);
        $array1[$i][2] = $mainarray[$num3][0];
        $array1[$i][3] = $mainarray[$num3][1];
        array_splice($mainarray, $num3, 1);
    }
    /*write array*/
    $file = fopen('log/result' . $num . '.csv', 'w+');
    foreach ($array1 as $value) {
        fputcsv($file, $value);
    }
    fclose($file);
    $file = fopen('log/write' . $num . '.csv', 'w+');
    foreach ($array1 as $value) {
        fputcsv($file, $value);
    }
    fclose($file);
    /*Write Array*/
    $content = "[";
    $length = count($array1);
    for ($i = 0; $i < $length; $i++) {
        $stuname1 = $array1[$i][0];
        $stunumber1 = $array1[$i][1];
        $stuname2 = $array1[$i][2];
        $stunumber2 = $array1[$i][3];
        $everyone = "[\"" . $stuname1 . "\",\"" . $stunumber1 . "\",\"" . $stuname2 . "\",\"" . $stunumber2 . "\"]";
        if ($i == $length - 1) {
            $content = $content . $everyone . "]";
        } else {
            $content = $content . $everyone . ",";
        }
    }
    $path = "log/result" . $num . ".txt";
    $file = fopen($path, "w+");
    fwrite($file, $content);
    fclose($file);
    $path3 = "log/array" . $num . ".txt";
    $file = fopen($path3, "w+");
    fwrite($file, $content);
    fclose($file);
    echo $content;
    $path2 = "log/log.txt";
    $file1 = fopen($path2, "w+");
    fwrite($file1, $num);
    fclose($file1);
    $url = "match.php";
    header("Location: $url");
}
else{
    echo "Error!";
    $url="index.php";
    header("Location: $url");
}
?>