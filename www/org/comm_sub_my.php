<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '자유게시판',
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>
<?include('pop2.php')?>
<?include('msg.php')?>

<!--내 게시물일때-->

<section class="comm c_sub">
    <div class="act_close"></div><!--act_ul 닫기영역-->

    <div class="cont_area"><!--게시글-->
        <div class="pd15">
            <div class="ct_info">
                <div class="ci_left vt_mid">
                    <div class="profile vt_mid">
                        <div class="grid">
                            <img src="/org/img/profile.png" alt="프로필">
                        </div>
                    </div>
                    <div class="nick vt_mid">더나은호흡</div>
                    <div class="time vt_mid">2시간</div>
                </div>
                <div class="ci_right vt_mid">
                    <button type="button" class="act_btn">
                        <img src="/org/img/act_btn.png" alt="더보기">
                    </button>
                    <div class="act_ul">
                        <button type="button" class="act_li li1">삭제</button>
                        <button type="button" class="act_li li2" onclick="location.href='comm_sub_edit.php'">수정</button>
                        <button type="button" class="act_li li3" onclick="clip();">URL 복사</button>
                    </div>
                </div>
            </div>
            <div class="ct_tit">질문 있습니다.</div>
            <div class="ct_txt">
                제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니 하루종일 머리가 어지럽고 답답하네요.<br>이거 어떡하죠?
            </div>
            <div class="ct_act">
                <div class="ca vt_mid">
                    <img src="/org/img/icon_metro_bk.png" alt="댓글">
                    <span class="vt_mid">5</span>
                </div>
                <div class="ca vt_mid">
                    <input type="checkbox" name="like" id="like_con" class="like">
                    <label for="like_con" class="vt_mid">좋아요<span class="likenum"></span></label>
                </div>
            </div>
        </div>
    </div><!--게시글 끝-->

    <div class="gray_line"></div>

    <div class="rep_area"><!--댓글영역-->
        <div class="pd15">
            <div class="rep_box">
                <div class="ct_info">
                    <div class="ci_left vt_mid">
                        <div class="profile vt_mid">
                            <div class="grid">
                                <img src="/org/img/profile.png" alt="프로필">
                            </div>
                        </div>
                        <div class="nick vt_mid">BetterBreathing</div>
                        <div class="time vt_mid">1시간</div>
                    </div>
                    <div class="ci_right vt_mid">
                        <button type="button" class="act_btn">
                            <img src="/org/img/act_btn.png" alt="더보기">
                        </button>
                        <div class="act_ul">
                            <button type="button" class="act_li report">신고</button>
                            <button type="button" class="act_li cut">차단</button>
                        </div>
                    </div>
                </div>
                <div class="ct_txt">
                하던 일 중지하시고 바로 병원 가보시는 것 어떨까요?
                </div>
                <div class="ct_act">
                    <div class="ca vt_mid">
                        <button type="button" class="rep_btn">답글</button>
                    </div>
                    <div class="ca vt_mid">
                        <input type="checkbox" name="like" id="like_r1" class="like">
                        <label for="like_r1" class="vt_mid">2</label>
                    </div>
                </div>
            </div>
            <div class="rep_box">
                <div class="ct_info">
                    <div class="ci_left vt_mid">
                        <div class="profile vt_mid">
                            <div class="grid">
                                <img src="/org/img/profile.png" alt="프로필">
                            </div>
                        </div>
                        <div class="nick vt_mid">더편한호흡</div>
                        <div class="time vt_mid">5분</div>
                    </div>
                    <div class="ci_right vt_mid">
                        <button type="button" class="act_btn">
                            <img src="/org/img/act_btn.png" alt="더보기">
                        </button>
                        <div class="act_ul">
                            <button type="button" class="act_li li3">신고</button>
                            <button type="button" class="act_li li4">차단</button>
                        </div>
                    </div>
                </div>
                <div class="ct_txt">
                하던 일 중지하시고 바로 병원 가보시는 것 어떨까요?
                </div>
                <div class="ct_act">
                    <div class="ca vt_mid">
                        <button type="button" class="rep_btn">답글</button>
                    </div>
                    <div class="ca vt_mid">
                        <input type="checkbox" name="like" id="like_r2" class="like" checked>
                        <label for="like_r2" class="vt_mid">3</label>
                    </div>
                </div>
            </div>
            <!--댓글의 답글 = rrep 클래스 추가-->
            <div class="rep_box rrep">
                <div class="rrep_arrow">
                    <img src="/org/img/rrep.png" alt="답글">
                </div>
                <div class="ct_info">
                    <div class="ci_left vt_mid">
                        <div class="profile vt_mid">
                            <div class="grid">
                                <img src="/org/img/profile.png" alt="프로필">
                            </div>
                        </div>
                        <div class="nick vt_mid">BetterBreathing</div>
                        <div class="time vt_mid">5분</div>
                    </div>
                    <div class="ci_right vt_mid">
                        <button type="button" class="act_btn">
                            <img src="/org/img/act_btn.png" alt="더보기">
                        </button>
                        <div class="act_ul">
                            <button type="button" class="act_li li1">삭제</button>
                            <button type="button" class="act_li li2">수정</button>
                        </div>
                    </div>
                </div>
                <div class="ct_txt">
                <span class="r_nick">더편한호흡</span>
                네 그렇게 해볼게요.
                </div>
                <div class="ct_act">
                    <div class="ca vt_mid">
                        <button type="button" class="rep_btn">답글</button>
                    </div>
                    <div class="ca vt_mid">
                        <input type="checkbox" name="like" id="like_r3" class="like">
                        <label for="like_r3" class="vt_mid">0</label>
                    </div>
                </div>
            </div>
        </div>
    </div><!--댓글영역 끝-->

    <div class="btn_fixed"><!--채팅영역-->
        <div class="input_wrap">
            <input type="text" name="rep_input" id="rep_input" placeholder="댓글을 입력하세요." class="c_input">
            <button type="button" class="in_btn">입력</button>
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
    $('.c_sub .act_li.li1').click(function(){
        $('.com2').addClass('on');
        $('.com2 .con_p').text("삭제하시겠습니까?");
        $('.com2 .btn2').text("삭제"); 
    });
    //내글 수정
    $('.c_sub .act_li.li2').click(function(){
        location.href='comm_sub_edit.php'
    });
    $('.com2 .btn1').click(function(){
        $('.com2').removeClass('on');
    });
    $('.com2 .btn2').click(function(){
        if($(this).text() == '삭제'){
            location.href='comm.php'
        }else if($(this).text() == '차단'){
            location.href='comm_cut_ok_my.php';
        }
    });

    //신고 클릭시
    $('.c_sub .act_li.report').click(function(){
        location.href='comm_report_my.php';
    });

    //차단 클릭시
    $('.c_sub .act_li.cut').click(function(){
        $('.com2').addClass('on');
        $('.com2').addClass('cutpop');
        $('.com2 .con_p').html("차단하시겠습니까?<br>(해당 사용자의 글을 볼 수 없습니다.)");
        $('.com2 .btn2').text("차단");
    });
    //차단팝업 > 차단 클릭시
    $('.com2 .btn2').click(function(){

    })

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


//팝업 > URL복사

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
}

function msg_out(){
    $('.msg').removeClass('on');
}


//댓글 신고,차단
// $('.c_sub .act_ul .li1').click(function(){
//     location.href='comm_report_my.php';
// });

</script>

<?include('footer.php')?>