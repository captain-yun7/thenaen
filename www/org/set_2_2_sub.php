<?
$header = array(
    'is_header' => true,
    'head_name' => '내 문의',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set">
    <div class="pd15">
        <div class="sub_block">
            <h2 class="sub_h2 blue">문의답변</h2>
            <div class="sub_div">
                문의에 대한 답변 내용입니다.문의에 대한 답변 내용입니다.문의에 대한 답변 내용입니다.문의에 대한 답변 내용입니다.
            </div>
        </div>
        <div class="sub_block">
            <h2 class="sub_h2">문의유형</h2>
            <div class="sub_div gray">
                재활정보
            </div>
        </div>
        <div class="sub_block">
            <h2 class="sub_h2">문의내용</h2>
            <div class="sub_div">
                제가 집에서 혼자 호흡근 재활운동을 하다가 숨이
                조금씩 가쁘더니 하루종일 머리가 어지럽고 답답하
                네요. 이거 어떡하죠?
            </div>
        </div>
    </div>

    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="history.go(-1);">확인</button>
    </div>
</section>

<?include('footer.php')?>