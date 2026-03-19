<?php

global $g4;
include './_common.php';

$ss_mb_reg = $_SESSION["ss_mb_id"];

$pageNum = $_POST['pageNum'];
$searchStr = $_POST['searchStr'];
$delimiter = $_POST['delimiter'];
$subject = $_POST['subject'];
$write = $_POST['write'];
$commentNum1 = $_POST['commentNum1']; //  댓글 시 0 처음 등록, 1이면 아래로 달리게
$commentNum2 = $_POST['commentNum2']; // 게시판 번호
$commentNum3 = $_POST['commentNum3']; // 댓글 중에 몇번째 달려있는지
$rep_input = $_POST['rep_input']; // 댓글 내용

$commentreedit = $_POST['commentreedit']; // 수정시 내용
$mb_id_script = $_POST['mb_id_script']; // 코멘트 수정시 필요한 아이디
$num2 = $_POST['num2']; // 코멘트 수정시 페이지 이동할 번호

$comm_rp_edit_num = $_POST['comm_rp_edit_num']; // 삭제할 코멘트 번호
$comm_rp_edit_prev_num = $_POST['comm_rp_edit_prev_num']; // 게시판 글 번호
$comm_rp_edit_comment_prev_num = $_POST['comm_rp_edit_comment_prev_num']; // 코벤트 번호


$good_nums = $_POST['good_nums']; // 좋아요 할 글번호
$good_nums2 = $_POST['good_nums2'];// 좋앙요할 댓글 번호


// 몇분전
function get_date_diff($date){

    $diff = time() - strtotime($date);

    $s = 60; //1분 = 60초
    $h = $s * 60; //1시간 = 60분
    $d = $h * 24; //1일 = 24시간
    $y = $d * 30; //1달 = 30일 기준
    $a = $y * 12; //1년

    if ($diff < $s) {
        $result = $diff . '초전';
    } elseif ($h > $diff && $diff >= $s) {
        $result = round($diff/$s) . '분'; // 분전
    } elseif ($d > $diff && $diff >= $h) {
        $result = round($diff/$h) . '시간'; // 시간전
    } elseif ($y > $diff && $diff >= $d) {
        $result = round($diff/$d) . '일'; // 일전
    } elseif ($a > $diff && $diff >= $y) {
        $result = round($diff/$y) . '달'; // 달전
    } else {
        $result = round($diff/$a) . '년'; // 년전
    }

    return $result;
}

