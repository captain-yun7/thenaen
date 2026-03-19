<?
$header = array(
    'is_header' => true,
    'head_name' => '호흡 운동',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="exercise_sub">
    <div class="pd15">
        <div class="s_text">
            호흡곤란 증상을 줄여주는 호흡 전략으로 일주일에 5회 이상, 호흡법마다 3회씩 총 10회를 반복합니다.<br>
            횡격막 호흡법, 입술오므리기 호흡, 능동적 호기법, 개구리 호흡법'이 제공됩니다.
        </div>
    </div>
    <div class="es_con">
        <h3 class="es_h3 mg20">영상을 보면서 지금 운동을 시작하세요.</h3>
    </div>

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub4.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">호흡 운동</h2>
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