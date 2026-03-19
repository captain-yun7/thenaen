<?
$header = array(
    'is_header' => true,
    'main_head' => true,
    'head_name' => '함께 운동하기',
);

$footer = array(
    'is_footer' => true,
    'page' => 'comm',
);
include 'header.php';
?>
<?include('msg.php')?>
<?include('pop2.php')?>

<section class="comm tg1">
    <div class="pd15">
        <div class="menu_ul">
            <h2 class="menu_li on">재활순위</h2>
            <h2 class="menu_li">게시판</h2>
        </div>
    </div>

    <div class="tab on">
        <div class="rank_wrap">
            <div class="pd15">
                <select name="rank" id="rank" class="select">
                    <option value="">이번주 재활운동 순위(월~일 기준)</option>
                    <option value="">매일의 걸음수</option>
                </select>
            </div>

            <div class="r_tab r_tab1 on">
                <table class="table my blue">
                    <tr>
                        <td class="td td1">189</td>
                        <td class="td td2">내계정프로필명</td>
                        <td class="td td3"><span class="fs20">2</span>회</td>
                    </tr>
                </table>

                <table class="table">
                    <tr>
                        <td class="td td1">1</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                    <tr>
                        <td class="td td1">2</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                    <tr>
                        <td class="td td1">3</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                    <tr>
                        <td class="td td1">4</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                    <tr>
                        <td class="td td1">5</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                    <tr>
                        <td class="td td1">6</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                    <tr>
                        <td class="td td1">7</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                    <tr>
                        <td class="td td1">8</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="fs20">25</span>회</td>
                    </tr>
                </table>
            </div>

            <div class="r_tab r_tab2">
                <table class="table my blue">
                    <tr>
                        <td class="td td1">189</td>
                        <td class="td td2">내계정프로필명</td>
                        <td class="td td3"><span class="medium">189</span>걸음</td>
                    </tr>
                </table>

                <table class="table">
                    <tr>
                        <td class="td td1">1</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="medium">25000</span>걸음</td>
                    </tr>
                    <tr>
                        <td class="td td1">2</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="medium">24000</span>걸음</td>
                    </tr>
                    <tr>
                        <td class="td td1">3</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="medium">23000</span>걸음</td>
                    </tr>
                    <tr>
                        <td class="td td1">4</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="medium">22000</span>걸음</td>
                    </tr>
                    <tr>
                        <td class="td td1">5</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="medium">21000</span>걸음</td>
                    </tr>
                    <tr>
                        <td class="td td1">6</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="medium">20000</span>걸음</td>
                    </tr>
                    <tr>
                        <td class="td td1">7</td>
                        <td class="td td2">더나은호흡</td>
                        <td class="td td3"><span class="medium">19000</span>걸음</td>
                    </tr>
                    <tr>
                        <td class="td td1">8</td>
                        <td class="td td2">BetterBreathing</td>
                        <td class="td td3"><span class="medium">18000</span>걸음</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="tab">
        <div class="pd15">
            <div class="board_wrap">
                <div class="b_menu">
                    <div class="b_left vt_mid">
                        <h3 class="b_h3 vt_mid on">자유게시판</h3>
                        <h3 class="b_h3 vt_mid">1:1 문의</h3>
                    </div>
                    <div class="b_right vt_mid on">
                        <button type="button" class="btns btn1" onclick="location.href='comm_search.php'">
                            <img src="/img/icon_search.png" alt="검색">
                        </button>
                        <button type="button" class="btns btn2" onclick="location.href='comm_write.php'">
                            <img src="/img/icon_write.png" alt="글쓰기">
                        </button>
                    </div>
                </div>
                <div class="b_tab on">
                    <div class="b_list">
                        <a href="comm_sub.php" class="b_a">
                            <div class="fs0">
                                <div class="left vt_mid">
                                    질문 있습니다.
                                </div>
                                <div class="right vt_mid">
                                    2분
                                </div>
                            </div>
                            <div class="con">
                                제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니 하루종일 머리가 어지럽고 답답하네요.
                            </div>
                            <div class="act_wrap">
                                <div class="act vt_mid">
                                    <img src="/img/icon_feather.png" alt="좋아요">
                                    <span class="vt_mid">2</span>
                                </div>
                                <div class="act vt_mid">
                                    <img src="/img/icon_metro.png" alt="좋아요">
                                    <span class="vt_mid">5</span>
                                </div>
                            </div>
                        </a>
                        <a href="comm_sub.php" class="b_a">
                            <div class="fs0">
                                <div class="left vt_mid">
                                    자랑할게요~
                                </div>
                                <div class="right vt_mid">
                                    1시간
                                </div>
                            </div>
                            <div class="con">
                                더나은호흡 호흡재활 6년간 따라하면서 효과를 아주 톡톡히 봤어요
                            </div>
                            <div class="act_wrap">
                                <div class="act vt_mid">
                                    <img src="/img/icon_feather.png" alt="좋아요">
                                    <span class="vt_mid">2</span>
                                </div>
                                <div class="act vt_mid">
                                    <img src="/img/icon_metro.png" alt="좋아요">
                                    <span class="vt_mid">12</span>
                                </div>
                            </div>
                        </a>
                        <a href="comm_sub.php" class="b_a">
                            <div class="fs0">
                                <div class="left vt_mid">
                                    질문 있습니다.
                                </div>
                                <div class="right vt_mid">
                                    하루
                                </div>
                            </div>
                            <div class="con">
                                제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니 하루종일 머리가 어지럽고 답답하네요.
                            </div>
                            <div class="act_wrap">
                                <div class="act vt_mid">
                                    <img src="/img/icon_feather.png" alt="좋아요">
                                    <span class="vt_mid">2</span>
                                </div>
                                <div class="act vt_mid">
                                    <img src="/img/icon_metro.png" alt="좋아요">
                                    <span class="vt_mid">12</span>
                                </div>
                            </div>
                        </a>
                        <a href="comm_sub.php" class="b_a">
                            <div class="fs0">
                                <div class="left vt_mid">
                                    자랑할게요~
                                </div>
                                <div class="right vt_mid">
                                    3/6
                                </div>
                            </div>
                            <div class="con">
                                더나은호흡 호흡재활 6년간 따라하면서 효과를 아주 톡톡히 봤어요
                            </div>
                            <div class="act_wrap">
                                <div class="act vt_mid">
                                    <img src="/img/icon_feather.png" alt="좋아요">
                                    <span class="vt_mid">2</span>
                                </div>
                                <div class="act vt_mid">
                                    <img src="/org/img/icon_metro.png" alt="좋아요">
                                    <span class="vt_mid">12</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="b_tab">
                    <form name="inquiry">
                        <div class="input_wrap">
                            <div class="inq_block">
                                <label class="i_lab vt_mid">문의유형</label>
                                <div class="i_right vt_mid">
                                    <select name="inq_type" id="type" class="i_sel">
                                        <option value="default">선택</option>
                                        <option value="type1">재활정보</option>
                                        <option value="type2">앱기능 개선</option>
                                        <option value="type3">기타</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inq_block">
                                <label class="i_lab vt_mid">문의유형</label>
                                <div class="text_area">
                                    <textarea class="textarea" id="inq_text" placeholder="문의내용을 입력하세요." rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="btn_wrap">
                            <button type="button" class="btn_common inq_btn">문의접수</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

