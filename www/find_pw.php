<?php
$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'비밀번호 찾기',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>
<?include('msg.php')?>

<section class="find">
    <form name="find">
        <div class="pd15">
            <div class="i_block">
                <label for="user_email" class="i_lab">이메일</label>
                <input type="email" name="user_email" id="user_email" class="input" placeholder="가입한 이메일주소를 입력하세요.">
            </div>

            <div class="pw_btn_wrap">
                <button type="button" class="pw_btn">새 비밀번호 전송</button>
            </div>
        </div>

        <div class="msg">
            새 인증코드가 전송되었습니다. 메일을 확인하세요.
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn on" onclick="location.href='login.php'">로그인 페이지로</button>
        </div>
    </form>
</section>

<script>
//비밀번호 찾기 > 새 비밀번호 전송
$('.find .pw_btn').click(function(){

    $('.msg').addClass('on');
    $('.msg').text(" 새 비밀번호가 전송되었습니다. 메일을 확인하세요.")

    user_email = $("#user_email").val();

    if(user_email == ""){
        alert("이메일을 입력하세요.");
        $("#user_email").val();
        return;
    }

    $.ajax ({
        type: "POST",
        url: "/bbs/certification_ajax.php",
        data: {
            nums: 9,
            sendEmail : user_email,
        },
        dataType: "text",
        success: function (result) {
            $("#user_email").val("");
        }
    });

    setTimeout(function(){
        $('.msg').removeClass('on');
    },3000)
});
</script>

<?include('footer.php')?>