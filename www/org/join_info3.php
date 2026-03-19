<?
$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'회원가입',
    'j_info' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="j_info ji3">
    <form name="info">
        <div class="pd15">
            <i class="bar">
                <i class="blue_bar"></i>
            </i>

            <div class="i_block">
                <label for="age" class="i_lab">활동하실 닉네임을 적어주세요.</label>
                <div class="input_wrap">
                    <input type="text" name="nickname" id="nickname" class="input" placeholder="한글로 된 닉네임을 입력하세요.">
                    <button type="button" class="c_btn">중복확인</button>
                </div>
            </div>

            <div class="rb">
                <div class="r_div rb1 red on">중복확인을 해주세요.</div>
                <div class="r_div rb2 blue">사용 가능한 닉네임입니다.</div>
                <div class="r_div rb3 red">사용 불가능한 닉네임입니다.</div>
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn">완료하고 더나은호흡 시작</button>
        </div>
    </form>
</section>

<script>
    $('.blue_bar').css({'width':'50%'});
    $('.blue_bar').stop().animate({'width':'75%'},500);
</script>

<?include('footer.php')?>