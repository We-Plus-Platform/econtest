<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/UserCenter.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="js/UserCenter.js"></script>
</head>
<body style="
    margin: 0;">
<?php require 'nav.html'?>
<div class="zu_header container">
    <p>
        <a href="">首页</a>
        &gt;&gt;
        <a href="">赛事专区</a>
        &gt;&gt;
        <a href="">个人中心</a>
    </p>
</div>
<div class="container" style="
    min-width: 700px;
    padding-top: 0.1%;
">

    <div class="headUpload">
        <div class="pic"><img id="allUrl" src="images/head.png" style="
    margin: auto;
    max-height: 100%;
    max-width: 100%;
"></div>
        <form style="
    width: 20%;
    display: flex;
" id="upForm">
            <input type="file" name="pic" id="btn_file" onchange="fileChange(this);" style="display: none">
            <input type="button" value="上传头像" class="post" id="post" style="
    margin: auto;
">
        </form>
        <div><p>实名认证：未认证</p></div>
    </div>
    <div class="information">
        <div class="infoDetail">
            <div class="left">
                <div class="infor1"><p>ID:<span>xxxxx</span></p></div>
                <form id="cForm">
                    <div class="infor3"><p>电话:<span class="changeable">xxxxxxxxx</span></p></div>
                    <div class="infor5"><p>邮箱:<span class="changeable">xxxxxxxx@xx.com</span></p></div>
                    <div class="infor7"><p>QQ:<span class="changeable">xxxxxxxxxx</span></p></div>
                </form>
            </div>
            <div class="right">
                <div class="infor2"><p>姓名:<span>xxx</span></p></div>
                <div class="infor4"><p>学号:<span>xxxxxxxxxx</span></p></div>
                <div class="infor6"><p>学院:<span>xxxxxx</span></p></div>
                <div class="infor8"><p>专业:<span>xxxxxx</span></p></div>
            </div>
        </div>
        <div class="infor0" style="
    width: 90%;
"><span style="vertical-align: top">个人简介:</span><span class="changeable change0">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span>
        </div>
    </div>
    <div class="end">
        <input type="button" value="编辑资料" class="endButton">
    </div>
</div>


</body>
</html>