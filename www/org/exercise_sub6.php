<?
$header = array(
    'is_header' => true,
    'head_name' => '기침보조 운동',
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
            효율적인 기침은 기도의 분비물을 효과적으로 배출할 수 있도록 유도하여 호흡기 장애를 예방하고 폐를 깨끗하게 유지하도록 도와줍니다. 
        </div>
    </div>
    <div class="es_con">
        <h3 class="es_h3 mg20">영상을 보면서 기침운동을 따라해보세요.</h3>
    </div>

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub6.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">기침보조 운동</h2>
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