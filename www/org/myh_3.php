<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '얼마나 좋아졌나요?',
);


$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include('rec_subpop.php')?>

<section class="myh my">
    <div class="pd15">
        <div class="rc">
            <div class="record_area">
                <div class="rc_text">
                    녹음 시작 버튼을 누르고 숨을 크게 들이마시고
                    충분히 숨을 참은 다음에 천천히 길게 내뱉으세요. 그 후 녹음을 종료하세요.
                </div>
            </div>
            <div class="time_area">00:00:00</div>
            <div class="btn_area">
                <button type="button" class="rbtns rbtn1">
                    <img src="/org/img/rbtn1.png" alt="녹음시작" class="blue on">
                    <img src="/org/img/rbtn1_off.png" alt="녹음중" class="gray">
                </button>
                <button type="button" class="rbtns rbtn2">
                    <img src="/org/img/rbtn2.png" alt="녹음재생" class="blue on">
                    <img src="/org/img/rbtn2_off.png" alt="녹음재생중" class="gray">
                </button>
                <button type="button" class="rbtns rbtn3">
                    <img src="/org/img/rbtn3.png" alt="녹음종료" class="blue on">
                    <img src="/org/img/rbtn3_off.png" alt="녹음완료" class="gray">
                </button>
            </div>
        </div>
    </div>
        <div class="calendar">
            <div class="c_tit">
                <div class="ct_left vt_bot">2024</div>
                <div class="ct_cen vt_bot">3월</div>
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
                <tr>
                    <td class="td prev">25</td>
                    <td class="td prev">26</td>
                    <td class="td prev">27</td>
                    <td class="td prev">28</td>
                    <td class="td prev">29</td>
                    <td class="td icon">1</td>
                    <td class="td icon">2</td>
                </tr>
                <tr>
                    <td class="td icon">3</td>
                    <td class="td icon">4</td>
                    <td class="td icon">5</td>
                    <td class="td icon">6</td>
                    <td class="td icon">7</td>
                    <td class="td">8</td>
                    <td class="td">9</td>
                </tr>
                <tr>
                    <td class="td">10</td>
                    <td class="td">11</td>
                    <td class="td">12</td>
                    <td class="td">13</td>
                    <td class="td">14</td>
                    <td class="td">15</td>
                    <td class="td">16</td>
                </tr>
                <tr>
                    <td class="td">17</td>
                    <td class="td">18</td>
                    <td class="td">19</td>
                    <td class="td">20</td>
                    <td class="td">21</td>
                    <td class="td">22</td>
                    <td class="td">23</td>
                </tr>
                <tr>
                    <td class="td">24</td>
                    <td class="td">25</td>
                    <td class="td">26</td>
                    <td class="td">27</td>
                    <td class="td">28</td>
                    <td class="td">29</td>
                    <td class="td">30</td>
                </tr>
                <tr>
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
            <div class="tab">
                <div class="date">3월 10일 금요일<br>산소포화도</div>
                <div class="a_text">
                    <table class="s_table">
                        <tr>
                            <th class="th">운동 전</th>
                            <td class="td">산소포화도 99%</td>
                            <td class="td">심박수 999회/분</td>
                        </tr>
                        <tr>
                            <th class="th" rowspan="2">운동 중 </th>
                            <td class="td">산소포화도 99%</td>
                            <td class="td">최대 심박수<br>999회/분</td>
                        </tr>
                        <tr>
                            <td class="td">산소포화도 99%</td>
                            <td class="td">최대 심박수<br>999회/분</td>
                        </tr>
                        <tr>
                            <th class="th" rowspan="2">안정 시<br>평균 </th>
                            <td class="td">산소포화도 99%</td>
                            <td class="td">심박수 평균 범위<br>80 ~ 120</td>
                        </tr>
                        <tr>
                            <td class="td">산소포화도 99%</td>
                            <td class="td">심박수 평균 범위<br>80 ~ 120</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</section>

<script>
    $('.myh .calendar .td').click(function(){

        if($(this).hasClass('next')) {

        }else if($(this).hasClass('prev')){

        }else{
            $('.s_subpop').addClass('on');
            $('.myh .tab').addClass('on');
        }
    });

    $('.s_subpop .ok_btn').click(function(){
        $('.s_subpop').removeClass('on');
    });
</script>


<?include('footer.php')?>