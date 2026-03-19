<?

$header = array(
    'is_header' => true,
    'main_head' => true,
    'head_name' => '호흡재활운동 시작하기',
    'inh' => true,
);

$footer = array(
    'is_footer' => true,
    'page' => 'home',
);
include 'header.php';
?>

<?include('today_pop.php')?> <!--오늘의 운동강도 설정 팝업-->

<section class="main">
    <div class="pd15">
        <!--
            파란색 이미지일때 = exer1.png
            당일추천 운동일때 = exer1_pk.png
        -->

        <!--당일추천 운동일때

            exer_btn에 addClass('pk')
            img src="...exer1_pk.png"  << _pk 붙으면 분홍색이미지
        -->
        <div class="exer_wrap">
            <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise.php'">
                <img src="/org/img/exer1.png" alt="지구력 운동">
                <div class="e_txt">지구력 운동</div>
            </button>
            <button type="button" class="exer_btn vt_mid pk" onclick="location.href='exercise.php'">
                <img src="/org/img/exer2_pk.png" alt="인터벌 운동">
                <div class="e_txt">인터벌 운동</div>
            </button>
            <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise.php'">
                <img src="/org/img/exer3.png" alt="저항/근력 운동">
                <div class="e_txt">저항/근력 운동</div>
            </button>
            <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise.php'">
                <img src="/org/img/exer4.png" alt="호흡근 운동">
                <div class="e_txt">호흡근 운동</div>
            </button>
            <button type="button" class="exer_btn vt_mid pk" onclick="location.href='exercise.php'">
                <img src="/org/img/exer5_pk.png" alt="유연성 운동">
                <div class="e_txt">유연성 운동</div>
            </button>
            <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise.php'">
                <img src="/org/img/exer6.png" alt="기침보조 운동">
                <div class="e_txt">기침보조 운동</div>
            </button>
            <!-- <button type="button" class="exer_btn go_more vt_mid" onclick="location.href='exercise.php'">
                <div class="grid">
                    <img src="/org/img/icon_plus.png" alt="더보기">
                    <div class="e_txt">더보기</div>
                </div>
            </button> -->
        </div>

        <a href="b_info.php" class="go_info">호흡재활 관련정보</a>

        <h2 class="h2">나의 건강모니터</h2>

        <div class="myh_wrap">
            <button type="button" class="myh_btn vt_mid" onclick="location.href='myh_1_1.php'">
                <div class="circle">
                    <div class="grid">
                        <img src="/org/img/myh1.png" alt="안전한 운동을 했나요?">
                    </div>
                </div>
                <div class="myh_txt">
                    안전한 운동을<br>했나요?
                </div>
            </button>
            <button type="button" class="myh_btn vt_mid" onclick="location.href='myh_2.php'">
                <div class="circle">
                    <div class="grid">
                        <img src="/org/img/myh2.png" alt="호흡곤란 증상
                        확인하기">
                    </div>
                </div>
                <div class="myh_txt">
                    호흡곤란 증상<br>확인하기
                </div>
            </button>
            <button type="button" class="myh_btn vt_mid" onclick="location.href='myh_3.php'">
                <div class="circle">
                    <div class="grid">
                        <img src="/org/img/myh3.png" alt="얼마나 좋아졌나요?">
                    </div>
                </div>
                <div class="myh_txt">
                    얼마나<br>좋아졌나요?
                </div>
            </button>
        </div>
    </div>
</section>

<?include('footer.php')?>