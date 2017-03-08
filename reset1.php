<?php
$path="log/log.txt";
$content=file_get_contents($path);
$content=(int)$content-1;
$myfile=fopen($path,"w+");
fwrite($myfile,$content);
fclose($myfile);
echo "<script>
alert('Success!');
window.location.href='index.php';
</script>";