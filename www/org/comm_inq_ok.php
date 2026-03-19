<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '문의',
);

$footer = array(
    'is_footer' => false,
    'page' => 'comm',
);
include 'header.php';
?>

<section class="ok_wrap">
    <p class="ok_p">문의접수가 완료되었습니다.<br>최대한 신속하게 답변드리겠습니다.</p>
    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="location.href='comm.php'">확인</button>
    </div>
</section>

<?include('footer.php')?>