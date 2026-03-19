<?
$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'회원가입',
    'j_info' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="j_info ji2">
    <form name="info">
        <div class="pd15">
            <i class="bar">
                <i class="blue_bar"></i>
            </i>

            <div class="dis_wrap">
                <h3 class="h3">진단받은 호흡기 질환을 입력해주세요</h3>

                <!--기존버전-->
                    <!-- <div class="radio_wrap">
                        <div class="r_block">
                            <div class="r_left vt_top">
                                <input type="radio" name="disease" id="disease1" class="radio" checked>
                            </div>
                            <label class="r_right vt_top" for="disease1">
                                <h4 class="h4">폐쇄성 폐질환</h4>
                                <p class="r_p">
                                    만성폐쇄성폐질환(폐기종, 만성 기관지염 등),천식, 기관지 확장증, 낭포성 섬유증, 기타 숨을 길게 내쉬기가 어려운 폐질환
                                </p>
                            </label>
                        </div>
                        <div class="r_block">
                            <div class="r_left vt_top">
                                <input type="radio" name="disease" id="disease2" class="radio">
                            </div>
                            <label class="r_right vt_top" for="disease2">
                                <h4 class="h4">제한성 폐질환</h4>
                                <p class="r_p">
                                간질성폐질환(특발성 폐 섬유증, 폐 사르코이드증등), COVID-19 감염 후, 급성 호흡곤란 증후군 치료 후, 유육종증, 진폐증 등 숨을 들이쉬기가 어려운 폐질환
                                </p>
                            </label>
                        </div>
                        <div class="r_block">
                            <div class="r_left vt_top">
                                <input type="radio" name="disease" id="disease3" class="radio">
                            </div>
                            <label class="r_right vt_top" for="disease3">
                                <h4 class="h4">잘 모르겠음</h4>
                                <input type="text" name="other_dis" id="other_dis" class="input" placeholder="진단명">
                            </label>
                        </div>
                    </div> -->
                <!--기존버전 끝-->

                <input type="text" name="dis" id="dis" class="input" placeholder="진단명">
                <div class="red">2글자 이상 입력해주세요.</div>
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn">다음</button>
        </div>
    </form>
</section>

<script>
    $('.blue_bar').css({'width':'25%'});
    $('.blue_bar').stop().animate({'width':'50%'},500);
</script>

<?include('footer.php')?>