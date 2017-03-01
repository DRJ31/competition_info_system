<?php
$path="log/log.txt";
$myfile=fopen($path,"w+");
fwrite($myfile,"0");
fclose($myfile);
echo "<script>
alert('Success!');
window.location.href='index.php';
</script>";