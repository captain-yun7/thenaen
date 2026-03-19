<?
$header = array(
    'is_header' => true,
    'head_name' => '호흡재활운동 시작하기',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include('exercise_pop.php')?>

<section class="exercise">
    <div class="pd15">

        <!--
            분홍버튼 = 당일 추천운동

            exer_btn에 addClass('pk')
            img src="...exer1_pk.png"  << _pk 붙으면 분홍색이미지
        -->

        <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise_sub1.php'">
            <img src="/org/img/exer1.png" alt="지구력 운동">
            <div class="e_txt">지구력 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid pk" onclick="location.href='exercise_sub2.php'">
            <img src="/org/img/exer2_pk.png" alt="인터벌 운동">
            <div class="e_txt">인터벌 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise_sub3.php'">
            <img src="/org/img/exer3.png" alt="저항/근력 운동">
            <div class="e_txt">저항/근력 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise_sub4.php'">
            <img src="/org/img/exer4.png" alt="호흡근 운동">
            <div class="e_txt">호흡근 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid pk" onclick="location.href='exercise_sub5.php'">
            <img src="/org/img/exer5_pk.png" alt="유연성 운동">
            <div class="e_txt">유연성 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid" onclick="location.href='exercise_sub6.php'">
            <img src="/org/img/exer6.png" alt="기침보조 운동">
            <div class="e_txt">기침보조 운동</div>
        </button>
    </div>
</section>

<?include('footer.php')?>