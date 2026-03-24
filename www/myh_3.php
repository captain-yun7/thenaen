<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '얼마나 좋아졌나요?',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';

$years = $_GET['years'];
$months = $_GET['months'];
$days = $_GET['days'];
$prevs = $_GET['prevs'];
$nexts = $_GET['nexts'];

if($prevs == 1){

    $monthsTemp = $months - 1;
    $months = $monthsTemp;
    if($months <= 1){
        $years = $years - 1;
        $months = 12;
    }

}

if($nexts == 1){

    $monthsTemp = $months + 1;
    $months = $monthsTemp;

    if($months >= 12){
        $years = $years + 1;
        $months = 1;
    }

}



if($years != ""){ $nowData_Year = $years; }
else{ $nowData_Year = date("Y"); } // 현재 날짜 년

if($months != ""){ $nowData_Month = $months; }
else{ $nowData_Month = date("m"); } // 현재 날짜 월

if($days != ""){ $nowData_day = $days; }
else{ $nowData_day = date("d"); } // 현재 날짜 일

// -- 각 날짜 변수 -- //
$cal_year=$nowData_Year;
$cal_month=$nowData_Month;
$cal_day=$nowData_day;

$cal_Sum_str1 = $cal_year."-".$cal_month."-".$cal_day;
$dateFirstTime = $cal_year."-".$cal_month."-01";

// ---- 그달의 마지막 날짜를 구한다 ----------- //
$check_28=checkdate($cal_month, 28, $cal_year);
$check_29=checkdate($cal_month, 29, $cal_year);
$check_30=checkdate($cal_month, 30, $cal_year);
$check_31=checkdate($cal_month, 31, $cal_year);

if($check_28 != "") $last_day=28;
if($check_29 != "") $last_day=29;
if($check_30 != "") $last_day=30;
if($check_31 != "") $last_day=31;

$yoil = array("일","월","화","수","목","금","토");
$check_1_get_week = ($yoil[date('w', strtotime($dateFirstTime))]); // 현재 요일날짜

if($check_1_get_week == "일"){ $j_temp_change_num = 0; }
if($check_1_get_week == "월"){ $j_temp_change_num = 1; }
if($check_1_get_week == "화"){ $j_temp_change_num = 2; }
if($check_1_get_week == "수"){ $j_temp_change_num = 3; }
if($check_1_get_week == "목"){ $j_temp_change_num = 4; }
if($check_1_get_week == "금"){ $j_temp_change_num = 5; }
if($check_1_get_week == "토"){ $j_temp_change_num = 6; }

$yoil = array("일","월","화","수","목","금","토");
$yoilResult = ($yoil[date('w', strtotime($cal_year."-".$cal_month."-".$cal_day))]); // 현재 요일날짜

$nowData_Month_ch = $nowData_Month;
$nowData_Month_ch_strlen = strlen($nowData_Month_ch);

//if($nowData_Month_ch_strlen > 1){ // 월이 1글자 이상이면
//    if($nowData_Month_ch[0] == 0){
//        $nowData_Month_ch = $nowData_Month_ch[1];
//    }
//}
//

$nowData_Month_ch = $nowData_Month;

// ---------------- 전클릭, 후클릭 코드 ------------------------- //
//$nowData_Month_ch_prev = $nowData_Month_ch - 1;
//$nowData_Month_ch_next = $nowData_Month_ch + 1;
//
//if($nowData_Month_ch <= 1){
//    $nowData_Month_ch_prev = 12;
//}
//
//if($nowData_Month_ch >= 12) {
//    $nowData_Month_ch_next = 1;
//}

//echo "prv=".$nowData_Month_ch_prev;
//echo "<br>";
//echo "next=".$nowData_Month_ch_next;
//echo "<br>";

// ---------------- 전클릭, 후클릭 코드 ------------------------- //

$nowData_Month_ch_prev = $nowData_Month_ch - 1;
$nowData_Month_ch_next = $nowData_Month_ch + 1;

