<?php

include_once('./_common.php');

$self_url = "https://jhw2bum.mycafe24.com/bbs/login.php";

$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'더나은호흡과 함께<br>호흡재활을 시작하세요.',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';


$emailgo = $_GET['emailgo'];

if($emailgo != ""){

    $outs_varjavauser = sql_fetch_array(sql_query("select * FROM g5_member where varjavauser_email = '$emailgo'"));

    $outs_passwordCh_s = $outs_varjavauser['passwordCh'];

    $exceptionSns = 1;


}

?>

<script>
    var setCookie = function(name, value, exp) {
        var date = new Date();
        date.setTime(date.getTime() + exp*24*60*60*1000);
        document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
    };

    var getCookie = function(name) {
        var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');

        return value? value[2] : null;
    };

    var deleteCookie = function(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1999 00:00:10 GMT;';
    }

    $(document).ready(function(){
        loginContinue(2);
    });

    function loginContinue(num){

        var is_expend = getCookie("loginContinue");

        if(num == 1){ // 클릭시

            if($('#login_on').prop('checked') == true){ // 체크박스 클릭

                if(is_expend !== null){ // 쿠키값이 있으면..
                }
                else{ //쿠키값이 있으면..
                    user_id_num = $("#user_email").val(); // 아이디값
                    if(user_id_num == ""){
                        alert("로그인상태 유지를 위한 이메일주소를 입력하세요.");
                        $('#login_on').prop('checked', false); // 체크 가 안된상태로 만듬
                        $("#user_email").focus();
                    }
                    else{
                        setCookie("loginContinue", user_id_num, 1);
                    }
                }
            }
            else{
                deleteCookie('loginContinue');
                $('#login_on').prop('checked', false);
            }

        }
        else{ // 기본 페이지 로딩시
            if(is_expend !== null){
                $("#user_email").val(is_expend); // 쿠키에 저장된 아이디값 넣기
                $('#login_on').prop('checked', true); // 체크상태로 만듬
            }
        }

    }

    function indexLoginF(){

        user_email = $("#user_email").val();
        user_pw = $("#user_pw").val();

        if(user_email == ""){
            alert("이메일을 입력하세요.");
            $("#user_email").focus();
            return;
        }

        if(user_pw == ""){
            alert("비밀번호를 입력하세요.");
            $("#user_pw").focus();
            return;
        }

        $("#mb_id").val(user_email);
        $("#mb_password").val(user_pw);

        $("#form1").submit();

    }
</script>

<form id = "form1" name = "form1" action = "/bbs/login_check.php" method = "post">
    <input type = "hidden" name = "mb_id" id = "mb_id" value = "<?=$outs_varjavauser['varjavauser_email']?>">
    <input type = "hidden" name = "mb_password" id = "mb_password" value = "<?=$outs_passwordCh_s?>">
    <input type = "hidden" name = "exception" id = "exception" value = "1">
    <input type = "hidden" name = "exceptionSns" id = "exceptionSns" value = "<?=$exceptionSns?>">
</form>

<section class="login">
    <form name="login">
        <div class="pd15">
            <div class="i_wrap">
                <div class="i_block">
                    <label for="user_email" class="i_lab">이메일</label>
                    <input type="email" name="user_email" id="user_email" class="input" placeholder="이메일주소를 입력하세요.">
                </div>
                <div class="i_block">
                    <label for="user_pw" class="i_lab">비밀번호</label>
                    <input type="password" name="user_pw" id="user_pw" class="input" placeholder="비밀번호를 입력하세요.">
                </div>
            </div>
            <div class="f_wrap">
                <div class="f_left vt_mid">
                    <input type="checkbox" name="login_on" id="login_on" class="ckbox" onClick = "loginContinue(1)">
                    <label for="login_on" class="f_lab">로그인상태 유지</label>
                </div>
                <div class="f_right vt_mid">
                    <a href="join.php" class="f_a">회원가입</a>
                    <a href="find_pw.php" class="f_a">비밀번호 찾기</a>
                </div>
            </div>
            <div class="btn_wrap">
                <button type="button" class="btn_common" onclick="indexLoginF(1)">로그인</button>
            </div>
            <div class="sns_wrap">
                <div class="s_gray">SNS 계정으로 로그인</div>
                <div class="s_btnwrap">
