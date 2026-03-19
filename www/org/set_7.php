<?
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
            <div class="ct1 vt_mid">2024</div>
            <div class="ct2 vt_mid">
                <button type="button" class="prev d_btns">2월</button>
                <span class="mg">3월</span>
                <button type="button" class="next d_btns">4월</button>
            </div>
            <button type="button" class="ct3 vt_mid" onclick="location.href='set7_add.php'">
                <img src="/org/img/s6btn_1.png" alt="일정 추가">
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

            <!--today = 오늘 / on = 일정있음-->

            <tr class="tr">
                <td class="td prev">25</td>
                <td class="td prev">26</td>
                <td class="td prev">27</td>
                <td class="td prev">28</td>
                <td class="td prev">29</td>
                <td class="td">1</td>
                <td class="td">2</td>
            </tr>

            <tr class="tr">
                <td class="td">3</td>
                <td class="td">4</td>
                <td class="td">5</td>
                <td class="td">6</td>
                <td class="td">7</td>
                <td class="td">8</td>
                <td class="td">9</td>
            </tr>
            <tr class="tr">
                <td class="td">10</td>
                <td class="td">11</td>
                <td class="td">12</td>
                <td class="td on">13</td>
                <td class="td">14</td>
                <td class="td">15</td>
                <td class="td on">16</td>
            </tr>
            <tr class="tr">
                <td class="td">17</td>
                <td class="td">18</td>
                <td class="td">19</td>
                <td class="td today">20</td>
                <td class="td">21</td>
                <td class="td">22</td>
                <td class="td">23</td>
            </tr>
            <tr class="tr">
                <td class="td">24</td>
                <td class="td">25</td>
                <td class="td">26</td>
                <td class="td">27</td>
                <td class="td">28</td>
                <td class="td">29</td>
                <td class="td">30</td>
            </tr>
            <tr class="tr">
                <td class="td">31</td>
                <td class="td next">1</td>
                <td class="td next">2</td>
                <td class="td next">3</td>
                <td class="td next">4</td>
                <td class="td next">5</td>
                <td class="td next">6</td>
            </tr>
        </table>
    </div>

    <div class="pd15">
        <div class="list">
            <div class="list_t">일정 목록</div>
            <div class="list_wrap">
                <div class="l_block">
                    <div class="l_left vt_mid">연대 세브란스 채혈</div>
                    <div class="l_right vt_mid">2024.03.13</div>
                </div>
                <div class="l_block">
                    <div class="l_left vt_mid">연대 세브란스 결과</div>
                    <div class="l_right vt_mid">2024.03.16</div>
                </div>
            </div>
        </div>
    </div>

</section>


<script>
    $('.set7 .calendar .td').click(function(){
        if($(this).hasClass('on')){
            location.href='set7_add.php';
        }
    });
</script>

<?include('footer.php')?>