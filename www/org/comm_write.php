<?
$header = array(
    'is_header' => true,
    'main_head' => false,
    'head_name' => '글쓰기',
    'right_menu' => true,
    'go_comp' => true,
);

$footer = array(
    'is_footer' => false,
    'page' => 'comm',
);
include 'header.php';
?>

<section class="comm write">
    <div class="pd15">

        <!--03/04 제목 추가!!-->
        <style>
            .write .title_area .title {width: 100%; border: none; padding: 0 1.6667vw; box-sizing: border-box; font-size: 4.1667vw; margin-bottom: 1.3889vw; border-bottom: 0.2778vw solid #dddddd; padding-bottom: 1.3889vw;}
            .write .title_area .title::placeholder {color: #AEAEAE;}
        </style>

        <div class="title_area">
            <input type="text" name="title" id="title" class="title" placeholder="제목을 입력하세요.">
        </div>
        <!--03/04 제목 추가!!-->

        <textarea id="write" class="wt_area" placeholder="내용을 입력하세요." rows="11"></textarea>
        <div class="wt_info">
            <span class="fs14">게시글 작성시 유의사항</span><br><br>

            더나은호흡은 호흡기 질환 환자들의 자유로운 커뮤니케이션을 
            위해 게시판 이용규칙을 제정하여 운영하고 있습니다. 이를
            위반 시 게시물이 삭제되고 서비스 이용이 제한될 수 있습니다.<br><br>

            *욕설, 비방 금지<br>
            *이익을 목적으로 한 부정 활동 금지<br>
            *그 밖의 규칙 위반<br>
            - 전문의약품 판매거래 행위<br>
            - 음란물, 성적 수치심 유발 행위<br>
            - 범죄, 불법 행위 등 법령을 위반하는 행위
        </div>
    </div>
</section>

<?include('footer.php')?>