<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

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


$nums = $_GET['nums'];
//if($nums == ""){
//    echo "게시판 번호가 있어야 합니다.";
//    echo "<script>history.back();</script>";
//    exit;
//}

$ss_mb_id = $_SESSION["ss_mb_id"];







$outs = sql_fetch_array(sql_query("select * FROM g5_write_free where mb_id = '$ss_mb_id' and wr_id = '$nums'"));
$wr_id = $outs['wr_id'];
$wr_name = $outs['wr_name'];
$wr_subject = $outs['wr_subject'];
$wr_content = $outs['wr_content'];
$wr_10 = $outs['wr_10'];
$wr_datetime = $outs['wr_datetime'];
$wr_datetime = get_date_diff($wr_datetime);

if($wr_10 == ""){
    $wr_10 = "";
}

$ss_mb_reg = $_SESSION["ss_mb_id"];

$outs2 = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_free where wr_is_comment = '1' and mb_id = '$ss_mb_id' and wr_parent = '$wr_id' "));


if($wr_subject == ""){
//    echo "해당 글은 존재 하지 않습니다.";
//    echo "<script>history.back();</script>";
//    exit;
}

$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '자유게시판',
);



$cngouts1 = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_free_good_count where wr_board_num = '$nums' and wr_board_num_comment = '0' and wr_mb_id = '$ss_mb_reg'"));
$cngouts1cnt =  $cngouts1['cnt'];

if($cngouts1cnt == 0){
    $cngouts1cnt = "";
}


$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>
<?include('pop2.php')?>
<?include('msg.php')?>


<script>

    function good_click_num(good_nums,good_nums2,num3){

        // ajax 시작
        $.ajax({
            type: "POST",
            url: "/bbs/get_content_freega_ajax.php",
            data: {

                delimiter: "goodCheck",
                good_nums : good_nums,
                good_nums2 : good_nums2,

            },
            dataType: "html",
            success: function (result) {

                if(num3 == ""){// 글에 좋아요
                    $("#vt_mid_id1").text(result);
                }
                else{ // 댓글에 좋아요
                    $("#vt_mid_id_"+num3).text(result);
                }

            }

        });

    }

    var strTemp1 = "";
    var strTemp2 = "";
    var strTemp3 = "";

    function commentWrite(str,str2,str3){ // 댓글 등록 여부

        if(strTemp1 != 0){
            str = 1;
        }

        if(str == 0){ // 댓글을 처음부터 등록할때..
            strTemp1 = "";
            strTemp2 = "";
            strTemp3 = "";
        }


        // console.log("debug1="+strTemp1);
        // console.log("debug2="+strTemp2);
        // console.log("debug3="+strTemp3);
        //
        // return;


        // ajax 시작
        $.ajax({
            type: "POST",
            url: "/bbs/get_content_freega_ajax.php",
            data: {
                pageNum: "",
                searchStr: "",
                delimiter: "commentWrite",
                commentNum1 : str,
                commentNum2 : str2,
                commentNum3 : str3,
            },
            dataType: "html",
            success: function (result) {

                if(result == "exceedComment"){
                    alert("댓글은 연달아 2번이상 불가능 합니다.");

                    strTemp1 = "";
                    strTemp2 = "";
                    strTemp3 = "";

                    return;
                }
                else if(result == "ok"){
                    $("#rep_input").focus();

                    strTemp1 = str;
                    strTemp2 = str2;
                    strTemp3 = str3;

                    // console.log("debug1="+strTemp1);
                    // console.log("debug2="+strTemp2);
                    // console.log("debug3="+strTemp3);

                }
                else{
                    return;
                }
            }
        });

    }

    function commentWriteNext(){ // 댓글 버튼 클릭시

        rep_input = $("#rep_input").val();


        if(rep_input == ""){
            alert("댓글 내용을 입력하세요.");
            $("#rep_input").focus();
            return;
        }

        // console.log("debug1="+strTemp1);
        // console.log("debug2="+strTemp2);
        // console.log("debug3="+strTemp3);
        //
        // return;


        rep_input = encodeURIComponent(rep_input);

        // ajax 시작
        $.ajax({
            type: "POST",
            url: "/bbs/get_content_freega_ajax.php",
            async:false,
            data: {
                pageNum: "",
                searchStr: "",
                delimiter: "commentWriteNext",
                commentNum1 : strTemp1,
                commentNum2 : strTemp2,
                commentNum3 : strTemp3,
                rep_input : rep_input,
            },
            dataType: "html",
            success: function (result) {

                console.log(result);
                if(result == "ok"){
                    $("#rep_input").val("");
                    alert("댓글이 등록되었습니다.");
                    location.href = "/comm_sub.php?nums=<?=$nums?>";
                }




            }
        });

    }

