<?
$header = array(
    'is_header' => true,
    'head_name' => '프로필 수정',
    'right_menu' => true,
    'go_save' => true,
    'set2' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set set2">
    <div class="pd15">
        <div class="st_block">
            <label class="set_lab">성별</label>
            <div class="radio_wrap">
                <input type="radio" name="gender" id="male" class="radio" checked>
                <label for="male" class="r_lab">남자</label>
            </div>
            <div class="radio_wrap">
                <input type="radio" name="gender" id="female" class="radio">
                <label for="female" class="r_lab">여자</label>
            </div>
        </div>
        <div class="st_block">
            <label class="set_lab" for="age">나이</label>
            <input type="number" name="age" id="age" class="input" value="26" placeholder="나이를 입력하세요.">
            <span class="abs">세</span>
        </div>
        <div class="st_block">
            <label class="set_lab" for="height">키</label>
            <input type="number" name="height" id="height" class="input" value="182" placeholder="키를 입력하세요.">
            <span class="abs">cm</span>
        </div>
        <div class="st_block">
            <label class="set_lab" for="weight">몸무게</label>
            <input type="number" name="weight" id="weight" class="input" value="76" placeholder="몸무게를 입력하세요.">
            <span class="abs">kg</span>
        </div>
        <div class="st_block">
            <label class="set_lab">진단받은 호흡기 질환을 입력해주세요</label>
            <input type="text" name="gender" id="gender" class="input3" value="폐쇄성 폐질환" placeholder="진단명">
        </div>
    </div>
</section>

<?include('footer.php')?>