<?
$header = array(
    'is_header' => true,
    'head_name' => '나의 활동내역',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="set">
    <div class="pd15">
        <div class="menu_wrap">
            <h2 class="menu on">내 게시글</h2>
            <h2 class="menu">내 댓글</h2>
            <h2 class="menu">내 문의</h2>
        </div>

        <div class="tab on">
            <!--리스트 없을때-->
            <div class="no_list">
                작성한 게시글이 없습니다.
            </div>
            <!--리스트 없을때 끝-->

            <!--리스트 있을때-->
            <div class="yes_list on">
                <a href="comm_sub_my.php" class="s2_a">
                    <h3 class="s2_h3">질문 있습니다.</h3>
                    <p class="gray">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</p>
                </a>
                <a href="comm_sub_my.php" class="s2_a">
                    <h3 class="s2_h3">질문 있습니다.</h3>
                    <p class="gray">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</p>
                </a>
            </div>
            <!--리스트 있을때 끝-->
        </div><!--내 게시글-->

        <div class="tab">
            <!--리스트 없을때-->
            <div class="no_list">
                작성한 댓글이 없습니다.
            </div>
            <!--리스트 없을때 끝-->

            <!--리스트 있을때-->
            <div class="yes_list on">
                <a href="comm_sub.php" class="s2_a">
                    <h3 class="s2_h3">하던 일 중지하시고 바로 병원 가보시는 것이 어떠실까요?</h3>
                    <p class="gray">질문 있습니다.글의 댓글</p>
                </a>
                <a href="comm_sub.php" class="s2_a">
                    <h3 class="s2_h3">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</h3>
                    <p class="gray">질문있습니다.글의 댓글</p>
                </a>
            </div>
            <!--리스트 있을때 끝-->
        </div><!--내 댓글-->

        <div class="tab">
            <!--리스트 없을때-->
            <div class="no_list">
                작성한 문의가 없습니다.
            </div>
            <!--리스트 없을때 끝-->

            <!--리스트 있을때-->
            <div class="yes_list on">
                <a href="set_2_2_sub.php" class="inq_a">
                    <h3 class="s2_h3">
                        <span class="vt_mid vt1">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</span>
                        <span class="vt_mid status on">답변완료</span>
                    </h3>
                </a>
                <a href="set_2_2_sub.php" class="inq_a">
                    <h3 class="s2_h3">
                        <span class="vt_mid vt1">게시글 작성이 안됩니다.</span>
                        <span class="vt_mid status">답변대기</span>
                    </h3>
                </a>
            </div>
            <!--리스트 있을때 끝-->
        </div><!--내 문의-->
    </div>
</section>

<?include('footer.php')?>