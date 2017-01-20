<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contestant System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/indexstyle.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <script src="array.js"></script>
    <script>
        var arr=new Array();
        arr=<?php
       $content=file_get_contents("log/array0.txt");
       echo $content;
?>;
    </script>
</head>

<body>
<!-- navbar -->
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Contestant System</a>

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
                <input class="form-control" type="text" id="searcharrnum" placeholder="Student ID">
                </div>
                <div class="input-group">
                <input class="form-control" type="text" id="searchresult" placeholder="Name" readonly="true">
                </div>
                <br/>
                <input class="btn btn-info btn-block" type="button" onclick="searcharr()" value="Click">
            </form>
        <br/>
        <h2 class="form-signin-heading">Match Contestant Result</h2>
            <form action="jump.php" type="get">
            <div class="input-group">
                <input class="form-control" type="text" name="round" placeholder="Please input the number of round">
            </div>
            <br>
                <input class="btn btn-success btn-block" type="submit" value="Click">
            </form>
        <br>
        <h2 class="form-signin-heading">Match</h2>
        <form action="random.php" type="get">
            <div class="input-group">
                <input class="form-control" type="text" name="round" placeholder="Please input the number of round">
            </div>
            <br>
            <input class="btn btn-success btn-block" type="submit" value="Click">
        </form>
            <br>
            <h2 class="form-signin-heading">Contestant List in every round</h2>
            <form action="info.php" type="get">
                <div class="input-group">
                    <input class="form-control" type="text" name="round" placeholder="Please input the number of round">
                </div>
                <br>
            <input class="btn btn-success btn-block" type="submit" value="Click">
        </form>
</body>
</html>