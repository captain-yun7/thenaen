<?php


include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];



$header = array(
    'is_header' => true,
    'head_name' => '월간 수행 기록',
    'right_menu' => false,
    'main_head' => true,
    'inh' => true,
);

$footer = array(
    'is_footer' => true,
    'page' => 'my',
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

    if($months < 1){
        $years = $years - 1;
        $months = 12;
    }

}

if($nexts == 1){

    $monthsTemp = $months + 1;



    $months = $monthsTemp;

    if($months > 12){
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

$yoil1 = array("일","월","화","수","목","금","토");

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


if($nowData_Month_ch_strlen > 1){ // 월이 1글자 이상이면

    if($nowData_Month_ch[0] == 0){
        $nowData_Month_ch = $nowData_Month_ch[1];
    }


}




$nowData_Month_ch_prev = $nowData_Month_ch - 1;
$nowData_Month_ch_next = $nowData_Month_ch + 1;

if($nowData_Month_ch <= 1){
    $nowData_Month_ch_prev = 12;
}

if($nowData_Month_ch >= 12) {
    $nowData_Month_ch_next = 1;
}


function dayExcuteWrite($dates,$menuPart3,$menuPart5,$menuPart6,$ss_mb_id){

    $get1 = sql_fetch_array(sql_query("select playTimeCount FROM g5_exercise_sub_moveingTime where kinds = '호흡근 운동' and mb_id = '$ss_mb_id' and mb_write_time like '%$dates%' order by playTimeCount desc limit 0,1"));
    $playTimeCount1 = $get1['playTimeCount'];
    $get1_return_persent = getPersentDay1($playTimeCount1);

    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//        echo "호흡근 운동 = ".$get1_return_persent."-날짜=".$dates."-".$get1['playTimeCount'];
//        echo "<br>";
    }

//    echo "select playTimeCount FROM g5_exercise_sub_moveingTime where kinds = '호흡근 운동' and mb_id = '$ss_mb_id' and mb_write_time like '%$dates%' order by playTimeCount desc limit 0,1";
//    echo "<br>";
//    echo $get1_return_persent;
//    echo "<br>";

    $get2 = sql_fetch_array(sql_query("select playTimeCount FROM g5_exercise_sub_moveingTime where kinds = '지구력 운동' and mb_id = '$ss_mb_id' and mb_write_time like '%$dates%' order by playTimeCount desc limit 0,1"));
    $playTimeCount2 = $get2['playTimeCount'];
    $get2_return_persent = getPersentDay2($playTimeCount2);

    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//        echo "지구력 운동 = ".$get2_return_persent;
//        echo "<br>";
    }

//    echo $get2_return_persent;
//    echo "<br>";





    $yoil = array("일","월","화","수","목","금","토");
    $check_1_get_week = ($yoil[date('w', strtotime($dates))]); // 현재 요일날짜


    $get_yo_menu_arrow_return = get_yo_menu_arrow($check_1_get_week);

    $menuPart1_str_month = $get_yo_menu_arrow_return;

    $get3 = sql_fetch_array(sql_query("select playTimeCount FROM g5_exercise_sub_moveingTime where kinds = '$menuPart1_str_month' and mb_id = '$ss_mb_id' and mb_write_time like '%$dates%' order by playTimeCount desc limit 0,1"));
    $playTimeCount3 = $get3['playTimeCount'];

    if($menuPart1_str_month == "저항/근력 운동"){
        $get3_return_persent = getPersentDay4($playTimeCount3);
    }
    else if($menuPart1_str_month == "유연성 운동"){
        $get3_return_persent = getPersentDay5($playTimeCount3);
    }
    else{
        $get3_return_persent = getPersentDay3($playTimeCount3);
    }


    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//        echo $menuPart1_str_month." = ".$get3_return_persent;
//        echo "<br>";
//        echo "yo=".$menuPart1_str_month;
//        echo "<br>";
//        echo "yo=".$menuPart1_str_month;
//        echo "<br>";
//        echo "select playTimeCount FROM g5_exercise_sub_moveingTime where kinds = '$menuPart1_str_month' and mb_id = '$ss_mb_id' and mb_write_time like '%$dates%' order by playTimeCount desc limit 0,1";
//        echo "<br>";
    }

