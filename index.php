<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Arraytest</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/indexstyle.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
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
<!-- navbar -->
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Arraytest</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
<!-- navbar end -->
    <div class="form-signin">
        <h2 class="form-signin-heading">Add Contestants</h2>
            <form action="addarray.php" method="get">
                    <div class="input-group">
                        <input class="form-control" placeholder="Name" type="text" id="name" name="name">
                        </div>
                    <div class="input-group">
                        <input class="form-control" placeholder="Student ID" type="text" id="number" name="stunum">
                        </div>
                        <br>
                        <input class="btn btn-primary btn-block" type="submit" value="Click">
            </form>
            <br>
        <h2 class="form-signin-heading">Delete Contestants</h2>
            <form action="delarray.php" method="get">
            <div class="input-group">
                <input class="form-control" type="text" id="delnum" placeholder="Student ID" name="delnum">
                </div>
                <br>
                <input class="btn btn-block btn-danger" type="submit" value="Click">
            </form>

        <br/>
        <h2 class="form-signin-heading">Search by ID</h2>
            <form action="">
            <div class="input-group">
                <input class="form-control" type="text" id="searcharrnum" placeholder="Array Num">
                </div>
                <div class="input-group">
                <input class="form-control" type="text" id="searchresult" placeholder="Name" readonly="true">
                </div>
                <br/>
                <input class="btn btn-info btn-block" type="button" onclick="searcharr()" value="Click">
            </form>
        <br/>
        <h2 class="form-signin-heading">Match</h2>
            <form action="">
            <div class="input-group">
                <input class="form-control" type="text" id="result1" placeholder="Player 1" readonly="true">
                <input class="form-control" type="text" id="result2" placeholder="Player 2" readonly="true">
            </div>
            <br>
                <input class="btn btn-success btn-block" type="button" value="click" onclick="random()">
            </form>
        <br>
        <a class="btn btn-outline-warning btn-lg btn-block" href="info.php">Contestants Information</a>
    </div>
</body>
</html>