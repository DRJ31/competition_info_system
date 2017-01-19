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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="mainbody">
<h1>Add Contestants</h1>
<form action="addarray.php" method="get">
    <input type="text" id="name" placeholder="name" name="name">
    <input type="text" id="number" placeholder="stuid" name="stunum">
    <input type="submit" value="click">
</form>
<br/>
<h1>Delete Contestants</h1>
<form action="delarray.php" method="get">
    <input type="text" id="delnum" placeholder="delnum" name="delnum">
    <input type="submit" value="click">
</form>
<br/>
<h1>Search Name by Student ID</h1>
<form action="">
    <input type="text" id="searcharrnum" placeholder="arrnum">
    <input type="text" id="searchresult">
    <input type="button" onclick="searcharr()" value="click">
</form>
<br/>
<h1>Match</h1>
<form action="">
    <input type="text" id="result1">
    <input type="text" id="result2">
    <input type="button" value="click" onclick="random()">
</form>
<h1><a href="info.php">Contestants Information</a></h1>
</div>
</body>
</html>