<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

$header = array(
    'is_header' => true,
    'head_name' => '일정추가', //제목 수정
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';



$num_modi = $_GET['num'];
$outs_modi = sql_fetch_array(sql_query("select * FROM g5_alarm_info where mb_no = '$num_modi'"));


//echo $outs_modi['contents'];

?>

<?include("set7_datepop.php")?>


    <form id = "ca_sc_add_temp_saveform" name = "form1" action = "./set7_add_ok.php" method = "post">
        <input type = "hidden" name = "ca_sc_add_temp_save1form" id = "ca_sc_add_temp_save1form" value = "">
        <input type = "hidden" name = "ca_sc_add_temp_save2form" id = "ca_sc_add_temp_save2form" value = "">
        <input type = "hidden" name = "ca_sc_add_temp_save3form" id = "ca_sc_add_temp_save3form" value = "">
        <input type = "hidden" name = "add_scform" id = "add_scform" value = "">
        <input type = "hidden" name = "pushcheckedform" id = "pushcheckedform" value = "">
        <input type = "hidden" name = "num_modi" id = "num_modi" value = "<?=$num_modi?>">
    </form>




</script>

    <style>
        /*=================▼ 병원일정 부분 추가됨==================*/
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-calendar-picker-indicator {display: none;-webkit-appearance: none;}
        table {border-collapse: inherit; border-spacing: 0;}

        .set7 .date {border: none; color: #4683D2; font-size: 4.1667vw; font-weight: 500; width: 29.1667vw; appearance: none; background: url("/img/icon_cal.png") no-repeat center right / 3.6111vw;}
        .set7 .date_area {margin-bottom: 1.3889vw;}


        /*달력*/
        .datepop .white_bg {width: 91.6667vw; border-radius: 2.7778vw;}
        .datepop .white_bg .p_h2 {font-size: 4.7222vw; font-weight: 500; padding-top:5.5556vw; box-sizing: border-box; text-align: center;}

        .s7cal .calendar .cal_bot .th {font-size: 2.7778vw;}
        .s7cal .calendar .cal_bot .tr .td {font-size: 3.0556vw; height: 11.1111vw; cursor: pointer;}
        .s7cal .calendar .cal_top .ct2 .d_btns {color: #ACACAC; font-size: 3.0556vw;}
        .s7cal .calendar .cal_top .ct2 .mg {margin: 0 3.3333vw;}

        .datepop .btn_area {padding: 0 4.1667vw; box-sizing: border-box; margin-bottom: 5.5556vw;}
        .datepop .btn_area .pop_btn {font-size: 4.1667vw; color: #fff; padding: 3.0556vw 0; box-sizing: border-box; width: 100%; background: #4683D2; border-radius: 2.7778vw;}


        /*=================▲ 병원일정 부분 추가됨==================*/
    </style>




    <section class="set set7">

        <div class="pd15">
            <form>
                <div class="block">
                    <label for="add_sc" class="a_lab">
                        <?php
                        if($num_modi != ""){
                        ?>
                            일정추가
                            <b><a href="javascript:sch_add_f_modify('<?=$num_modi?>')">[수정]</a></b>
                            <b><a href="javascript:sch_add_f_delete('<?=$num_modi?>');">[삭제]</a></b>
                        <?php
                        }
                        ?>

                    </label>
                    <div class="date_area">

                        <?php
                        if($num_modi != ""){
                        ?>

                            <input type="text" name="date" id="date_area" class="date" value="<?=$outs_modi['times2']?>">
                        <?php
                        }
                        else{
                            ?>
                            <input type="text" name="date" id="date_area" class="date" value="<?=$_GET['datestr']?>">
                        <?php
                        }
                        ?>



                    </div>
                    <input type="text" name="add_sc" id="add_sc" class="text" placeholder="일정 내용" value = '<?=$outs_modi['contents']?>'>
                </div>

                <div class="b_sub">
                    예정되어 있는 OOO병원 채혈 / CT검사 / 호흡기내과
                    외래진료 / 재활치료 예약 등의 내용을 입력하세요
                </div>

                <div class="push">
                    <div class="p_top">
                        <label for="push" class="p_lab vt_mid">푸시알림 받기</label>

                        <?php
                        //if($outs_modi['uses'] == "Y"){
                            //$style_add_push = "style = 'background-image: url(/img/toggle_on.png)'";
                        //}
                        //else{

                            //$style_add_push = "style = 'background-image: url(/img/toggle.png)'";                    }
                        ?>

                        <input type="checkbox" name="push" id="push" class="toggle vt_mid" onChange = "ch_chbox_push_f()">


                    </div>
                    <div class="p_bot">
                        예약된 일정의 이틀 전 오전 10시에 알림을 제공합니다.
                    </div>
                </div>


                <div class="btn_fixed">

                    <?php
                    if($num_modi != ""){
                    ?>

                        <button type="button" class="next_btn" onClick = "sch_add_f_modify('<?=$num_modi?>')">수정</button>

                    <?php
                    }
                    else{
                    ?>

                        <button type="button" class="next_btn" onClick = "sch_add_f()">저장</button>

                    <?php
                    }
                    ?>


                </div>
            </form>
        </div>

    </section>

    <script>

        function ch_chbox_push_f(){

            push = $("input:checkbox[name='push']:checked").val();

            // $('#push').css({
            //
            //     'background-image':'url(\"\")'
            //
            // });


            if(push == "on"){



                //$("#push").css("background-image: url","/img/toggle_on.png)");


                $('#push').css({

                    'background-image':'url(\"/img/toggle_on.png\")'

                });




            }
            else{


                $('#push').css({

                    'background-image':'url(\"/img/toggle.png\")'

                });



                //$("#push").css("background-image: url","/img/toggle.png)");
            }

        }






        $('.set7 .date').click(function(){
            $('.datepop').addClass('on');
        });

        $('.datepop .td').click(function(){
            if($(this).hasClass('prev')){

            }else if($(this).hasClass('next')){

            }else{
                $('.datepop .td').removeClass('on');
                $(this).addClass('on');
            }
        });
    </script>


    <script>

        var num_modi_j_var = '<?=$num_modi?>';
        var num_modi_j_var_use = '<?=$outs_modi['push_alarm_use']?>';

        function sch_add_f_modify(nummodify){

            if(nummodify == ""){
                return
            }
            else{

                date_area_modify = $("#date_area").val();
                add_sc_str_mo_modify = $("#add_sc").val();
                if($("input:checkbox[name='push']").is(':checked') == true){
                    push = "Y";
                }
                else{
                    push = "N";
                }

                // console.log(date_area_modify);
                // console.log(add_sc_str_mo_modify);
                // console.log(push);

                // if(add_sc_str == ""){
                //     return
                // }
                // else{
                //
                //     add_sc_str_mo_modify = encodeURIComponent(add_sc_str_mo_modify);
                //
               location.href = './set7_add_ok.php?nummodify='+nummodify+"&date_area_modify="+date_area_modify+"&add_sc_str_mo_modify="+add_sc_str_mo_modify+"&push="+push;
                // }

            }

        }

        function sch_add_f_delete(num){

            bb = confirm("삭제하시겠습니까?")

            if(bb == true){

                if(num == ""){
                    return
                }
                else{
                    location.href = './set7_add_ok.php?deletenum='+num;
                }

            }

        }


        function sch_add_f(){



            date = $("#date").val();
            add_sc = $("#add_sc").val();

            pushchecked = "";

            if($('#push').prop('checked') == true){
               // console.log("ok");
                pushchecked = "Y";
            }
            else{
                //console.log("false");
                pushchecked = "N";
            }


            if(ca_sc_add_temp_save1 == "" || ca_sc_add_temp_save2 == "" || ca_sc_add_temp_save3 == ""){

                if(num_modi_j_var == "") {

                    //alert("추가할 날짜를 클릭하세요.");
                    //return;

                }


                date_area_buri = $("#date_area").val();



                date_area_buri = date_area_buri.split("-");

                ca_sc_add_temp_save1 = date_area_buri['0'];
                ca_sc_add_temp_save2 = date_area_buri['1'];
                ca_sc_add_temp_save3 = date_area_buri['2'];

                if(add_sc == ""){
                    alert("일정내용을 입력하세요.");
                    $("#add_sc").focus();
                    return;
                }
                else{

                    $("#ca_sc_add_temp_save1form").val(ca_sc_add_temp_save1);
                    $("#ca_sc_add_temp_save2form").val(ca_sc_add_temp_save2);
                    $("#ca_sc_add_temp_save3form").val(ca_sc_add_temp_save3);
                    $("#add_scform").val(add_sc);
                    $("#pushcheckedform").val(pushchecked);


                    $("#ca_sc_add_temp_saveform").submit();

                    return;


                }



            }
            else{



                if(add_sc == ""){
                    alert("일정내용을 입력하세요.");
                    $("#add_sc").focus();
                    return;
                }
                else{

                    $("#ca_sc_add_temp_save1form").val(ca_sc_add_temp_save1);
                    $("#ca_sc_add_temp_save2form").val(ca_sc_add_temp_save2);
                    $("#ca_sc_add_temp_save3form").val(ca_sc_add_temp_save3);
                    $("#add_scform").val(add_sc);
                    $("#pushcheckedform").val(pushchecked);


                    $("#ca_sc_add_temp_saveform").submit();

                    return;


                }

            }



        }






        function ch_chbox_push_f_first(){


            console.log(num_modi_j_var_use);

            if(num_modi_j_var_use == "Y"){
                //console.log(num_modi_j_var);


                $('#push').css({

                    'background-image':'url(\"/img/toggle_on.png\")'

                });


                //$("#push").css("background-image: url","/img/toggle_on.png)")

            }
            else{
                //console.log("empty");
                //$("#push").css("background-image: url","/img/toggle.png)")


                $('#push').css({

                    'background-image':'url(\"/img/toggle.png\")'

                });

            }

        }






        ch_chbox_push_f_first();

    </script>


<?include('footer.php')?>