<?php

global $g4;
include './_common.php';

$nums = $_POST['nums'];
$sendEmail = $_POST['sendEmail'];
$numsCe = $_POST['numsCe'];
$getEmail = $_POST['getEmail'];
$user_pw2 = $_POST['user_pw2'];

$gender = $_POST['gender'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$rate = $_POST['rate'];

$dis = $_POST['dis'];

$nickname = $_POST['nickname'];



if($nums == 1){ // 회원가입 인증메일 보낼때

    $varjavauser_nick = $_POST['varjavauser_nick'];
    $varjavauser_email = $_POST['varjavauser_email'];
    $varjavauser_id = $_POST['varjavauser_id'];
    $varjavauser_phone = $_POST['varjavauser_phone'];

    if($sendEmail != ""){

        for($i = 0; $i < 6; $i++) {
            $certNum .= mt_rand(0, 9);
        }

        $user_email_send = $sendEmail; // 받는 이메일
        $subject_send = "더나은호흡 회원가입 인증번호 입니다."; // 메일 제목
        $content_send = "회원가입 인증번호는 ".$certNum." 입니다."; // 메일 내용
        $mail_subject_name_str_send = "더나은호흡"; // 업체명

        $REMOTE_ADDRStr = $_SERVER["REMOTE_ADDR"];
        $SendLocation = "joinjoin3-".$certNum;
        $result = sql_query("insert into g5_mail(ma_subject,ma_content,ma_time,ma_ip,ma_last_option,ma_email) values('$subject_send','$content_send',now(),'$REMOTE_ADDRStr','$SendLocation','$sendEmail')");

        sql_query("insert into g5_memer_temp(email,varjavauser_nick,varjavauser_email,varjavauser_id,varjavauser_phone) values('$user_email_send','$varjavauser_nick','$varjavauser_email','$varjavauser_id','$varjavauser_phone')");

        if($result == true){
            include $_SERVER['DOCUMENT_ROOT'].'/bbs/send_mail.php';
        }

    }
    else{
        echo "false";
    }

}
else if($nums == 2){ // 회원가입 인증번호 확인일때

    $SendLocation = "joinjoin3-".$numsCe;

    $result = sql_fetch_array(sql_query("select ma_id FROM g5_mail where ma_last_option = '$SendLocation' and ma_email = '$getEmail' order by ma_id desc limit 0,1"));

    if($result['ma_id'] != ""){
        echo "true";
        sql_query("update g5_memer_temp set certification = '1' where email = '$getEmail'");

    }
    else{
        echo "false";
    }

}
else if($nums == 3){ // 비밀번호 임시 저장

    $result = sql_query("update g5_memer_temp set pwds = '$user_pw2' where email = '$getEmail'");

    if($result == true){
        echo "ok";
    }

}
else if($nums == 4){

    $result = sql_query("update g5_memer_temp set sex = '$gender', age = '$age', height = '$height', weight = '$weight', heart_rate = '$rate' where email = '$getEmail'");

    if($result == true){
        echo "ok";
    }

}
else if($nums == 5){

    $result = sql_query("update g5_memer_temp set disease = '$dis' where email = '$getEmail'");

    if($result == true){
        echo "ok";
    }

}
else if($nums == 6){

    $result = sql_query("update g5_memer_temp set nickname = '$nickname' where email = '$getEmail'");

    if($result == true){
        echo "ok";
    }

}
else if($nums == 7){

    $outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_nick = '$nickname' "));
    $result = sql_query("update g5_memer_temp set nickname = '$nickname' where email = '$getEmail'");

    if($outs['mb_id'] != ""){
        echo "false";
    }
    else{
        echo "ok";
    }

}
else if($nums == 8){ // 이메일 중복체크

    $outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_email = '$getEmail' "));

    if($outs['mb_no'] != ""){
        echo "false";
    }
    else{
        echo "ok";
    }

}
else if($nums == 9) { // 비밀번호 찾기


    $outs = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_member where mb_email = '$sendEmail'"));

    if($outs['cnt'] != 0) {





        for ($i = 0; $i < 6; $i++) {
            $certNum .= mt_rand(0, 9);
        }

        $encrypted_password_ch = my_simple_crypt( $certNum, 'e' );


        $new_pass = get_encrypt_string($certNum);
        $eQue = "update g5_member set mb_password='" . $new_pass . "',passwordCh = '$encrypted_password_ch' where mb_email ='" . $sendEmail . "'";
        sql_query($eQue);

        $user_email_send = $sendEmail; // 받는 이메일
        $subject_send = "더나은호흡 새 비밀번호 를 보내 드립니다."; // 메일 제목
        $content_send = "새 비밀번호는 " . $certNum . " 입니다."; // 메일 내용
        $mail_subject_name_str_send = "더나은호흡"; // 업체명

        $REMOTE_ADDRStr = $_SERVER["REMOTE_ADDR"];
        $SendLocation = "findPW-" . $certNum;
        $result = sql_query("insert into g5_mail(ma_subject,ma_content,ma_time,ma_ip,ma_last_option,ma_email) values('$subject_send','$content_send',now(),'$REMOTE_ADDRStr','$SendLocation','$sendEmail')");

        if ($result == true) {
            include $_SERVER['DOCUMENT_ROOT'] . '/bbs/send_mail.php';
        }

    }




}
else if($nums == 10){ // 프로필 수정 중복 체크

    $outsMemberInfo = sql_fetch_array(sql_query("select * FROM g5_member where mb_nick = '$nickname'"));
    if($outsMemberInfo['mb_nick'] == ""){ // 중복아님
        echo "ok";
    }
    else{ // 중복
        echo "false";
    }

}
else if($nums == 11){ // 건강정보 업데이트

    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $disease = $_POST['disease'];

    $gender = rawUrlDecode($gender);
    $age = rawUrlDecode($age);
    $height = rawUrlDecode($height);
    $weight = rawUrlDecode($weight);
    $disease = rawUrlDecode($disease);

    $ss_mb_id = $_SESSION["ss_mb_id"];

    $result = sql_query("update g5_member set sex = '$gender',age = '$age',height = '$height',weight = '$weight',disease = '$disease' where mb_id = '$ss_mb_id'");

    if($result == true){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($nums == 12){ // 차단 해제

    $com2_btn2_var = $_POST['com2_btn2_var'];

    $result = sql_query("update g5_write_opinion_info set uses = 'N' where wr_id = '$com2_btn2_var'");

    if($result == true){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($nums == 13){ // 로그인 하고 비밀번호 업데이트

    $new_pw = $_POST['new_pw'];
    $new_pw2 = $_POST['new_pw2'];

    $new_pw = rawUrlDecode($new_pw);
    $new_pw2 = rawUrlDecode($new_pw2);

    $ss_mb_id = $_SESSION["ss_mb_id"];


    $encrypted_password_ch = my_simple_crypt( $new_pw, 'e' );

    $result = sql_query("update g5_member set mb_password = password('$new_pw'),passwordCh = '$encrypted_password_ch' where mb_id = '$ss_mb_id'");

    if($result == true){
        echo "ok";
    }

}
else if($nums == 14){ // 회원 탈퇴

    $ss_mb_id = $_SESSION["ss_mb_id"];

    if($ss_mb_id != ""){

        $outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_id'"));

        $mb_no = $outs['mb_no'];
        $mb_id = $outs['mb_id'];
        $mb_name = $outs['mb_name'];
        $mb_nick = $outs['mb_nick'];
        $mb_email = $outs['mb_email'];

        for($i = 0; $i < 3; $i++) {
            $strAdd .= mt_rand(0, 9);
        }


        $mb_id = $strAdd."_".$mb_id;
        $mb_name = $strAdd."_".$mb_name;
        $mb_nick = $strAdd."_".$mb_nick;
        $mb_email = $strAdd."_".$mb_email;

        $result = sql_query("update g5_member set mb_id = '$mb_id',mb_name = '$mb_name',mb_nick = '$mb_nick',mb_email = '$mb_email' where mb_no = '$mb_no'");

        if($result == true){
            echo "ok";
        }
        else{
            echo "false";
        }

    }

}
else{
    echo "false";
}

?>