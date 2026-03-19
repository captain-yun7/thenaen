<?
$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'이용약관 동의',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="join j1">
    <form name="use_agree">
        <div class="pd15">
            <div class="t_block">
                <input type="checkbox" name="use_agree" id="use_agree" class="ckbox">
                <label for="use_agree" class="t_lab">이용약관 동의</label>
                <a href="term1.php" class="t_arrow">
                    <img src="/org/img/arrow_right.png" alt="약관 보기">
                </a>
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn">다음</button>
        </div>
    </form>
</section>


<?include('footer.php')?>