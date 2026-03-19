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

<section class="join j3">
    <form name="join">
        <div class="pd15">
            <div class="i_block">
                <label for="certi_num" class="i_lab">이메일주소로 인증코드를 전송했습니다.</label>
                <div class="input_wrap">
                    <input type="number" name="certi_num" id="certi_num" class="input" placeholder="인증코드 4자리를 입력해 주세요." maxlength="4" oninput="num_maxLength(this);">
                    <button type="button" class="c_btn">재전송</button>
                </div>
            </div>

            <!--인증번호 틀리면 red에 addClass('on')-->
            <div class="red on">틀린 인증코드입니다.</div>

            <div class="j3_info">
                <div class="j3_div">※인증코드를 받지 못한 경우</div>
                <div class="j3_div">
                    입력하신 이메일 아이디 주소가 정확한지 확인해 주세요.<br>
                    스팸메일함을 확인해 주세요.<br>
                    메일함 용량을 정리해 주세요.
                </div>
            </div>
        </div>

        <div class="msg on">
            새 인증코드가 전송되었습니다. 메일을 확인하세요.
        </div>

        <div class="btn_fixed">
            <button type="button" class="next_btn">인증 완료</button>
        </div>
    </form>
</section>

<script>
    setTimeout('msg_out()',3000);

    function msg_out(){
        $('.msg').removeClass('on');
    }

    //회원가입 > 인증번호 입력해야 버튼 활성화
    $('.j3 #certi_num').change(function(){
        $('.j3 .next_btn').addClass('on');
    });

    $('.j3 .next_btn').click(function(){
        if($(this).hasClass('on')){
            location.href='join4.php';
        }
    });

    //회원가입 > 재전송 버튼 누르면
    $('.j3 .input_wrap .c_btn').click(function(){
        console.log($(this).prev('#certi_num').val())
        $(this).prev('#certi_num').val('');
        $('.j3 .next_btn').removeClass('on');
        $('.msg').addClass('on');
        setTimeout('msg_out()',3000);
    });
</script>

<?include('footer.php')?>