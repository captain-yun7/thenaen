<?php


include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];


$header = array(
    'is_header' => true,
    'head_name' => '',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<script>
    function outForeverF(){
        bb = confirm("회원 탈퇴하시겠습니까?")
        if(bb == true){



            $.ajax({
                type: "POST",
                url: "/bbs/certification_ajax.php",
                async:false,
                data: {
                    nums: 14,
                },
                dataType: "text",
                success: function (result) {

                    if(result == "ok"){
                        location.href = './index.php';
                    }

                }
            });

        }
    }
</script>

<section class="set m_out">
    <div class="pd15">
        <h1 class="o_h1">회원탈퇴 전 꼭 확인해주세요.</h1>
        <div class="o_des">
            탈퇴시 삭제되는 정보를 확인하세요.<br>
            한번 삭제된 정보는 복구가 불가능합니다.
        </div>
        <div class="o_list">
            계정 및 프로필 정보 삭제<br>
            재활일지 내역 삭제<br>
            건강모니터 내역 삭제
        </div>
        <div class="o_btnarea">
            <button type="button" class="out_btn" onclick="outForeverF()">탈퇴하기</button>
        </div>
    </div>
</section>

<?include('footer.php')?>