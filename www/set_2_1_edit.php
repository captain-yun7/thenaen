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
                <input type="radio" name="gender" id="male" class="radio" value = "male"  <?php if($sex_str == "남자"){ echo "checked"; } ?> >
                <label for="male" class="r_lab">남자</label>
            </div>
            <div class="radio_wrap">
                <input type="radio" name="gender" id="female" class="radio" value = "fmale"  <?php if($sex_str == "여자"){ echo "checked"; } ?> >
                <label for="female" class="r_lab">여자</label>
            </div>
        </div>
        <div class="st_block">
            <label class="set_lab" for="age">나이</label>
            <input type="number" name="age" id="age" class="input" value="<?=$getinfo['age']?>" placeholder="나이를 입력하세요.">
            <span class="abs">세</span>
        </div>
        <div class="st_block">
            <label class="set_lab" for="height">키</label>
            <input type="number" name="height" id="height" class="input" value="<?=$getinfo['height']?>" placeholder="키를 입력하세요.">
            <span class="abs">cm</span>
        </div>
        <div class="st_block">
            <label class="set_lab" for="weight">몸무게</label>
            <input type="number" name="weight" id="weight" class="input" value="<?=$getinfo['weight']?>" placeholder="몸무게를 입력하세요.">
            <span class="abs">kg</span>
        </div>
        <div class="st_block">
            <label class="set_lab">진단받은 호흡기 질환을 입력해주세요</label>
            <input type="text" name="disease" id="disease" class="input3" value="<?=$getinfo['disease']?>" placeholder="진단명">
        </div>
    </div>
</section>

<?include('footer.php')?>