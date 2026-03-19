<?php


include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];



$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '안전한 운동을 했나요?',
);

$footer = array(
    'is_footer' => false,
);

$outs_exercise_workout_array = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'mainworkout' and mb_write_time like '%$common_nowdate%' order by mb_no desc limit 0,1 "));


include 'header.php';
?>

<script>
    function maxLengthCheck(object){
        if (object.value.length > object.maxLength){
            object.value = object.value.slice(0, object.maxLength);
        }
    }
</script>

<section class="myh">
    <div class="pd15">
        <form method = 'post' id = "myh_1_1_id" action = "./myh_1_1_ok.php">
            <div class="m_block">
                <h2 class="m_tit">1. 재활운동을 <span class="blue">시작하기 전</span> 나의 상태입니다</h2>
                <div class="input_wrap">
                    <div class="i_block">
                        <label class="ib_left vt_mid wid88" for="info1">산소포화도</label>
                        <div class="ib_right vt_mid">
                            <input type="text" name="info1" id="info1_id" class="input" disabled value="<?=$outs_exercise_workout_array['sanfo']?>">
                            <span class="vt_mid">%</span>
                        </div>
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid wid88" for="info2">심박수</label>
                        <div class="ib_right vt_mid">
                            <input type="text" name="info2" id="info2" class="input" disabled value="<?=$outs_exercise_workout_array['heartnum']?>">
                            <span class="vt_mid">회/분</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m_block">
<!--                <h2 class="m_tit">2. 재활운동을 <span class="blue">하는 중</span> 나의 상태입니다.<br>스마트워치를 착용하면 자동으로 값이 연동됩니다.</h2>-->
                <h2 class="m_tit">2. 재활운동을 <span class="blue">하는 중</span> 나의 상태입니다.</h2>
                <div class="input_wrap">
                    <div class="i_block">
                        <label class="ib_left vt_mid" for="info3">운동 중 산소포화도</label>
                        <div class="ib_right vt_mid">
                            <input type="number" name="info3" id="info3" class="input" value="" maxlength="4" oninput="maxLengthCheck(this)">
                            <span class="vt_mid">%</span>
                        </div>
                    </div>
                    <div class="sub">
                        (휴대용 손가락 맥박 산소포화도
                        기계로 측정된 값을 입력해주세요.)
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid" for="info4">운동 중 최대 심박수</label>
                        <div class="ib_right vt_mid">
                            <input type="number" name="info4" id="info4" class="input" value=""maxlength="3" oninput="maxLengthCheck(this)">
                            <span class="vt_mid">회/분</span>
                        </div>
                    </div>
                    <input type="hidden" name="info5" id="info5" class="input" value="">
<!--                    <div class="i_block">-->
<!--                        <label class="ib_left vt_mid" for="info5">활동시간</label>-->
<!--                        <div class="ib_right vt_mid">-->
<!--                            <input type="number" name="info5" id="info5" class="input" value="">-->
<!--                            <span class="vt_mid">분</span>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
            <div class="m_block">
                <h2 class="m_tit">3. <span class="blue">오늘</span> 측정된 나의 안정 시 심박수 평균 범위와 산소포화도입니다.</h2>
                <div class="input_wrap">
                    <div class="i_block mb17">
                        <label class="ib_left vt_mid wid145_l" for="info6">안정 시 나의 심박수 평균 범위</label>
                        <div class="ib_right vt_mid wid145">
                            <input type="number" name="info6" id="info6" class="input wid37" value="">
                            <span class="vt_mid">-</span>
                            <input type="number" name="info7" id="info7" class="input wid37" value="">
                            <span class="vt_mid">회/분</span>
                        </div>
                    </div>
                    <div class="i_block">
                        <label class="ib_left vt_mid wid230" for="info7">지금 측정한 안정 시 나의 산소포화도</label>
                        <div class="ib_right vt_mid wid230_r">
                            <input type="number" name="info8" id="info8" class="input" value="" maxlength="4" oninput="maxLengthCheck(this)">
                            <span class="vt_mid">%</span>
                        </div>
                    </div>

                    <div class="sub">
                        (휴대용 손가락 맥박 산소포화도
                        기계로 측정된 값을 입력해주세요.)
                    </div>
                </div>
            </div>
            <div class="m_block">
                <h2 class="m_tit">4. 호흡재활운동을 할 때 산소를 사용하셨습니까?<br>(중복선택 가능)</h2>
                <div class="input_wrap">
                    <div class="c_wrap vt_mid">
                        <input type="checkbox" name="myh1" id="myh1_1" value = "myh1_1_on" class="ckbox">
                        <label for="myh1_1" class="c_lab">운동 전</label>
                    </div>
                    <div class="c_wrap vt_mid">
                        <input type="checkbox" name="myh2" id="myh1_2" value = "myh1_2_on" class="ckbox">
                        <label for="myh1_2" class="c_lab">운동 중</label>
                    </div>
                    <div class="c_wrap vt_mid">
                        <input type="checkbox" name="myh3" id="myh1_3" value = "myh1_3_on" class="ckbox">
                        <label for="myh1_3" class="c_lab">운동 후</label>
                    </div>

                    <input type = "hidden" name = "myh1_1hidden" id = "myh1_1hidden" value = "">
                    <input type = "hidden" name = "myh1_2hidden" id = "myh1_2hidden" value = "">
                    <input type = "hidden" name = "myh1_3hidden" id = "myh1_3hidden" value = "">

                </div>
            </div>
            <div class="m_block">
                <h2 class="m_tit">5. 호흡재활운동을 할 때 너무 힘들어서, 너무 숨이 차서 운동을 중단하였습니까?<br>(잠시 휴식하는 것은 제외합니다.)</h2>
                <div class="input_wrap">
                    <div class="c_wrap vt_mid">
                        <input type="radio" name="myh2r" id="myh2_1" value = "중단함" class="ckbox">
                        <label for="myh2_1" class="c_lab">중단함</label>
                    </div>
                    <div class="c_wrap vt_mid">
                        <input type="radio" name="myh2r" id="myh2_2" value = "중단하지 않음" class="ckbox">
                        <label for="myh2_2" class="c_lab">중단하지 않음</label>
                    </div>
                </div>
            </div>

            <div class="btn_fixed">
                <button type="button" class="next_btn on" onclick="myh_1_1SaveF()">저장</button>
            </div>
        </form>
    </div>
