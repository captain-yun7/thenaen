<?php

include_once('./_common.php');

include "./top_login_check.php";

$nums = $_GET['nums'];
$num2 = $_GET['nums2'];
$nums3 = $_GET['nums3'];

if($nums == ""){
    echo "<script>history.back();</script>";
    exit;
}

$pageNameCheck = "comm_rp_edit.php";

$outs = sql_fetch_array(sql_query("select * FROM g5_write_free where wr_id = '$nums3'"));
$wr_content = $outs['wr_content'];
$mb_id = $outs['mb_id'];



$modify = "false";
if($_SESSION["ss_mb_id"] == $mb_id){
    $modify = "ok";
}

$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '수정',
    'right_menu' => true,
    'go_comp' => true,
    'rep' => true,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';

?>

<script>

    var modifyAccept = "<?=$modify?>";
    var mb_id_script = "<?=$nums3?>";
    var num2 = "<?=$num2?>";
    var nums = "<?=$nums?>";

    function modifyGo(){



        commentreedit = $("#commentreedit").val();

        if(commentreedit == ""){
            alert("내용을 입력하세요.");
            $("#commentreedit").focus();
            return;
        }
        else{
            if(modifyAccept != "ok"){
                alert("본인의 댓글만 수정이 가능합니다.");
                return;
            }
            else{

                commentreedit = encodeURIComponent(commentreedit);

                // ajax 시작
                $.ajax({
                    type: "POST",
                    url: "/bbs/get_content_freega_ajax.php",
                    async:false,
                    data: {
                        pageNum: "",
                        searchStr: "",
                        delimiter: "commentModify",
                        commentreedit: commentreedit,
                        mb_id_script: mb_id_script,
                        num2:num2,

                    },
                    dataType: "html",
                    success: function (result) {

                        console.log(result);
                        console.log(commentreedit);
                        console.log(mb_id_script);
                        console.log(num2);


                        if(result == "ok"){
                            location.href = "./comm_sub.php?nums="+nums;


                            return
                        }
                        else{
                            return;
                        }

                    }
                });



            }

        }

    }

</script>

<section class="comm edit_my">
    <div class="pd15">
        <textarea name="commentreedit" id="commentreedit" class="wt_area" placeholder="내용을 입력하세요." rows="11"><?=$wr_content?></textarea>
    </div>
</section>

<?include('footer.php')?>