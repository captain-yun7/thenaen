<?
$header = array(
    'is_header' => false,
    'head_name' => '',
);

$footer = array(
    'is_footer' => true,
    'page' => 'comm',
);
include 'header.php';
?>

<section class="comm tg_sc">
    <div class="pd15">
        <div class="input_wrap">
            <button type="button" class="back" onclick="history.go(-1);">
                <img src="/img/back.png" alt="뒤로가기">
            </button>

            <input type="text" name="search" id="search" class="s_input" placeholder="검색어를 입력하세요.">

            <button type="button" class="reset">
                <img src="/img/icon_reset.png" alt="초기화">
            </button>
        </div>

        <div class="s_con">
            <div class="no_list on">
                <div class="wrap">
                    <img src="/img/no_list.png" alt="검색 결과가 없습니다.">
                    <div class="no_txt">검색 결과가 없습니다.</div>
                </div>
            </div>

            <div class="yes_list">
                <div class="b_list">
                    <a href="comm_sub_my.php" class="b_a">
                        <div class="fs0">
                            <div class="left vt_mid">
                                <span class="bold">질문</span> 있습니다.
                            </div>
                            <div class="right vt_mid">
                                2분
                            </div>
                        </div>
                        <div class="con">
                            제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 나아지는것 같은데요
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
                    <a href="comm_sub_my.php" class="b_a">
                        <div class="fs0">
                            <div class="left vt_mid">
                                <span class="bold">질문</span> 있습니다.
                            </div>
                            <div class="right vt_mid">
                                1시간
                            </div>
                        </div>
                        <div class="con">
                            제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 나아지는것 같은데요
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
                    <a href="comm_sub_my.php" class="b_a">
                        <div class="fs0">
                            <div class="left vt_mid">
                                <span class="bold">질문</span> 있습니다.
                            </div>
                            <div class="right vt_mid">
                                하루
                            </div>
                        </div>
                        <div class="con">
                            제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 나아지는것 같은데요
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
                    <a href="comm_sub_my.php" class="b_a">
                        <div class="fs0">
                            <div class="left vt_mid">
                                <span class="bold">질문</span> 있습니다.
                            </div>
                            <div class="right vt_mid">
                                3/6
                            </div>
                        </div>
                        <div class="con">
                            제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 나아지는것 같은데요
                        </div>
                        <div class="act_wrap">
                            <div class="act vt_mid">
                                <img src="/org/img/icon_feather.png" alt="좋아요">
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
        </div>
    </div>
</section>

<?include('footer.php')?>