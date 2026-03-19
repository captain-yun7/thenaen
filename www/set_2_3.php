<?php

include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];


$header = array(
    'is_header' => true,
    'head_name' => '차단목록 관리',
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include('pop2.php')?>

<section class="set">
    <div class="pd15">

        <!--리스트 없을때-->
        <div class="no_list">
            차단목록이 없습니다.
        </div>
        <!--리스트 없을때 끝-->

        <!--리스트 있을때-->
        <div class="yes_list on">

        <?php
            $sql = "select * from g5_write_opinion_info where wr_mb_id='$ss_mb_id' and delimiter ='blocks' and uses = 'Y' order by wr_id desc";
            $rs = sql_query($sql);

            while ($row=sql_fetch_array($rs)) {

                $wr_id = $row['wr_id'];
                $wr_mb_id = $row['wr_mb_id'];

                $outs2 = sql_fetch_array(sql_query("select * FROM g5_member where mb_id = '$wr_mb_id'"));

            ?>

                <div class="line">
                    <div class="pic_area vt_mid">
                        <div class="grid">
                            <img src="/img/profile.png" alt="프로필">
                        </div>
                    </div>
                    <div class="nick vt_mid"><?=$outs2['mb_nick']?></div>
                    <div class="c_area vt_mid">
                        <button type="button" class="c_btn" onClick = "com2_btn2_varF('<?=$wr_id?>')">차단해제</button>
                    </div>
                </div>

            <?php
            }
        ?>

<!--            <div class="line">-->
<!--                <div class="pic_area vt_mid">-->
<!--                    <div class="grid">-->
<!--                        <img src="/img/profile.png" alt="프로필">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="nick vt_mid">닉네임</div>-->
<!--                <div class="c_area vt_mid">-->
<!--                    <button type="button" class="c_btn">차단해제</button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="line">-->
<!--                <div class="pic_area vt_mid">-->
<!--                    <div class="grid">-->
<!--                        <img src="/img/profile.png" alt="프로필">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="nick vt_mid">닉네임</div>-->
<!--                <div class="c_area vt_mid">-->
<!--                    <button type="button" class="c_btn">차단해제</button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="line">-->
<!--                <div class="pic_area vt_mid">-->
<!--                    <div class="grid">-->
<!--                        <img src="/img/profile.png" alt="프로필">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="nick vt_mid">닉네임</div>-->
<!--                <div class="c_area vt_mid">-->
<!--                    <button type="button" class="c_btn">차단해제</button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="line">-->
<!--                <div class="pic_area vt_mid">-->
<!--                    <div class="grid">-->
<!--                        <img src="/img/profile.png" alt="프로필">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="nick vt_mid">닉네임</div>-->
<!--                <div class="c_area vt_mid">-->
<!--                    <button type="button" class="c_btn">차단해제</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        -->




        </div>
    </div>
</section>

<?include('footer.php')?>