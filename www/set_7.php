<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];


$header = array(
    'is_header' => true,
    'head_name' => '병원일정 알림',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>


<?php

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

//echo $nowData_Month;
//echo "<br>";



$nowData_Month_ch = $nowData_Month;

//$nowData_Month_ch_strlen = strlen($nowData_Month_ch);
//
//if($nowData_Month_ch_strlen > 1){ // 월이 1글자 이상이면
//    if($nowData_Month_ch[0] == 0){
//        $nowData_Month_ch = $nowData_Month_ch[1];
//    }
//}

$nowData_Month_ch_prev = $nowData_Month_ch - 1;
$nowData_Month_ch_next = $nowData_Month_ch + 1;

//echo $nowData_Month_ch;
//echo "<br>";
//echo $nowData_Month_ch_prev;
//echo "<br>";
//echo $nowData_Month_ch_next;
//echo "<br>";

if($nowData_Month_ch <= 1){
    $nowData_Month_ch_prev = 12;
}

if($nowData_Month_ch >= 12) {
    $nowData_Month_ch_next = 1;
}

//$nowData_Month_ch_ch = strlen($nowData_Month_ch);

//echo $nowData_Month_ch_ch;
//

//echo $nowData_Month_ch;
//echo "<br>";

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

//echo $nowData_Month_ch_ch;
//echo "<br>";
?>

    <style>
        /*=========이전달,다음달로 가는 버튼 추가됨=========== */

        .set7 .calendar .cal_top .ct2 .d_btns {color: #ACACAC; font-size: 3.0556vw;}
        .set7 .calendar .cal_top .ct2 .mg {margin: 0 3.3333vw;}
        .set7 .calendar .cal_bot .td.on {cursor: pointer;}

        /*=========이전달,다음달로 가는 버튼 추가됨=========== */
    </style>

    <section class="set set7">
        <div class="calendar">
            <div class="cal_top">
                <div class="ct1 vt_mid"><?=$nowData_Year?></div>
                <div class="ct2 vt_mid">
                    <button type="button" class="prev d_btns" onClick = "location.href = './set_7.php?years=<?=$nowData_Year?>&months=<?=$nowData_Month?>&days=<?=$nowData_day?>&prevs=1'"><?=$nowData_Month_ch_prev?>월</button>
                    <span class="mg"><?=$nowData_Month_ch_ch?>월</span>
                    <button type="button" class="next d_btns" onClick = "location.href = './set_7.php?years=<?=$nowData_Year?>&months=<?=$nowData_Month?>&days=<?=$nowData_day?>&nexts=1'"><?=$nowData_Month_ch_next?>월</button>
                </div>
                <button type="button" class="ct3 vt_mid" onclick="location.href='set7_add.php'">
                    <img src="/img/s6btn_1.png" alt="일정 추가">
                </button>
            </div>

                        <table class="cal_bot">

                            <tr class="tr">
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

                                        $show_temp_temp1 = $show_temp;

                                        if($show_temp_temp1 < 0){
                                            $show_temp_temp1 = 0;
                                        }

                                        $search_date_sum_sc = $nowData_Year."-".$nowData_Month_ch."-".$show_temp_temp1;




                                        $sql_search_check_sc_db = "select mb_no from g5_alarm_info where mb_id='".$ss_mb_id."' and kinds='2' and times2 = '$search_date_sum_sc' ";

                                        //echo "select mb_no from g5_alarm_info where mb_id='".$ss_mb_id."' and kinds='2' and times2 = '$search_date_sum_sc' ";

                                        $sql_search_check_sc_db_rs = sql_query($sql_search_check_sc_db);

                                        $sql_search_check_sc_db_rs_row=sql_fetch_array($sql_search_check_sc_db_rs);


                                        $sql_search_check_sc_db_rs_row_mb_no = $sql_search_check_sc_db_rs_row['mb_no'];

                                        //echo "rewrre=".$sql_search_check_sc_db_rs_row['mb_no'];


                                        $show_box_area_num = "";

                                        if ($nowData_day == $show_temp) {
                                            $show_box_area_num = "today";
                                        }


                                        if ($sql_search_check_sc_db_rs_row['mb_no'] != "") {
                                            $show_box_area_num = "on";
                                        }

                                        // 날짜 보여줌
                                        if($i < $j_temp_change_num){
                                            ?>
                                            <td  class="td prev">&nbsp;</td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <td  class="td <?=$show_box_area_num?>" onClick = "set7_add_modify_num_f('<?=$sql_search_check_sc_db_rs_row_mb_no?>','<?=$search_date_sum_sc?>')"><?=$show_temp?></td>
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





<!--            <table class="cal_bot">-->
<!--                -->
<!--                <tr class="tr">-->
<!--                    <th class="th">일</th>-->
<!--                    <th class="th">월</th>-->
<!--                    <th class="th">화</th>-->
<!--                    <th class="th">수</th>-->
<!--                    <th class="th">목</th>-->
<!--                    <th class="th">금</th>-->
<!--                    <th class="th">토</th>-->
<!--                </tr>-->
<!---->
<!--                <!--today = 오늘 / on = 일정있음-->
<!---->
<!--                <tr class="tr">-->
<!--                    <td class="td prev">25</td>-->
<!--                    <td class="td prev">26</td>-->
<!--                    <td class="td prev">27</td>-->
<!--                    <td class="td prev">28</td>-->
<!--                    <td class="td prev">29</td>-->
<!--                    <td class="td">1</td>-->
<!--                    <td class="td">2</td>-->
<!--                </tr>-->
<!---->
<!--                <tr class="tr">-->
<!--                    <td class="td">3</td>-->
<!--                    <td class="td">4</td>-->
<!--                    <td class="td">5</td>-->
<!--                    <td class="td">6</td>-->
<!--                    <td class="td">7</td>-->
<!--                    <td class="td">8</td>-->
<!--                    <td class="td">9</td>-->
<!--                </tr>-->
<!--                <tr class="tr">-->
<!--                    <td class="td">10</td>-->
<!--                    <td class="td">11</td>-->
<!--                    <td class="td">12</td>-->
<!--                    <td class="td on">13</td>-->
<!--                    <td class="td">14</td>-->
<!--                    <td class="td">15</td>-->
<!--                    <td class="td on">16</td>-->
<!--                </tr>-->
<!--                <tr class="tr">-->
<!--                    <td class="td">17</td>-->
<!--                    <td class="td">18</td>-->
<!--                    <td class="td">19</td>-->
<!--                    <td class="td today">20</td>-->
<!--                    <td class="td">21</td>-->
<!--                    <td class="td">22</td>-->
<!--                    <td class="td">23</td>-->
<!--                </tr>-->
<!--                <tr class="tr">-->
<!--                    <td class="td">24</td>-->
<!--                    <td class="td">25</td>-->
<!--                    <td class="td">26</td>-->
<!--                    <td class="td">27</td>-->
<!--                    <td class="td">28</td>-->
<!--                    <td class="td">29</td>-->
<!--                    <td class="td">30</td>-->
<!--                </tr>-->
<!--                <tr class="tr">-->
<!--                    <td class="td">31</td>-->
<!--                    <td class="td next">1</td>-->
<!--                    <td class="td next">2</td>-->
<!--                    <td class="td next">3</td>-->
<!--                    <td class="td next">4</td>-->
<!--                    <td class="td next">5</td>-->
<!--                    <td class="td next">6</td>-->
<!--                </tr>-->
<!--            </table>-->
        </div>

        <div class="pd15">
            <div class="list">
                <div class="list_t">일정 목록</div>
                <div class="list_wrap">


                    <?php
                    $sql = "select * from g5_alarm_info where mb_id='".$ss_mb_id."' and kinds='2' order by times2 asc";
                    $rs = sql_query($sql);

                    while ($row=sql_fetch_array($rs)) {




                    ?>

                                            <div class="l_block">
                                                <div class="l_left vt_mid"><?=$row['contents']?></div>
                                                <div class="l_right vt_mid"><?=str_replace("-",".",$row['times2'])?></div>
                                            </div>



                    <?php
                    }

                    ?>





<!--                    <div class="l_block">-->
<!--                        <div class="l_left vt_mid">연대 세브란스 채혈</div>-->
<!--                        <div class="l_right vt_mid">2024.03.13</div>-->
<!--                    </div>-->
<!--                    <div class="l_block">-->
<!--                        <div class="l_left vt_mid">연대 세브란스 결과</div>-->
<!--                        <div class="l_right vt_mid">2024.03.16</div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

    </section>


    <script>

        var set7_add_modify_num = 0;

        function set7_add_modify_num_f(num,datestr){
            set7_add_modify_num = num;

            //if(set7_add_modify_num != ""){
                location.href='./set7_add.php?num='+set7_add_modify_num+"&datestr="+datestr;
            //}
            //else{
                //alert('병원일정 알림 수정 번호가 없습니다.');
            //}

        }

        $('.set7 .calendar .td').click(function(){
            if($(this).hasClass('on')){

                // if(set7_add_modify_num != ""){
                //     location.href='set7_add.php?num='+set7_add_modify_num;
                // }
                // else{
                //     alert('병원일정 알림 수정 번호가 없습니다.');
                // }

            }
        });
    </script>

<?include('footer.php')?>