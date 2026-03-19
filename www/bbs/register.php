<?php
include_once('./_common.php');

$exception = 1; // 그누보드 화면에 변경 키값

// 로그인중인 경우 회원가입 할 수 없습니다.
if ($is_member) {
    goto_url(G5_URL);
}

// 세션을 지웁니다.
set_session("ss_mb_reg", "");



if($exception != 1) {
    $g5['title'] = '회원가입약관';
    include_once('./_head.php');
}

//echo $member_skin_path;
///home/breathing/www/skin/member/basic
$register_action_url = G5_BBS_URL.'/register_form.php';

if($exception != 1){ // 회원가입 스킨 변경 (원본 카피)
    include_once($member_skin_path.'/register.skin.php');
}
else{
    include_once($member_skin_path.'/register.skin2.php');
}

if($exception != 1) {
    include_once('./_tail.php');
}











