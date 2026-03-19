<?
include_once('./_common.php');

if(!empty($member['mb_no'])) {
    $sql = "UPDATE `g5_member` SET `device` = '{$_REQUEST['device']}', `token` = '{$_REQUEST['keys']}' WHERE `mb_no` = '{$member['mb_no']}'";
    sql_query($sql);
}
?>