</section>

<script>
    function myh_1_1SaveF(){

        info1 = $("#info1_id").val();
        info2 = $("#info2").val();
        info3 = $("#info3").val();
        info4 = $("#info4").val();
        info5 = $("#info5").val();
        info6 = $("#info6").val();
        info7 = $("#info7").val();
        info8 = $("#info8").val();
        myh1 = $("input:checkbox[name='myh1']:checked").val()
        myh2 = $("input:checkbox[name='myh2']:checked").val()
        myh3 = $("input:checkbox[name='myh3']:checked").val()
        myh2r = $('input[name=myh2r]:checked').val();

        console.log(info1);

        if(info1 == ""){
            alert("산소포화도 정보가 없습니다.");
            return;
        }

        if(info2 == ""){
            alert("운동 중 최대 심박수 정보가 없습니다.");
            return;
        }

        if(info3 == ""){
            alert("운동 중 산소포화도 정보가 없습니다.");
            $("#info3").focus();
            return;
        }

        if(info4 == ""){
            alert("운동 중 심박수 정보가 없습니다.");
            $("#info4").focus();
            return;
        }

        // if(info5 == ""){
        //     alert("활동시간 정보가 없습니다.");
        //     $("#info5").focus();
        //     return;
        // }

        // if(info6 == ""){
        //     alert("안정 시 나의 심박수 평균 범위 정보가 없습니다.");
        //     $("#info6").focus();
        //     return;
        // }
        //
        // if(info7 == ""){
        //     alert("안정 시 나의 심박수 평균 범위 정보가 없습니다.");
        //     $("#info7").focus();
        //     return;
        // }

        // if(info8 == ""){
        //     alert("지금 측정한 안정 시 나의 산소포화도 정보가 없습니다.");
        //     $("#info8").focus();
        //     return;
        // }


        myh123 = 0;
        if(myh1 == "myh1_1_on"){
            //alert("호흡재활운동을 할 때 산소를 사용하셧습니까? ");

            $("#myh1_1hidden").val("myh1_1_on");

            myh123++;


        }

        if(myh2 == "myh1_2_on"){
            //alert("호흡재활운동을 할 때 산소를 사용하셧습니까? ");

            $("#myh1_2hidden").val("myh1_2_on");

            myh123++;


        }

        if(myh3 == "myh1_3_on"){
            //alert("호흡재활운동을 할 때 산소를 사용하셧습니까? ");

            $("#myh1_3hidden").val("myh1_3_on");

            myh123++;


        }

        if(myh123 == 0){
            //alert("호흡재활운동을 할 때 산소를 사용하셨습니까? 가 선택되지 않았습니다. ");
            //return;
        }

        myh2rsum = 0
        if(myh2r == "중단함") {
            myh2rsum++;
        }

        if(myh2r == "중단하지 않음") {
            myh2rsum++;
        }

        if(myh2rsum == 0){
            alert("호흡재활운동을 할 때 너무 힘들어서, 너무 숨이 차서 운동을 중단하였습니까? 를 선택하지 않았습니다.");
            return;
        }

        $("#myh_1_1_id").submit();

    }
</script>

<?include('footer.php')?>