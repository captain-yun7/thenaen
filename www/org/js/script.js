$(document).ready(function(){

    //팝업 공통 닫기
    $('.black_bg').click(function(){
        $('.pop').removeClass('on');
    });
    $('.pop_btn').click(function(){
        $('.pop').removeClass('on');
    });

    //이용약관 동의해야 버튼 활성화
    $('.j1 #use_agree').change(function(){
        if($(this).is(":checked")){
            $('.btn_fixed .next_btn').addClass('on');
        }else{
            $('.btn_fixed .next_btn').removeClass('on');
        }
    });
    $('.j1 .next_btn').click(function(){
        if($(this).hasClass('on')){
            location.href='join2.php';
        }
    });

    //회원가입 > 이메일 입력해야 버튼 활성화
    $('.j2 #user_email').change(function(){
        $('.j2 .next_btn').addClass('on');
    });
    $('.j2 .next_btn').click(function(){
        if($(this).hasClass('on')){
            location.href='join3.php';
        }
    });

    //회원가입 > 비밀번호 입력해야 버튼 활성화
    $('.j4 #user_pw2').change(function(){
        $('.j4 .next_btn').addClass('on');
    });
    $('.j4 .next_btn').click(function(){
        if($(this).hasClass('on')){
            location.href='join_info1.php';
        }
    });

    //내 정보 입력 > 안정시 심박수 입력하면 버튼 활성화
    $('.ji1 #rate').change(function(){
        $('.ji1 .next_btn').addClass('on');
    });
    $('.ji1 .next_btn').click(function(){
        if($(this).hasClass('on')){
            location.href='join_info2.php';
        }
    });

    //내 정보 입력 > 호흡기질환 입력하면 버튼 활성화
    $('.ji2 #dis').change(function(){
        $('.ji2 .next_btn').addClass('on');
    });
    $('.ji2 .next_btn').click(function(){
        if($(this).hasClass('on')){
            location.href='join_info3.php';
        }
    });

    //내 정보 입력 > 활동하실 닉네임 입력
    $('.ji3 #nickname').change(function(){
        $('.ji3 .next_btn').addClass('on');
    });
    //내 정보 입력 > 닉네임 입력 후 중복확인
    $('.ji3 .c_btn').click(function(){
        $('.ji3 .r_div').removeClass('on');
        $('.ji3 .rb2').addClass('on');
        $('.ji3 .next_btn').addClass('on');
    });
    //내 정보 입력 > 닉네임 입력 후 버튼누름
    $('.ji3 .next_btn').click(function(){
        if($(this).hasClass('on')){
            $('.blue_bar').stop().animate({'width':'100%'},500);
            setTimeout(function(){
                location.href='index.php';
            }, 1000)
        }
    });

    //메인 팝업
    $('.tdpop .td_btn').click(function(){
        $('.tdpop').removeClass('on');
    });

    //간질성 폐질환이란?
    $('.bi1 .bi1_li').click(function(){
        $('.bi1 .bi1_li').removeClass('on');
        $(this).addClass('on');

        $('.bi1 .pd15 .tab').removeClass('on');
        $('.bi1 .pd15 .tab').eq($(this).index()).addClass('on');
    });


    //제한성 폐질환
    $('.expop .ok_btn').click(function(){
        $('.expop').removeClass('on');
    });

    //운동 상세페이지 > 팝업 확인
    $('.expop2 .ok_btn').click(function(){
        $('.expop2').removeClass('on');
    });

    //운동 상세페이지 운동시작
    $('.exercise_sub .ebtn.blue').click(function(){
        $(this).parent().children('.ebtn').removeClass('on');
        $(this).parent().children('.ebtn.gray').addClass('on');
    });
    $('.exercise_sub .ebtn.gray').click(function(){
        $(this).parent().children('.ebtn').removeClass('on');
        $(this).parent().children('.ebtn.blue').addClass('on');
    });

    //재활일지 (월간수행기록)
    $('.my .table .icon1').html("<img src='/org/img/icon_my1.png'>")
    $('.my .table .icon2').html("<img src='/org/img/icon_my2.png'>")
    $('.my .table .icon3').html("<img src='/org/img/icon_my3.png'>")
    $('.my .table .icon4').html("<img src='/org/img/icon_my4.png'>")
    $('.my .table .icon5').html("<img src='/org/img/icon_my5.png'>")
    $('.my .table .icon6').html("<img src='/org/img/icon_my6.png'>")
    
    //월간수행기록이란?
    $('.my .calendar .info').click(function(){
        $(this).children('.i_info').toggleClass('on');
    });


    //얼마나 좋아졌나요?
    $('.myh .rbtns').each(function(data,index){
        $('.myh .rbtns').data('click', true);
    });
    $('.myh .rbtns').click(function(){
        if($(this).data('click')){
            $('.myh .rbtns .gray').removeClass('on');
            $('.myh .rbtns .blue').addClass('on');

            $(this).children('img').removeClass('on');
            $(this).children('.gray').addClass('on');

            $('.myh .rbtns').data('click', true);
            $(this).data('click', false);
        }else{
            $('.myh .rbtns .gray').removeClass('on');
            $('.myh .rbtns .blue').addClass('on');
            $('.myh .rbtns').data('click', true);
        }
    });


    //함께 운동하기 (together.php)
    $('.tg1 .menu_li').click(function(){
        $('.tg1 .menu_li').removeClass('on');
        $(this).addClass('on');

        $('.tg1 .tab').removeClass('on');
        $('.tg1 .tab').eq($(this).index()).addClass('on');
    });
    $('.tg1 .b_menu .b_h3').click(function(){
        $('.tg1 .b_menu .b_h3').removeClass('on');
        $(this).addClass('on');

        $('.tg1 .b_tab').removeClass('on');
        $('.tg1 .b_tab').eq($(this).index()).addClass('on');

        if($(this).index() == "1"){
            $(this).parent().next('.b_right').removeClass('on');
        }else{
            $(this).parent().next('.b_right').addClass('on');
        }
    });

    //내 게시글 삭제후 리스트보면 자유게시판으로
    //1:1문의 후 자유게시판으로
    var pageLink = 'http://breathing.webadsky.net'

    var referrer = document.referrer;
    if(referrer == pageLink + '/org/comm_sub_my.php' || referrer == pageLink + '/org/comm_inq_ok.php'){
        $('.tg1 .menu_li').removeClass('on');
        $('.tg1 .menu_li').eq(1).addClass('on');
        $('.tg1 .tab').removeClass('on');
        $('.tg1 .tab').eq(1).addClass('on');
    }


    //함께 운동하기 > 검색 > 검색어 초기화
    $('.tg_sc .reset').click(function(){
        $(this).prev('.s_input').val('');
        $('.tg_sc .s_con .no_list').addClass('on');
        $('.tg_sc .s_con .yes_list').removeClass('on');
    });

    //함께 운동하기 > 검색 > 검색어 입력하면
    $('.tg_sc .s_input').change(function(){
        $('.tg_sc .s_con .no_list').removeClass('on');
        $('.tg_sc .s_con .yes_list').addClass('on');
    });


    //내 댓글 수정 > 완료
    $('.comp').click(function(){
        location.href='comm_sub.php';
    });
    //내 게시글 수정 > 완료
    $('.comp2').click(function(){
        location.href='comm_sub_my.php';
    });


    //설정 > 알림설정 아이콘 클릭시
    $('.set .info_btn').click(function(){
        $('.setpop').addClass('on');
    });

    //설정 > 프로필수정 > 수정 클릭시
    $('.set1_ed').click(function(){
        location.href='set_1_edit.php';
    });
    //프로필수정 후 확인 클릭시
    $('.set1_sv').click(function(){
        history.go(-1);
    });

    //설정 > 나의 건강정보 > 수정 클릭시
    $('.set2_1_ed').click(function(){
        location.href='set_2_1_edit.php';
    });
    //설정 > 나의 건강정보 > 확인 클릭시
    $('.set2_1_sv').click(function(){
        history.go(-1);
    });

    //설정 > 나의 활동내역
    $('.set .menu').click(function(){
        $('.set .menu').removeClass('on');
        $(this).addClass('on');

        $('.set .pd15 .tab').removeClass('on');
        $('.set .pd15 .tab').eq($(this).index()).addClass('on');
    });

    //설정 > 차단목록 관리 > 차단해제
    $('.set .line .c_btn').click(function(){
        $('.com2').addClass('on');
        $('.com2 .con_p').html("해당 사용자의 차단을<br>해제하시겠습니까?");
        $('.com2 .btn2').text("차단해제");
    });
    $('.com2 .btn1').click(function(){
        $('.com2').removeClass('on');
    })
    //차단해제 팝업에서 "차단해제" 클릭
    $('.com2 .btn2').click(function(){
        if($(this).text() == "차단해제"){
            location.href='set_2_3.php';
        }
    });
    
    //앱에 대해서
    $('.set4 .swiper-slide').click(function(){
        $('.set4 .swiper-slide').removeClass('on');
        $(this).addClass('on');

        $('.set4 .pd15 .tab').removeClass('on');
        $('.set4 .pd15 .tab').eq($(this).index()).addClass('on');
    });

    //비밀번호 변경(set_5_1.php)
    $('.set5 .next_btn').click(function(){
        $('.com').addClass('on');
        $('.com .con_p').html('비밀번호가 변경되었습니다.');

        //현재 비밀번호 틀렸을때
        //$('.com .con_p').html('현재 비밀번호를<br>정확하게 입력해 주세요.');

        //새 비밀번호 잘못입력시
        //$('.com .con_p').html('새 비밀번호를<br>정확하게 입력해 주세요.');
    });

    //복약시간 알림
    $('.set .s_right .btn1').click(function(){
        location.href='set_time.php'
    });


    $('.set .s_right .btn2').click(function(){
        $('.set .a_box').addClass('del');
        $('.s_right').removeClass('on');
        $('.set .btn_fixed').addClass('on');
    });


    // $('.set .a_box').click(function(){
    //     if($(this).hasClass('del')){
    //         return false;
    //     }
    // });

    //알림 > 삭제 > 취소 누르면
    $('.set .btn_fixed .d_btn1').click(function(){
        $('.set .a_box').removeClass('del');
        $('.s_right').addClass('on');
        $('.set .btn_fixed').removeClass('on');
        $('.set input[name="alarm"]').prop("checked", false);
    });

    //알림 > 삭제 > 삭제 누르면
    $('.set .btn_fixed .d_btn2').click(function(){
        $('.set .a_box').removeClass('del');
        $('.s_right').addClass('on');
        $('.set .btn_fixed').removeClass('on');
        $('.set input[name="alarm"]').prop("checked", false);
    });


    //병원 일정 추가
    $('.set7 #add_sc').change(function(){
        $('.set7 .next_btn').addClass('on');
    });
    $('.set7 .next_btn').click(function(){
        if($(this).hasClass('on')){
            location.href='set_7.php';
        }
    });



});

//최대글자수 제한 (join3.php)
function num_maxLength(e){
    if(e.value.length > e.maxLength){
        e.value = e.value.slice(e, e.maxLength);
    }
}