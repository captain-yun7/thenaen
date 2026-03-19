<?
$header = array(
    'is_header' => true,
    'head_name' => '인터벌 운동',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include('exercise_subpop.php')?>


<!--
    [저강도/중강도/고강도] 은 앞 홈화면1에서 설정한 값이 보이도록 셋팅.
-->


<section class="exercise_sub">
    <div class="pd15">
        <div class="s_text">
            지구력 운동이 어렵다면 대신 인터벌 운동을
            시작해보세요.<br><br>

            미국 스포츠의학회의 운동처방 지침에 따르면 운동 강도로는 ‘약간 힘듦~힘듦’ 정도를 권고하고 있습니다. 인터벌 운동의 종류에는 평지 걷기, 계단 오르기, 자전거 타기 등이 있습니다. 괜찮다면 경사를 걷거나 빠르게 걸어볼 수도 있습니다.

            <!-- 초급: 프로그램 1 (3분 운동+ 1분 휴식으로 구성되어 3회 반복. 총 12분)<br>
            중급: 프로그램 2 (3분 운동+ 1분 휴식으로 구성되어 5회 반복. 총 20분)<br>
            고급: 프로그램 1+2 (3분 운동+ 1분 휴식으로 구성되어 8회 반복. 총 32분) -->
        </div>
    </div>
    <!-- <div class="es_con">
        <h3 class="es_h3">인터벌 운동을 시작할 때 프로그램을 선택해주세요. 운동시간과 휴식시간을 알려드립니다.</h3>
    </div> -->

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub2_1.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">인터벌 프로그램-고강도 운동</h2>
    </div>
 
    <div class="ebtn_area">
        <button type="button" class="ebtn blue on">운동 시작</button>
        <button type="button" class="ebtn gray">운동 종료</button>
    </div>

    <i class="line"></i>

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub2_2.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">인터벌 프로그램-중강도 운동</h2>
    </div>
 
    <div class="ebtn_area">
        <button type="button" class="ebtn blue on">운동 시작</button>
        <button type="button" class="ebtn gray">운동 종료</button>
    </div>

    <i class="line"></i>

    <!--동영상-->
    <div class="video_area">
        <video width="360" class="video" controls>
            <source src="/video/ex_sub2_3.mp4">
        </video>
    </div>
    <!--동영상-->

    <div class="text_wrap">
        <h2 class="es_h2">인터벌 프로그램-저강도 운동</h2>
    </div>
 
    <div class="ebtn_area">
        <button type="button" class="ebtn blue on">운동 시작</button>
        <button type="button" class="ebtn gray">운동 종료</button>
    </div>

</section>

<?include('footer.php')?>