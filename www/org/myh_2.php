<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '호흡곤란증상 측정하기',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="myh">
    <div class="pd15">
        <h2 class="h2">호흡곤란 정도를 나타내기 위해 사용하는 국제적인 척도입니다. 해당되는 항목에 체크하세요.</h2>

        <form>

            <div class="table">
                <div class="t_tit">
                    <div class="th th1 vt_mid"></div>
                    <div class="gray_bg vt_mid">
                        <div class="th th2 vt_mid">숨 차는 정도</div>
                        <div class="th th3 vt_mid">호흡곤란<br>점수</div>
                    </div>
                </div>

                <div class="t_con">
                    <div class="tr">
                        <div class="td td1 vt_mid">
                            <input type="radio" name="self_ck" id="self1" class="radio">
                        </div>
                        <div class="border vt_mid">
                            <div class="td td2 vt_mid">
                                <label for="self1" class="t_lab">
                                    격렬하게 운동하거나 일을 할 때 숨이 차다.
                                </label>
                            </div>
                            <div class="td td3 vt_mid">
                                <label for="self1" class="t_lab">
                                    0
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tr">
                        <div class="td td1 vt_mid">
                            <input type="radio" name="self_ck" id="self2" class="radio">
                        </div>
                        <div class="border vt_mid">
                            <div class="td td2 vt_mid">
                                <label for="self2" class="t_lab">
                                    평지를 빨리 걷거나 언덕을 올라갈 때 숨이 차다.
                                </label>
                            </div>
                            <div class="td td3 vt_mid">
                                <label for="self2" class="t_lab">
                                    1
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tr">
                        <div class="td td1 vt_mid">
                            <input type="radio" name="self_ck" id="self3" class="radio">
                        </div>
                        <div class="border vt_mid">
                            <div class="td td2 vt_mid">
                                <label for="self3" class="t_lab">
                                    평지를 걸을 때 숨이 차서 동년배 사람들보다 천천히 걸어야 하거나 본인의 평소 속도로 걷기 위해서는 중간에 쉬어야 한다.
                                </label>
                            </div>
                            <div class="td td3 vt_mid">
                                <label for="self3" class="t_lab">
                                    2
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tr">
                        <div class="td td1 vt_mid">
                            <input type="radio" name="self_ck" id="self4" class="radio">
                        </div>
                        <div class="border vt_mid">
                            <div class="td td2 vt_mid">
                                <label for="self4" class="t_lab">
                                    평지를 100m 정도 걷거나 2-3분만 걸어도 숨이 차서 쉬어야 한다.
                                </label>
                            </div>
                            <div class="td td3 vt_mid">
                                <label for="self4" class="t_lab">
                                    4
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tr">
                        <div class="td td1 vt_mid">
                            <input type="radio" name="self_ck" id="self5" class="radio">
                        </div>
                        <div class="border vt_mid">
                            <div class="td td2 vt_mid">
                                <label for="self5" class="t_lab">
                                    숨이 차서 외출하기 어렵거나 옷을 입고 벗을 때조차도 숨이 차다.
                                </label>
                            </div>
                            <div class="td td3 vt_mid">
                                <label for="self5" class="t_lab">
                                    0
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn_fixed">
                <button type="button" class="next_btn on" onclick="location.href='index.php'">저장</button>
            </div>
        </form>
    </>
</section>

<?include('footer.php')?>