if($nowData_Month_ch <= 1){
    $nowData_Month_ch_prev = 12;
}

if($nowData_Month_ch >= 12) {
    $nowData_Month_ch_next = 1;
}

if($nowData_Month_ch == "01") { $nowData_Month_ch_ch = "1"; }
else if($nowData_Month_ch == "02") { $nowData_Month_ch_ch = "2"; }
else if($nowData_Month_ch == "03") { $nowData_Month_ch_ch = "3"; }
else if($nowData_Month_ch == "04") { $nowData_Month_ch_ch = "4"; }
else if($nowData_Month_ch == "05") { $nowData_Month_ch_ch = "5"; }
else if($nowData_Month_ch == "06") { $nowData_Month_ch_ch = "6"; }
else if($nowData_Month_ch == "07") { $nowData_Month_ch_ch = "7"; }
else if($nowData_Month_ch == "08") { $nowData_Month_ch_ch = "8"; }
else if($nowData_Month_ch == "09") { $nowData_Month_ch_ch = "9"; }
else{
    $nowData_Month_ch_ch = $nowData_Month_ch;
}


$datej = date("j");

?>

<?include('rec_subpop.php')?>

<section class="myh my">
<!--    <div class="pd15">-->
<!--        <div class="rc">-->
<!--            <div class="record_area">-->
<!--                <div class="rc_text">-->
<!--                    녹음 시작 버튼을 누르고 숨을 크게 들이마시고-->
<!--                    충분히 숨을 참은 다음에 천천히 길게 내뱉으세요. 그 후 녹음을 종료하세요.-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="time_area">00:00:00</div>-->
<!--            <div class="btn_area">-->
<!--                <button type="button" class="rbtns rbtn1">-->
<!--                    <img src="/img/rbtn1.png" alt="녹음시작" class="blue on">-->
<!--                    <img src="/img/rbtn1_off.png" alt="녹음중" class="gray">-->
<!--                </button>-->
<!--                <button type="button" class="rbtns rbtn2">-->
<!--                    <img src="/img/rbtn2.png" alt="녹음재생" class="blue on">-->
<!--                    <img src="/img/rbtn2_off.png" alt="녹음재생중" class="gray">-->
<!--                </button>-->
<!--                <button type="button" class="rbtns rbtn3">-->
<!--                    <img src="/img/rbtn3.png" alt="녹음종료" class="blue on">-->
<!--                    <img src="/img/rbtn3_off.png" alt="녹음완료" class="gray">-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
        <div class="calendar">
            <div class="c_tit">
                <div class="ct_left vt_bot"><?=$nowData_Year?></div>



                <div class="ct_cen vt_bot">
                    <a href = './myh_3.php?years=<?=$nowData_Year?>&months=<?=$nowData_Month?>&days=<?=$nowData_day?>&prevs=1'><font size = "2"><?=$nowData_Month_ch_prev?>월</font></a>
                    <?=$nowData_Month_ch?>월
                    <a href = './myh_3.php?years=<?=$nowData_Year?>&months=<?=$nowData_Month?>&days=<?=$nowData_day?>&nexts=1'><font size = "2"><?=$nowData_Month_ch_next?>월</font></a>
                </div>







                <div class="ct_right vt_bot"></div>
            </div>

            <table class="table">
                <tr>
                    <th class="th">일</th>
                    <th class="th">월</th>
                    <th class="th">화</th>
                    <th class="th">수</th>
                    <th class="th">목</th>
                    <th class="th">금</th>
                    <th class="th">토</th>
                </tr>



                <tr class="tr">



                    <?php
                    for($i=0; $i<$last_day+$j_temp_change_num; $i++){

                    $temp=$i+1; // 날짜 계산 변수
                    $show_temp=$temp-$j_temp_change_num; // 보여줄 날짜 변수


                    $show_temp_display = $show_temp;
                    if($datej == $show_temp){
                        $show_temp_display = "<b><font size='4'>".$show_temp."</font></b>";
                    }




                    // 날짜 보여줌
                    if($i < $j_temp_change_num){
                        ?>
                        <td  class="td prev">&nbsp;</td>
                        <?php
                    }
                    else{
                        ?>
                        <td  class="td" onClick = "popupOpenVarSave('<?=$nowData_Year?>','<?=$nowData_Month_ch?>','<?=$show_temp?>')"><?=$show_temp_display?></td>
                        <?php
                    }

                    // 7일단위로 다음줄로..
                    if($temp % 7 == 0){
                    ?>
                </tr>
                <?php
                }
                }
                ?>
            </table>


        </div>

        <div class="pd15">
            <div class="tab">
                <div class="date"><a id = "pd15_months"></a>월 <a id = "pd15_days"></a>일 <a id = "pd15_yoils"></a>요일<br>산소포화도</div>
                <div class="a_text">
                    <table class="s_table">
                        <tr>
                            <th class="th">운동 전</th>
                            <td class="td">산소포화도 <a id = "pd15_1"></a>%</td>
                            <td class="td">심박수 <a id = "pd15_2"></a>회/분</td>
                        </tr>
                        <tr>
                            <th class="th" id = "rowspan_id_big_1" rowspan="2">운동 중 </th>
                            <td class="td">산소포화도 <a id = "pd15_3"></a>%</td>
                            <td class="td">최대 심박수<br><a id = "pd15_4"></a>회/분</td>
                        </tr>
                        <tr id = "rowspan_id_big_1_area">
                            <td class="td">산소포화도 <a id = "pd15_3_1"></a>%</td>
                            <td class="td">최대 심박수<br><a id = "pd15_4_1"></a>회/분</td>
                        </tr>
                        <tr>
                            <th class="th" id = "rowspan_id_big_2" rowspan="2">안정 시<br>평균 </th>
                            <td class="td">산소포화도 <a id = "pd15_5"></a>%</td>
                            <td class="td">심박수 평균 범위<br><a id = "pd15_6"></a> ~ <a id = "pd15_7"></a></td>
                        </tr>
                        <tr id = "rowspan_id_big_2_area">
                            <td class="td">산소포화도 <a id = "pd15_5_1"></a>%</td>
                            <td class="td">심박수 평균 범위<br><a id = "pd15_6_1"></a> ~ <a id = "pd15_7_1"></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</section>