</script>

<!--타인 게시글일때-->

<section class="comm c_sub">
    <div class="act_close"></div><!--act_ul 닫기영역-->

    <div class="cont_area"><!--게시글-->
        <div class="pd15">
            <div class="ct_info">
                <div class="ci_left vt_mid">
                    <div class="profile vt_mid">
                        <div class="grid">
                            <img src="/img/profile.png" alt="프로필">
                        </div>
                    </div>
                    <div class="nick vt_mid"><?=$wr_name?></div>
                    <div class="time vt_mid"><?=$wr_datetime?></div>
                </div>
                <div class="ci_right vt_mid">
                    <button type="button" class="act_btn">
                        <img src="/img/act_btn.png" alt="더보기">
                    </button>
                    <div class="act_ul">
                        <button type="button" class="act_li report" onClick="bedReportF('<?=$nums?>')">신고</button>
                        <button type="button" class="act_li cut" onClick="bedReportF('<?=$nums?>')">차단</button>
                        <button type="button" class="act_li copy_url" onclick="clip();">URL 복사</button>
                    </div>
                </div>
            </div>
            <div class="ct_tit"><?=$wr_subject?></div>
            <div class="ct_txt">
                <?=nl2br($wr_content)?>
                <?php echo"<br>";?>
            </div>
            <div class="ct_act">
                <div class="ca vt_mid">
                    <img src="/img/icon_metro_bk.png" alt="댓글">
                    <span class="vt_mid" id="vt_mid_id"><?=$outs2['cnt']?></span>
                </div>
                <div class="ca vt_mid" onClick = "good_click_num('<?=$nums?>','0','')">
