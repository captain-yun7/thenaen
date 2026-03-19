<?
$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'내 정보 입력',
    'j_info' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="j_info ji1">
    <form name="info">
        <div class="pd15">
            <i class="bar">
                <i class="blue_bar"></i>
            </i>

            <div class="i_block">
                <label for="age" class="i_lab">성별</label>
                <div class="radio_wrap">
                    <div class="r_wrap vt_mid">
                        <input type="radio" name="gender" id="male" class="radio">
                        <label for="male" class="r_lab">남자</label>
                    </div>
                    <div class="r_wrap vt_mid">
                        <input type="radio" name="gender" id="female" class="radio">
                        <label for="female" class="r_lab">여자</label>
                    </div>
                </div>
            </div>

            <div class="i_block">
                <label for="age" class="i_lab">나이</label>
                <div class="input_wrap">
                    <input type="number" name="age" id="age" class="input" placeholder="나이를 입력하세요.">
                    <span class="i_span">세</span>
                </div>
            </div>
            <div class="i_block">
                <label for="height" class="i_lab">키</label>
                <div class="input_wrap">
                    <input type="number" name="height" id="height" class="input" placeholder="키를 입력하세요.">
                    <span class="i_span">cm</span>
                </div>
            </div>
            <div class="i_block">
                <label for="weight" class="i_lab">몸무게</label>
                <div class="input_wrap">
                    <input type="number" name="weight" id="weight" class="input" placeholder="몸무게를 입력하세요.">
                    <span class="i_span">kg</span>
                </div>
            </div>
            <div class="i_block">
                <label for="rate" class="i_lab">안정시 심박수</label>
                <div class="input_wrap">
                    <input type="number" name="rate" id="rate" class="input">
                    <span class="i_span">회/분</span>
                </div>
                <div class="i_sub">
                    누워서 완전히 5분간 휴식 후, 귀 아래 목 부위(경동맥)
                    에 둘째 손가락과 셋째 손가락을 이용하여 1분 간 총 몇
                    번 맥이 뛰는지 기입해주세요. 
                </div>
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn">다음</button>
        </div>
    </form>
</section>

<script>
    $('.blue_bar').css({'width':'0'});
    $('.blue_bar').stop().animate({'width':'25%'},500);
</script>

<?include('footer.php')?>