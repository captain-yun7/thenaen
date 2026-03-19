<?
$header = array(
    'is_header' => true,
    'head_name' => '유연성 운동',
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
            미국 스포츠의학회의 운동처방 지침에 따르면 일주일에 2~3회, 참을 수 있는 통증이 느껴지게 되는 운동 범위의 최대지점까지의 강도를 권고하고 있습니다.<br><br>

            시간은 최대로 늘릴 수 있는 상태에서 약 15초 가량 유지하는 것을 목표로 4회 반복하며, 주요 상체와 하체 근육의 스트레칭, 목과 어깨 부분의 호흡 보조근육의 스트레칭이 포함됩니다. 
        </div>
    </div>
    <div class="es_con">
        <h3 class="es_h3 mg20">영상을 보면서 지금 운동을 시작하세요.</h3>
    </div>

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub5.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">유연성 운동</h2>
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