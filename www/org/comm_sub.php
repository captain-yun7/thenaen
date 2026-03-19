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

<!--타인 게시글일때-->

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
                        <button type="button" class="act_li report">신고</button>
                        <button type="button" class="act_li cut">차단</button>
                        <button type="button" class="act_li copy_url" onclick="clip();">URL 복사</button>
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
                    <!-- <input type="checkbox" name="like" id="like_con" class="like">
                    <label for="like_con" class="vt_mid">좋아요<span class="likenum"></span></label> -->


            <!--=====================▼ 게시글 좋아요 div로 수정함=======================-->

                <style>
                    .click.board.on .like {background-image: url("/org/img/icon_like_on.png");}
                    .click.board.on .like_txt {color: #4683D2;}
                </style>

                    <div class="click board">
                        <div class="vt_mid like"></div>
                        <div class="vt_mid like_txt">좋아요<span class="likenum"></span></div>
                    </div>
                
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
                            <button type="button" class="act_li del">삭제</button>
                            <button type="button" class="act_li edit">수정</button>
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
                        <!-- <input type="checkbox" name="like" id="like_r1" class="like">
                        <label for="like_r1" class="vt_mid">2</label> -->



            <!--=====================▼ 댓글 좋아요 div로 수정함=======================-->
                <style>
                    .rep_box .click.on .like {background-image: url("/org/img/icon_like_on.png");}
                    .rep_box .click.on .like_txt {color: #4683D2;}
                </style>

                        <div class="click">
                            <div class="vt_mid like"></div>
                            <div class="vt_mid like_txt"><span class="likenum">0</span></div>
                        </div>


                <script>
                    $('.rep_box .click').click(function(){
                        var likeNum = parseInt($(this).find('.likenum').text());

                        if($(this).hasClass('on')){
                            $(this).removeClass('on');
                            $(this).find('.likenum').text(likeNum-parseInt(1));
                        }else{
                            $(this).addClass('on');
                            $(this).find('.likenum').text(likeNum+parseInt(1));
                        }
                    });
                </script>
            <!--=====================▼ 댓글 좋아요 div로 수정함=======================-->

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
                            <button type="button" class="act_li del">삭제</button>
                            <button type="button" class="act_li edit">수정</button>
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
                            <button type="button" class="act_li del">삭제</button>
                            <button type="button" class="act_li edit">수정</button>
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
            <div class="rep_box rrep rrep2">
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
                            <button type="button" class="act_li del">삭제</button>
                            <button type="button" class="act_li edit">수정</button>
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

    //신고 클릭시
    $('.c_sub .act_li.report').click(function(){
        location.href='comm_report.php';
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

    //차단/삭제 팝업
    $('.com2 .btn2').click(function(){
        if($(this).text() == "차단"){
            location.href='comm_cut_ok.php' 
        }else if($(this).text() == "삭제"){
            location.href='comm_sub.php' 
        }
    });

    //내 댓글 > 삭제 클릭시
    $('.c_sub .act_li.del').click(function(){
        $('.com2').addClass('on');
        $('.com2').addClass('cutpop');
        $('.com2 .con_p').html("삭제하시겠습니까?");
        $('.com2 .btn2').text("삭제");
    });

    //내 댓글 > 수정 클릭시
    $('.c_sub .act_li.edit').click(function(){
        location.href='comm_rp_edit.php'
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