<!--                    <input type="checkbox" name="like" id="like_con" class="like" --><?php //if($cngouts1cnt != ""){ echo "checked"; }?><!-->-->
<!--                    <label for="like_con" class="vt_mid">-->
<!--                        좋아요-->
<!--                        <span id="vt_mid_id1" class="likenum">-->
<!--                            --><?php //=$cngouts1cnt?>
<!--                        </span>-->
<!--                    </label>-->


                    <!--=====================▼ 게시글 좋아요 div로 수정함=======================-->

                    <div class="click board">
                        <div class="vt_mid like"></div>
                        <div class="vt_mid like_txt" <?php if($cngouts1cnt != ""){ echo "checked"; }?> >좋아요<span id="vt_mid_id1" class="likenum"><?=$cngouts1cnt?></span></div>
                    </div>

                    <style>
                        .click.board.on .like {background-image: url("/img/icon_like_on.png");}
                        .click.board.on .like_txt {color: #4683D2;}
                    </style>

                    <script>
                        $('.click.board').click(function(){
                            var likeNum = parseInt($(this).find('.likenum').text());

                            if($(this).hasClass('on')){
                                $(this).removeClass('on');

                                if(likeNum = "1"){
                                    $(this).find('.likenum').text("");
                                }else{
                                    $(this).find('.likenum').text(likeNum-parseInt(1));
                                }
                            }else{
                                $(this).addClass('on');

                                if(likeNum = ""){
                                    $(this).find('.likenum').text(1);
                                }else{
                                    $(this).find('.likenum').text(likeNum+parseInt(1));
                                }
                            }
                        });
                    </script>

                    <!--=====================▼ 게시글 좋아요 div로 수정함=======================-->



                </div>
            </div>
        </div>
    </div><!--게시글 끝-->

    <div class="gray_line"></div>

    <div class="rep_area"><!--댓글영역-->
        <div class="pd15">


            <!--댓글의댓글 2개까지 +추가-->
            <style>
                .c_sub .rep_area .rep_box.rrep .rrep_arrow img {width: 6.6667vw;}
                .c_sub .rep_area .rep_box.rrep {position: relative;}
                .c_sub .rep_area .rep_box.rrep .ct_info {width: calc(100% - 21.1111vw);}
                .c_sub .rep_area .rep_box.rrep .ct_txt {padding-left: 8.3333vw;}
                .c_sub .rep_area .rep_box.rrep .ci_right {position: absolute; top: 2.7778vw; right: 0;}
                .c_sub .rep_area .rep_box.rrep .ct_act {padding-left: 8.3333vw;}
                /*

                    댓글의 댓글 1개일때 = <div class="rep_box rrep">
                    댓글의 댓글 2개일때 = <div class="rep_box rrep rrep2">

                */
                .c_sub .rep_area .rep_box.rrep2 .rrep_arrow img {margin-left: 6.6667vw;}
                .c_sub .rep_area .rep_box.rrep2 .rrep_arrow {width:13.3333vw;}
                .c_sub .rep_area .rep_box.rrep2 .ct_txt {padding-left: 15.2778vw;}
                .c_sub .rep_area .rep_box.rrep2 .ct_act {padding-left: 15.2778vw;}
            </style>
            <!--댓글의댓글 2개까지 +추가-->



<?php
	$sql2 = "select * from g5_write_free where wr_is_comment = '1' AND wr_parent = '$wr_id' order by wr_comment asc";
	$rs2 = sql_query($sql2);

    $jj = 0;
    while ($row2=sql_fetch_array($rs2)) {

        //$wr_id = $row2['wr_id'];
        $wr_id2 = $row2['wr_id'];
        $wr_name2 = $row2['wr_name'];
        $wr_content2 = $row2['wr_content'];
        $wr_content2 = nl2br($wr_content2);
        $wr_10 = $row2['wr_10'];
        $wr_datetime2 = $row2['wr_datetime'];
        $wr_datetime2 = get_date_diff($wr_datetime2);
        $wr_comment_reply2 = $row2['wr_comment_reply'];
        $wr_comment_reply_count2 = strlen($wr_comment_reply2);
        $wr_wr_comment2 = $row2['wr_comment'];

        if($wr_10 == ""){
            $wr_10 = "";
        }

        $cngouts2 = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_write_free_good_count where wr_board_num = '$nums' and wr_board_num_comment = '$wr_id2' and wr_mb_id = '$ss_mb_reg'"));
        $cngouts2cnt =  $cngouts2['cnt'];

        if($cngouts2cnt == 0){
            $cngouts2cnt = "";
        }


    ?>

    <div class="rep_box rrep <?php if($wr_comment_reply_count2 > 1){ echo "rrep2"; } ?>">

        <?php
        if($wr_comment_reply_count2 >= 1){
        ?>
        <div class="rrep_arrow">
            <img src="/img/rrep.png" alt="답글">
        </div>
        <?php
        }
        ?>

        <div class="ct_info">
            <div class="ci_left vt_mid">
                <div class="profile vt_mid">
                    <div class="grid">
                        <img src="/img/profile.png" alt="프로필">
                    </div>
                </div>
                <div class="nick vt_mid"><?=$wr_name2?></div>
                <div class="time vt_mid"><?=$wr_datetime2?></div>
            </div>
            <div class="ci_right vt_mid">
                <button type="button" class="act_btn">
                    <img src="/img/act_btn.png" alt="더보기">
                </button>
                <div class="act_ul">
                    <button type="button" class="act_li del" onClick = "modifyNumSave('<?=$wr_id?>','<?=$nums?>','<?=$wr_id2?>')">삭제</button>
                    <button type="button" class="act_li edit" onClick = "modifyNumSave('<?=$wr_id?>','<?=$nums?>','<?=$wr_id2?>')">수정</button>
                </div>
            </div>
        </div>
        <div class="ct_txt">
        <?=$wr_content2?>
        </div>
        <div class="ct_act">
            <div class="ca vt_mid">
                <button type="button" class="rep_btn" onClick = "commentWrite(1,'<?=$wr_id?>','<?=$wr_wr_comment2?>')">답글</button>
            </div>
            <div class="ca vt_mid">
<!--                <input type="checkbox" name="like" class="like" onClick = "good_click_num('--><?php //=$nums?>//','<?php //=$wr_id2?>//','<?php //=$jj?>//')" <?php //if($cngouts2cnt != ""){ echo "checked"; }?><!-->-->
<!--                <label for="like_r1" id="vt_mid_id_--><?php //=$jj?><!--" class="vt_mid">--><?php //=$cngouts2cnt?><!--</label>-->

                <div class="click board">
                    <div class="vt_mid like" onClick = "good_click_num('<?=$nums?>','<?=$wr_id2?>','<?=$jj?>')" <?php if($cngouts2cnt != ""){ echo "checked"; }?>></div>
                    <div class="vt_mid like_txt">좋아요<span id="vt_mid_id_<?=$jj?>" class="likenum"><?=$cngouts2cnt?></span></div>
                </div>


            </div>
        </div>
    </div>

    <?php
        $jj++;
    }
?>


<!--            <div class="rep_box">-->
<!--                <div class="ct_info">-->
<!--                    <div class="ci_left vt_mid">-->
<!--                        <div class="profile vt_mid">-->
<!--                            <div class="grid">-->
<!--                                <img src="/img/profile.png" alt="프로필">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="nick vt_mid">BetterBreathing</div>-->
<!--                        <div class="time vt_mid">1시간</div>-->
<!--                    </div>-->
<!--                    <div class="ci_right vt_mid">-->
<!--                        <button type="button" class="act_btn">-->
<!--                            <img src="/img/act_btn.png" alt="더보기">-->
<!--                        </button>-->
<!--                        <div class="act_ul">-->
<!--                            <button type="button" class="act_li del">삭제</button>-->
<!--                            <button type="button" class="act_li edit">수정</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="ct_txt">-->
<!--                하던 일 중지하시고 바로 병원 가보시는 것 어떨까요?-->
<!--                </div>-->
<!--                <div class="ct_act">-->
<!--                    <div class="ca vt_mid">-->
<!--                        <button type="button" class="rep_btn">답글</button>-->
<!--                    </div>-->
<!--                    <div class="ca vt_mid">-->
<!--                        <input type="checkbox" name="like" id="like_r1" class="like">-->
<!--                        <label for="like_r1" class="vt_mid">2</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!---->
<!---->
<!--            <div class="rep_box">-->
<!--                <div class="ct_info">-->
<!--                    <div class="ci_left vt_mid">-->
<!--                        <div class="profile vt_mid">-->
<!--                            <div class="grid">-->
<!--                                <img src="/img/profile.png" alt="프로필">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="nick vt_mid">더편한호흡</div>-->
<!--                        <div class="time vt_mid">5분</div>-->
<!--                    </div>-->
<!--                    <div class="ci_right vt_mid">-->
<!--                        <button type="button" class="act_btn">-->
<!--                            <img src="/img/act_btn.png" alt="더보기">-->
<!--                        </button>-->
<!--                        <div class="act_ul">-->
<!--                            <button type="button" class="act_li del">삭제</button>-->
<!--                            <button type="button" class="act_li edit">수정</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="ct_txt">-->
<!--                하던 일 중지하시고 바로 병원 가보시는 것 어떨까요?-->
<!--                </div>-->
<!--                <div class="ct_act">-->
<!--                    <div class="ca vt_mid">-->
<!--                        <button type="button" class="rep_btn">답글</button>-->
<!--                    </div>-->
<!--                    <div class="ca vt_mid">-->
<!--                        <input type="checkbox" name="like" id="like_r2" class="like" checked>-->
<!--                        <label for="like_r2" class="vt_mid">3</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->






            <!--댓글의 답글 = rrep 클래스 추가-->
<!--            <div class="rep_box rrep">-->
<!--                <div class="rrep_arrow">-->
<!--                    <img src="/img/rrep.png" alt="답글">-->
<!--                </div>-->
<!--                <div class="ct_info">-->
<!--                    <div class="ci_left vt_mid">-->
<!--                        <div class="profile vt_mid">-->
<!--                            <div class="grid">-->
<!--                                <img src="/img/profile.png" alt="프로필">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="nick vt_mid">BetterBreathing</div>-->
<!--                        <div class="time vt_mid">5분</div>-->
<!--                    </div>-->
<!--                    <div class="ci_right vt_mid">-->
<!--                        <button type="button" class="act_btn">-->
<!--                            <img src="/img/act_btn.png" alt="더보기">-->
<!--                        </button>-->
<!--                        <div class="act_ul">-->
<!--                            <button type="button" class="act_li del">삭제</button>-->
<!--                            <button type="button" class="act_li edit">수정</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="ct_txt">-->
<!--                <span class="r_nick">더편한호흡</span>-->
<!--                네 그렇게 해볼게요.-->
<!--                </div>-->
<!--                <div class="ct_act">-->
<!--                    <div class="ca vt_mid">-->
<!--                        <button type="button" class="rep_btn">답글</button>-->
<!--                    </div>-->
<!--                    <div class="ca vt_mid">-->
<!--                        <input type="checkbox" name="like" id="like_r3" class="like">-->
<!--                        <label for="like_r3" class="vt_mid">0</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div><!--댓글영역 끝-->


    <div class="btn_fixed"><!--채팅영역-->
        <div class="input_wrap">
            <input type="text" name="rep_input" id="rep_input" placeholder="댓글을 입력하세요." onclick = "commentWrite(0,'<?=$wr_id?>','<?=$wr_wr_comment?>')" class="c_input">
            <button type="button" class="in_btn" onClick = 'commentWriteNext()'>입력</button>
        </div>
    </div><!--채팅영역 끝-->
</section>

<script>
//자유게시판
    //게시글 팝업
    $('.c_sub .act_btn').click(function(){
        $('.act_close').addClass('on');
        $(this).siblings('.act_ul').addClass('on');
    });
    $('.act_close').click(function(){
        $(this).removeClass('on');
        $('.act_ul').removeClass('on');
    });


    function bedReportF(str){
        bedReport = str;
    }

    var bedReport = "";

    //신고 클릭시
    $('.c_sub .act_li.report').click(function(){
        location.href='comm_report.php?nums='+bedReport;
    });
    //차단 클릭시
    $('.c_sub .act_li.cut').click(function(){
        $('.com2').addClass('on');
        $('.com2').addClass('cutpop');
        $('.com2 .con_p').html("차단하시겠습니까?<br>(해당 사용자의 글을 볼 수 없습니다.)");
        $('.com2 .btn2').text("차단");
    });
    //차단팝업 > 취소
    $('.com2 .btn1').click(function(){
        $('.com2').removeClass('on');
        $('.com2').removeClass('cutpop');
    });

    var blockNum = "<?=$nums?>";

    //차단/삭제 팝업
    $('.com2 .btn2').click(function(){
        if($(this).text() == "차단"){

            if(bedReport == ""){
                console.log("차단할 글 번호가 없습니다.");
            }
            else{
                location.href='comm_cut_ok.php?nums='+blockNum;
            }

        }else if($(this).text() == "삭제"){ // 삭제 클릭시

            // ajax 시작
            $.ajax({
                type: "POST",
                url: "/bbs/get_content_freega_ajax.php",
                async:false,
                data: {
                    comm_rp_edit_num: comm_rp_edit_num,
                    comm_rp_edit_prev_num: comm_rp_edit_prev_num,
                    comm_rp_edit_comment_prev_num : comm_rp_edit_comment_prev_num,
                    delimiter: "commentDel",
                },
                dataType: "html",
                success: function (result) {

                    if(result == "ok"){
                        alert("댓글이 삭제되었습니다.");
                        location.reload();
                    }
                    else if(result == "false1"){
                        alert("본인의 글만 삭제가 가능 합니다.");
                    }
                    else{

                    }

                }
            });

        }
    });

    //내 댓글 > 삭제 클릭시
    $('.c_sub .act_li.del').click(function(){
        $('.com2').addClass('on');
        $('.com2').addClass('cutpop');
        $('.com2 .con_p').html("삭제하시겠습니까?");
        $('.com2 .btn2').text("삭제");
    });



    function modifyNumSave(num,num2,num3){
        comm_rp_edit_num = num;
        comm_rp_edit_prev_num = num2;
        comm_rp_edit_comment_prev_num = num3;
    }

    var comm_rp_edit_num = 0;
    var comm_rp_edit_prev_num = 0;
    var comm_rp_edit_comment_prev_num = 0;

    //내 댓글 > 수정 클릭시
    $('.c_sub .act_li.edit').click(function(){
        if(comm_rp_edit_num != 0) {
            location.href = 'comm_rp_edit.php?nums='+comm_rp_edit_num+"&num2="+comm_rp_edit_prev_num+"&nums3="+comm_rp_edit_comment_prev_num;
        }
    });

    //좋아요(게시글)
    $('.c_sub .cont_area .ct_act .ca .like').change(function(){
        var num = $(this).next('label').children('.likenum').text()
        var num2 = parseInt(num);

        if($(this).is(":checked")){
            if(num2 > 0){
                $(this).next('label').children('.likenum').text(num2+parseInt(1));
            }else if(num === ''){
                $(this).next('label').children('.likenum').text(1);
            }
        }else{
            if(num2 == '1'){
                $(this).next('label').children('.likenum').text('');
            }else{
                $(this).next('label').children('.likenum').text(num2-parseInt(1));
            }
        }
    });

    //좋아요(댓글)
    $('.c_sub .rep_area .ct_act .ca .like').change(function(){
        var likeNum = parseInt($(this).next('label').text());
        if($(this).is(":checked")){
            if(likeNum >= 0){
                $(this).next('label').text(likeNum+parseInt(1));
            }
        }else{
            $(this).next('label').text(likeNum-parseInt(1));
        }
    });



//URL 복사
function clip(){
    var url = '';
    var textarea = document.createElement("textarea");
    document.body.appendChild(textarea);
    url = window.document.location.href;
    textarea.value = url;
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);
    $('.msg').addClass('on');
    $('.msg').css({'width':'192px'});
    $('.msg').css({'bottom':'63px'});
    $('.msg').text('URL이 복사됐습니다.');
    
    setTimeout('msg_out()',3000);

    setTimeout(function(){
        $('.msg').removeClass('on');
    },3000)
}

</script>

<?include('footer.php')?>