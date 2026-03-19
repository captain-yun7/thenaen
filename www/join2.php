<?php

include_once('./_common.php');


$user_nick = $_GET['user_nick'];
$user_email = $_GET['user_email'];
$user_id = $_GET['user_id'];
$user_phone  =$_GET['user_phone'];

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

    var TempJoinEmailStrAuthFisrtNum = 0;

    var varjavauser_nick = '<?=$user_nick?>';
    var varjavauser_email = '<?=$user_email?>';
    var varjavauser_id= '<?=$user_id?>';
    var varjavauser_phone = '<?=$user_phone?>';




</script>


<section class="join j2">
    <form name="join">
        <div class="pd15">
            <div class="i_block">
                <label for="user_email" class="i_lab">이메일</label>
                <input type="email" name="user_email" id="user_email" class="input" placeholder="이메일주소를 입력하세요." value = "<?=$user_email?>" onfocusout = "emailFoucusOut()">
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" id = "next_btn_first" class="next_btn">이메일 인증하기</button>
        </div>
    </form>
</section>


<?include('footer.php')?>