//
//    echo $get3_return_persent;
//    echo "<br>";


    return $get1_return_persent."-".$get2_return_persent."-".$get3_return_persent;

}


$dayExcuteWriteResult = dayExcuteWrite($common_nowdate,$menuPart3,$menuPart5,$menuPart6,$ss_mb_id);
$dayExcuteWriteResultSprit = explode("-",$dayExcuteWriteResult);

$get1_return_persent = $dayExcuteWriteResultSprit[0];
$get2_return_persent = $dayExcuteWriteResultSprit[1];
$get3_return_persent = $dayExcuteWriteResultSprit[2];


if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {

//    echo $common_nowdate;
//    echo "<br>";
//    echo $menuPart3;
//    echo "<br>";
//    echo $menuPart5;
//    echo "<br>";
//    echo $menuPart6;
//    echo "<br>";
//    echo $ss_mb_id;
//    echo "<br>";
//    echo $get1_return_persent;
//    echo "<br>";
//    echo $get2_return_persent;
//    echo "<br>";
//    echo $get3_return_persent;
//    echo "<br>";

}


function getPersentDay1($num){

    $num = (int)$num;

    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//        echo "num=".$num;
//        echo "<br>";
    }

    //$num = 1200;
//    if($num == "") {
//        return "";
//    }
//    else if($num >= 0 && $num <= 599){
//        return "10";
//    }
//    else if($num >= 600 && $num <= 1199){
//       return "40";
//    }
//    else if($num >= 1200 && $num <= 1799){
//        return "70";
//    }
//    else if($num >= 1800){
//        return "100";
//    }
//    else{
//        return "10";
//    }

    if($num == "" or $num == 0) {
        return "";
    }
    else if($num >= 1 && $num <= 59){
        return "10";
    }
    else if($num >= 60 && $num <= 119){
        return "20";
    }
    else if($num >= 120 && $num <= 179){
        return "30";
    }
    else if($num >= 180 && $num <= 239){
        return "40";
    }
    else if($num >= 240 && $num <= 359){
        return "50";
    }
    else if($num >= 360  && $num <= 419){
        return "60";
    }
    else if($num >= 420 && $num <= 479){
        return "70";
    }
    else if($num >= 480  && $num <= 599 ){
        return "80";
    }
    else if($num >= 600  && $num <= 719){
        return "90";
    }
    else if($num >= 720){
        return "100";
    }
    else{
        return "10";
    }


}

function getPersentDay2($num){

    $num = (int)$num;

    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//        echo "num=".$num;
//        echo "<br>";
    }

    //$num = 1200;
    if($num == "") {
        return "";
    }
    else if($num >= 0 && $num <= 599){
        return "10";
    }
    else if($num >= 600 && $num <= 1199){
        return "40";
    }
    else if($num >= 1200 && $num <= 1799){
        return "70";
    }
    else if($num >= 1800){
        return "100";
    }
    else{
        return "10";
    }
}

function getPersentDay3($num){

    $num = (int)$num;

    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//        echo "num=".$num;
//        echo "<br>";
    }

    //$num = 1200;
    if($num == "") {
        return "";
    }
    else if($num >= 0 && $num <= 599){
        return "10";
    }
    else if($num >= 600 && $num <= 1199){
        return "40";
    }
    else if($num >= 1200 && $num <= 1799){
        return "70";
    }
    else if($num >= 1800){
        return "100";
    }
    else{
        return "";
    }
}