if($delimiter == "freeList"){ // 게시판 리스트

    $conTent = ""; // 컨텐츠 내용

    $addQuery = "";
    if($searchStr != ""){
        $addQuery = " and (wr_subject like '%$searchStr%' or wr_content like '%$searchStr%')";
    }

    $sql = "select * from g5_write_free where wr_is_comment = '0' and mb_id = '$ss_mb_reg' $addQuery order by wr_id desc";
    $rs = sql_query($sql);

    while ($row=sql_fetch_array($rs)){

        $wr_id = $row['wr_id'];
        $ss_mb_reg = $_SESSION["ss_mb_id"];
        $wr_subject = $row['wr_subject'];
        $wr_content = $row['wr_content'];
        $wr_datetime = $row['wr_datetime'];
        $wr_datetime = get_date_diff($wr_datetime);
        $wr_comment = $row['wr_comment'];

        // 차단 계수
        $outs = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_opinion_info where delimiter = 'blocks' and wr_mb_id = '$ss_mb_reg' and wr_board_num = '$wr_id' and uses = 'Y'"));

        // 좋아요 개수
        $outslikenum = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_free_good_count where wr_board_num = '$wr_id' and wr_mb_id = '$ss_mb_reg' "));

        $outslikenum = $outslikenum['cnt'];


        // 코맨트 개수
        $outslikecomment = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_free where wr_parent = '$wr_id' and mb_id = '$ss_mb_reg' and wr_is_comment = '1'"));

        $outslikecomment = $outslikecomment['cnt'];


        $blockInfo = "";
        if($outs['cnt'] == 0){
            $blockInfo = "no";
            $blockInfoStr = "comm_sub.php?nums=".$wr_id."";
        }
        else{
            $blockInfo = "yes";
            $blockInfoStr = "javascript:alert(\"차단된 글입니다.\");";
        }

        $wr_10 = $row['wr_10']; // 좋아요 개수
        if($wr_10 == ""){
            $wr_10 = 0;
        }

        $conTent .= "<a href='$blockInfoStr' class='b_a'>
                            <div class='fs0'>
                                <div class='left vt_mid'>
                                    $wr_subject 
                                </div>
                                <div class='right vt_mid'>
                                    $wr_datetime
                                </div>
                            </div>
                            <div class='con'>
                                $wr_content
                            </div>
                            <div class='act_wrap'>
                                <div class='act vt_mid'>
                                    <img src='/img/icon_feather.png' alt='좋아요'>
                                    <span class='vt_mid'>$outslikenum</span>
                                </div>
                                <div class='act vt_mid'>
                                    <img src='/img/icon_metro.png' alt='좋아요'>
                                    <span class='vt_mid'>$outslikecomment</span>
                                </div>
                            </div>
                        </a>
                        ";

    }

    echo $conTent;

}
else if($delimiter == "freeWrite"){ // 자유 게시판 글쓰기

    $write = rawUrlDecode($write); // 자바스크립트 디코딩
    $write = addslashes($write);

    $subject = rawUrlDecode($subject);
    $subject = addslashes($subject);

    $ss_mb_reg = $_SESSION["ss_mb_id"];

    $outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_reg' "));
    $mb_name = $outs["mb_name"];
    $mb_email = $outs["mb_email"];
    $REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];

    $result = sql_query("insert into g5_write_free(wr_is_comment,wr_subject,wr_content,wr_seo_title,mb_id,wr_name,wr_email,wr_datetime,wr_ip) values ('0','$subject','$write','$subject','$ss_mb_reg','$mb_name','$mb_email',now(),'$REMOTE_ADDRS')");

    if($result == "ok"){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($delimiter == "commentWrite"){

    if($commentNum1 == 0){
        echo "ok";
    }
    else if($commentNum1 == 1){

        $outs = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_free where wr_is_comment = '1' and mb_id = '$ss_mb_reg' and wr_parent = '$commentNum2' and wr_comment = '$commentNum3'"));
        $cnt = $outs['cnt'];

        if($cnt >= 3){
            echo "exceedComment";
        }
        else{
            echo "ok";
        }

    }
    else{
        echo "false";
    }

}
else if($delimiter == "commentWriteNext"){

    $rep_input = rawUrlDecode($rep_input);

    $ss_mb_reg = $_SESSION["ss_mb_id"];
    $outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_reg' "));
    $mb_id = $outs["mb_id"];
    $mb_name = $outs["mb_name"];
    $mb_email = $outs["mb_email"];
    $REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];

    if($commentNum1 == 0){ // 처음 댓글 등록시

        $outs = sql_fetch_array(sql_query("select wr_comment from g5_write_free WHERE wr_is_comment = '1' and mb_id = '$ss_mb_reg' ORDER by wr_comment DESC LIMIT 0,1"));
        $cnt = $outs['wr_comment'];
        $cnt = $cnt + 1;

        $result = sql_query("insert into g5_write_free (wr_parent,wr_is_comment,wr_comment,wr_content,mb_id,wr_name,wr_email,wr_datetime,wr_ip) values ('$commentNum2','1','$cnt','$rep_input','$mb_id','$mb_name','$mb_email',now(),'$REMOTE_ADDRS')");

        if($result == true){
            echo "ok";
        }
        else{
            echo "fasle";
        }

    }
    else if($commentNum1 == 1){ // 이어서 댓글 등록시

        $outs = sql_fetch_array(sql_query("select COUNT(*) AS cnt from g5_write_free WHERE wr_parent = '$commentNum2' and mb_id = '$ss_mb_reg' and wr_is_comment = '1' AND wr_comment = '$commentNum3'"));
        $cnt = $outs['cnt'];

        $wr_comment_reply_str = "";
        if($cnt == 1){
            $wr_comment_reply_str = "A";
        }
        else if($cnt == 2){
            $wr_comment_reply_str = "AA";
        }
        else{
            $wr_comment_reply_str = "";
        }

        $result = sql_query("insert into g5_write_free (wr_parent,wr_is_comment,wr_comment,wr_comment_reply,wr_content,mb_id,wr_name,wr_email,wr_datetime,wr_ip) values ('$commentNum2','1','$commentNum3','$wr_comment_reply_str','$rep_input','$mb_id','$mb_name','$mb_email',now(),'$REMOTE_ADDRS')");

        if($result == true){
            echo "ok";
        }
        else{
            echo "fasle";
        }

    }
    else{
        echo false;
    }

}
else if($delimiter == "commentModify"){

    $commentreedit = rawUrlDecode($commentreedit);
    $commentreedit = addslashes($commentreedit);

    $result = sql_query("update g5_write_free set wr_content = '$commentreedit' where wr_id = '$mb_id_script'");

    if($result == true){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($delimiter == "commentDel"){ // 댓글 삭제시

    $outs = sql_fetch_array(sql_query("select * FROM g5_write_free where wr_id = '$comm_rp_edit_comment_prev_num'"));

        $modify = "false";
    if($_SESSION["ss_mb_id"] == $outs['mb_id']){
        $modify = "ok";
    }

    if($modify == "ok"){
        $result = sql_query("delete FROM g5_write_free where wr_id = '$comm_rp_edit_comment_prev_num'");

        if($result == true){
            echo "ok";
        }
        else{
            echo "false";
        }

    }
    else{
        echo "false1";
    }

}
else if($delimiter == "goodCheck"){

    $ss_mb_reg = $_SESSION["ss_mb_id"];

    $good_nums = $_POST['good_nums']; // 좋아요 할 글번호
    $good_nums2 = $_POST['good_nums2'];// 좋앙요할 댓글 번호

    $REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];

    $outs = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_free_good_count where wr_board_num = '$good_nums' and wr_board_num_comment = '$good_nums2' and wr_mb_id = '$ss_mb_reg'"));
    $cnt =  $outs['cnt'];

    if($cnt == ""){
        $cnt = 0;
    }

    $cnt = $cnt + 1;
    $rsult = sql_query("insert into g5_write_free_good_count (wr_board_num,wr_board_num_comment,wr_datetime,wr_mb_id,wr_ip,wr_click_num) values ('$good_nums','$good_nums2',now(),'$ss_mb_reg','$REMOTE_ADDRS','$cnt')");

    echo $cnt;

}
else{
    echo "false";
}

?>