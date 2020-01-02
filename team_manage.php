<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>我的组队</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/team_manage.css">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
    .mem_img img{
        width:100%;
        height:100%;
    }
    </style>
</head>
<script>

    // $(document).ready(function () {
        //     $.ajax({
        //         type: "post",
        //         url: 'try0.json',
        //         dataType: 'JSON',
        //         success: function (data) {
        //             if (data.length) {
        //                 for (let i = 0; i < data.length - 1; i++) {
        //                     $('.f_zu_dui').prepend("<div class='zu_dui'>" + $('.zu_dui').html() + "</div>");
        //                 }
        //
        //                 $('.zu_dui0').click(function () {
        //                     getSpecTeamInfo($(this));
        //                     $(this).children('.zu_mem').slideToggle("slow");
        //                 });
        //             }
        //             let zu_name = document.getElementsByClassName('zu_name');
        //             let zu_game = document.getElementsByClassName('zu_game');
        //             let zu_time = document.getElementsByClassName('zu_time');
        //             let zu_num = document.getElementsByClassName('zu_num');
        //
        //             for (let i = 0; i < data.length; i++) {
        //                 zu_name[i].getElementsByTagName('p')[0].innerHTML = data[i]['TeamId'];
        //                 zu_game[i].getElementsByTagName('p')[0].innerHTML = data[i]['ContestName'];
        //                 zu_time[i].getElementsByTagName('p')[0].innerHTML = data[i]['TeamEnrollDate'];
        //                 zu_num[i].getElementsByTagName('p')[0].innerHTML = data[i]['TeamPeopleNum'];
        //             }
        //         }
        //     });
        // });
        // $.ajax({
        //     type: 'get',
        //     url: 'zudui.html',
        //     dataType: 'html',
        //     success:
        //
        //         //翻页做不出
        //         if (x.length > 4) {
        //             $('.zu_page p').css('display', 'block');
        //         }
        //     }
        // })
       


</script>
<body>
<?php require 'nav.html' ?>
<div id="main">
    <div class="zu_header">
        <p>
            <a href="">首页</a>
            >>
            <a href="">赛事专区</a>
            >>
            我的组队
        </p>
    </div>
    <div class="zu_content">
        <div class="zu_biaoti_bg">
            <div class="zu_biaoti">
                <div>
                    <p>队伍名称</p>
                </div>
                <div>
                    <p>比赛名称</p>
                </div>
                <div>
                    <p>报名时间</p>
                </div>
                <div>
                    <p>成员数目</p>
                </div>
                <div>
                    <p>操作</p>
                </div>
            </div>
        </div>

        <div class="f_zu_dui">
            <div class="zu_dui">
                <div class="zu_dui0">
                    <!-- 点击 -->

                    <!-- JS显示 隐藏 -->
                    <div class="zu_mem">
                        <div class="mem1">
                            <div class="duizhang">
                                <div class="mem_img">
                                    <img src="">
                                </div>
                                <div class="mem_zi">
                                    <p>ID：居居</p>
                                    <p>团队角色：队长</p>
                                    <p>QQ:2370xxxxx9</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="zu_page">
            <p>< x > &nbsp;&nbsp;跳转至 <input title="" type="text">页 &nbsp;共x页</p>
        </div>
    </div>

</div>

<script>
    let genInfo = function (TeamId,TeamName, ContestName, TeamEnrollDate, TeamPeopleNum) {
        let html = '              <div class="dui_header">\n' +
            '                        <div class="zu_id" hidden>\n' +
            '                            <p>' + TeamId + '</p>\n' +
            '                        </div>\n' +
            '                        <div class="zu_name">\n' +
            '                            <p>' + TeamName + '</p>\n' +
            '                        </div>\n' +
            '                        <div class="zu_game">\n' +
            '                            <p>' + ContestName + '</p>\n' +
            '                        </div>\n' +
            '                        <div class="zu_time">\n' +
            '                            <p>' + TeamEnrollDate + '</p>\n' +
            '                        </div>\n' +
            '                        <div class="zu_num">\n' +
            '                            <p>' + TeamPeopleNum + '</p>\n' +
            '                        </div>\n' +
            '                        <div class="zu_action">\n' +
            '                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\n' +
            '                        </div>\n' +
            '                    </div>';
        $('.zu_dui0').prepend(html);
    };
    $.ajax({
        url: "TeamCheck.php?action=loadAllTeam",
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $.each(data, function (index, objVal) {
                genInfo(objVal.TeamId, objVal.TeamName,objVal.ContestName, objVal.TeamEnrollDate, objVal.TeamPeopleNum);
            })
            let team=Array.from(document.querySelectorAll('.dui_header'));
            team.forEach(ele=>{
                ele.addEventListener('click',
                function (e) {
                let thisObj = e.currentTarget;
                if (thisObj.className.indexOf("active")!=-1)
                    thisObj.classList.remove("active");
                else {
                    thisObj.classList.add('active');
                    let name = thisObj.children[0].children[0].innerHTML;
                    $.ajax({
                        type: "get",
                        url: 'TeamCheck.php?action=expandTeam',
                        dataType: 'JSON',
                        data: {
                            teamId: name
                        },
                        success: function (data) {
                            let mem = document.getElementsByClassName("mem_zi");
                            let img = document.getElementsByClassName("mem_img");
                            let memData = data;
                            // document.getElementsByClassName('zu_mem')[0].style.height=255*Math.ceil(memData.length/4)+'px';
                            let jObj = document.getElementsByClassName("zu_mem")[0];
                            let html1 = `<div class="mem1">
                            <div class="duizhang">
                                <div class="mem_img">
                                    <img src="">
                                </div>
                                <div class="mem_zi">
                                    <p>ID：居居</p>
                                    <p>团队角色：队长</p>
                                    <p>QQ:2370xxxxx9</p>
                                </div>
                            </div>
                        </div>`;
                            jObj.innerHTML = '';
                            html = '';
                            for (let i = 0; i < memData.length; i++) {
                                html+=html1;
                            }
                            jObj.innerHTML=html;
                            for (let i = 0; i < memData.length; i++) {
                                img[i].getElementsByTagName('img')[0].src = memData[i]['MemberPic'];
                                mem[i].getElementsByTagName('p')[0].innerHTML = "ID：" + memData[i]['MemberName'];
                                mem[i].getElementsByTagName('p')[1].innerHTML = `团队角色：${memData[i]['MemberStatus']==1?'队长':'队员'}`;
                                mem[i].getElementsByTagName('p')[2].innerHTML = "QQ:" + memData[i]['MemberQQ'];
                            }
                            jObj.style.display="block";
                        }
                    });
                }
            })
            })
        }
    })
   
</script>

</body>
</html>