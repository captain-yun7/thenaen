<?php $nowpage = explode("/" , $_SERVER["REQUEST_URI"]); ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/favicon.ico">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta content="더나은호흡" property='og:title' />
    <meta content="" property='og:url' />
    <meta content="더나은호흡과 함께 호흡재활을 시작하세요." property='og:description' />
    <meta content="/img/logo.png" property='og:image' />
    <title>더나은호흡</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/script.js"></script>
</head>
<body>

<? if($header['is_header']) { ?>
    <header class="header <?=$header['inh'] == true ? 'p_inh' :''?>">
        <div class="pd15">
        <? if($header['main_head']) { ?>
            <h1 class="h1 <?=$header['is_set'] == true ? 'set_tit' :''?>"><?=$header['head_name']?></h1>
            <? }else{ ?>

            <?php



            $REQUEST_URI = $_SERVER[ "REQUEST_URI" ];

            //echo "test===".$REQUEST_URI;







            $srhStringBokyaalStr = "";
            if($REQUEST_URI == "/set_6.php") {
                $srhStringBokyaalStr = "javascript:location.href = 'set.php'";
            }
            else if($REQUEST_URI == "/set7_add.php"){
                $srhStringBokyaalStr = "javascript:location.href = 'set_7.php'";
            }
            else if($REQUEST_URI == "/set_7.php"){
                $srhStringBokyaalStr = "javascript:location.href = 'set.php'";
            }
            else if($REQUEST_URI == "/set_8.php"){
                $srhStringBokyaalStr = "javascript:location.href = 'set.php'";
            }
            else if(strpos($REQUEST_URI, "comm_sub.php") !== false){
                $srhStringBokyaalStr = "javascript:location.href = 'comm.php'";
            }
            else if(strpos($REQUEST_URI, "myh_2.php") !== false){
                $srhStringBokyaalStr = "javascript:location.href = 'index.php'";
            }
            else if(strpos($REQUEST_URI, "myh_1_1.php") !== false){
                $srhStringBokyaalStr = "javascript:location.href = 'index.php'";
            }
            else if(strpos($REQUEST_URI, "myh_3.php") !== false){
                $srhStringBokyaalStr = "javascript:location.href = 'index.php'";
            }
            else{
                $srhStringBokyaalStr = "javascript:history.go(-1);";
            }
            ?>




               <button type="button" class="h_left vt_mid" onclick="<?=$srhStringBokyaalStr?>">
<!--                   <input type = "text" value = "--><?php //=$REQUEST_URI?><!--">-->
<!--                   <input type = "text" value = "--><?php //=$srhStringBokyaalStr?><!--">-->
                   <img src="/img/back.png" alt="뒤로가기">
                </button>


            <h1 class="h1 h_cen vt_mid"><?=$header['head_name']?></h1>
                <? if($header['right_menu']) { ?>
                    <? if($header['go_edit']) { ?>
                        <button type="button" class="h_right vt_mid <?=$header['set1'] == true ? 'set1_ed' :'set2_1_ed'?>" onClick = "profileModifyF()">
                            수정
                        </button>
                            <? }else if($header['go_save']){ ?>
                            <button type="button" class="h_right vt_mid <?=$header['set1'] == true ? 'set1_sv' :'set2_1_sv'?>">
                                확인
                            </button>
                                <? }else if($header['go_save']){ ?>
                            <button type="button" class="h_right vt_mid <?=$header['set1'] == true ? 'set1_sv' :'set2_1_sv'?>">
                                확인
                            </button>
                                <? }else if($header['go_comp']){ ?>

                                <?php
                                $tmpString = $_SERVER[ "REQUEST_URI" ];
                                $srhString = "comm_rp_edit.php";

                                if(strpos($tmpString, $srhString) !== false) { // 댓글 수정 페이지면..
                                ?>
                                    <button type="button" class="h_right vt_mid <?=$header['rep'] == true ? 'comp' :'comp2'?>" onClick = 'modifyGo()'>
                                        완료
                                    </button>
                                <?php
                                }
                                else{ // 글쓰기 일때..
                                ?>
                                    <button type="button" class="h_right vt_mid <?=$header['rep'] == true ? 'comp' :'comp2'?>" onClick = 'writeGo()'>
                                        완료
                                    </button>
                                <?php
                                }
                                ?>


                                <? } ?>
                        <!-- set1_ed ,set2_1_ed = 제이쿼리용 클래스 -->
                    <? } ?>
                <? } ?>
        </div>
    </header>

<? }else if($header['is_form']) { ?>
    <header class="f_header">
        <div class="pd15">
            <h2 class="f_h2"><?=$header['f_headname']?></h2>
            <? if($header['j_info']) { ?>
                <div class="h_sub">
                    더나은호흡을 효과적으로 이용하기<br>위해 필요한 정보입니다.</div>
                <? } ?>
        </div>
    </header>

    <? }else{ ?>

        <? } ?>