<script>

    $('.myh .calendar .td').click(function(){
//console.log("tet1");
        if($(this).hasClass('next')) {

        }else if($(this).hasClass('prev')){

        }else{

            $.ajax({
                type: "POST",
                url: "/bbs/workout_ajax.php",
                data: {
                    delimiter: "getHowfellgood",
                    popupOpenVarSave1 : popupOpenVarSave1,
                    popupOpenVarSave2 : popupOpenVarSave2,
                    popupOpenVarSave3 : popupOpenVarSave3,
                },
                dataType: "text",
                success: function (result) {

                    //console.log(result);
                    resultburi1 = result.split("(1)");
                    //console.log(resultburi1[0]); // 5-6
                    resultburi1_buri = resultburi1[0].split("-");
                    resultburi1_buri_0 = resultburi1_buri[0];
                    resultburi1_buri_1 = resultburi1_buri[1];
                    //console.log(resultburi1_buri_0); // 5
                    //console.log(resultburi1_buri_1); //

                    $("#pd15_1").text(resultburi1_buri_0);
                    $("#pd15_2").text(resultburi1_buri_1);
                    $("#pd15_1_small").text(resultburi1_buri_0);
                    $("#pd15_2_small").text(resultburi1_buri_1);

                    resultburi1_1 = resultburi1[1].split("(2)");
                    //console.log(resultburi1_1[0]); // -2-2-2-2-2-1-1-1-1-1
                    //console.log(resultburi1_1[0].length);
                    resultburi1_1_0 = resultburi1_1[0].split("-");
                    if(resultburi1_1_0.length < 11){
                       // console.log("1="+resultburi1_1_0);

                        $("#rowspan_id_big_1").attr("rowspan",1);
                        $("#rowspan_id_big_2").attr("rowspan",1);
                        $("#rowspan_id_small_1").attr("rowspan",1);
                        $("#rowspan_id_small_2").attr("rowspan",1);

                        $("#rowspan_id_big_1_area").hide();
                        $("#rowspan_id_big_2_area").hide();
                        $("#rowspan_id_small_1_area").hide();
                        $("#rowspan_id_small_2_area").hide();


                        $("#pd15_3").text("");
                        $("#pd15_3_small").text("");
                        $("#pd15_4").text("");
                        $("#pd15_4_small").text("");
                        $("#pd15_5").text("");
                        $("#pd15_5_small").text("");
                        $("#pd15_6").text("");
                        $("#pd15_6_small").text("");
                        $("#pd15_7").text("");
                        $("#pd15_7_small").text("");




                        if(resultburi1_1_0[1] == "") {resultburi1_1_0[1] = 0 }
                        if(resultburi1_1_0[2] == "") {resultburi1_1_0[2] = 0 }
                        if(resultburi1_1_0[3] == "") {resultburi1_1_0[3] = 0 }
                        if(resultburi1_1_0[4] == "") {resultburi1_1_0[4] = 0 }
                        if(resultburi1_1_0[5] == "") {resultburi1_1_0[5] = 0 }

                        // console.log(resultburi1_1_0[1]);
                        // console.log(resultburi1_1_0[2]);
                        // console.log(resultburi1_1_0[3]);
                        // console.log(resultburi1_1_0[4]);
                        // console.log(resultburi1_1_0[5]);
                        // console.log(resultburi1_1_0[6]);


                        $("#pd15_3").text(resultburi1_1_0[1]);
                        $("#pd15_3_small").text(resultburi1_1_0[1]);

                        $("#pd15_4").text(resultburi1_1_0[2]);
                        $("#pd15_4_small").text(resultburi1_1_0[2]);

                        $("#pd15_5").text(resultburi1_1_0[5]);
                        $("#pd15_5_small").text(resultburi1_1_0[5]);
                        $("#pd15_6").text(resultburi1_1_0[3]);
                        $("#pd15_6_small").text(resultburi1_1_0[3]);
                        $("#pd15_7").text(resultburi1_1_0[4]);
                        $("#pd15_7_small").text(resultburi1_1_0[4]);
                    }
                    else{
                       // console.log("2="+resultburi1_1_0);

                        $("#rowspan_id_big_1").attr("rowspan",2);
                        $("#rowspan_id_big_2").attr("rowspan",2);
                        $("#rowspan_id_small_1").attr("rowspan",2);
                        $("#rowspan_id_small_2").attr("rowspan",2);

                        $("#rowspan_id_big_1_area").show();
                        $("#rowspan_id_big_2_area").show();
                        $("#rowspan_id_small_1_area").show();
                        $("#rowspan_id_small_2_area").show();



                        $("#pd15_3").text("");
                        $("#pd15_3_small").text("");
                        $("#pd15_4").text("");
                        $("#pd15_4_small").text("");
                        $("#pd15_3_1").text("");
                        $("#pd15_3_small_1").text("");
                        $("#pd15_4_1").text("");
                        $("#pd15_4_small_1").text("");

                        $("#pd15_5").text("");
                        $("#pd15_5_small").text("");
                        $("#pd15_5_1").text("");
                        $("#pd15_5_small_1").text("");

                        $("#pd15_6").text("");
                        $("#pd15_6_small").text("");
                        $("#pd15_6_1").text("");
                        $("#pd15_6_small_1").text("");

                        $("#pd15_7").text("");
                        $("#pd15_7_small").text("");
                        $("#pd15_7_1").text("");
                        $("#pd15_7_small_1").text("");





                        if(resultburi1_1_0[1] == "") {resultburi1_1_0[1] = 0 }
                        if(resultburi1_1_0[2] == "") {resultburi1_1_0[2] = 0 }
                        if(resultburi1_1_0[3] == "") {resultburi1_1_0[3] = 0 }
                        if(resultburi1_1_0[4] == "") {resultburi1_1_0[4] = 0 }
                        if(resultburi1_1_0[5] == "") {resultburi1_1_0[5] = 0 }
                        if(resultburi1_1_0[6] == "") {resultburi1_1_0[6] = 0 }
                        if(resultburi1_1_0[7] == "") {resultburi1_1_0[7] = 0 }
                        if(resultburi1_1_0[8] == "") {resultburi1_1_0[8] = 0 }
                        if(resultburi1_1_0[9] == "") {resultburi1_1_0[9] = 0 }
                        if(resultburi1_1_0[10] == "") {resultburi1_1_0[10] = 0 }


                        $("#pd15_3").text(resultburi1_1_0[1]);
                        $("#pd15_3_small").text(resultburi1_1_0[1]);
                        $("#pd15_4").text(resultburi1_1_0[2]);
                        $("#pd15_4_small").text(resultburi1_1_0[2]);
                        $("#pd15_3_1").text(resultburi1_1_0[6]);
                        $("#pd15_3_small_1").text(resultburi1_1_0[6]);
                        $("#pd15_4_1").text(resultburi1_1_0[7]);
                        $("#pd15_4_small_1").text(resultburi1_1_0[7]);

                        $("#pd15_5").text(resultburi1_1_0[5]);
                        $("#pd15_5_small").text(resultburi1_1_0[5]);
                        $("#pd15_5_1").text(resultburi1_1_0[10]);
                        $("#pd15_5_small_1").text(resultburi1_1_0[10]);

                        $("#pd15_6").text(resultburi1_1_0[3]);
                        $("#pd15_6_small").text(resultburi1_1_0[3]);
                        $("#pd15_6_1").text(resultburi1_1_0[8]);
                        $("#pd15_6_small_1").text(resultburi1_1_0[8]);

                        $("#pd15_7").text(resultburi1_1_0[4]);
                        $("#pd15_7_small").text(resultburi1_1_0[4]);
                        $("#pd15_7_1").text(resultburi1_1_0[9]);
                        $("#pd15_7_small_1").text(resultburi1_1_0[9]);


                        // console.log(resultburi1_1_0['0']);
                        // console.log(resultburi1_1_0['1']);
                        // console.log(resultburi1_1_0['2']);
                        // console.log(resultburi1_1_0['3']);
                        // console.log(resultburi1_1_0['4']);
                        // console.log(resultburi1_1_0['5']);
                        // console.log(resultburi1_1_0['6']);
                        // console.log(resultburi1_1_0['7']);
                        // console.log(resultburi1_1_0['8']);
                        // console.log(resultburi1_1_0['9']);
                        // console.log(resultburi1_1_0['10']);
                        // console.log(resultburi1_1_0['11']);
                        // console.log(resultburi1_1_0['12']);
                        // console.log(resultburi1_1_0['13']);
                        // console.log(resultburi1_1_0['14']);
                        // console.log(resultburi1_1_0['15']);
                        // console.log(resultburi1_1_0['16']);
                        // console.log(resultburi1_1_0['17']);
                        // console.log(resultburi1_1_0['18']);
                        // console.log(resultburi1_1_0['19']);
                    }

                    //console.log(resultburi1_1[1]); // 2024-03-14-목
                    resultburi1_1_1_buri = resultburi1_1[1].split("-");
                    //console.log(resultburi1_1_1_buri[0]); // 2024
                    //console.log(resultburi1_1_1_buri[1]); // 03
                    //console.log(resultburi1_1_1_buri[2]); // 14
                    //console.log(resultburi1_1_1_buri[3]); // 목


                    $("#pd15_months").text(resultburi1_1_1_buri[1]);
                    $("#pd15_days").text(resultburi1_1_1_buri[2]);
                    $("#pd15_yoils").text(resultburi1_1_1_buri[3]);


                    // resultburi_0 = resultburi['0'];
                    // resultburi_1 = resultburi['1'];
                    // resultburi_2 = resultburi['2'];
                    // resultburi_3 = resultburi['3'];
                    // resultburi_4 = resultburi['4'];
                    // resultburi_5 = resultburi['5'];
                    // resultburi_6 = resultburi['6'];
                    // resultburi_7 = resultburi['7'];
                    // resultburi_8 = resultburi['8'];
                    // resultburi_9 = resultburi['9'];
                    // resultburi_10 = resultburi['10'];
                    // resultburi_11 = resultburi['11'];
                    // resultburi_12 = resultburi['12']; // 년
                    // resultburi_13 = resultburi['13']; // 월
                    // resultburi_14 = resultburi['14']; // 일
                    // resultburi_15 = resultburi['15']; // 요일

                    // 5-6(0)2-2-2-2-2(1)1-1-1-1-1(3)2024-03-14-목
                    // console.log(resultburi_0);
                    // console.log(resultburi_1);
                    // console.log(resultburi_2);
                    // console.log(resultburi_3);
                    // console.log(resultburi_4);
                    // console.log(resultburi_5);
                    // console.log(resultburi_6);
                    // console.log(resultburi_7);
                    // console.log(resultburi_8);
                    // console.log(resultburi_9);
                    // console.log(resultburi_10);
                    // console.log(resultburi_11);
                    // console.log(resultburi_12);
                    // console.log(resultburi_13);
                    // console.log(resultburi_14);
                    // console.log(resultburi_15);

                    // if(resultburi_0 == ""){ resultburi_0 = 0; }
                    // if(resultburi_1 == ""){ resultburi_1 = 0; }
                    // if(resultburi_2 == ""){ resultburi_2 = 0; }
                    // if(resultburi_3 == ""){ resultburi_3 = 0; }
                    // if(resultburi_4 == ""){ resultburi_4 = 0; }
                    // if(resultburi_5 == ""){ resultburi_5 = 0; }
                    // if(resultburi_6 == ""){ resultburi_6 = 0; }
                    // if(resultburi_8 == ""){ resultburi_8 = 0; }

                    // $("#pd15_1").text(resultburi_0);
                    // $("#pd15_2").text(resultburi_1);
                    // $("#pd15_1_small").text(resultburi_0);
                    // $("#pd15_2_small").text(resultburi_1);
                    //
                    // $("#pd15_3").text(resultburi_0);
                    // $("#pd15_4").text(resultburi_2);
                    // $("#pd15_3_small").text(resultburi_0);
                    // $("#pd15_4_small").text(resultburi_2);
                    //
                    //
                    // $("#pd15_5").text(resultburi_0);
                    // $("#pd15_5_small").text(resultburi_0);
                    //
                    // $("#pd15_6").text(resultburi_3);
                    // $("#pd15_7").text(resultburi_4);
                    // $("#pd15_6_small").text(resultburi_3);
                    // $("#pd15_7_small").text(resultburi_4);
                    //
                    // $("#pd15_months").text(resultburi_6);
                    // $("#pd15_days").text(resultburi_7);
                    // $("#pd15_yoils").text(resultburi_8);

                    //if(resultburi_1 != "" && resultburi_2 != "" && resultburi_3 != "" && resultburi_4 != "") {

                        $('.s_subpop').addClass('on');
                        $('.myh .tab').addClass('on');
                    //}
                    // else{
                    //     $('.s_subpop').removeClass('on');
                    //     $('.myh .tab').removeClass('on');
                    //
                    // }

                }
            });

        }
    });

    $('.s_subpop .ok_btn').click(function(){
        $('.s_subpop').removeClass('on');
    });

    var popupOpenVarSave1 = "";
    var popupOpenVarSave2 = "";
    var popupOpenVarSave3 = "";

    function popupOpenVarSave(str1,str2,str3){

        popupOpenVarSave1 = str1;
        popupOpenVarSave2 = str2;
        popupOpenVarSave3 = str3;

    }

</script>

<?include('footer.php')?>