$('.comm #rank').change(function(){
    var selected = document.getElementById("rank");
    var value = selected.options[document.getElementById("rank").selectedIndex].text;
    if(value === '매일의 걸음수'){
        $('.comm .r_tab').removeClass('on');
        $('.comm .r_tab2').addClass('on');
    }else{
        $('.comm .r_tab').removeClass('on');
        $('.comm .r_tab1').addClass('on');
    }
});


$('.comm .b_tab .inq_btn').click(function(){
    var type = document.getElementById("type");
    var text = type.options[document.getElementById("type").selectedIndex].text;
    //console.log(text)
    if(text === '선택'){
        $('.msg').addClass('on');
        $('.msg').text("문의유형을 선택해주세요.");
    }else{
        if($('#inq_text').val().length < 2){
            $('.msg').addClass('on');
            $('.msg').text("내용을 2자 이상 입력하세요.");
        }else{
            $('.com2').addClass('on');
            $('.com2 .con_p').text("문의접수를 하시겠습니까?");
            $('.com2 .btn2').text("접수");
        }
    }

    setTimeout(function(){
        $('.msg').removeClass('on');
    },3000)
});


//문의접수를 하시겠습니까? > 취소
$('.com2 .btn1').click(function(){
    $('.com2').removeClass('on');
});
//문의접수를 하시겠습니까? > 접수
$('.com2 .btn2').click(function(){
    location.href='comm_inq_ok.php';
});

</script>

<?include('footer.php')?>