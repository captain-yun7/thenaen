<?php
include_once('./common.php');

// 커뮤니티 사용여부
if(defined('G5_COMMUNITY_USE') && G5_COMMUNITY_USE === false) {
    if (!defined('G5_USE_SHOP') || !G5_USE_SHOP)
        die('<p>쇼핑몰 설치 후 이용해 주십시오.</p>');

    define('_SHOP_', true);
}

$common_nowdate = date("Y-m-d");


$yoil_common = array("일","월","화","수","목","금","토");
$yoil_common_result = $yoil_common[date('w', strtotime($common_nowdate))];


$menuPart1 = 'N'; // 지구력 운동
$menuPart2 = 'N'; // 인터벌 운동
$menuPart3 = 'N'; // 저항/근력 운동
$menuPart4 = 'N'; // 호흡근 운동
$menuPart5 = 'N'; // 유연성 운동
$menuPart6 = 'N'; // 기침보조 운동

if($yoil_common_result == "월"){
    $menuPart1 = 'Y'; // 지구력 운동
    $menuPart2 = 'N'; // 인터벌 운동
    $menuPart3 = 'N'; // 저항/근력 운동
    $menuPart4 = 'Y'; // 호흡근 운동
    $menuPart5 = 'Y'; // 유연성 운동
    $menuPart6 = 'N'; // 기침보조 운동
}
else if($yoil_common_result == "화"){
    $menuPart1 = 'Y'; // 지구력 운동
    $menuPart2 = 'N'; // 인터벌 운동
    $menuPart3 = 'Y'; // 저항/근력 운동
    $menuPart4 = 'Y'; // 호흡근 운동
    $menuPart5 = 'N'; // 유연성 운동
    $menuPart6 = 'N'; // 기침보조 운동
}
else if($yoil_common_result == "수"){
    $menuPart1 = 'Y'; // 지구력 운동
    $menuPart2 = 'N'; // 인터벌 운동
    $menuPart3 = 'N'; // 저항/근력 운동
    $menuPart4 = 'Y'; // 호흡근 운동
    $menuPart5 = 'Y'; // 유연성 운동
    $menuPart6 = 'N'; // 기침보조 운동
}
else if($yoil_common_result == "목"){
    $menuPart1 = 'Y'; // 지구력 운동
    $menuPart2 = 'N'; // 인터벌 운동
    $menuPart3 = 'Y'; // 저항/근력 운동
    $menuPart4 = 'Y'; // 호흡근 운동
    $menuPart5 = 'N'; // 유연성 운동
    $menuPart6 = 'N'; // 기침보조 운동
}
else if($yoil_common_result == "금"){
    $menuPart1 = 'Y'; // 지구력 운동
    $menuPart2 = 'N'; // 인터벌 운동
    $menuPart3 = 'N'; // 저항/근력 운동
    $menuPart4 = 'Y'; // 호흡근 운동
    $menuPart5 = 'Y'; // 유연성 운동
    $menuPart6 = 'N'; // 기침보조 운동
}
else if($yoil_common_result == "토"){
    $menuPart1 = 'Y'; // 지구력 운동
    $menuPart2 = 'N'; // 인터벌 운동
    $menuPart3 = 'Y'; // 저항/근력 운동
    $menuPart4 = 'Y'; // 호흡근 운동
    $menuPart5 = 'N'; // 유연성 운동
    $menuPart6 = 'N'; // 기침보조 운동
}
else if($yoil_common_result == "일"){
    $menuPart1 = 'Y'; // 지구력 운동
    $menuPart2 = 'N'; // 인터벌 운동
    $menuPart3 = 'N'; // 저항/근력 운동
    $menuPart4 = 'Y'; // 호흡근 운동
    $menuPart5 = 'N'; // 유연성 운동
    $menuPart6 = 'Y'; // 기침보조 운동
}

function get_yo_menu_arrow($str){

    if($str == "월"){
        $return_str = '유연성 운동';
    }
    else if($str == "화"){
        $return_str = '저항/근력 운동';
    }
    else if($str == "수"){
        $return_str = '유연성 운동';
    }
    else if($str == "목"){
        $return_str = '저항/근력 운동';
    }
    else if($str == "금"){
        $return_str = '유연성 운동';
    }
    else if($str == "토"){
        $return_str = '저항/근력 운동';
    }
    else if($str == "일"){
        $return_str = '기침보조 운동';
    }

    return $return_str;

}

function my_simple_crypt( $string, $action = 'e' ) {
    // 아래값을 임의로 수정해주세요.
    $secret_key = '1234';
    $secret_iv = '12345';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return $output;
}
