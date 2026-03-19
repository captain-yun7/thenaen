<?
$header = array(
    'is_header' => true,
    'head_name' => '프로필 수정',
    'right_menu' => true,
    'go_edit' => true,
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
            <input type="text" name="gender" id="gender" class="input" readonly value="남자">
        </div>
        <div class="st_block">
            <label class="set_lab">나이</label>
            <input type="number" name="age" id="age" class="input" readonly value="26">
            <span class="abs">세</span>
        </div>
        <div class="st_block">
            <label class="set_lab">키</label>
            <input type="number" name="height" id="height" class="input" readonly value="182">
            <span class="abs">cm</span>
        </div>
        <div class="st_block">
            <label class="set_lab">몸무게</label>
            <input type="number" name="weight" id="weight" class="input" readonly value="76">
            <span class="abs">kg</span>
        </div>
        <div class="st_block">
            <label class="set_lab">진단받은 호흡기 질환</label>
            <input type="text" name="gender" id="gender" class="input2" readonly value="폐쇄성 폐질환">
        </div>
    </div>
</section>

<?include('footer.php')?>