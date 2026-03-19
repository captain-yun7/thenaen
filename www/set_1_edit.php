<?php


include_once('./_common.php');

include "./top_login_check.php";


$header = array(
    'is_header' => true,
    'head_name' => '프로필 수정',
    'right_menu' => true,
    'go_save' => true,
    'set1' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';


$nickSend = $_POST['nickSend'];
$ss_mb_id = $_SESSION["ss_mb_id"];


$result = sql_query("update g5_member set mb_nick = '$nickSend' where mb_id = '$ss_mb_id'");

?>

<section class="set set1">
    <div class="pd15">
        <label class="set_lab" for="user_nick">닉네임</label>
        <input type="text" name="user_nick" id="user_nick" class="input" value="<?=$nickSend?>">
    </div>
</section>

<?php
    if($result == true){
    ?>

<script>
    setTimeout(function(){
        location.href = 'set.php';
    },3000)

</script>

<?php
}
?>

<?include('footer.php')?>