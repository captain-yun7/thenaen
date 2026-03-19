<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '신고',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="ok_wrap">
    <p class="ok_p">신고가 완료되었습니다.<br>최대한 신속하게 처리해 드리겠습니다.</p>
    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="location.href='comm_sub_my.php'">확인</button>
    </div>
</section>

<?include('footer.php')?>