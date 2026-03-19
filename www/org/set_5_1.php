<?
$header = array(
    'is_header' => true,
    'head_name' => '비밀번호 변경',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include('pop.php')?>

<section class="set set5">
    <div class="pd15">
        <div class="s5_wrap">
            <div class="s5_block">
                <label for="now_pw" class="set_lab">현재 비밀번호</label>
                <input type="password" name="now_pw" id="now_pw" placeholder="현재 비밀번호를 입력하세요." class="input">
            </div>
            <div class="s5_block">
                <label for="new_pw" class="set_lab">새 비밀번호(영문+숫자 8~16자 조합)</label>
                <input type="password" name="new_pw" id="new_pw" placeholder="새 비밀번호를 입력하세요." class="input">
            </div>
            <div class="s5_block">
                <label for="new_pw2" class="set_lab">새 비밀번호 확인</label>
                <input type="password" name="new_pw2" id="new_pw2" placeholder="새 비밀번호를 다시 입력하세요." class="input">
            </div>
        </div>
    </div>


    <div class="btn_fixed">
        <button type="button" class="next_btn on">비밀번호 변경</button>
    </div>
</section>

<?include('footer.php')?>