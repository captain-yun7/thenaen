<?php


include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];



$outs_exercise_workout_count = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_work_info where kinds = 'mainworkout' and mb_write_time like '%$common_nowdate%' "));


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

<?php
if($outs_exercise_workout_count['cnt'] == 0){
?>

<?include('exercise_pop.php')?>

<?php
}
?>

<section class="exercise">
    <div class="pd15">

        <!--
            분홍버튼 = 당일 추천운동

            exer_btn에 addClass('pk')
            img src="...exer1_pk.png"  << _pk 붙으면 분홍색이미지
        -->

        <button type="button" class="exer_btn vt_mid <?php if($menuPart1 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise_sub1.php'">
            <img src="/img/exer1<?php if($menuPart1 =="Y"){ echo "_pk"; }?>.png" alt="지구력 운동">
            <div class="e_txt">지구력 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid <?php if($menuPart2 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise_sub2.php'">
            <img src="/img/exer2<?php if($menuPart2 =="Y"){ echo "_pk"; }?>.png" alt="인터벌 운동">
            <div class="e_txt">인터벌 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid <?php if($menuPart3 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise_sub3.php'">
            <img src="/img/exer3<?php if($menuPart3 =="Y"){ echo "_pk"; }?>.png" alt="저항/근력 운동">
            <div class="e_txt">저항/근력 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid <?php if($menuPart4 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise_sub4.php'">
            <img src="/img/exer4<?php if($menuPart4 =="Y"){ echo "_pk"; }?>.png" alt="호흡근 운동">
            <div class="e_txt">호흡근 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid <?php if($menuPart5 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise_sub5.php'">
            <img src="/img/exer5<?php if($menuPart5 =="Y"){ echo "_pk"; }?>.png" alt="유연성 운동">
            <div class="e_txt">유연성 운동</div>
        </button>
        <button type="button" class="exer_btn vt_mid <?php if($menuPart6 =="Y"){ echo "pk"; }?> " onclick="location.href='exercise_sub6.php'">
            <img src="/img/exer6<?php if($menuPart6 =="Y"){ echo "_pk"; }?>.png" alt="기침보조 운동">
            <div class="e_txt">기침보조 운동</div>
        </button>
    </div>
</section>

<?include('footer.php')?>