<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contestant System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/indexstyle.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
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
       <!-- <h2 class="form-signin-heading">Add Contestants</h2>
            <form action="addarray.php" method="post">
                    <div class="input-group">
                        <input class="form-control" placeholder="Name" type="text" id="name" name="stuname">
                        </div>
                    <div class="input-group">
                        <input class="form-control" placeholder="Student ID" type="text" id="number" name="stunum">
                        </div>
                        <br>
                        <input class="btn btn-primary btn-block" type="submit" value="Click">
            </form>
            <br>
        <h2 class="form-signin-heading">Delete Contestants</h2>
            <form action="delarray.php" method="post">
            <div class="input-group">
                <input class="form-control" type="text" id="delnum" placeholder="Student ID" name="delnum">
                </div>
                <br>
                <input class="btn btn-block btn-danger" type="submit" value="Click">
            </form>

        <br/>-->
        <h2 class="form-signin-heading">通过ID查找</h2>
            <form action="">
            <div class="input-group">
                <input class="form-control" type="text" id="searcharrnum" placeholder="学号">
                </div>
                <div class="input-group">
                <input class="form-control" type="text" id="searchresult" placeholder="Name" readonly="true">
                </div>
                <br/>
                <input class="btn btn-info btn-block" type="button" onclick="searcharr()" value="点击">
            </form>
        <br/>
        <h2 class="form-signin-heading">每轮对手配对结果</h2>
            <form action="jump.php" method="post">
            <div class="input-group">
                <input class="form-control" type="text" name="round" placeholder="Please input the number of round">
            </div>
            <br>
                <input class="btn btn-success btn-block" type="submit" value="点击">
            </form>
        <br>
        <h2 class="form-signin-heading">匹配对手</h2>
        <form action="Random.php" method="post">
            <div class="input-group">
                <input class="form-control" type="text" name="round" placeholder="请输入需要匹配的轮数">
            </div>
            <br>
            <input class="btn btn-danger btn-block" type="submit" value="点击">
        </form>
            <br>
            <h2 class="form-signin-heading">每轮选手名单</h2>
            <form action="info.php" method="post">
                <div class="input-group">
                    <input class="form-control" type="text" name="round" placeholder="请输入需要查询的轮数">
                </div>
                <br>
            <input class="btn btn-warning btn-block" type="submit" value="点击">
        </form>
        <br>
        <button class="btn btn-block btn-outline-warning" onclick="window.location.href='match.php'">编辑本轮选手</button>
        <button class="btn btn-block btn-outline-danger" onclick="window.location.href='reset1.php'">重置本轮</button>
        <button class="btn btn-block btn-outline-danger" onclick="window.location.href='reset.php'">重置全部</button>

</body>
</html>