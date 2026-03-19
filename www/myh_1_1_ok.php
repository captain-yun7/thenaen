<?php


include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];
$REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];

$WOingsanfo = $_POST['info3'];
$WOingMheartnum = $_POST['info4'];
$WAupTime = $_POST['info5'];
$usualHeartnumarea1 = $_POST['info6'];
$usualHeartnumarea2 = $_POST['info7'];

$usualHeartnumareasum = $usualHeartnumarea1."-".$usualHeartnumarea2;

$nowusualmysanfo = $_POST['info8'];

    $myh1_1hidden = $_POST['myh1_1hidden'];
    $myh1_2hidden = $_POST['myh1_2hidden'];
    $myh1_3hidden = $_POST['myh1_3hidden'];
    $myh2r = $_POST['myh2r'];

$breathReWorkout = $myh1_1hidden."-".$myh1_2hidden."-".$myh1_3hidden;
$breathReWorkoutIngSRe = $myh2r;

$nowDatas = date("Y-m-d");

$outs_myh_1_1_check = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and mb_write_time like '%$nowDatas%'"));

if($outs_myh_1_1_check['cnt'] < 2) {

    $insert1 = sql_query("insert into g5_work_info 
    (WOingsanfo,WOingMheartnum,WAupTime,usualHeartnumarea,nowusualmysanfo,breathReWorkout,breathReWorkoutIngSRe,kinds,mb_id,mb_ip,mb_write_time) 
values ('$WOingsanfo','$WOingMheartnum','$WAupTime','$usualHeartnumareasum','$nowusualmysanfo','$breathReWorkout','$breathReWorkoutIngSRe','safeworkoutyou','$ss_mb_id','$REMOTE_ADDRS',now())");

    echo "<script>location.href='index.php';</script>";

}
else{
    echo "<script>alert('하루에 2개만 입력이 가능합니다.');history.back();</script>";
}







?>