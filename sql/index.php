<?php
include 'function.php';
$conn=logsql($dbhost,$dbuser,$dbpass);
$getdata="SELECT * FROM hearthstone";
mysql_select_db('demonist');
$getnum="SELECT * FROM counting WHERE type='hearthstone'";
$num=mysql_query($getnum);
$num=mysql_fetch_row($num);
$retval=mysql_query($getdata);
if (!$retval){
    die(mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
    array_push($list,array($row['name'],$row['stuid']));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contestant System</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="indexstyle.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width">
    <script>
        function confirmit(path,str,num) {
            var judge=confirm("Are you sure you want to "+str+" round "+judgearr[num]+" ?");
            if (judge){
                window.location.href=path;
            }
        }
        var arr=[<?php
        for($i=0;$i<count($list);$i++){
            if($i==count($list)-1){
                echo "[\"".$list[$i][0]."\",".$list[$i][1]."]";
            }
            else{
                echo "[\"".$list[$i][0]."\",".$list[$i][1]."],";
            }
        }
            ?>];
        var judgearr=[<?php
        echo $num[0].",".++$num[0];
            ?>];
        function findit() {
            var stunum=document.getElementById("searcharrnum").value;
            for(var i=0;i<arr.length;i++){
                if(arr[i][1]==stunum){
                    document.getElementById("searchresult").value=arr[i][0];
                }
            }
        }
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
    <h2 class="form-signin-heading">删除选手</h2>
    <form action="delete.php" method="post">
        <div class="input-group">
            <input class="form-control" type="text" id="searcharrnum" name="stunum" placeholder="学号">
        </div>
        <div class="input-group">
            <input class="form-control" type="text" id="searchresult" placeholder="名字" readonly="readonly">
        </div>
        <br/>
        <input class="btn btn-info btn-block" type="button" onclick="findit()" value="检索名字">
        <input class="btn btn-danger btn-block" type="submit" value="确认删除">
    </form>
    <br/>
    <h2 class="form-signin-heading">添加选手</h2>
    <form action="add.php" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="stunum" placeholder="学号">
        </div>
        <div class="input-group">
            <input class="form-control" type="text" placeholder="名字" name="name">
        </div>
        <br/>
        <input class="btn btn-success btn-block" type="submit" value="确认添加">
    </form>
    <br/>
    <h2 class="form-signin-heading">查看对手</h2>
    <form action="result.php" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="number" placeholder="轮数">
        </div>
        <br/>
        <input class="btn btn-warning btn-block" type="submit" value="查看对手">
    </form>
    <br/>
    <button class="btn btn-block btn-outline-info" onclick="window.location.href='info.php'">查看选手名单</button>
    <button class="btn btn-block btn-outline-danger" onclick="confirmit('list.php','generate competitors',1)">抽取对手</button>
    <button class="btn btn-block btn-outline-danger" onclick="confirmit('reset.php','reset',0)">重置本轮</button>
    <br>
</div>
</body>
</html>