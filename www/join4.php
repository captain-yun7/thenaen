<?php
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

<script>
    getEmail = "<?=$_GET['email']?>";


    function chkCharCode(event) {
        const regExp = /[^0-9a-z]/g;
        const ele = event.target;
        if (regExp.test(ele.value)) {
            ele.value = ele.value.replace(regExp, '');
        }
    }

</script>

<section class="join j4">
    <form name="join">
        <div class="pd15">
            <div class="i_block">
                <label for="user_pw" class="i_lab">비밀번호(영문+숫자 8~16자 조합)</label>
                <input type="password" name="user_pw" id="user_pw" class="input" onkeyup="chkCharCode(event)" placeholder="비밀번호를 입력하세요.">
            </div>
            <div class="i_block">
                <label for="user_pw2" class="i_lab">비밀번호 확인</label>
                <input type="password" name="user_pw2" id="user_pw2" class="input" onkeyup="chkCharCode(event)" placeholder="비밀번호를 다시 입력하세요.">
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn">회원가입 완료</button>
        </div>
    </form>
</section>


<?include('footer.php')?>