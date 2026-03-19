<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

$getinfo = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_id'"));

$sex = $getinfo['sex'];

if($sex == "fmale"){
    $sex_str = "여자";
}
else{
    $sex_str = "남자";
}

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
            <input type="text" name="gender" id="gender" class="input" readonly value="<?=$sex_str?>">
        </div>
        <div class="st_block">
            <label class="set_lab">나이</label>
            <input type="number" name="age" id="age" class="input" readonly value="<?=$getinfo['age']?>">
            <span class="abs">년생</span>
        </div>
        <div class="st_block">
            <label class="set_lab">키</label>
            <input type="number" name="height" id="height" class="input" readonly value="<?=$getinfo['height']?>">
            <span class="abs">cm</span>
        </div>
        <div class="st_block">
            <label class="set_lab">몸무게</label>
            <input type="number" name="weight" id="weight" class="input" readonly value="<?=$getinfo['weight']?>">
            <span class="abs">kg</span>
        </div>
        <div class="st_block">
            <label class="set_lab">진단받은 호흡기 질환</label>
            <input type="text" name="gender" id="gender" class="input2" readonly value="<?=$getinfo['disease']?>">
        </div>
    </div>
</section>

<?include('footer.php')?>