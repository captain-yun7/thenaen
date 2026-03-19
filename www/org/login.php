<?
$header = array(
    'is_header' => false,
    'is_form' => true,
    'f_headname' =>'더나은호흡과 함께<br>호흡재활을 시작하세요.',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

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
                    <input type="checkbox" name="login_on" id="login_on" class="ckbox">
                    <label for="login_on" class="f_lab">로그인상태 유지</label>
                </div>
                <div class="f_right vt_mid">
                    <a href="join.php" class="f_a">회원가입</a>
                    <a href="find_pw.php" class="f_a">비밀번호 찾기</a>
                </div>
            </div>
            <div class="btn_wrap">
                <button type="button" class="btn_common" onclick="location.href='index.php'">로그인</button>
            </div>
            <div class="sns_wrap">
                <div class="s_gray">SNS 계정으로 로그인</div>
                <div class="s_btnwrap">
                    <button type="button" class="s_log">
                        <img src="/org/img/icon_kakao.png" alt="카카오 로그인">
                    </button>
                    <button type="button" class="s_log">
                        <img src="/org/img/icon_google.png" alt="구글 로그인">
                    </button>
                    <button type="button" class="s_log">
                        <img src="/org/img/icon_naver.png" alt="네이버 로그인">
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>


<?include('footer.php')?>