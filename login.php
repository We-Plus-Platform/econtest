
<!doctype html>
<?php
// include 'session.php';
include 'configure.php';
session_start();
if($_SESSION['user']){
    header('index.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/login.css">
</head>
<body>
<?php 
    include('nav.html');
?>
<div class="container" style="overflow: visible">
    <div class="loginBox">
        <div class="loginImage">
            <img style="width: 100%;max-height:100% " src="images/loginleft.png">
        </div>
        <div class="loginSection">
            <div class="loginSectionBox" id="sectionBoxLogin" >
                <div style="width: 100%;display: flex">
                    <img src="images/loginhead.png" style="margin: auto">
                </div>
                <form id="loginForm"
                      style="height:65%;display:flex;flex-direction:column;justify-content:space-between">
                    <div class="inputLine">
                        <label for="input-1">学号</label>
                        <input type="text" id="input-1" name="user" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-2">密码</label>
                        <input type="password" id="input-2" name="pwd" required>
                    </div>

                    <div class="loginCaptchaArea">
                        <div style="display: flex;flex-direction: column;width: 60%">
                            <label for="input-3">验证码<span style="color: gray;font-size: x-small">(不区分大小写)</span></label>
                            <input type="text" id="input-3" name="check" required>
                        </div>
                        <img onclick="reload('captcha')" src="verification.php" alt="验证码" id="captcha"
                             style="height: 100%;width: 40%;cursor: pointer">
                    </div>
                    <div style="text-align: center">
                        <button type="button" class="loginButton" onclick="ajaxLoginPost('check.php','loginForm')"><i class="fa fa-sign-in" aria-hidden="true"></i> 登录</button>
                    </div>
                </form>
            </div>
            <div class="loginSectionBox" id="sectionBoxInfo" style="display: none;justify-content: center">
                <form action="userInfoModify.php" method="post"
                      style="height:75%;display:flex;flex-direction:column;justify-content:space-between">
                    <div class="inputLine">
                        <label for="input-pwd">新密码</label>
                        <input type="password" id="input-pwd" name="pwd" onkeyup="verifyInfo1(this.value)" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-rePwd">重复密码<span style="float: right;color: red;font-size: small" id="reInputPass"></span></label>
                        <input type="password" id="input-rePwd" onkeyup="verifyInfo(this.value)" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-qq">QQ号<span style="float: right;color: red;font-size: small" id="reInputPass"></span></label>
                        <input type="text" id="input-qq" name="qq" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-email">邮箱</label>
                        <input type="text" id="input-email" name="email" required>
                    </div>

                    <div style="text-align: center">
                        <button type="submit" class="loginButton" onclick=""><i class="fa fa-check" aria-hidden="true"></i> 提交</button>
                    </div>
                </form>
            </div>
            <div class="loginSectionBox" id="sectionBoxFindBack" style="display: none;">
                <form style="height: 100%; display: flex;flex-direction: column;justify-content: space-around" id="aForm">
                <div class="inputLine">
                    <label for="input-code">请输入学号</label>
                    <input type="tel" id="input-code" name="user">
                </div>
                    <div style="text-align: center">
                        <button type="button" onclick="return false" class="loginButton" id="findBackBtn"><i class="fa fa-arrow-right" aria-hidden="true"></i>下一步</button>
                    </div>
                </form>
            </div>
            <div class="loginSectionBox" id="sectionBoxFindBack2" style="display: none;">
                <div class="inputLine" style="display: flex;flex-direction: column;justify-content: space-around;height: 50%">
                    <div>
                    <span>我们已经把验证码发到您账号绑定的邮箱</span>
                    <label for="input-c">请输入验证码：</label>
                        <div style="display: inline-flex;justify-content: space-between;width: 100%;height:40px;">
                            <input type="text" id="input-c" name="captcha" style="width: 80%;height: 100%;margin-top:0">
                            <button class="loginButton-s"  onclick="reSend()">重发</button>
                        </div>
                        <label for="input-new">请输入新密码</label>
                        <input type="text" id="input-new" style="width: 80%;height: 40px;margin-top:0">
                        <label for="input-new-re">请重复输入新密码</label>
                        <input type="text" id="input-new-re" style="width: 80%;height: 40px;margin-top:0">
                    </div>
                    <button class="loginButton"  onclick="submitC()">提交</button>
                </div>
            </div>
            <div class="bottomBar"><span onclick="findBackPwd()" style="cursor: pointer; font-size: smaller;color: gray">忘记密码？</span></div>
        </div>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
<script src="js/login.js"></script>
</body>
</html>
