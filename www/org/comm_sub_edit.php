<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '수정',
    'right_menu' => true,
    'go_comp' => true,
    'rep' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="comm edit_my">
    <div class="pd15">
        <textarea id="edit" class="wt_area" placeholder="내용을 입력하세요." rows="11">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니 하루종일 머리가 어지럽고 답답하네요. 이거 어떡하죠?</textarea>
        <div class="wt_info">
            <span class="fs14">게시글 작성시 유의사항</span><br><br>

            더나은호흡은 호흡기 질환 환자들의 자유로운 커뮤니케이션을 
            위해 게시판 이용규칙을 제정하여 운영하고 있습니다. 이를
            위반 시 게시물이 삭제되고 서비스 이용이 제한될 수 있습니다.<br><br>

            *욕설, 비방 금지<br>
            *이익을 목적으로 한 부정 활동 금지<br>
            *그 밖의 규칙 위반<br>
            - 전문의약품 판매거래 행위<br>
            - 음란물, 성적 수치심 유발 행위<br>
            - 범죄, 불법 행위 등 법령을 위반하는 행위
        </div>
    </div>
</section>

<?include('footer.php')?>