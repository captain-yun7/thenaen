<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];



$header = array(
    'is_header' => true,
    'head_name' => '인터벌 운동',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';

// 운동강도
$outs_index_info = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'main' and mb_write_time like '%$common_nowdate%' order by mb_no desc limit 0,1" ));
$mainworkoutinfo = $outs_index_info['mainworkoutinfo'];

// 심박수 구함
$outs_index_info = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'mainworkout' and mb_write_time like '%$common_nowdate%'"));
$heartnum = $outs_index_info['heartnum'];

$outs_mem_index_info = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_id'"));
$mb_id = $outs_mem_index_info['mb_name'];

$timeSaveMovie = 0;
if($menuPart2 == "Y"){ // 동영상 시간 저장할지 키
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

<?include('exercise_subpop.php')?>


<!--
    [저강도/중강도/고강도] 은 앞 홈화면1에서 설정한 값이 보이도록 셋팅.
-->


<section class="exercise_sub">
    <div class="pd15">
        <div class="s_text">
            지구력 운동이 어렵다면 대신 인터벌 운동을
            시작해보세요.<br><br>

            미국 스포츠의학회의 운동처방 지침에 따르면 운동 강도로는 ‘약간 힘듦~힘듦’ 정도를 권고하고 있습니다. 인터벌 운동의 종류에는 평지 걷기, 계단 오르기, 자전거 타기 등이 있습니다. 괜찮다면 경사를 걷거나 빠르게 걸어볼 수도 있습니다.

            <!-- 초급: 프로그램 1 (3분 운동+ 1분 휴식으로 구성되어 3회 반복. 총 12분)<br>
            중급: 프로그램 2 (3분 운동+ 1분 휴식으로 구성되어 5회 반복. 총 20분)<br>
            고급: 프로그램 1+2 (3분 운동+ 1분 휴식으로 구성되어 8회 반복. 총 32분) -->
        </div>
    </div>
    <!-- <div class="es_con">
        <h3 class="es_h3">인터벌 운동을 시작할 때 프로그램을 선택해주세요. 운동시간과 휴식시간을 알려드립니다.</h3>
    </div> -->


    <?php
    if($mainworkoutinfo == "고강도 운동"){
    ?>


    <!--동영상-->
    <div class="video_area">
        <video id = "videoplay1" width="360" class="video" loop muted controls>
            <source src="/video/ex_sub2_1.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">인터벌 프로그램-고강도 운동</h2>
    </div>
 
    <div class="ebtn_area">
        <button type="button" id = "ebtn_blue_id1" class="ebtn blue on" onClick = "play1()">운동 시작</button>
        <button type="button" id = "ebtn_gray_id1" class="ebtn gray" onClick = "play1()">운동 종료</button>
    </div>

    <?php
    }
    ?>






    <i class="line"></i>



    <?php
    if($mainworkoutinfo == "중강도 운동"){
    ?>


    <!--동영상-->
    <div class="video_area">
        <video id = "videoplay2" width="360" class="video" loop muted controls>
            <source src="/video/ex_sub2_2.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">인터벌 프로그램-중강도 운동</h2>
    </div>
 
    <div class="ebtn_area">
        <button type="button" id = "ebtn_blue_id2" class="ebtn blue on" onClick = "play2()">운동 시작</button>
        <button type="button" id = "ebtn_gray_id2" class="ebtn gray" onClick = "play2()">운동 종료</button>
    </div>


    <?php
    }
    ?>





    <i class="line"></i>



    <?php
    if($mainworkoutinfo == "저강도 운동"){
    ?>



    <!--동영상-->
    <div class="video_area">
        <video id = "videoplay3" width="360" class="video" loop muted controls>
            <source src="/video/ex_sub2_3.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">인터벌 프로그램-저강도 운동</h2>
    </div>
 
    <div class="ebtn_area">
        <button type="button" id = "ebtn_blue_id3" class="ebtn blue on" onClick = "play3()">운동 시작</button>
        <button type="button" id = "ebtn_gray_id3" class="ebtn gray" onClick = "play3()">운동 종료</button>
    </div>


    <?php
    }
    ?>




</section>



    <script type="text/javascript">

        var timeSaveMovie = "<?=$timeSaveMovie?>"; // 공통

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



<?php
if($mainworkoutinfo == "고강도 운동"){
?>


        // 고강도
        // -- 첫번째 1
        var startPlayKey1 = 0;
        var endPlayKey1 = 0;
        var videocontrol1 = document.getElementById("videoplay1");
        var setTimeId1_1;
        var playTimeCount1 = 0;
        var greeting1_check = 0;

        videocontrol1.addEventListener("playing", function(){
            play1_num(1);

            $("#ebtn_blue_id1").removeClass('on');
            $("#ebtn_gray_id1").addClass('on');

        }, false);

        videocontrol1.addEventListener("pause", function(){
            play1_num(0);

            $("#ebtn_blue_id1").addClass('on');
            $("#ebtn_gray_id1").removeClass('on');

        }, false);

        function play1_num(num){

            if(num == 1) {
                videocontrol1.play();
                startPlayKey1 = 1;
                endPlayKey1 = 0;

                if(greeting1_check == 0) { // 한번 만 클릭했을때..

                    setTimeId1_1 = setTimeout(greeting1, 5000, "str", "str2");

                }

                //alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","2","ex_sub2_1.mp4");

                playTimeCount1 = 0; // 다시 플레이시간 0으로


            }
            else{
                videocontrol1.pause();
                startPlayKey1 = 0;
                endPlayKey1 = 1;
                clearTimeoutFV1();

                //alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","2","ex_sub2_1.mp4");

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

                //alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","2","ex_sub2_1.mp4");

                playTimeCount1 = 0; // 다시 플레이시간 0으로

            }
            else{
                videocontrol1.pause();
                startPlayKey1 = 0;
                endPlayKey1 = 1;
                clearTimeoutFV1();

                //alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","2","ex_sub2_1.mp4");


                playTimeCount1 = 0; // 다시 플레이시간 0으로
            }

        }


        function greeting1(str, str2){

            greeting1_check = 1;

            //playTimeCount1 = playTimeCount1+5;

            playTimeCount1 = 5;

            alaxPlayF(timeSaveMovie,startPlayKey1,endPlayKey1,playTimeCount1,"moveTimeSave","2","ex_sub2_1.mp4");

            playTimeCount1 = 0;

            clearTimeout(setTimeId1_1);

            setTimeId1_1 = setTimeout(greeting1, 5000, "str", "str2");
        }
        function clearTimeoutFV1(){
            clearTimeout(setTimeId1_1);

            greeting1_check = 0;

        }
        // -- 첫번째 2


<?php
}
?>


        <?php
        if($mainworkoutinfo == "중강도 운동"){
        ?>


        // 중강도
        // -- 두번째 1
        var startPlayKey2 = 0;
        var endPlayKey2 = 0;
        var videocontrol2 = document.getElementById("videoplay2");
        var setTimeId2_2;
        var playTimeCount2 = 0;
        var greeting2_check = 0;


        videocontrol2.addEventListener("playing", function(){
            play2_num(1);

            $("#ebtn_blue_id2").removeClass('on');
            $("#ebtn_gray_id2").addClass('on');

        }, false);

        videocontrol2.addEventListener("pause", function(){
            play2_num(0);

            $("#ebtn_blue_id2").addClass('on');
            $("#ebtn_gray_id2").removeClass('on');

        }, false);

        function play2_num(num){

            if(num == 1) {
                videocontrol2.play();
                startPlayKey2 = 1;
                endPlayKey2 = 0;

                if(greeting2_check == 0) { // 한번 만 클릭했을때..
                    setTimeId2_2 = setTimeout(greeting2, 5000, "str", "str2");
                }

                //alaxPlayF(timeSaveMovie,startPlayKey2,endPlayKey2,playTimeCount2,"moveTimeSave","2","ex_sub2_2.mp4");

                playTimeCount2 = 0; // 다시 플레이시간 0으로

            }
            else{
                videocontrol2.pause();
                startPlayKey2 = 0;
                endPlayKey2 = 1;
                clearTimeoutFV2();

                //alaxPlayF(timeSaveMovie,startPlayKey2,endPlayKey2,playTimeCount2,"moveTimeSave","2","ex_sub2_2.mp4");

                playTimeCount2 = 0; // 다시 플레이시간 0으로
            }

        }

        function play2(){

            if(videocontrol2.paused) {
                videocontrol2.play();
                startPlayKey2 = 1;
                endPlayKey2 = 0;

                if(greeting2_check == 0) { // 한번 만 클릭했을때..
                    setTimeId2_2 = setTimeout(greeting2, 5000, "str", "str2");
                }

                //alaxPlayF(timeSaveMovie,startPlayKey2,endPlayKey2,playTimeCount2,"moveTimeSave","2","ex_sub2_2.mp4");

                playTimeCount2 = 0; // 다시 플레이시간 0으로
            }
            else{
                videocontrol2.pause();
                startPlayKey2 = 0;
                endPlayKey2 = 1;
                clearTimeoutFV2();

                //alaxPlayF(timeSaveMovie,startPlayKey2,endPlayKey2,playTimeCount2,"moveTimeSave","2","ex_sub2_2.mp4");

                playTimeCount2 = 0; // 다시 플레이시간 0으로
            }

        }

        function greeting2(str, str2){

            greeting2_check = 1;

            //playTimeCount2 = playTimeCount2+5;
            playTimeCount2 = 5;

            alaxPlayF(timeSaveMovie,startPlayKey2,endPlayKey2,playTimeCount2,"moveTimeSave","2","ex_sub2_2.mp4");

            playTimeCount2 = 0;

            clearTimeout(setTimeId2_2);

            setTimeId2_2 = setTimeout(greeting2, 5000, "str", "str2");
        }
        function clearTimeoutFV2(){
            clearTimeout(setTimeId2_2);
            greeting2_check = 0;


        }
        // -- 두번째 2


        <?php
        }
        ?>


        <?php
        if($mainworkoutinfo == "저강도 운동"){
        ?>

        // 저강도
        // -- 세번째 1
        var startPlayKey3 = 0;
        var endPlayKey3 = 0;
        var videocontrol3 = document.getElementById("videoplay3");
        var setTimeId3_3;
        var playTimeCount3 = 0;
        var greeting3_check = 0;

        videocontrol3.addEventListener("playing", function(){
            play3_num(1);

            $("#ebtn_blue_id3").removeClass('on');
            $("#ebtn_gray_id3").addClass('on');

        }, false);

        videocontrol3.addEventListener("pause", function(){
            play3_num(0);

            $("#ebtn_blue_id3").addClass('on');
            $("#ebtn_gray_id3").removeClass('on');

        }, false);


        function play3_num(num){

            if(num == 1) {
                videocontrol3.play();
                startPlayKey3 = 1;
                endPlayKey3 = 0;

                if(greeting3_check == 0) { // 한번 만 클릭했을때..
                    setTimeId3_3 = setTimeout(greeting3, 5000, "str", "str2");
                }

                //alaxPlayF(timeSaveMovie,startPlayKey3,endPlayKey3,playTimeCount3,"moveTimeSave","2","ex_sub2_3.mp4");

                playTimeCount3 = 0; // 다시 플레이시간 0으로

            }
            else{
                videocontrol3.pause();
                startPlayKey3 = 0;
                endPlayKey3 = 1;
                clearTimeoutFV3();

                //alaxPlayF(timeSaveMovie,startPlayKey3,endPlayKey3,playTimeCount3,"moveTimeSave","2","ex_sub2_3.mp4");

                // $.ajax({
                //     type: "POST",
                //     url: "/bbs/workout_ajax.php",
                //     data: {
                //         timeSaveMovie: timeSaveMovie,
                //         startPlayKey : startPlayKey3,
                //         endPlayKey : endPlayKey3,
                //         playTimeCount : playTimeCount3,
                //         delimiter : "moveTimeSave",
                //         kinds : "2", // 인터벌 운동
                //         movieName : "ex_sub2_3.mp4",
                //
                //     },
                //     dataType: "text",
                //     success: function (result) {
                //
                //     }
                // });



                playTimeCount3 = 0; // 다시 플레이시간 0으로
            }

        }

        function play3(){

            if(videocontrol3.paused) {
                videocontrol3.play();
                startPlayKey3 = 1;
                endPlayKey3 = 0;

                if(greeting3_check == 0) { // 한번 만 클릭했을때..
                    setTimeId2_3 = setTimeout(greeting3, 5000, "str", "str2");
                }


                //alaxPlayF(timeSaveMovie,startPlayKey3,endPlayKey3,playTimeCount3,"moveTimeSave","2","ex_sub2_3.mp4");

                playTimeCount3 = 0; // 다시 플레이시간 0으로

            }
            else{
                videocontrol3.pause();
                startPlayKey3 = 0;
                endPlayKey3 = 1;
                clearTimeoutFV3();

                //alaxPlayF(timeSaveMovie,startPlayKey3,endPlayKey3,playTimeCount3,"moveTimeSave","2","ex_sub2_3.mp4");

                // $.ajax({
                //     type: "POST",
                //     url: "/bbs/workout_ajax.php",
                //     data: {
                //         timeSaveMovie: timeSaveMovie,
                //         startPlayKey : startPlayKey3,
                //         endPlayKey : endPlayKey3,
                //         playTimeCount : playTimeCount3,
                //         delimiter : "moveTimeSave",
                //         kinds : "2", // 인터벌 운동
                //         movieName : "ex_sub2_3.mp4",
                //
                //     },
                //     dataType: "text",
                //     success: function (result) {
                //
                //     }
                // });



                playTimeCount3 = 0; // 다시 플레이시간 0으로
            }

        }

        function greeting3(str, str2){

            greeting3_check = 1;

            playTimeCount3 = 5;
            //playTimeCount3 = playTimeCount3+5;

            alaxPlayF(timeSaveMovie,startPlayKey3,endPlayKey3,playTimeCount3,"moveTimeSave","2","ex_sub2_3.mp4");

            playTimeCount3 = 0;

            clearTimeout(setTimeId3_3);

            setTimeId3_3 = setTimeout(greeting3, 5000, "str", "str2");
        }
        function clearTimeoutFV3(){
            clearTimeout(setTimeId3_3);

            greeting3_check = 0;

        }
        // -- 세번째 2

        <?php
        }
        ?>












    </script>

<?include('footer.php')?>