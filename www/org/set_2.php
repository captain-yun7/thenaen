<?
$header = array(
    'is_header' => true,
    'head_name' => '내 정보 수정',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include('set_pop.php')?>

<section class="set">
    <div class="pd15">
        <div class="sa_wrap">
            <a href="set_2_1.php" class="s_a">나의 건강정보</a>
            <a href="set_2_2.php" class="s_a">나의 활동내역</a>
            <a href="set_2_3.php" class="s_a">차단목록 관리</a>
        </div>
    </div>
</section>

<?include('footer.php')?>