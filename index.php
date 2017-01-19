<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Arraytest</title>
    <script src="array.js"></script>
    <script>
        var arr=new Array();
              arr=<?php
                      $path1="array.txt";
                      $content=file_get_contents($path1);
                      echo $content;
?>;
        var total = arr.length/2;
        var arr1=arr.slice(total);
    </script>
</head>
<body>
<h1>Add Array</h1>
<form action="addarray.php" method="get">
    <input type="text" id="name" placeholder="name" name="name">
    <input type="text" id="number" placeholder="stuid" name="stunum">
    <input type="submit" value="click">
</form>
<br/>
<h1>Delete Array</h1>
<form action="delarray.php" method="get">
    <input type="text" id="delnum" placeholder="delnum" name="delnum">
    <input type="submit" value="click">
</form>
<br/>
<h1>Search Array</h1>
<form action="">
    <input type="text" id="searcharrnum" placeholder="arrnum">
    <input type="text" id="searchresult">
    <input type="button" onclick="searcharr()" value="click">
</form>
<br/>
<h1>Random</h1>
<form action="">
    <input type="text" id="result1">
    <input type="text" id="result2">
    <input type="button" value="click" onclick="random()">
</form>
<a href="info.php">Information</a>
</body>
</html>