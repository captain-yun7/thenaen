<?php

include_once('./_common.php');

include "./top_login_check.php";

// 닉네임 구함
$ss_mb_reg = $_SESSION["ss_mb_id"];
$outs = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$ss_mb_reg'"));
$outs_mb_nick =$outs['mb_nick'];





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

<script>

    function profileModifyF(){

        user_nick = $("#user_nick").val();

        if(user_nick == ""){
            alert("닉네임을 입력하세요.");
            $("#user_nick").focus();
            return
        }
        else{
            if(nickChangefCa == 0){
                alert("중복확인이 되지 않았습니다.");
                $("#user_nick").val("");
                return
            }
            else{
                $("#nickSend").val(user_nick);
                $("#set_1_edit_f_id").submit();
            }


        }

    }


    var nickChangefCa = 0;

    function nickChangef(){

        user_nick = $("#user_nick").val();
        if(user_nick != ""){


            // ajax 시작
            $.ajax({
                type: "POST",
                url: "/bbs/certification_ajax.php",
                async:false,
                data: {
                    nums: 10,
                    nickname: user_nick,
                },
                dataType: "html",
                success: function (result) {

                    if(result == "false"){
                        alert("중복된 아이디입니다.");
                        $("#user_nick").val("");

                        nickChangefCa = 0;

                        return;
                    }
                    else{
                        nickChangefCa = 1;
                    }

                }
            });





        }

    }


</script>

<form id = "set_1_edit_f_id" action = "./set_1_edit.php" method = "post">
    <input type="hidden" id = "nickSend" name = "nickSend" value = "">
</form>

<section class="set set1">
    <div class="pd15">
        <label class="set_lab">닉네임</label>
        <input type="text" onBlur = 'nickChangef()' name="user_nick" id="user_nick" class="input" value="<?=$outs_mb_nick?>">
    </div>
</section>

<?include('footer.php')?>