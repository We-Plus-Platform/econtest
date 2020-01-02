<?php
include 'needauth.php';
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
switch ($_GET['action']) {
    case 'loadAllTeam':
        loadAllTeam();
        break;
    case 'expandTeam':
        expandTeam();
        break;
}
function loadAllTeam()
{
    global $hand;
    $user = $_SESSION["user"];
    $sql_id = "select uid from account_user where user='$user'";
    $result_id = mysqli_query($hand, $sql_id);
    $row_id = mysqli_fetch_array($result_id);
    $uid = $row_id["uid"];
    $sql_team = "select a.tid,a.cid,b.name cname,b.stop,c.name tname,c.created,c.peoplenum from contest_join a,contest_list b,contest_team c where a.uid='$uid' and a.tid=c.tid and a.cid=b.id";
    $result_team = mysqli_query($hand, $sql_team);
    $count = 0;
    while ($row_team = mysqli_fetch_array($result_team)) {
        $dan["$count"]["ContestName"] = $row_team["cname"];
        $dan["$count"]["TeamName"] = $row_team["tname"];
        $dan["$count"]["TeamId"] = $row_team["tid"];
        $date = date("Ymd", $row_team["created"]) . '-' . $row_team["stop"];
        $dan["$count"]["TeamEnrollDate"] = $date;
        $cid = $row_team["cid"];
        $tid = $row_team["tid"];
        $sql3 = "select uid from contest_join where cid='$cid' and tid='$tid'";
        $result3 = mysqli_query($hand, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $abc = count($row3);
        $dan["$count"]["TeamPeopleNum"] = $abc . "/" . $row_team["peoplenum"];
        $count++;
    }
    echo json_encode($dan);
}
function expandTeam()
{
    global $hand;
    $tid = $_GET["teamId"];
    $sql = "select uid,status,role from contest_join where tid='$tid'";
    $result = mysqli_query($hand, $sql);
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $dan["$count"]["MemberStatus"] = $row["role"];
        $uid = $row["uid"];
        $sql_user = "select nickname,qq,pic from account_user where uid='$uid'";
        $result_user = mysqli_query($hand, $sql_user);
        $row_user = mysqli_fetch_assoc($result_user);
        $dan["$count"]["MemberName"] = $row_user["nickname"];
        $dan["$count"]["MemberQQ"] = $row_user["qq"];
        $pic = 'media/UserPortrait/' . $row_user["pic"];
        $img = file_get_contents($pic);
        $image_data_base64 = base64_encode($img);
        $dan["$count"]["MemberPic"] = $pic;
        $count++;
    }
    echo json_encode($dan);
}
