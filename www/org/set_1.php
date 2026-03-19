<?
$header = array(
    'is_header' => true,
    'head_name' => '프로필 수정',
    'right_menu' => true,
    'go_edit' => true,
    'set1' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set set1">
    <div class="pd15">
        <label class="set_lab">닉네임</label>
        <input type="text" name="user_nick" id="user_nick" class="input" readonly value="더나은호흡">
    </div>
</section>

<?include('footer.php')?>