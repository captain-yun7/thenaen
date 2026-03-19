<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

$header = array(
    'is_header' => true,
    'head_name' => '운동시간 알림',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>





    <script>

        function checkboxChangeF(num) {
            thisnum = $('#onoff1_'+num).attr('value');

            thisnumStr = "";

            if ($('#onoff1_'+num).prop('checked') == true) {
                thisnumStr = "Y";
            }
            else{
                thisnumStr = "N";
            }

            // console.log(thisnum);
            // console.log(thisnumStr);
            // console.log(num);
            //
            // return;

            $.ajax({
                type: "POST",
                url: "/bbs/alarm_ajax.php",
                data: {
                    delimiter: "modify",
                    thisnum : thisnum,
                    thisnumStr : thisnumStr,
                    countnum : num,
                },
                dataType: "text",
                success: function (result) {



                    buri = result.split("-");
                    buri0 = buri[0];
                    buri1 = buri[1];

                    if(buri0 == 'Y'){



                        $("#onoff1_"+buri1).css({
                            "background":"url(/img/toggle_on.png) no-repeat center center / 100% 100%",
                            "width" : "13.3333vw",
                            "height" : "6.6667vw",
                            "appearance" : "none",
                            "border" : "none",
                            "background-position":"center center"
                        });



                    }
                    else{


                        $("#onoff1_"+buri1).css({
                            "background":"url(/img/toggle.png) no-repeat center center / 100% 100%",
                            "width" : "13.3333vw",
                            "height" : "6.6667vw",
                            "appearance" : "none",
                            "border" : "none",
                            "background-position":"center center"
                        });



                    }






                }
            });



        }

    </script>





<section class="set set8">
    <div class="pd15">

        <div class="s_top">
            <div class="s_left vt_mid">
                하루 중 운동에 집중할 수 있는 시간을
                설정해보세요. 한 번에 지속해도 되고,
                여러 번 나눠서 운동할 수 있습니다.
            </div>
            <div class="s_right on vt_mid">
                <button type="button" class="btns btn1">
                    <img src="/img/s6btn_1.png" alt="알림 추가" onClick = alarm_add_de_tempF("3")>
                </button>
                <button type="button" class="btns btn2">
                    <img src="/img/s6btn_2.png" alt="알림 삭제" onClick = alarm_add_de_tempF("3")>
                </button>
            </div>
        </div>

        <div class="s_bot">

            <?php
            $sql = "select * from g5_alarm_info where mb_id ='".$ss_mb_id."' and kinds='3' order by mb_no desc";
            $rs = sql_query($sql);

            $ii = 0;

            while ($row=sql_fetch_array($rs)) {

            $mb_no = $row['mb_no'];
            $uses = $row['uses'];
            $times1 = $row['times1'];
            $times2 = $row['times2'];



            ?>

            <div class="a_box">
                <div class="a_ck vt_mid">
                    <input type="checkbox" name="alarm_<?=$ii?>" id="alarm1_<?=$ii?>" value="<?=$mb_no?>" class="ckbox">
                </div>
                <a href="set_time2.php?mb_no=<?=$mb_no?>&nums=3" class="time vt_mid">
                    <span class="vt_bot tm1"><?=$times1?></span>
                    <span class="vt_bot tm2"><?=$times2?></span>
                </a>
                <div class="a_radio vt_mid">
                    <input type="checkbox" name="onoff_<?=$ii?>" id="onoff1_<?=$ii?>" <?php if($uses == "Y"){ echo "style='background-image: url(/img/toggle_on.png)'"; }else{ echo "style='background-image: url(/img/toggle.png)'"; } ?> value="<?=$mb_no?>" class="onoff" onchange="checkboxChangeF('<?=$ii?>')">
                </div>
            </div>

                <?php

                $ii++;
            }

            if($ii == 0){
                echo "<br><br>알림 수신 시간은 최소 1개 이상 설정해주세요.<br>";
            }

            ?>

            <script>
                var sumCount = "<?=$ii?>";
            </script>






            <!--            <div class="a_box">-->
<!--                <div class="a_ck vt_mid">-->
<!--                    <input type="checkbox" name="alarm" id="alarm1" class="ckbox">-->
<!--                </div>-->
<!--                <a href="set_time.php" class="time vt_mid">-->
<!--                    <span class="vt_bot tm1">오전</span>-->
<!--                    <span class="vt_bot tm2">9:00</span>-->
<!--                </a>-->
<!--                <div class="a_radio vt_mid">-->
<!--                    <input type="checkbox" name="onoff" id="onoff1" class="onoff">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="a_box">-->
<!--                <div class="a_ck vt_mid">-->
<!--                    <input type="checkbox" name="alarm" id="alarm1" class="ckbox">-->
<!--                </div>-->
<!--                <a href="set_time.php" class="time vt_mid">-->
<!--                    <span class="vt_bot tm1">오후</span>-->
<!--                    <span class="vt_bot tm2">12:00</span>-->
<!--                </a>-->
<!--                <div class="a_radio vt_mid">-->
<!--                    <input type="checkbox" name="onoff" id="onoff1" class="onoff" checked>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="a_box">-->
<!--                <div class="a_ck vt_mid">-->
<!--                    <input type="checkbox" name="alarm" id="alarm1" class="ckbox">-->
<!--                </div>-->
<!--                <a href="set_time.php" class="time vt_mid">-->
<!--                    <span class="vt_bot tm1">오후</span>-->
<!--                    <span class="vt_bot tm2">6:00</span>-->
<!--                </a>-->
<!--                <div class="a_radio vt_mid">-->
<!--                    <input type="checkbox" name="onoff" id="onoff1" class="onoff" checked>-->
<!--                </div>-->
<!--            </div>-->




        </div>

        <div class="btn_fixed">
            <button type="button" class="d_btns d_btn1">취소</button>
            <button type="button" class="d_btns d_btn2">
                <img src="/img/s6btn_2.png" alt="삭제">삭제
            </button>
        </div>

    </div>
</section>

<?include('footer.php')?>