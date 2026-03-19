<?
$header = array(
    'is_header' => true,
    'head_name' => '계정',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set">
    <div class="pd15">
        <div class="sa_wrap">
            <a href="set_5_1.php" class="s_a">비밀번호 변경</a>
            <a href="login.php" class="s_a">로그아웃</a>
            <a href="set_5_3.php" class="s_a">회원탈퇴</a>
        </div>
    </div>
</section>

<?include('footer.php')?>