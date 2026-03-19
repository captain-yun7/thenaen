<?
$header = array(
    'is_header' => true,
    'head_name' => '설정',
    'right_menu' => false,
    'main_head' => true,
    'is_set' => true,
);

$footer = array(
    'is_footer' => true,
    'page' => 'set',
);
include 'header.php';
?>

<?include('set_pop.php')?>

<section class="set s_main">
    <div class="pd15">
        <div class="sa_wrap">
            <a href="set_1.php" class="s_a">프로필 수정</a>
            <a href="set_2.php" class="s_a">내 정보 수정</a>
            <a href="set_3.php" class="s_a">앱 사용방법</a>
            <a href="set_4.php" class="s_a">앱에 대해서</a>
            <a href="set_5.php" class="s_a">계정</a>
        </div>

        <h2 class="set_h2">
            <span class="vt_mid">알림 설정</span>
            <button type="button" class="info_btn">
                <img src="/org/img/icon_info.png" alt="알림" class="icon">
            </button>
        </h2>
        <div class="sa_wrap">
            <a href="set_6.php" class="s_a">복약시간 알림</a>
            <a href="set_7.php" class="s_a">병원일정 알림</a>
            <a href="set_8.php" class="s_a">운동시간 알림</a>
        </div>
    </div>
</section>

<?include('footer.php')?>