<?
$header = array(
    'is_header' => true,
    'head_name' => '지구력 운동',
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
            미국 스포츠의학회의 운동처방 지침에 따르면 일주일에 3~5회, 최소 30분을 권고하고 있습니다.<br>
            지구력 운동의 종류에는 평지 걷기, 계단 오르기, 자전거 타기 등이 있습니다.
            <!-- 계단 한 층 오르기와 자전거 타기가 어려우면 평지를 걸어보세요. 평지 걷기 운동도 효과적입니다.   -->
        </div>
    </div>
    <div class="es_con">
        <h3 class="es_h3">지구력 운동을 시작할 때 운동시작버튼과 운동종료버튼을 눌러주세요. 운동시간을 측정합니다.</h3>
    </div>

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub1.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">지구력 운동</h2>
        <p class="es_p">지구력 운동이 어렵다면 대신 인터벌 운동을 해보세요.</p>
    </div>

    <div class="ebtn_area">
        <button type="button" class="ebtn blue on">운동 시작</button>
        <button type="button" class="ebtn gray">운동 종료</button>
    </div>

</section>

<?include('footer.php')?>