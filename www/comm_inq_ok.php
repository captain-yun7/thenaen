<?php

include_once('./_common.php');

include "./top_login_check.php";

$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '문의',
);

$footer = array(
    'is_footer' => false,
    'page' => 'comm',
);
include 'header.php';
?>



<?php

$inq_type = $_POST['inq_type'];
$inq_text = $_POST['inq_text'];
$ss_mb_id= $_SESSION[ 'ss_mb_id' ];
$outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_id'"));
$mb_name = $outs['mb_name'];
$mb_email = $outs['mb_email'];
$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
$inq_text=addslashes($inq_text);

sql_query("insert into g5_write_qa(ca_name,wr_subject,wr_content,wr_seo_title,mb_id,wr_name,wr_email,wr_datetime,wr_last,wr_ip) values('$inq_type','$inq_type','$inq_text','$inq_type','$ss_mb_id','$mb_name','$mb_email',now(),now(),'$REMOTE_ADDR')");

?>

<section class="ok_wrap">
    <p class="ok_p">문의접수가 완료되었습니다.<br>최대한 신속하게 답변드리겠습니다.</p>
    <div class="btn_fixed">
        <button type="button" class="next_btn on" onclick="location.href='comm.php'">확인</button>
    </div>
</section>

<?include('footer.php')?>