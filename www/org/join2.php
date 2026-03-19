<?
$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'회원가입',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="join j2">
    <form name="join">
        <div class="pd15">
            <div class="i_block">
                <label for="user_email" class="i_lab">이메일</label>
                <input type="email" name="user_email" id="user_email" class="input" placeholder="이메일주소를 입력하세요.">
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn">이메일 인증하기</button>
        </div>
    </form>
</section>


<?include('footer.php')?>