<?php $nowpage = explode("/" , $_SERVER["REQUEST_URI"]); ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/org/img/favicon.ico">
    <link rel="shortcut icon" href="/org/img/favicon.ico">
    <meta content="더나은호흡" property='og:title' />
    <meta content="" property='og:url' />
    <meta content="더나은호흡과 함께 호흡재활을 시작하세요." property='og:description' />
    <meta content="/org/img/logo.png" property='og:image' />
    <title>더나은호흡</title>
    <link rel="stylesheet" href="/org/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/org/css/style.css">
    <script src="/org/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/org/js/script.js"></script>
</head>
<body>


<? if($header['is_header']) { ?>
    <header class="header <?=$header['inh'] == true ? 'p_inh' :''?>">
        <div class="pd15">
        <? if($header['main_head']) { ?>
            <h1 class="h1 <?=$header['is_set'] == true ? 'set_tit' :''?>"><?=$header['head_name']?></h1>
            <? }else{ ?>
                <button type="button" class="h_left vt_mid" onclick="history.go(-1);">
                    <img src="/org/img/back.png" alt="뒤로가기">
                </button>
                <h1 class="h1 h_cen vt_mid"><?=$header['head_name']?></h1>
                <? if($header['right_menu']) { ?>
                    <? if($header['go_edit']) { ?>
                        <button type="button" class="h_right vt_mid <?=$header['set1'] == true ? 'set1_ed' :'set2_1_ed'?>">
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
                            <button type="button" class="h_right vt_mid <?=$header['rep'] == true ? 'comp' :'comp2'?>">
                                완료
                            </button>
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
