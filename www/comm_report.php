<?php

include_once('./_common.php');

include "./top_login_check.php";

$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '신고',
);

$nums = $_GET['nums'];
if($nums == ""){
    echo "신고할 번호가 없습니다.";
    exit;
}



$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<script>

    var nums = "<?=$nums?>";

    function badReportF(){

        report = $('input[name=report]:checked').val();
        reportArea = $("#reportArea").val();

        console.log(report);
        console.log(reportArea);

        if(report == "기타"){
            if(reportArea == ""){
                alert("기타의 내용을 입력하세요.");
                return;
            }
        }

        $("#badReportSend").submit();

    }

</script>

<!--타인 게시글에서 신고했을때 오는 페이지-->

<section class="comm c_sub">
    <h2 class="h2">신고사유</h2>
    <form action = "./comm_report_ok.php" method="post"  id = "badReportSend">
        <input type = "hidden" name = "nums" value = "<?=$nums?>">

        <div class="report_wrap">
            <div class="report_block">
                <div class="rb_left vt_top">
                    <input type="radio" name="report" value = "광고/도배" id="reason1" class="radio" checked>
                </div>
                <div class="rb_right vt_top">
                    <label for="reason1" class="res_lab">광고/도배</label>
                </div>
            </div>
            <div class="report_block">
                <div class="rb_left vt_top">
                    <input type="radio" name="report" value = "욕설/혐오/차별적 표현 사용" id="reason2" class="radio">
                </div>
                <div class="rb_right vt_top">
                    <label for="reason2" class="res_lab">욕설/혐오/차별적 표현 사용</label>
                </div>
            </div>
            <div class="report_block">
                <div class="rb_left vt_top">
                    <input type="radio" name="report" value = "개인정보 노출" id="reason3" class="radio">
                </div>
                <div class="rb_right vt_top">
                    <label for="reason3" class="res_lab">개인정보 노출</label>
                </div>
            </div>
            <div class="report_block">
                <div class="rb_left vt_top">
                    <input type="radio" name="report" value = "음란성/선정성" id="reason4" class="radio">
                </div>
                <div class="rb_right vt_top">
                    <label for="reason4" class="res_lab">음란성/선정성</label>
                </div>
            </div>
            <div class="report_block">
                <div class="rb_left vt_top">
                    <input type="radio" name="report" value = "기타" id="reason5" class="radio">
                </div>
                <div class="rb_right vt_top">
                    <label for="reason5" class="res_lab">기타</label>
                </div>
            </div>
        </div>

        <div class="text_area">
            <textarea class="textarea" id = "reportArea" name = "reportArea" rows="7"></textarea>
        </div>

        <div class="r_btn_wrap">
            <button type="button" class="btns btn1" onclick="history.go(-1);">취소</button>
            <button type="button" class="btns btn2" onclick="badReportF()">신고하기</button>
        </div>
    </form>
</section>

<?include('footer.php')?>