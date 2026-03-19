<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

$report = $_POST['report'];
$reportArea = $_POST['reportArea'];
$reportArea = addslashes($reportArea);
$nums = $_POST['nums'];
$REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];
$ss_mb_reg = $_SESSION["ss_mb_id"];

$outs_16 = sql_fetch_array(sql_query("select * FROM g5_write_free where wr_id = '$nums'"));
if($ss_mb_reg == $outs_16['mb_id']){


    echo "<script>alert('자신의 글내용은 신고 할수 없습니다.');</script>";

    echo "<script>history.back();</script>";
    exit;
}


sql_query("insert into g5_write_opinion_info (wr_board_num,wr_kind,wr_datetime,wr_mb_id,wr_ip,wr_content,delimiter) values ('$nums','$report',now(),'$ss_mb_reg','$REMOTE_ADDRS','$reportArea','badtell')");

$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '신고',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="ok_wrap">
    <p class="ok_p">신고가 완료되었습니다.<br>최대한 신속하게 처리해 드리겠습니다.</p>
    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="location.href='comm_sub.php?nums='+<?=$nums?>">확인</button>
    </div>
</section>

<script>
    setTimeout(function(){
        location.href = "comm_sub.php?nums="+<?=$nums?>;
    },3000)

</script>


<?include('footer.php')?>