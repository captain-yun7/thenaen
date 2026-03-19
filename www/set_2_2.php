<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];

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


                        <div class="yes_list on">

            <?php

            $sqlGaInfo = "select * from g5_write_free where mb_id='".$ss_mb_id."' and wr_is_comment = '0' order by wr_id desc";
            $rsGaInfo = sql_query($sqlGaInfo);

            while ($rowGaInfo=sql_fetch_array($rsGaInfo)) {

                $wr_id = $rowGaInfo['wr_id'];
                $wr_subject = $rowGaInfo['wr_subject'];
                $wr_content = $rowGaInfo['wr_content'];

                ?>


                <a href="comm_sub.php?nums=<?=$wr_id?>" class="s2_a">
                    <h3 class="s2_h3"><?=$wr_subject?></h3>
                    <p class="gray"><?=$wr_content?></p>
                </a>


                <?php
            }
            ?>

                        </div>






            <!--리스트 없을때-->
            <div class="no_list">
                작성한 게시글이 없습니다.
            </div>
            <!--리스트 없을때 끝-->

            <!--리스트 있을때-->
<!--            <div class="yes_list on">-->
<!--                <a href="comm_sub_my.php" class="s2_a">-->
<!--                    <h3 class="s2_h3">질문 있습니다.</h3>-->
<!--                    <p class="gray">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</p>-->
<!--                </a>-->
<!--                <a href="comm_sub_my.php" class="s2_a">-->
<!--                    <h3 class="s2_h3">질문 있습니다.</h3>-->
<!--                    <p class="gray">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</p>-->
<!--                </a>-->
<!--            </div>-->
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



                <?php

                $sqlGaInfo2 = "select * from g5_write_free where wr_parent = '$wr_id' and mb_id='".$ss_mb_id."' and wr_is_comment != '0' order by wr_comment asc";

                //echo "tttt=".$sqlGaInfo2;

                $rsGaInfo2 = sql_query($sqlGaInfo2);
                while ($rowGaInfo2=sql_fetch_array($rsGaInfo2)) {

                    $wr_id2 = $rowGaInfo2['wr_id'];
                    $wr_content2 = $rowGaInfo2['wr_content'];


                    ?>


                                    <a href="comm_sub.php?nums=<?=$wr_id?>" class="s2_a">
                                        <h3 class="s2_h3"><?=$wr_content2?></h3>

                                        <?php
                                        $sqlGaInfo3 = "select * from g5_write_free where wr_parent = '$wr_id' and mb_id='".$ss_mb_id."' and wr_comment_reply != '' and wr_is_comment = '1' order by wr_id desc";
                                        $rsGaInfo3 = sql_query($sqlGaInfo3);
                                        while ($rowGaInfo3=sql_fetch_array($rsGaInfo3)) {

                                            $wr_id3 = $rowGaInfo3['wr_id'];
                                            $wr_content3 = $rowGaInfo3['wr_content'];
                                        ?>

                                        <p class="gray"><?=$wr_content3?></p>

                                        <?php
                                        }
                                        ?>


                                    </a>


                    <?php
                }
                ?>



<!--                <a href="comm_sub.php" class="s2_a">-->
<!--                    <h3 class="s2_h3">하던 일 중지하시고 바로 병원 가보시는 것이 어떠실까요?</h3>-->
<!--                    <p class="gray">질문 있습니다.글의 댓글</p>-->
<!--                </a>-->
<!---->
<!---->
<!---->
<!---->
<!--                <a href="comm_sub.php" class="s2_a">-->
<!--                    <h3 class="s2_h3">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</h3>-->
<!--                    <p class="gray">질문있습니다.글의 댓글</p>-->
<!--                </a>-->


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


                <?php

                $sqlGaInfo4 = "select * from g5_write_qa where mb_id='".$ss_mb_id."' and wr_is_comment = '0' order by wr_id desc";
                $rsGaInfo4 = sql_query($sqlGaInfo4);





                while ($rowGaInfo4=sql_fetch_array($rsGaInfo4)) {

                    $wr_id4 = $rowGaInfo4['wr_id'];
                    $wr_content4 = $rowGaInfo4['wr_content'];

                    $sqlGaInfo4_sub = sql_fetch_array(sql_query("select count(*) as cnt from g5_write_qa where wr_is_comment = '1' and wr_parent = ' $wr_id4' order by wr_id desc"));

                    ?>


                        <a href="set_2_2_sub.php?nums=<?=$wr_id4?>" class="inq_a">
                            <h3 class="s2_h3">
                                <span class="vt_mid vt1"><?=$wr_content4?></span>
                                <span class="vt_mid status on">

                                    <?php
                                    if($sqlGaInfo4_sub['cnt'] == 0){
                                    ?>
                                        답변대기

                                        <?php
                                    }
                                    else{
                                        ?>
                                        답변완료
                                        <?php
                                    }
                                        ?>

                                </span>
                            </h3>
                        </a>


                    <?php
                }
                ?>




<!--                <a href="set_2_2_sub.php" class="inq_a">-->
<!--                    <h3 class="s2_h3">-->
<!--                        <span class="vt_mid vt1">제가 집에서 혼자 호흡근 재활운동을 하다가 숨이 조금씩 가쁘더니</span>-->
<!--                        <span class="vt_mid status on">답변완료</span>-->
<!--                    </h3>-->
<!--                </a>-->
<!--                <a href="set_2_2_sub.php" class="inq_a">-->
<!--                    <h3 class="s2_h3">-->
<!--                        <span class="vt_mid vt1">게시글 작성이 안됩니다.</span>-->
<!--                        <span class="vt_mid status">답변대기</span>-->
<!--                    </h3>-->
<!--                </a>-->





            </div>
            <!--리스트 있을때 끝-->
        </div><!--내 문의-->
    </div>
</section>

<?include('footer.php')?>