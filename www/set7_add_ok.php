<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];



$REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];





$ca_sc_add_temp_save1form = $_POST['ca_sc_add_temp_save1form'];
$ca_sc_add_temp_save2form = $_POST['ca_sc_add_temp_save2form'];
$ca_sc_add_temp_save3form = $_POST['ca_sc_add_temp_save3form'];

$contents = $_POST['add_scform'];

$pushcheckedform = $_POST['pushcheckedform'];

$timePart1Temp = "";
$times2 = $ca_sc_add_temp_save1form."-".$ca_sc_add_temp_save2form."-".$ca_sc_add_temp_save3form;



$nummodify = $_GET['nummodify']; // 수정번호
$deletenum = $_GET['deletenum']; // 삭제번호


$day_2ago = date("Y-m-d", strtotime("-2 day", strtotime($times2)));







if($nummodify != ""){

    $date_area_modify = $_GET['date_area_modify']; // 날짜
    $date_area_modify_ago = date("Y-m-d", strtotime("-2 day", strtotime($date_area_modify))); // 날짜 이틀전으로
    $push =  $_GET['push']; // 푸시 사용 여부
    $add_sc_str_mo_modify =  $_GET['add_sc_str_mo_modify']; // 글자 내용
    $add_sc_str_mo_modify = rawUrlDecode($add_sc_str_mo_modify); // 글자 내용 디코딩

//    echo $nummodify;
//    echo "<br>";
//    echo $date_area_modify;
//    echo "<br>";
//    echo $add_sc_str_mo_modify;
//    echo "<br>";
//    echo $date_area_modify_ago;
//    echo "<br>";
//    echo $push;
//    echo "<br>";

    $insert1 = sql_query("update g5_alarm_info set times2 = '$date_area_modify',times2_2ourprv = '$date_area_modify_ago', push_alarm_use = '$push',contents  = '$add_sc_str_mo_modify' where mb_no = '$nummodify'");

}
else if($deletenum != ""){
    $insert1 = sql_query("delete from g5_alarm_info where mb_no = '$deletenum'");
}
else{
    $insert1 = sql_query("insert into g5_alarm_info (times1,times2,times2_2ourprv,kinds,mb_id,mb_ip,mb_write_time,push_alarm_use,contents) values ('$timePart1Temp','$times2','$day_2ago','2','$ss_mb_id','$REMOTE_ADDRS',now(),'$pushcheckedform','$contents')");
}

if($insert1 == true){
    echo "ok";
}
else{
    echo "false";
}

echo "<script>location.href = 'set_7.php';</script>";

?>


