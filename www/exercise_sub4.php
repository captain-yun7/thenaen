<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];



$header = array(
    'is_header' => true,
    'head_name' => '호흡 운동',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';

// 운동강도
$outs_index_info = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'main' and mb_write_time like '%$common_nowdate%'"));
$mainworkoutinfo = $outs_index_info['mainworkoutinfo'];

// 심박수 구함
$outs_index_info = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'mainworkout' and mb_write_time like '%$common_nowdate%'"));
$heartnum = $outs_index_info['heartnum'];

$outs_mem_index_info = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_id'"));
$mb_id = $outs_mem_index_info['mb_name'];

$timeSaveMovie = 0;
if($menuPart4 == "Y"){ // 동영상 시간 저장할지 키
    $timeSaveMovie = 1;
}




$mainworkoutinfoChNums = 0;
if($mainworkoutinfo == "저강도 운동"){
    $mainworkoutinfoChNums = 0.6;
}
else if($mainworkoutinfo == "중강도 운동"){
    $mainworkoutinfoChNums = 0.7;
}
else if($mainworkoutinfo == "고강도 운동"){
    $mainworkoutinfoChNums = 0.8;
}
else{
    $mainworkoutinfoChNums = 0.6;
}

if(strlen($outs_mem_index_info['age']) == 4){

    $birthdaygetnow = new DateTime($outs_mem_index_info['age'].'-01-01');
    $referenceDategetnow = new DateTime($common_nowdate);
    $agegetnow = $birthdaygetnow->diff($referenceDategetnow)->y;
    $outs_index_info_heartnum = $outs_index_info['heartnum']; // 안정시 심박수

    $mainworkoutinfoChNumsFinal = (220 - $agegetnow);
    $mainworkoutinfoChNumsFinal = $mainworkoutinfoChNumsFinal - $outs_index_info_heartnum;
    $mainworkoutinfoChNumsFinal = $mainworkoutinfoChNumsFinal * $mainworkoutinfoChNums;
    $mainworkoutinfoChNumsFinal = $mainworkoutinfoChNumsFinal + $outs_index_info_heartnum;

}
else{
    $mainworkoutinfoChNumsFinal = 0;
}


?>

<section class="exercise_sub">
    <div class="pd15">
        <div class="s_text">
            호흡곤란 증상을 줄여주는 호흡 전략으로 일주일에 5회 이상, 호흡법마다 3회씩 총 10회를 반복합니다.<br>
            횡격막 호흡법, 입술오므리기 호흡, 능동적 호기법, 개구리 호흡법'이 제공됩니다.
        </div>
    </div>
    <div class="es_con">
        <h3 class="es_h3 mg20">영상을 보면서 지금 운동을 시작하세요.</h3>
    </div>

    <!--동영상-->
    <div class="video_area">
        <video id = "videoplay1" width="360" class="video"  loop muted controls>
            <source src="/video/ex_sub4.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">호흡 운동</h2>
    </div>

    <!--▼ 운동버튼 추가 (공통요소라 text_wrap 아래에 html만 추가해주시면됩니다)-->
<!--    <div class="ebtn_area">-->
<!--        <button type="button" class="ebtn blue on" onClick = "play1()">운동 시작</button>-->
<!--        <button type="button" class="ebtn gray" onClick = "play1()">운동 종료</button>-->
<!--    </div>-->

    <i class="line"></i>
    <!--▲ 운동버튼 추가 (공통요소라 text_wrap 아래에 html만 추가해주시면됩니다)-->

</section>


    <script type="text/javascript">

        var timeSaveMovie = "<?=$timeSaveMovie?>"; // 공통

        // -- 첫번째 1
        var startPlayKey1 = 0;
        var endPlayKey1 = 0;
        var videocontrol1 = document.getElementById("videoplay1");
        var setTimeId1_1;
        var playTimeCount1 = 0;
        var greeting1_check = 0;

        function alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,movetime,delimiter,kinds,movieName){

            $.ajax({
                type: "POST",
                url: "/bbs/workout_ajax.php",
                data: {
                    timeSaveMovie: timeSaveMovie,
                    startPlayKey : startPlayKey1,
                    endPlayKey : endPlayKey1,
                    playTimeCount : movetime,
                    delimiter : delimiter,
                    kinds : kinds,
                    movieName : movieName,

                },
                dataType: "text",
                success: function (result) {
                    //console.log(result);
                }
            });

        }

        videocontrol1.addEventListener("playing", function(){
            play1_num(1);
        }, false);

        videocontrol1.addEventListener("pause", function(){
            play1_num(0);
        }, false);

        function play1_num(num){

            if(num == 1) {
                videocontrol1.play();
                startPlayKey1 = 1;
                endPlayKey1 = 0;

                if(greeting1_check == 0) { // 한번 만 클릭했을때..
                    setTimeId1_1 = setTimeout(greeting1, 5000, "str", "str2");
                }

                //alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","4","ex_sub4.mp4");

                playTimeCount1 = 0; // 다시 플레이시간 0으로

            }
            else{
                videocontrol1.pause();
                startPlayKey1 = 0;
                endPlayKey1 = 1;
                clearTimeoutFV1();

                //alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","4","ex_sub4.mp4");

                playTimeCount1 = 0; // 다시 플레이시간 0으로
            }

        }


        function play1(){

            if(videocontrol1.paused) {
                videocontrol1.play();
                startPlayKey1 = 1;
                endPlayKey1 = 0;

                if(greeting1_check == 0) { // 한번 만 클릭했을때..
                    setTimeId1_1 = setTimeout(greeting1, 5000, "str", "str2");
                }

                playTimeCount1 = 0; // 다시 플레이시간 0으로

            }
            else{
                videocontrol1.pause();
                startPlayKey1 = 0;
                endPlayKey1 = 1;
                clearTimeoutFV1();

                // $.ajax({
                //     type: "POST",
                //     url: "/bbs/workout_ajax.php",
                //     data: {
                //         timeSaveMovie: timeSaveMovie,
                //         startPlayKey : startPlayKey1,
                //         endPlayKey : endPlayKey1,
                //         playTimeCount : playTimeCount1,
                //         delimiter : "moveTimeSave",
                //         kinds : "4", // 호흡 운동
                //         movieName : "ex_sub4.mp4",
                //
                //     },
                //     dataType: "text",
                //     success: function (result) {
                //
                //     }
                // });

                playTimeCount1 = 0; // 다시 플레이시간 0으로
            }

        }

        function greeting1(str, str2){

            greeting1_check = 1;

            //playTimeCount1 = playTimeCount1+5;
            playTimeCount1 = 5;

            alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","4","ex_sub4.mp4");

            playTimeCount1 = 0;

            clearTimeout(setTimeId1_1);

            setTimeId1_1 = setTimeout(greeting1, 5000, "str", "str2");
        }
        function clearTimeoutFV1(){
            clearTimeout(setTimeId1_1);

            greeting1_check = 0;

        }
        // -- 첫번째 2

    </script>

<?include('footer.php')?>