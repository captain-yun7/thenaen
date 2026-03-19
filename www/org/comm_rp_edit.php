<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '수정',
    'right_menu' => true,
    'go_comp' => true,
    'rep' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="comm edit_my">
    <div class="pd15">
        <textarea id="edit" class="wt_area" placeholder="내용을 입력하세요." rows="11">네 그렇게 해볼게요.</textarea>
    </div>
</section>

<?include('footer.php')?>