function getPersentDay4($num){ // 저항/근력 운동 일때 계산

    $num = (int)$num;

    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
    }

    if($num == "" or $num == 0) {
        return "";
    }
    else if($num >= 1 && $num <= 179){
        return "10";
    }
    else if($num >= 180 && $num <= 359){
        return "20";
    }
    else if($num >= 360 && $num <= 539){
        return "30";
    }
    else if($num >= 540 && $num <= 719){
        return "40";
    }
    else if($num >= 720 && $num <= 899){
        return "50";
    }
    else if($num >= 900 && $num <= 1079){
        return "60";
    }
    else if($num >= 1080 && $num <= 1259){
        return "70";
    }
    else if($num >= 1260 && $num <= 1439){
        return "80";
    }
    else if($num >= 1440 && $num <= 1619){
        return "90";
    }
    else if($num >= 1620){
        return "100";
    }
    else{
        return "";
    }
}

function getPersentDay5($num){ // 유연성 운동 일때 ..

    $num = (int)$num;

    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//        echo "num=".$num;
//        echo "<br>";
    }

    //$num = 1200;
//    if($num == "") {
//        return "";
//    }
//    else if($num >= 0 && $num <= 599){
//        return "10";
//    }
//    else if($num >= 600 && $num <= 1199){
//        return "40";
//    }
//    else if($num >= 1200 && $num <= 1799){
//        return "70";
//    }
//    else if($num >= 1800){
//        return "100";
//    }
//    else{
//        return "10";
//    }

    if($num == "" or $num == 0) {
        return "";
    }
    else if($num >= 1 && $num <= 59){
        return "10";
    }
    else if($num >= 60 && $num <= 119){
        return "20";
    }
    else if($num >= 120 && $num <= 179){
        return "30";
    }
    else if($num >= 180 && $num <= 299){
        return "40";
    }
    else if($num >= 300 && $num <= 359){
        return "50";
    }
    else if($num >= 360 && $num <= 419){
        return "60";
    }
    else if($num >= 420 && $num <= 539){
        return "70";
    }
    else if($num >= 540 && $num <= 659){
        return "80";
    }
    else if($num >= 660 && $num <= 779){
        return "90";
    }
    else if($num >= 780){
        return "100";
    }
    else{
        return "";
    }

}

?>

