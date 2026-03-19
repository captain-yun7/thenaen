<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


//if(defined('G5_THEME_PATH')) {
//    require_once(G5_THEME_PATH.'/index.php');
//    return;
//}
//
//if (G5_IS_MOBILE) {
//    include_once(G5_MOBILE_PATH.'/index.php');
//    return;
//}

$header = array(
    'is_header' => true,
    'main_head' => true,
    'head_name' => '호흡재활운동 시작하기',
    'inh' => true,
);

$footer = array(
    'is_footer' => true,
    'page' => 'home',
);
include 'header.php';

if(defined('_INDEX_')) { // index에서만 실행
    include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
}


$outs_index_workout_count = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_work_info where kinds = 'main' and mb_id = '$ss_mb_id' and mb_write_time like '%$common_nowdate%' "));

$g5_member_mb_name = sql_fetch_array(sql_query("select mb_name FROM g5_member where mb_id = '$ss_mb_id'"));
$g5_member_mb_name = $g5_member_mb_name['mb_name'];
?>




<script>
    <?php if(!empty($g5_member_mb_name)) { ?>
        //window.JavaScript.setUserId('<?=$g5_member_mb_name?>');
    <?php } ?>

    function setDeviceToken(Device, Token) {
        $.post("/save_app_token.php",{
            device : Device,
            keys : Token
        }, function(data){
        });
    }

    var setCookie = function(name, value, exp) {
        var date = new Date();
        date.setTime(date.getTime() + exp*24*60*60*1000);
        document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
    };

    var getCookie = function(name) {
        var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');

        return value? value[2] : null;
    };

    var deleteCookie = function(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1999 00:00:10 GMT;';
    }

    function main_day_check_popup_showhide(){


        td_close = $('#td_close').val();

        if(td_close == "on"){
            setCookie("ma_day_ch_po_sh_co", "true", 1);
        }

        main_day_select_save();


    }

    function main_day_select_save(){

        intensity = $("#intensity").val();

        if(intensity != ""){

            $.ajax({
                type: "POST",
                url: "/bbs/workout_ajax.php",
                data: {
                    delimiter: "daysave",
                    intensity : intensity,
                },
                dataType: "text",
                success: function (result) {

                //console.log(result);

                }
            });

        }

    }


</script>



<?php

$ma_day_ch_po_sh_co_phpcookie = $_COOKIE ['ma_day_ch_po_sh_co'];

if($ma_day_ch_po_sh_co_phpcookie == ""){

    $common_nowdate_prev_m1 = date('Y-m-d H:i:s',strtotime($common_nowdate."-1 day"));
    $common_nowdate_prev_m1_split = explode(" ",$common_nowdate_prev_m1);
    $common_nowdate_prev_m1_split_0 = $common_nowdate_prev_m1_split[0];


// 다음 날이 되어서 하루전 어제 값 지정
$common_nowdate_prev_info = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'main' and mb_id = '$ss_mb_id' and mb_write_time like '%$common_nowdate%' order by mb_no desc limit 0,1 "));

//echo "select * FROM g5_work_info where kinds = 'main' and mb_id = '$ss_mb_id' and mb_write_time like '%$common_nowdate%' order by mb_no desc limit 0,1 ";

    ?>

<?php include('today_pop.php')?> <!--오늘의 운동강도 설정 팝업-->

<?php
}
?>
    <section class="main">
        <div class="pd15">
            <!--
                파란색 이미지일때 = exer1.png
                당일추천 운동일때 = exer1_pk.png
            -->

            <!--당일추천 운동일때

                exer_btn에 addClass('pk')
                img src="...exer1_pk.png"  << _pk 붙으면 분홍색이미지
            -->
            <div class="exer_wrap">
                <button type="button" class="exer_btn vt_mid <?php if($menuPart1 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise.php'">
                    <img src="/img/exer1<?php if($menuPart1 =="Y"){ echo "_pk"; }?>.png" alt="지구력 운동">
                    <div class="e_txt">지구력 운동</div>
                </button>
                <button type="button" class="exer_btn vt_mid <?php if($menuPart2 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise.php'">
                    <img src="/img/exer2<?php if($menuPart2 =="Y"){ echo "_pk"; }?>.png" alt="인터벌 운동">
                    <div class="e_txt">인터벌 운동</div>
                </button>
                <button type="button" class="exer_btn vt_mid <?php if($menuPart3 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise.php'">
                    <img src="/img/exer3<?php if($menuPart3 =="Y"){ echo "_pk"; }?>.png" alt="저항/근력 운동">
                    <div class="e_txt">저항/근력 운동</div>
                </button>
                <button type="button" class="exer_btn vt_mid <?php if($menuPart4 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise.php'">
                    <img src="/img/exer4<?php if($menuPart4 =="Y"){ echo "_pk"; }?>.png" alt="호흡근 운동">
                    <div class="e_txt">호흡근 운동</div>
                </button>
                <button type="button" class="exer_btn vt_mid <?php if($menuPart5 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise.php'">
                    <img src="/img/exer5<?php if($menuPart5 =="Y"){ echo "_pk"; }?>.png" alt="유연성 운동">
                    <div class="e_txt">유연성 운동</div>
                </button>
                <button type="button" class="exer_btn vt_mid <?php if($menuPart6 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise.php'">
                    <img src="/img/exer6<?php if($menuPart6 =="Y"){ echo "_pk"; }?>.png" alt="기침보조 운동">
                    <div class="e_txt">기침보조 운동</div>
                </button>
                <!-- <button type="button" class="exer_btn go_more vt_mid" onclick="location.href='exercise.php'">
                    <div class="grid">
                        <img src="/img/icon_plus.png" alt="더보기">
                        <div class="e_txt">더보기</div>
                    </div>
                </button> -->
            </div>

            <a href="b_info.php" class="go_info">호흡재활 관련정보</a>

            <h2 class="h2">나의 건강모니터</h2>

            <div class="myh_wrap">
                <button type="button" class="myh_btn vt_mid" onclick="location.href='myh_1_1.php'">
                    <div class="circle">
                        <div class="grid">
                            <img src="/img/myh1.png" alt="안전한 운동을 했나요?">
                        </div>
                    </div>
                    <div class="myh_txt">
                        안전한 운동을<br>했나요?
                    </div>
                </button>
                <button type="button" class="myh_btn vt_mid" onclick="location.href='myh_2.php'">
                    <div class="circle">
                        <div class="grid">
                            <img src="/img/myh2.png" alt="호흡곤란 증상
                        확인하기">
                        </div>
                    </div>
                    <div class="myh_txt">
                        호흡곤란 증상<br>확인하기
                    </div>
                </button>
                <button type="button" class="myh_btn vt_mid" onclick="location.href='myh_3.php'">
                    <div class="circle">
                        <div class="grid">
                            <img src="/img/myh3.png" alt="얼마나 좋아졌나요?">
                        </div>
                    </div>
                    <div class="myh_txt">
                        얼마나<br>좋아졌나요?
                    </div>
                </button>
            </div>
        </div>
    </section>


<script>

    ma_day_ch_po_sh_co_re = getCookie("ma_day_ch_po_sh_co");

//console.log(ma_day_ch_po_sh_co_re);

    if(ma_day_ch_po_sh_co_re){
        $( '#pop_tdpop_on' ).removeClass( 'on' );
    }



</script>

<?include('footer.php')?>
