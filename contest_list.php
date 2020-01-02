<?php
/*name比赛名字
intro主题
begin开始时间
stop结束时间
pic路径
allnum总数（页数为1的时候传给你）*/
include 'configure.php';
session_start();
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
switch ($_GET['action']) {
    case 'contest':
        contest();
        break;
    case 'team':
        team();
        break;
    case 'join_team':
        join_team();
        break;
}
function contest()
{
    global $hand;
    $total = 5;
    $min = $_POST["c_page"] * $total - $total;
    if ($_POST["c_page"] == 1) {
        $sql = "select * from contest_list where status=1";
        $result = mysqli_query($hand, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = count($row);
        $dan["allnum"] = $num;
    }
    $sql_page = "select name,intro,begin,stop,imagesrc from contest_list where status=1 limit $min,5";
    $result_page = mysqli_query($hand, $sql_page);
    $count = 0;
    while ($row = mysqli_fetch_assoc($result_page)) {
        $dan["$count"]["name"] = $row["name"];
        $dan["$count"]["intro"] = $row["intro"];
        $dan["$count"]["begin"] = $row["begin"];
        $dan["$count"]["stop"] = $row["stop"];
        $dan["$count"]["pic"] = $row["imagesrc"];
        $count++;
    }
    echo json_encode($dan);
}
/*
pic图片
name队伍名
c_name比赛名字
tc_name队长名字
intro简介
people总人数
allnum数据数
*/
function team()
{
    global $hand;
    $total = 4;
    $min = $_POST["c_page"] * $total - $total;
    if ($_POST["c_page"] == 1) {
        $sql = "select * from contest_team";
        $result = mysqli_query($hand, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = count($row);
        $dan["allnum"] = $num;
    }
    // $sql_team = "select tid,tcid,cid,name,intro,peoplenum from contest_team where status=1 limit $min,4";
    $sql_team = "select tid,tcid,cid,name,intro,peoplenum from contest_team where status=1";

    $result_team = mysqli_query($hand, $sql_team);
    $count = 0;
    while ($row = mysqli_fetch_assoc($result_team)) {
        $dan["$count"]["team_id"] = $row["tid"];
        $dan["$count"]["name"] = $row["name"];
        $dan["$count"]["intro"] = $row["intro"];
        $dan["$count"]["people"] = $row["peoplenum"];
        $sql_tc = "select nickname from account_user where uid='$row[tcid]'";
        $result_tc = mysqli_query($hand, $sql_tc);
        $row_tc = mysqli_fetch_assoc($result_tc);
        $dan["$count"]["tc_name"] = $row_tc["nickname"];
        $sql_c = "select imagesrc,name from contest_list where id='$row[cid]'";
        $result_c = mysqli_query($hand, $sql_c);
        $row_c = mysqli_fetch_assoc($result_c);
        $dan["$count"]["pic"] = $row_c["imagesrc"];
        $dan["$count"]["c_name"] = $row_c["name"];
        $count++;
    }
    echo json_encode($dan);
}
function join_team()
{
    global $hand;
    $team_id = $_GET['teamId'];
    $user = $_SESSION['user'];
    $user_result = $hand->query("SELECT uid FROM account_user WHERE user='$user'");
    $uid = $user_result->fetch_assoc()['uid'];
    $detect_result = $hand->query("SELECT tid FROM contest_join WHERE tid='$team_id' AND uid='$uid'");
    $tid_db = $detect_result->num_rows;
    if ($tid_db) {
        echo json_encode(["status" => 2]);
        return;
    }
    $insert_result =  $hand->query("INSERT INTO contest_join (tid,uid,status,role) VALUES('$team_id','$uid',1, 2)");
    if ($insert_result) {
        echo json_encode(["status" => 1]);
    } else {
        echo json_encode(["status" => 0]);
    }
}
