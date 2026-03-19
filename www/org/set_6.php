<?
$header = array(
    'is_header' => true,
    'head_name' => '복약시간 알림',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set set6">
    <div class="pd15">

        <div class="s_top">
            <div class="s_left vt_mid">
                일정한 시간에 약물을 복용하는 것은
                중요합니다. 복약시간을 설정해 보세요.
            </div>
            <div class="s_right on vt_mid">
                <button type="button" class="btns btn1">
                    <img src="/org/img/s6btn_1.png" alt="알림 추가">
                </button>
                <button type="button" class="btns btn2">
                    <img src="/org/img/s6btn_2.png" alt="알림 삭제">
                </button>
            </div>
        </div>

        <div class="s_bot">
            <div class="a_box">
                <div class="a_ck vt_mid">
                    <input type="checkbox" name="alarm" id="alarm1" class="ckbox">
                </div>
                <a href="set_time.php" class="time vt_mid">
                    <span class="vt_bot tm1">오전</span>
                    <span class="vt_bot tm2">9:00</span>
                </a>
                <div class="a_radio vt_mid">
                    <input type="checkbox" name="onoff" id="onoff1" class="onoff">
                </div>
            </div>
            <div class="a_box">
                <div class="a_ck vt_mid">
                    <input type="checkbox" name="alarm" id="alarm2" class="ckbox">
                </div>
                <a href="set_time.php" class="time vt_mid">
                    <span class="vt_bot tm1">오후</span>
                    <span class="vt_bot tm2">12:00</span>
                </a>
                <div class="a_radio vt_mid">
                    <input type="checkbox" name="onoff" id="onoff1" class="onoff" checked>
                </div>
            </div>
            <div class="a_box">
                <div class="a_ck vt_mid">
                    <input type="checkbox" name="alarm" id="alarm3" class="ckbox">
                </div>
                <a href="set_time.php" class="time vt_mid">
                    <span class="vt_bot tm1">오후</span>
                    <span class="vt_bot tm2">6:00</span>
                </a>
                <div class="a_radio vt_mid">
                    <input type="checkbox" name="onoff" id="onoff1" class="onoff" checked>
                </div>
            </div>
        </div>

        <div class="btn_fixed">
            <button type="button" class="d_btns d_btn1">취소</button>
            <button type="button" class="d_btns d_btn2">
                <img src="/org/img/s6btn_2.png" alt="삭제">삭제
            </button>
        </div>

    </div>
</section>

<?include('footer.php')?>