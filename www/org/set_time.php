<?
$header = array(
    'is_header' => true,
    'head_name' => '복약시간 알림',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="time_pic">
    <div class="wrap">
        <div class="tp1 swiper1">
            <div class="swiper-wrapper">
                <div class="item swiper-slide">오전</div>
                <div class="item swiper-slide">오후</div>
            </div>
        </div>
        <div class="tp2 swiper2">
            <div class="swiper-wrapper">
                <? for($i = 1; $i <= 12; $i++) { ?>
                    <div class='item swiper-slide'><?=$i?></div>
                <? } ?>
            </div>
        </div>
        <div class="tp_gap vt_mid">:</div>
        <div class="tp3 swiper3">
            <div class="swiper-wrapper">
                <? for($i = 1; $i <= 59; $i++) { ?>
                    <div class='item swiper-slide'><?=str_pad($i, 2, "0", STR_PAD_LEFT)?></div>
                <? } ?>
            </div>
        </div>
    </div>

    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="history.go(-1);">저장</button>
    </div>
</section>

<script>
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
            initialSlide: <?=date('H')-1?>,
            slideToClickedSlide : true,
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
            initialSlide: <?=date('i')-1?>,
            slideToClickedSlide : true,
        });
    });

</script>

<?include('footer.php')?>