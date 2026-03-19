<?
$header = array(
    'is_header' => true,
    'head_name' => '운동시간 알림',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set set8">
    <div class="pd15">

        <div class="s_top">
            <div class="s_left vt_mid">
                하루 중 운동에 집중할 수 있는 시간을
                설정해보세요. 한 번에 지속해도 되고,
                여러 번 나눠서 운동할 수 있습니다.
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
                    <input type="checkbox" name="alarm" id="alarm1" class="ckbox">
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
                    <input type="checkbox" name="alarm" id="alarm1" class="ckbox">
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