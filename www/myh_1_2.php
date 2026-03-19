<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '안전한 운동을 했나요?',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>
<!--안쓰는 페이지!!-->
<section class="myh">
    <div class="pd15">
        <form>
            <div class="m_block">
                <h2 class="m_tit">1. 호흡재활운동을 할 때 산소를 사용하셨습니까?<br>(중복선택 가능)</h2>
                <div class="input_wrap">
                    <div class="c_wrap vt_mid">
                        <input type="checkbox" name="myh1" id="myh1_1" class="ckbox">
                        <label for="myh1_1" class="c_lab">운동 전</label>
                    </div>
                    <div class="c_wrap vt_mid">
                        <input type="checkbox" name="myh1" id="myh1_2" class="ckbox">
                        <label for="myh1_2" class="c_lab">운동 중</label>
                    </div>
                    <div class="c_wrap vt_mid">
                        <input type="checkbox" name="myh1" id="myh1_3" class="ckbox">
                        <label for="myh1_3" class="c_lab">운동 후</label>
                    </div>
                </div>
            </div>
            <div class="m_block">
                <h2 class="m_tit">2. 호흡재활운동을 할 때 너무 힘들어서, 너무 숨이 차서 운동을 중단하였습니까?<br>(잠시 휴식하는 것은 제외합니다.)</h2>
                <div class="input_wrap">
                    <div class="c_wrap vt_mid">
                        <input type="radio" name="myh2" id="myh2_1" class="ckbox">
                        <label for="myh2_1" class="c_lab">중단함</label>
                    </div>
                    <div class="c_wrap vt_mid">
                        <input type="radio" name="myh2" id="myh2_2" class="ckbox">
                        <label for="myh2_2" class="c_lab">중단하지 않음</label>
                    </div>
                </div>
            </div>

            <div class="m_block">
                <h2 class="m_tit">3. 스마트워치를 착용하면 운동시 나의 최대 심박수와 활동시간을 보여드립니다.</h2>
                <div class="input_wrap">
                    <div class="i_block mb13">
                        <label class="ib_left vt_mid" for="myh3_1">나의 심박수</label>
                        <div class="ib_right vt_mid">
                            <span class="watch_num"><span class="underline">40</span></span>
                            <span class="vt_mid">회/분</span>
                        </div>
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid" for="myh3_2">활동시간</label>
                        <div class="ib_right vt_mid">
                            <span class="watch_num"><span class="underline">40</span></span>
                            <span class="vt_mid">분</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn_fixed">
                <button type="button" class="next_btn on" onclick="location.href='index.php'">저장</button>
            </div>
        </form>
    </div>
</section>

<?include('footer.php')?>