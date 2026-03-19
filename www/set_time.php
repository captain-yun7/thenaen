<?php


include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

$nums = $_GET['nums'];

if($nums == 1){ // 복약시간 알림
    $header = array(
        'is_header' => true,
        'head_name' => '복약시간 알림',
        'right_menu' => false,
    );
}
else if($nums == 3){ // 운동시간 알림
    $header = array(
        'is_header' => true,
        'head_name' => '운동시간 알림',
        'right_menu' => false,
    );
}
else{
    $header = array(
        'is_header' => true,
        'head_name' => '복약시간 알림',
        'right_menu' => false,
    );
}

$footer = array(
    'is_footer' => false,
);
include 'header.php';


$dsi = date("H");
$dbun = date("i");
if(!empty($_REQUEST['mb_no'])) {
    $sql = "SELECT * FROM `g5_alarm_info` WHERE `mb_no` = '{$_REQUEST['mb_no']}'";
    $info = sql_fetch($sql);

    $times = explode(" : ", $info['times2']);
    $dsi = $times[0];
    $dbun = $times[1];
}


?>

<script>

    var timePart2Temp = "<?=$dsi?>";
    var timePart3Temp = "<?=$dbun?>";
    var nums = "<?=$nums?>";

    if(timePart2Temp <= 12) {

        var timePart1Temp = "오전";

    }
    else{
        var timePart1Temp = "오후";

        timePart2Temp = timePart2Temp - 12;

    }

    function timeTempSave(str1,str2,str3){

        if(str1 != "") {
            timePart1Temp = str1;
        }

        if(str2 != "") {
            timePart2Temp = str2;
        }

        if(str3 != "") {

            if(str3 == 0){
                str3 = "00";
            }

            timePart3Temp = str3;
        }

        console.log(str1);
        console.log(str2);
        console.log(str3);

    }

    function timeTempSaveGoF(){

        // console.log(timePart1Temp);
        // console.log(timePart2Temp);
        // console.log(timePart3Temp);
        //
        //
        // return;

	//var timePart1 = $(".swiper1 .item.swiper-slide-active").eq(0).text();
	var timePart1 = "";
	var timePart2 = $(".swiper2 .item.swiper-slide-active").eq(0).text();
	var timePart3 = $(".swiper3 .item.swiper-slide-active").eq(0).text();

        $.ajax({
            type: "POST",
            url: "/bbs/alarm_ajax.php",
            async:false,
            data: {
                nums: nums,
                delimiter : "<?=empty($_REQUEST['mb_no']) ? 'add':'change_time'?>",
                timePart1Temp : timePart1,
                timePart2Temp : timePart2,
                timePart3Temp : timePart3,
                mb_no : "<?=$_REQUEST['mb_no']?>",
            },
            dataType: "text",
            success: function (result) {

                if(result == "ok"){

                    if(nums == '1') {
                        location.href = 'set_6.php';
                    }
                    else if(nums == '3'){
                        location.href = 'set_8.php';
                    }
                    else{
                        location.href = 'set_6.php';
                    }
                }
                else if(result == "repeat"){
                    location.href = 'set_6.php';
                }

            }
        });


    }


</script>

<section class="time_pic">
    <div class="wrap">
        <!-- <div class="tp1 swiper1">
            <div class="swiper-wrapper">
                <div class="item swiper-slide" id = "swiper-slide_part1"  onclick = "timeTempSave('오전','','')">오전</div>
                <div class="item swiper-slide" id = "swiper-slide_part2" onclick = "timeTempSave('오후','','')">오후</div>
            </div>
        </div>
	-->
        <div class="tp2 swiper2">
            <div class="swiper-wrapper">
                <? for($i = 0; $i <= 23; $i++) { ?>
                    <div class='item swiper-slide' onclick = "timeTempSave('','<?=$i?>','')"><?=str_pad($i, 2, "0", STR_PAD_LEFT)?></div>
                <? } ?>
            </div>
        </div>
        <div class="tp_gap vt_mid">:</div>
        <div class="tp3 swiper3">
            <div class="swiper-wrapper">
                <? for($i = 0; $i <= 59; $i++) { ?>
                    <div class='item swiper-slide' onclick = "timeTempSave('','','<?=$i?>')"><?=str_pad($i, 2, "0", STR_PAD_LEFT)?></div>
                <? } ?>
            </div>
        </div>
    </div>

    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="timeTempSaveGoF()">저장</button>
    </div>
</section>

<script>



    // var $inputElement = $("#slide_part1");
    // $inputElement.change(function() {
    //     console.log("111");
    // })
    //
    //
    // var $inputElement2 = $("#slide_part2");
    // $inputElement2.change(function() {
    //     console.log("222");
    // })
    //



    var swiper = swiper2 = swiper3 = undefined;

    $(document).ready(function(){
        // for (i = 1; i <= 12; i++){
        //     var hour = "<div class='item swiper-slide'>"+i+"</div>"
        //     $('.time_pic .tp2 .swiper-wrapper').append(hour);
        // }

        // for (i = 1; i <= 59; i++){
        //     var minutes = "<div class='item swiper-slide'>"+i+"</div>"
        //     $('.time_pic .tp3 .swiper-wrapper').append(minutes);

        //     const str1 = $('.tp3 .item').eq(i-1).text();
        //     $('.tp3 .item').eq(i-1).text(str1.padStart(2,'0'))
        // }

        swiper= new Swiper(".swiper1", {
            direction: 'vertical',
            slidesPerView:"auto",
            observer: true,
            observeParents: true,
            spaceBetween: 53,
            initialSlide: <?=date('H')-1 < 12 ? 0:1?>,
            slideToClickedSlide : true,
            on: {
                slideChange : function() {
                    // console.log("111");

                    //console.log($(".tp1 swiper1 swiper-wrapper swiper-slide").text());
                },
            },

        });

        swiper2 = new Swiper(".swiper2", {
            direction: 'vertical',
            slidesPerView:"auto",
            observer: true,
            observeParents: true,
            spaceBetween: 25,
            centeredSlides : true,
            loop:true,
            loopAdditionalSlides: 1,
            initialSlide: <?=$dsi?>,
            slideToClickedSlide : true,
            on: {
                slideChange : function() {
                    // console.log("222");

                    //console.log($(".tp2 swiper2 swiper-wrapper swiper-slide").text());

                },
            },

        });

        swiper3 = new Swiper(".swiper3", {
            direction: 'vertical',
            slidesPerView:"auto",
            observer: true,
            observeParents: true,
            spaceBetween: 25,
            centeredSlides : true,
            loop:true,
            loopAdditionalSlides: 1,
            initialSlide: <?=$dbun?>,
            slideToClickedSlide : true,

            on: {
                slideChange : function() {
                    // console.log("333");
                    //console.log($(".tp3 swiper3 swiper-wrapper swiper-slide").text());


                },
            },
        });
    });

</script>

<?include('footer.php')?>
