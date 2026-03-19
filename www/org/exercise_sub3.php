<?
$header = array(
    'is_header' => true,
    'head_name' => '저항/근력 운동',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include('exercise_subpop.php')?>

<section class="exercise_sub">
    <div class="pd15">
        <div class="s_text">
            미국 스포츠의학회의 운동처방 지침에 따르면 저항/근력 운동은 격일로 시행하는 것을 추천합니다.

            <!-- 운동량을 늘리고 싶을 때는 영상을 추가로 반복재생하여 운동 시간을 늘리거나, 무게를 증가시키거나, 탄력밴드의 저항을 증가시키면 됩니다.<br>
            (노란색->빨간색->녹색->파란색->검정색 순서대로 저항이 커집니다)<br><br>

            근력운동시 아령이 없다면 양 손에 500cc 생수병도 좋습니다. -->
        </div>
    </div>
    <div class="es_con">
        <h3 class="es_h3 mg20">영상을 보면서 지금 운동을 시작하세요. <span class="red">(낙상주의)</span></h3>
    </div>

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub3_1.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2 mg20">상지 운동</h2>
    </div>

<!--▼ 운동버튼 추가 (공통요소라 text_wrap 아래에 html만 추가해주시면됩니다)-->
    <div class="ebtn_area">
        <button type="button" class="ebtn blue on">운동 시작</button>
        <button type="button" class="ebtn gray">운동 종료</button>
    </div>

    <i class="line"></i>
<!--▲ 운동버튼 추가 (공통요소라 text_wrap 아래에 html만 추가해주시면됩니다)-->


    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub3_2.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2 mg20">하지 운동</h2>
    </div>

<!--▼ 운동버튼 추가 (공통요소라 text_wrap 아래에 html만 추가해주시면됩니다)-->
    <div class="ebtn_area">
        <button type="button" class="ebtn blue on">운동 시작</button>
        <button type="button" class="ebtn gray">운동 종료</button>
    </div>

    <i class="line"></i>
<!--▲ 운동버튼 추가 (공통요소라 text_wrap 아래에 html만 추가해주시면됩니다)-->

</section>

<?include('footer.php')?>