<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];


$sqlGaInfo1 = sql_fetch_array(sql_query("select * from g5_write_qa where mb_id='".$ss_mb_id."' and wr_is_comment = '0'"));

$sqlGaInfo1_wr_id = $sqlGaInfo1['wr_id'];



$sqlGaInfo2 = sql_fetch_array(sql_query("select * from g5_write_qa where wr_is_comment = '1' and wr_parent = '$sqlGaInfo1_wr_id' order by wr_comment desc limit 0,1"));

$header = array(
    'is_header' => true,
    'head_name' => '내 문의',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set">
    <div class="pd15">
        <div class="sub_block">
            <h2 class="sub_h2 blue">문의답변</h2>
            <div class="sub_div">
<!--                문의에 대한 답변 내용입니다.문의에 대한 답변 내용입니다.문의에 대한 답변 내용입니다.문의에 대한 답변 내용입니다.-->
                <?php
                echo nl2br($sqlGaInfo1['wr_content']);
                ?>
            </div>
        </div>
        <div class="sub_block">
            <h2 class="sub_h2">문의유형</h2>
            <div class="sub_div gray">
<!--                재활정보-->
                <?=$sqlGaInfo1['ca_name']?>
            </div>
        </div>
        <div class="sub_block">
            <h2 class="sub_h2">문의내용</h2>
            <div class="sub_div">
<!--                제가 집에서 혼자 호흡근 재활운동을 하다가 숨이-->
<!--                조금씩 가쁘더니 하루종일 머리가 어지럽고 답답하-->
<!--                네요. 이거 어떡하죠?-->

                <?php
                echo nl2br($sqlGaInfo2['wr_content']);
                ?>
            </div>
        </div>
    </div>

    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="history.go(-1);">확인</button>
    </div>
</section>

<?include('footer.php')?>