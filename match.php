<!DOCTYPE html>
<html>
<head>
    <title>Match1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <script type="text/javascript">
        var arr=new Array();
        arr=<?php
                $number1=file_get_contents("log/log.txt");
                $number1=(int)$number1;
                $number2=$number1-1;
        $path="log/array".$number1.".txt";
        $content=file_get_contents($path);
        echo $content;
        ?>;
        window.onload=function() {
            var long=arr.length;
            var r=0;
            for ( var i = 0; i < long; i++) {
               var stuname1 = document.getElementById("name" + r);
               var stunum1 = document.getElementById("stuid" + r);
                var stuname2 = document.getElementById("name" + (++r));
                var stunum2 = document.getElementById("stuid" + r);
                stuname1.value = arr[i][0];
                stunum1.value = arr[i][1];
                stuname2.value = arr[i][2];
                stunum2.value = arr[i][3];
                r++;
            }
            console.log(r);
        };
    </script>
</head>
<body>
<table>
    <?php
    /*Read Array*/
    $file = fopen("log/write".$number2.".csv","r");
    while ($data = fgetcsv($file)) {
        $mainarray[] = $data;
    }
    fclose($file);
    /*write frame*/
    $content1='<tr><td>
<form action="delstu.php">
	<input type="text" name="name" id="name';
    $content2='" readonly="true" value="">
	<input type="text" name="stuid" id="stuid';
    $content3='" readonly="true" value="">
	<input type="submit" value="Delete">
</form>
</td>
<td><form action="delstu.php">
	<input type="text" name="name" id="name';
    $content4='" readonly="true" value="">
	<input type="text" name="stuid" id="stuid';
    $content5='" readonly="true" value="">
	<input type="submit" value="Delete">
</form></td>
</tr>';
    $length=count($mainarray);
    for($i=0;$i<$length;$i++){
        echo $content1.$i.$content2.$i.$content3.(++$i).$content4.$i.$content5;
    }
    ?>
</table>
</body>
</html>