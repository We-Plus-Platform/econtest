<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <style>
    body{
        display: flex;
        flex-direction: column;
        /* flex-wrap: wrap; */
        justify-content: center;
        align-items: center;
    }
    a {
        text-decoration: none;
    }
    .admin-button{
        line-height: 50px;
        height: 50px;
        border-radius: 1em;
        margin: 0 0 10px 0;
        font-size: 24px;
        background-color: #03a9f4;
        width: 200px;
        text-align: center;
        color: white;
    }
    </style>
</head>
<body>
<a href="login.html"><div class="admin-button">后台登录</div></a>
<a href="add.html"><div class="admin-button">添加比赛</div></a>
<a href="delete.php"><div class="admin-button">删除比赛</div></a>
<a href="ban.html"><div class="admin-button">封禁用户</div></a>
<a href="unban.php"><div class="admin-button">解禁用户</div></a>
<!-- <a href="hot_contest.php">热门比赛设置</a> -->
</body>
</html>
