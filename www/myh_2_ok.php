<?php


include_once('./_common.php');

include "./top_login_check.php";


$ss_mb_id = $_SESSION["ss_mb_id"];
$self_ck = $_REQUEST["self_ck"];
//header("content-type:text/html; charset=utf-8");


if($self_ck != ""){ // 저장

    $outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_id'"));

    $mb_name = addslashes($outs['mb_name']);

    $REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];


    $subject = "호흡곤란증상 측정하기" . " " . $mb_name;
    $wr_content = $self_ck;
    $wr_seo_title = $subject;
    $mb_id = $ss_mb_id;

    $wr_name = $mb_name;
    $wr_email =  $outs['mb_email'];
    $wr_ip = $REMOTE_ADDRS;





$insert1 = sql_query("insert into g5_write_breathdifficultsympt (wr_subject,wr_content,wr_seo_title,mb_id,wr_name,wr_email,wr_datetime,wr_ip) values ('$subject','$wr_content','$subject','$mb_id','$mb_id','$wr_email',now(),'$REMOTE_ADDRS')");

if($insert1 == true){
    echo "<script>alert('호흡곤란증상 측정하기 정보가 등록되었습니다.');location.href='./myh_2.php';</script>";
}
else{
    echo "<script>alert('등록에 실패하였습니다. 다시 시도해주세요.');history.back();</script>";
}



}


?>