<section class="my">
    <div class="calendar">
        <div class="c_tit">
            <div class="ct_left vt_bot"><?=$nowData_Year?></div>
            <div class="ct_cen vt_bot"><?=$nowData_Month_ch?>월</div>
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




                $nowData_Year_ch_for = $nowData_Year;
                $nowData_Month_ch_for = $nowData_Month_ch;
                $show_temp_ch_for = $show_temp;

                if(strlen($nowData_Month_ch_for) == 1){
                    $nowData_Month_ch_for = "0".$nowData_Month_ch_for;
                }

                if(strlen($show_temp_ch_for) == 1){
                    $show_temp_ch_for = "0".$show_temp_ch_for;
                }


                $searchDateFor = $nowData_Year."-".$nowData_Month_ch_for."-".$show_temp_ch_for;

                $check_1_get_week_for_get = ($yoil1[date('w', strtotime($searchDateFor))]); // 클릭 날짜


                // 날짜 보여줌
                if($i < $j_temp_change_num){
                    ?>
                    <td  class="td prev">&nbsp;</td>
                    <?php
                }
                else{

                    $dayExcuteWriteResultfor = dayExcuteWrite($searchDateFor,$menuPart3,$menuPart5,$menuPart6,$ss_mb_id);
                    $dayExcuteWriteResultSpritfor = explode("-",$dayExcuteWriteResultfor);
                    $dayExcuteWriteResultSpritforsumCount = $dayExcuteWriteResultSpritfor[0] + $dayExcuteWriteResultSpritfor[1] + $dayExcuteWriteResultSpritfor[2];

                if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {

//                    echo "sum1=".$dayExcuteWriteResultSpritforsumCount;
//                    echo "<br>";

                }

                    $dayExcuteWriteResultSpritfor0 = $dayExcuteWriteResultSpritfor[0];
                    $dayExcuteWriteResultSpritfor1 = $dayExcuteWriteResultSpritfor[1];
                    $dayExcuteWriteResultSpritfor2 = $dayExcuteWriteResultSpritfor[2];
//                    echo $dayExcuteWriteResultSpritfor0;
//                    echo "<Br>";
//                    echo $dayExcuteWriteResultSpritfor1;
//                    echo "<Br>";
//                    echo $dayExcuteWriteResultSpritfor2;
//                    echo "<Br>";


                    if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {

                        //echo $dayExcuteWriteResultSpritforsumCount;
                        //echo "<br>";

                        //$dayExcuteWriteResultSpritforsumCount = 30; // 빨강
                        $dayExcuteWriteResultSpritforsumCount = 70; // 노랑
                        //$dayExcuteWriteResultSpritforsumCount = 140; // 녹색
                        //$dayExcuteWriteResultSpritforsumCount = 200; // 녹색
                        //$dayExcuteWriteResultSpritforsumCount = 270; // 파란색
                        //$dayExcuteWriteResultSpritforsumCount = 310; // 파란색

                    }

                    $dayExcuteWriteResultSpritforsumCount_ChStr = 0;
                    if($dayExcuteWriteResultSpritforsumCount <= 0){
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "";
                    }
                    else if($dayExcuteWriteResultSpritforsumCount >= 1 && $dayExcuteWriteResultSpritforsumCount < 59){
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "icon1";
                    }
                    else if($dayExcuteWriteResultSpritforsumCount >= 60 && $dayExcuteWriteResultSpritforsumCount < 119){
                        //$dayExcuteWriteResultSpritforsumCount_ChStr = 0;
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "icon2";
                    }
                    else if($dayExcuteWriteResultSpritforsumCount >= 120 && $dayExcuteWriteResultSpritforsumCount < 179){
                        //$dayExcuteWriteResultSpritforsumCount_ChStr = 20;
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "icon3";
                    }
                    else if($dayExcuteWriteResultSpritforsumCount >= 180 && $dayExcuteWriteResultSpritforsumCount < 239){
                        //$dayExcuteWriteResultSpritforsumCount_ChStr = 40;
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "icon4";
                    }
                    else if($dayExcuteWriteResultSpritforsumCount >= 240 && $dayExcuteWriteResultSpritforsumCount < 299){
                        //$dayExcuteWriteResultSpritforsumCount_ChStr = 60;
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "icon5";
                    }
                    else if($dayExcuteWriteResultSpritforsumCount >= 300){
                        //$dayExcuteWriteResultSpritforsumCount_ChStr = 80;
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "icon6";
                    }
                    else{
                        //$dayExcuteWriteResultSpritforsumCount_ChStr = 0;
                        $dayExcuteWriteResultSpritforsumCount_ChStr = "";
                    }



                    //if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
                    //    echo $check_1_get_week_for_get;

                        $get_yo_menu_arrow_return = get_yo_menu_arrow($check_1_get_week_for_get);

                    //}

                    ?>



                    <td  class="td <?=$dayExcuteWriteResultSpritforsumCount_ChStr?>" onClick = "chatGo('<?=$dayExcuteWriteResultSpritfor0?>','<?=$dayExcuteWriteResultSpritfor1?>','<?=$dayExcuteWriteResultSpritfor2?>','<?=$nowData_Month_ch_for?>','<?=$show_temp_ch_for?>','<?=$check_1_get_week_for_get?>','<?=$get_yo_menu_arrow_return?>')"><?=$show_temp?></td>
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




<!--            <tr>-->
<!--                <td class="td prev">25</td>-->
<!--                <td class="td prev">26</td>-->
<!--                <td class="td prev">27</td>-->
<!--                <td class="td prev">28</td>-->
<!--                <td class="td prev">29</td>-->
<!--                <td class="td icon1">1</td>-->
<!--                <td class="td icon2">2</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td class="td icon3">3</td>-->
<!--                <td class="td icon4">4</td>-->
<!--                <td class="td icon5">5</td>-->
<!--                <td class="td icon6">6</td>-->
<!--                <td class="td icon6">7</td>-->
<!--                <td class="td">8</td>-->
<!--                <td class="td">9</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td class="td">10</td>-->
<!--                <td class="td">11</td>-->
<!--                <td class="td">12</td>-->
<!--                <td class="td">13</td>-->
<!--                <td class="td">14</td>-->
<!--                <td class="td">15</td>-->
<!--                <td class="td">16</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td class="td">17</td>-->
<!--                <td class="td">18</td>-->
<!--                <td class="td">19</td>-->
<!--                <td class="td">20</td>-->
<!--                <td class="td">21</td>-->
<!--                <td class="td">22</td>-->
<!--                <td class="td">23</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td class="td">24</td>-->
<!--                <td class="td">25</td>-->
<!--                <td class="td">26</td>-->
<!--                <td class="td">27</td>-->
<!--                <td class="td">28</td>-->
<!--                <td class="td">29</td>-->
<!--                <td class="td">30</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td class="td">31</td>-->
<!--                <td class="td next">1</td>-->
<!--                <td class="td next">2</td>-->
<!--                <td class="td next">3</td>-->
<!--                <td class="td next">4</td>-->
<!--                <td class="td next">5</td>-->
<!--                <td class="td next">6</td>-->
<!--            </tr>-->
<!--        </table>-->

        <button type="button" class="info">
            <div class="left vt_mid">월간수행기록이란?</div>
            <div class="right vt_mid">
                <img src="/img/arrow_down.png" alt="자세히 보기" class="down on">
                <img src="/img/arrow_up.png" alt="자세히 보기" class="up">
            </div>

            <div class="i_info">
                <p class="i_p">사용자가 재활운동 권고량을 얼마나 달성했는 지를 확인할 수 있는 지표로, 색과 표정에 따라 다음과 같이 구분합니다.</p>
                <div class="icon_wrap">
                    <div class="icon vt_mid">
                        <img src="/img/icon_my1.png" alt="0%">
                        <span class="vt_mid">0%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/img/icon_my2.png" alt="20%">
                        <span class="vt_mid">20%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/img/icon_my3.png" alt="40%">
                        <span class="vt_mid">40%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/img/icon_my4.png" alt="60%">
                        <span class="vt_mid">60%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/img/icon_my5.png" alt="80%">
                        <span class="vt_mid">80%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/img/icon_my6.png" alt="100%">
                        <span class="vt_mid">100%</span>
                    </div>
                </div>
            </div>
        </button>
    </div>







    <div class="pd15">
        <h2 class="my_h2">일일 수행 기록</h2>

        <div class="date"><a id = "day_excute_add_f1"> <?=date("m")?></a>월 <a id = "day_excute_add_f2"><?=date("d")?></a>일 <a id = "day_excute_add_f3"><?=$yoil_common_result?></a>요일</div>

        <div class="chart_area">
            <div class="wid220"></div>

            <div class="chart">
                <div class="bg">
                    <canvas id="myChart" style="width:100%; height:100%;"></canvas>
                    <span id="my_chart_percent1">40%</span>
                </div>
            </div>
            <div class="chart ct2">
                <div class="bg">
                    <canvas id="myChart2" style="width:100%; height:100%;"></canvas>
                    <span id="my_chart_percent2">60%</span>
                </div>
            </div>
            <div class="chart ct3">
                <div class="bg">
                    <canvas id="myChart3" style="width:100%; height:100%;"></canvas>
                    <span id="my_chart_percent3">40%</span>
                </div>
            </div>
        </div>


        <?php
        /*

    $menuPart3 = 'N'; // 저항/근력 운동
    $menuPart5 = 'N'; // 유연성 운동
    $menuPart6 = 'Y'; // 기침보조 운동

         */

        if($menuPart3 == "Y"){
            $bottom_str_tep3 = "저항/근력 운동";
        }
        else if($menuPart5 == "Y"){
            $bottom_str_tep3 = "유연성 운동";
        }
        else if($menuPart6 == "Y"){
            $bottom_str_tep3 = "기침보조 운동";
        }
        else{
            $bottom_str_tep3 = "저항/근력 운동";
        }

        if ($_SERVER['REMOTE_ADDR'] == "1.243.196.148") {
//            echo $bottom_str_tep3;
        }


        ?>

        <div class="l_wrap">
            <div class="label">
                <img src="/img/icon_label1.png" alt="호흡운동">
                <span class="vt_mid">호흡운동</span>
            </div>
            <div class="label">
                <img src="/img/icon_label2.png" alt="지구력운동">
                <span class="vt_mid">지구력운동</span>
            </div>
            <div class="label">
                <img src="/img/icon_label3.png" id = "img_icon_label3_png_id1" alt="<?=$bottom_str_tep3?>">
                <span class="vt_mid" id = "img_icon_label3_png_id2"><?=$bottom_str_tep3?></span>
            </div>
        </div>
    </div>
</section>



<script>

    var bottomstr = "<?=$bottom_str_tep3?>";

    function chatGo(value,value2,value3,str1,str2,str3,bottomstr){

        console.log(bottomstr);


        // console.log(value); // 10 호흡근 운동
        // console.log(value2); // 40 지구력 운동
        // console.log(value3); // 70 유연성 운동
        // console.log(str1);
        // console.log(str2);
        // console.log(str3);

        $("#img_icon_label3_png_id1").attr("alt",bottomstr);
        $("#img_icon_label3_png_id2").text(bottomstr);

        $("#day_excute_add_f1").text(str1);
        $("#day_excute_add_f2").text(str2);
        $("#day_excute_add_f3").text(str3);

        // console.log(value);
        // console.log(value2);
        // console.log(value3);
        // return;

        value_ch = value3+"%";
        value2_ch = value2+"%";
        value3_ch = value+"%";

        $("#my_chart_percent1").text(value_ch);
        $("#my_chart_percent2").text(value2_ch);
        $("#my_chart_percent3").text(value3_ch);

        // if(value == 0){
        //     return;
        // }

        // console.log(value);
        // console.log(value2);
        // console.log(value3);



        //var value = '<?=$get1_return_persent?>' ;

        let chartStatus1 = Chart.getChart('myChart');
        if (chartStatus1 !== undefined) {
            chartStatus1.destroy();
        }

        let chartStatus2 = Chart.getChart('myChart2');
        if (chartStatus2 !== undefined) {
            chartStatus2.destroy();
        }

        let chartStatus3 = Chart.getChart('myChart3');
        if (chartStatus3 !== undefined) {
            chartStatus3.destroy();
        }


        new Chart(document.getElementById("myChart"), {
            type : 'doughnut',
            data : {
                datasets: [
                    {
                        data: [value3, 100 - value3],
                        backgroundColor: ["#78B3FE", "#ffffff00"],
                        borderWidth: 0,
                        borderRadius: 30,
                    },
                ],
            },
            options : {
                cutout: '80%',
                hover: { mode: null },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    },
                },
            },
        });






        //지구력운동

        //const value2 = '<?=$get2_return_persent?>';


        new Chart(document.getElementById("myChart2"), {
            type : 'doughnut',
            data : {
                datasets: [
                    {
                        data: [value2, 100 - value2],
                        backgroundColor: ["#31619F", "#ffffff00"],
                        borderWidth: 0,
                        borderRadius: 30,
                    },
                ],
            },
            options : {
                cutout: '75%',
                hover: { mode: null },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    },
                },
            },
        });


        // //유연성운동

       // const value3 = '<?=$get3_return_persent?>';

        new Chart(document.getElementById("myChart3"), {
            type : 'doughnut',
            data : {
                datasets: [
                    {
                        data: [value, 100 - value],
                        backgroundColor: ["#173357", "#ffffff00"],
                        borderWidth: 0,
                        borderRadius: 30,
                    },
                ],
            },
            options : {
                cutout: '60%',
                hover: { mode: null },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    },
                },
            },
        });

    //$(".my .chart_area .bg").attr("content","10");

    }

    chatGo('<?=$get1_return_persent?>','<?=$get2_return_persent?>','<?=$get3_return_persent?>','<?=$nowData_Month_ch_for?>','<?=date("d")?>','<?=$yoilResult?>','<?=$bottom_str_tep3?>');

</script>

<?include('footer.php')?>