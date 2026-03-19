<?
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
?>

<section class="my">
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
                <td class="td icon1">1</td>
                <td class="td icon2">2</td>
            </tr>
            <tr>
                <td class="td icon3">3</td>
                <td class="td icon4">4</td>
                <td class="td icon5">5</td>
                <td class="td icon6">6</td>
                <td class="td icon6">7</td>
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

        <button type="button" class="info">
            <div class="left vt_mid">월간수행기록이란?</div>
            <div class="right vt_mid">
                <img src="/org/img/arrow_down.png" alt="자세히 보기" class="down on">
                <img src="/org/img/arrow_up.png" alt="자세히 보기" class="up">
            </div>

            <div class="i_info">
                <p class="i_p">사용자가 재활운동 권고량을 얼마나 달성했는 지를 확인할 수 있는 지표로, 색과 표정에 따라 다음과 같이 구분합니다.</p>
                <div class="icon_wrap">
                    <div class="icon vt_mid">
                        <img src="/org/img/icon_my1.png" alt="0%">
                        <span class="vt_mid">0%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/org/img/icon_my2.png" alt="20%">
                        <span class="vt_mid">20%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/org/img/icon_my3.png" alt="40%">
                        <span class="vt_mid">40%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/org/img/icon_my4.png" alt="60%">
                        <span class="vt_mid">60%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/org/img/icon_my5.png" alt="80%">
                        <span class="vt_mid">80%</span>
                    </div>
                    <div class="icon vt_mid">
                        <img src="/org/img/icon_my6.png" alt="100%">
                        <span class="vt_mid">100%</span>
                    </div>
                </div>
            </div>
        </button>
    </div>

    <div class="pd15">
        <h2 class="my_h2">일일 수행 기록</h2>

        <div class="date">3월 10일 금요일</div>

        <div class="chart_area">
            <div class="wid220"></div>

            <div class="chart">
                <div class="bg">
                    <canvas id="myChart" style="width:100%; height:100%;"></canvas>
                </div>
            </div>
            <div class="chart ct2">
                <div class="bg">
                    <canvas id="myChart2" style="width:100%; height:100%;"></canvas>
                </div>
            </div>
            <div class="chart ct3">
                <div class="bg">
                    <canvas id="myChart3" style="width:100%; height:100%;"></canvas>
                </div>
            </div>
        </div>


        <div class="l_wrap">
            <div class="label">
                <img src="/org/img/icon_label1.png" alt="호흡운동">
                <span class="vt_mid">호흡운동</span>
            </div>
            <div class="label">
                <img src="/org/img/icon_label2.png" alt="지구력운동">
                <span class="vt_mid">지구력운동</span>
            </div>
            <div class="label">
                <img src="/org/img/icon_label3.png" alt="유연성운동">
                <span class="vt_mid">유연성운동</span>
            </div>
        </div>
    </div>
</section>

<script src="/org/js/chart.js"></script>

<?include('footer.php')?>