<!--                    <button type="button" class="s_log">-->
<!--                        <img src="/img/icon_kakao.png" alt="카카오 로그인">-->
<!--                    </button>-->
<!--                    <button type="button" class="s_log">-->
<!--                        <img src="/img/icon_google.png" alt="구글 로그인">-->
<!--                    </button>-->
<!--                    <button type="button" class="s_log">-->
<!--                        <img src="/img/icon_naver.png" alt="네이버 로그인">-->
<!--                    </button>-->
<!---->
<!---->



                    <?php if( social_service_check('naver') ) {     //네이버 로그인을 사용한다면 ?>

                                                <button type="button" class="s_log" onClick = "location.href='<?php echo $self_url;?>?provider=naver&amp;url=<?php echo $urlencode;?>'">
                                                    <img src="/img/icon_naver.png" alt="네이버 로그인">
                                                </button>

                    <?php }     //end if ?>
                    <?php if( social_service_check('kakao') ) {     //카카오 로그인을 사용한다면 ?>

                                                <button type="button" class="s_log" onClick = "location.href='<?php echo $self_url;?>?provider=kakao&amp;url=<?php echo $urlencode;?>'" class="sns-icon social_link sns-kakao'">
                                                    <img src="/img/icon_kakao.png" alt="카카오 로그인">
                                                </button>

                    <?php }     //end if ?>
                    <?php if( social_service_check('facebook') ) {     //페이스북 로그인을 사용한다면 ?>
                        <a href="<?php echo $self_url;?>?provider=facebook&amp;url=<?php echo $urlencode;?>" class="sns-icon social_link sns-facebook" title="페이스북">
                            [페이스북 로그인]
                        </a>
                    <?php }     //end if ?>
                    <?php if( social_service_check('google') ) {     //구글 로그인을 사용한다면 ?>
<!--                        <a href="--><?php //echo $self_url;?><!--?provider=google&amp;url=--><?php //echo $urlencode;?><!--" class="sns-icon social_link sns-google" title="구글">-->
                                                <button type="button" class="s_log" onClick = "location.href='<?php echo $self_url;?>?provider=google&amp;url=<?php echo $urlencode;?>'">
                                                    <img src="/img/icon_google.png" alt="구글 로그인">
                                                </button>
<!--                        </a>-->
                    <?php }     //end if ?>
                    <?php if( social_service_check('twitter') ) {     //트위터 로그인을 사용한다면 ?>
                        <a href="<?php echo $self_url;?>?provider=twitter&amp;url=<?php echo $urlencode;?>" class="sns-icon social_link sns-twitter" title="트위터">
                            <span class="ico"></span>
                            <span class="txt">트위터<i> 로그인</i></span>
                        </a>
                    <?php }     //end if ?>
                    <?php if( social_service_check('payco') ) {     //페이코 로그인을 사용한다면 ?>
                        <a href="<?php echo $self_url;?>?provider=payco&amp;url=<?php echo $urlencode;?>" class="sns-icon social_link sns-payco" title="페이코">
                            <span class="ico"></span>
                            <span class="txt">페이코<i> 로그인</i></span>
                        </a>
                    <?php }     //end if ?>

                    <?php if( G5_SOCIAL_USE_POPUP  ){
                        $social_pop_once = true;
                        ?>
                        <script>
                            jQuery(function($){
                                $(".sns-wrap").on("click", "a.social_link", function(e){
                                    e.preventDefault();

                                    var pop_url = $(this).attr("href");

                                    var newWin = window.open(
                                        pop_url,
                                        "social_sing_on",
                                        "location=0,status=0,scrollbars=1,width=600,height=500"
                                    );

                                    if(!newWin || newWin.closed || typeof newWin.closed=='undefined')
                                        alert('브라우저에서 팝업이 차단되어 있습니다. 팝업 활성화 후 다시 시도해 주세요.');

                                    return false;
                                });
                            });
                        </script>
                    <?php } ?>

















                </div>
            </div>
        </div>
    </form>
</section>

<script>


    exception = $("#exception").val();
    exceptionSns = $("#exceptionSns").val();

    console.log(exception);
    console.log(exceptionSns);

    if(exception == 1 && exceptionSns == 1){
        $("#form1").submit();
    }


</script>

<?include('footer.php')?>