<?php

include_once('./_common.php');

include "./top_login_check.php";

$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '차단',
);

$footer = array(
    'is_footer' => false,
);

$report = "글차단";
$reportArea = "";
$nums = $_GET['nums'];
$REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];
$ss_mb_reg = $_SESSION["ss_mb_id"];



$outs_16 = sql_fetch_array(sql_query("select * FROM g5_write_free where wr_id = '$nums'"));
if($ss_mb_reg == $outs_16['mb_id']){


    echo "<script>alert('자신의 글내용은 차단할수 없습니다.');</script>";

    echo "<script>history.back();</script>";
    exit;
}




sql_query("insert into g5_write_opinion_info (wr_board_num,wr_kind,wr_datetime,wr_mb_id,wr_ip,wr_content,delimiter) values ('$nums','$report',now(),'$ss_mb_reg','$REMOTE_ADDRS','$reportArea','blocks')");


include 'header.php';
?>

<!--타인 게시글 신고하면 오는 페이지-->

<section class="ok_wrap">
    <p class="ok_p">해당 사용자를 차단했습니다.<br>설정->내정보에서 차단목록을 관리할 수 있습니다.</p>
    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="location.href='comm.php'">확인</button>
    </div>
</section>

    <script>
        setTimeout(function(){
            location.href = "comm.php";
        },3000)

    </script>

<?include('footer.php')?>