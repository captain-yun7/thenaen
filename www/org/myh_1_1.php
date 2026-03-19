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

<section class="myh">
    <div class="pd15">
        <form>
            <div class="m_block">
                <h2 class="m_tit">1. 재활운동을 <span class="blue">시작하기 전</span> 나의 상태입니다</h2>
                <div class="input_wrap">
                    <div class="i_block">
                        <label class="ib_left vt_mid wid88" for="info1">산소포화도</label>
                        <div class="ib_right vt_mid">
                            <input type="number" name="info1" id="info1" class="input" disabled value="94">
                            <span class="vt_mid">%</span>
                        </div>
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid wid88" for="info2">심박수</label>
                        <div class="ib_right vt_mid">
                            <input type="text" name="info2" id="info2" class="input" disabled value="100">
                            <span class="vt_mid">회/분</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m_block">
                <h2 class="m_tit">2. 재활운동을 <span class="blue">하는 중</span> 나의 상태입니다.<br>스마트워치를 착용하면 자동으로 값이 연동됩니다.</h2>
                <div class="input_wrap">
                    <div class="i_block">
                        <label class="ib_left vt_mid" for="info3">운동 중 산소포화도</label>
                        <div class="ib_right vt_mid">
                            <input type="number" name="info3" id="info3" class="input" value="94">
                            <span class="vt_mid">%</span>
                        </div>
                    </div>
                    <div class="sub">
                        (스마트워치 또는 휴대용 손가락 맥박 산소포화도 
                        기계로 측정된 값을 입력해주세요.)
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid" for="info4">운동 중 최대 심박수</label>
                        <div class="ib_right vt_mid">
                            <input type="number" name="info4" id="info4" class="input" value="90">
                            <span class="vt_mid">회/분</span>
                        </div>
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid" for="info5">활동시간</label>
                        <div class="ib_right vt_mid">
                            <input type="number" name="info5" id="info5" class="input" value="40">
                            <span class="vt_mid">분</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m_block">
                <h2 class="m_tit">3. <span class="blue">오늘</span> 측정된 나의 안정 시 심박수 평균 범위와 산소포화도입니다. 스마트워치를 착용하면 자동으로 값이 연동됩니다.</h2>
                <div class="input_wrap">
                    <div class="i_block mb17">
                        <label class="ib_left vt_mid wid145_l" for="info6">안정 시 나의 심박수 평균 범위</label>
                        <div class="ib_right vt_mid wid145">
                            <input type="number" name="info5" id="info5" class="input wid37" value="80">
                            <span class="vt_mid">-</span>
                            <input type="number" name="info6" id="info6" class="input wid37" value="100">
                            <span class="vt_mid">회/분</span>
                        </div>
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid wid230" for="info7">지금 측정한 안정 시 나의 산소포화도</label>
                        <div class="ib_right vt_mid wid230_r">
                            <input type="number" name="info7" id="info7" class="input" value="94">
                            <span class="vt_mid">%</span>
                        </div>
                    </div>

                    <div class="sub">
                        (스마트워치 또는 휴대용 손가락 맥박 산소포화도 
                        기계로 측정된 값을 입력해주세요.)
                    </div>
                </div>
            </div>
            <div class="m_block">
                <h2 class="m_tit">4. 호흡재활운동을 할 때 산소를 사용하셨습니까?<br>(중복선택 가능)</h2>
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
                <h2 class="m_tit">5. 호흡재활운동을 할 때 너무 힘들어서, 너무 숨이 차서 운동을 중단하였습니까?<br>(잠시 휴식하는 것은 제외합니다.)</h2>
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

            <div class="btn_fixed">
                <button type="button" class="next_btn on" onclick="history.go(-1);">저장</button>
            </div>
        </form>
    </div>
</section>

<?include('footer.php')?>