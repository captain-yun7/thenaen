<?php
include_once('./_common.php');

if (isset($_SESSION['ss_mb_reg']))
    $mb = get_member($_SESSION['ss_mb_reg']);


$exception = 1;

if($exception == 1){
    echo "<script>location.href='../index.php'</script>";
    exit;
}


// 회원정보가 없다면 초기 페이지로 이동
if (!$mb['mb_id'])
    goto_url(G5_URL);

$g5['title'] = '회원가입 완료';
include_once('./_head.php');
include_once($member_skin_path.'/register_result.skin.php');
include_once('./_tail.php');