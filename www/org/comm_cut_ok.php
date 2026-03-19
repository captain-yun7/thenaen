<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '차단',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<!--타인 게시글 신고하면 오는 페이지-->

<section class="ok_wrap">
    <p class="ok_p">해당 사용자를 차단했습니다.<br>설정->내정보에서 차단목록을 관리할 수 있습니다.</p>
    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="location.href='comm_sub.php'">확인</button>
    </div>
</section>

<?include('footer.php')?>