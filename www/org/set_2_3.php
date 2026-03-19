<?
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
            <div class="line">
                <div class="pic_area vt_mid">
                    <div class="grid">
                        <img src="/org/img/profile.png" alt="프로필">
                    </div>
                </div>
                <div class="nick vt_mid">닉네임</div>
                <div class="c_area vt_mid">
                    <button type="button" class="c_btn">차단해제</button>
                </div>
            </div>
            <div class="line">
                <div class="pic_area vt_mid">
                    <div class="grid">
                        <img src="/org/img/profile.png" alt="프로필">
                    </div>
                </div>
                <div class="nick vt_mid">닉네임</div>
                <div class="c_area vt_mid">
                    <button type="button" class="c_btn">차단해제</button>
                </div>
            </div>
            <div class="line">
                <div class="pic_area vt_mid">
                    <div class="grid">
                        <img src="/org/img/profile.png" alt="프로필">
                    </div>
                </div>
                <div class="nick vt_mid">닉네임</div>
                <div class="c_area vt_mid">
                    <button type="button" class="c_btn">차단해제</button>
                </div>
            </div>
            <div class="line">
                <div class="pic_area vt_mid">
                    <div class="grid">
                        <img src="/org/img/profile.png" alt="프로필">
                    </div>
                </div>
                <div class="nick vt_mid">닉네임</div>
                <div class="c_area vt_mid">
                    <button type="button" class="c_btn">차단해제</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?include('footer.php')?>