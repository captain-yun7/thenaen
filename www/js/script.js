
var TempJoinEmailStr = "";
var TempJoinEmailStrAuthNum = 0;
var TempNicknameCheck = 0;

function emailFoucusOut(){ // 이메일 중복체크

    resultR = "";

    user_email = $("#user_email").val();

    if(fn_emailChkF(user_email) == true){

        //console.log(user_email);

        $.ajax({
            type: "POST",
            url: "/bbs/certification_ajax.php",
            async:false,
            data: {
                nums: 8,
                getEmail : user_email,
            },
            dataType: "text",
            success: function (result) {

                //console.log("emailFoucusOut="+result);
                resultR = result;

                 if(result == "ok"){
                     TempJoinEmailStrAuthFisrtNum = 1; // 첫번째 화면 인증 됨
                 }

            }
        });

    }
    else{
        alert("메일 형식이 아닙니다.");
    }

    return resultR;

}

// 메일 형식 체크
function fn_emailChkF(email){
    var regExp = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.[a-zA-Z]{2,4}$/;
    if(!regExp.test(email)){
        alert("이메일 형식이 아닙니다.");
        return false;
    }
    return true;
}

// 비밀번호(영문+숫자 8~16자 조합) 체크
function CheckPassF(str){
    var reg1 = /^[a-z0-9!~@#$%^&*()?+=\/]{8,16}$/;
    var reg2 = /[a-z]/g;
    var reg3 = /[0-9]/g;
    //var reg4 = /[!~@#$%^&*()?+=\/]/g;
    //return(reg1.test(str) &&  reg2.test(str) && reg3.test(str) && reg4.test(str));
    return(reg1.test(str) &&  reg2.test(str) && reg3.test(str));
}

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


    function setButtonRemove(){

        $("#next_btn_first").removeClass( 'on' );


        setTimeout(function(){
            setButtonRemove2();
        },1000)

    }

    function setButtonRemove2(){


        user_email = $("#user_email").val();

        if(user_email == ""){
            alert("이메일을 입력하세요.");
        }
        else {

            if(TempJoinEmailStrAuthFisrtNum == 0) { // 이메일 인증하기 버튼 클릭전 이메일 중복확인

                if(TempJoinEmailStrAuthFisrtNum == 0){
                    resultR = emailFoucusOut();

                    //console.log("emailFoucusOut="+resultR);

                    if(resultR == "ok"){
                        TempJoinEmailStrAuthFisrtNum = 1;

                    }
                    else{
                        alert("중복된 이메일 입니다.");
                        TempJoinEmailStrAuthFisrtNum = 0;
                        $("#next_btn_first").removeClass( 'on' );

                        return;
                    }
                }

            }



            //console.log("this2");

            //if($(this).hasClass('on')){
            //console.log("this1");
            TempJoinEmailStr = user_email;
            //.log(fn_emailChkF(TempJoinEmailStr));

            if(fn_emailChkF(TempJoinEmailStr) == true){



                $.ajax({
                    type: "POST",
                    url: "/bbs/certification_ajax.php",
                    async:false,
                    data: {
                        nums: 1,
                        sendEmail : TempJoinEmailStr,
                        varjavauser_nick : varjavauser_nick,
                        varjavauser_email : varjavauser_email,
                        varjavauser_id : varjavauser_id,
                        varjavauser_phone : varjavauser_phone,

                    },
                    dataType: "text",
                    success: function (result) {



                        if(result == "false"){
                            alert("인증메일이 발송되지 않았습니다.");
                        }
                        else{
                            location.href='join3.php?email='+TempJoinEmailStr;
                        }

                    }
                });

            }
            else{
                alert("메일 형식이 아닙니다.");
                $("#user_email").val("");
            }
            //}
        }
    }


    $('.j2 .next_btn').click(function(){
        setButtonRemove();
    });

    //회원가입 > 비밀번호 입력해야 버튼 활성화
    $('.j4 #user_pw2').change(function(){
        $('.j4 .next_btn').addClass('on');
    });
    $('.j4 .next_btn').click(function(){

        user_pw = $("#user_pw").val();
        user_pw2 = $("#user_pw2").val();

        result = CheckPassF(user_pw);

        if(result == true){
            if(user_pw == user_pw2){

                if(fn_emailChkF(getEmail) == true){

                    $.ajax({
                        type: "POST",
                        url: "/bbs/certification_ajax.php",
                        data: {
                            nums: 3,
                            getEmail : getEmail,
                            user_pw2 : user_pw2,
                        },
                        dataType: "text",
                        success: function (result) {

                            if(result == "ok"){
                                //if($(this).hasClass('on')){
                                    location.href='join_info1.php?email='+getEmail;
                                //}
                            }

                        }
                    });

                }
                else{
                    alert("메일 형식이 아닙니다.");
                    $("#user_email").val("");
                }

            }
            else{
                alert("비밀번호와 비밀번호 확인이 서로 다릅니다.");
            }

        }
        else{
            alert("비밀번호(영문+숫자 8~16자 조합) 을 맞추시기 바랍니다.");
        }

    });

    //내 정보 입력 > 안정시 심박수 입력하면 버튼 활성화
    $('.ji1 #rate').change(function(){
        $('.ji1 .next_btn').addClass('on');
    });
    $('.ji1 .next_btn').click(function(){

        gender = $('input[name=gender]:checked').val();
        age = $("#age").val();
        height = $("#height").val();
        weight = $("#weight").val();
        rate = $("#rate").val();

        if(age == ""){
            alert("나이를 입력하세요");
            $("#age").focus();
            return
        }

        if(height == ""){
            alert("키를 입력하세요");
            $("#height").focus();
            return
        }

        if(weight == ""){
            alert("몸무게를 입력하세요");
            $("#weight").focus();
            return
        }

        if(rate == ""){
            alert("안정시 심박수를 입력하세요");
            $("#rate").focus();
            return
        }

        if(fn_emailChkF(getEmail) == true){

            $.ajax({
                type: "POST",
                url: "/bbs/certification_ajax.php",
                data: {
                    nums: 4,
                    gender : gender,
                    age : age,
                    height : height,
                    weight : weight,
                    rate : rate,
                    getEmail : getEmail,
                },
                dataType: "text",
                success: function (result) {

                    if(result == "ok"){
                        location.href='join_info2.php?email='+getEmail;
                    }

                }
            });

        }
        else{
            alert("메일 형식이 아닙니다.");
            $("#user_email").val("");
        }

    });

    //내 정보 입력 > 호흡기질환 입력하면 버튼 활성화
    $('.ji2 #dis').change(function(){
        $('.ji2 .next_btn').addClass('on');
    });
    $('.ji2 .next_btn').click(function() {

        dis = $('#diss').val();
        if(dis == ""){
            alert("질환을 입력하세요");
            $("#diss").focus();
            return
        }

        dis_length = dis.length;
        //console.log(dis_length);

        if(dis_length < 2){
            //console.log("false");
            return;
        }

        if(fn_emailChkF(getEmail) == true){

            $.ajax({
                type: "POST",
                url: "/bbs/certification_ajax.php",
                async:false,
                data: {
                    nums: 5,
                    dis : dis,
                    getEmail : getEmail,
                },
                dataType: "text",
                success: function (result) {

                    if(result == "ok"){
                        location.href='join_info3.php?email='+getEmail;
                    }

                }
            });

        }
        else{
            alert("메일 형식이 아닙니다.");
            $("#user_email").val("");
        }

    });

    //내 정보 입력 > 활동하실 닉네임 입력
    $('.ji3 #nickname').change(function(){
        $('.ji3 .next_btn').addClass('on');
    });
    //내 정보 입력 > 닉네임 입력 후 중복확인
    $('.ji3 .c_btn').click(function(){

        nickname = $('#nickname').val();

        if(nickname == "") {
            alert("닉네임을 입력하세요.");
            //$('.ji3 .r_div').removeClass('on');
            $("#nickname").focus();
            return
        }

        $.ajax({
            type: "POST",
            url: "/bbs/certification_ajax.php",
            data: {
                nums: 7,
                nickname : nickname,
            },
            dataType: "text",
            success: function (result) {

                if(result == "ok"){
                    TempNicknameCheck = 1;
                    $('.ji3 .rb1').removeClass('on');
                    $('.ji3 .rb2').addClass('on');
                    $('.ji3 .rb3').removeClass('on');
                }
                else{
                    TempNicknameCheck = 0;
                    $('.ji3 .rb1').removeClass('on');
                    $('.ji3 .rb2').removeClass('on');
                    $('.ji3 .rb3').addClass('on');
                }

            }
        });

    });
    //내 정보 입력 > 닉네임 입력 후 버튼누름
    $('.ji3 .next_btn').click(function(){

        nickname = $('#nickname').val();

        if(nickname == "") {
            alert("닉네임을 입력하세요.");
            $("#nickname").focus();
            return
        }

        if(fn_emailChkF(getEmail) == true){

            $.ajax ({
                type: "POST",
                url: "/bbs/certification_ajax.php",
                data: {
                    nums: 7,
                    nickname : nickname,
                    getEmail : getEmail,
                },
                dataType: "text",
                success: function (result) {

                    if(result == "ok"){

                        if(TempNicknameCheck == 1){
                            location.href = '/bbs/register_form.php?email='+getEmail;
                        }
                        else{
                            alert("닉네임 중복확인을 확인하세요.");
                        }

                    }

                }
            });

        }
        else{
            alert("메일 형식이 아닙니다.");
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
        //$('.expop').removeClass('on');



        before1 = $("#before1").val();
        before2 = $("#before2").val();

        if(before1 == ""){
            alert('산소포화도를 입력하세요.');
            $("#before1").focus();
            return
        }

        if(before2 == ""){
            alert('심장 박동수를 입력하세요.');
            $("#before2").focus();
            return
        }






        $.ajax ({
            type: "POST",
            url: "/bbs/workout_ajax.php",
            data: {
                delimiter: "workoutdaysave",
                before1 : before1,
                before2 : before2,
            },
            dataType: "text",
            success: function (result) {

                if(result == "ok"){

                    $('.expop').removeClass('on');

                }

            }
        });







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
    $('.my .table .icon1').html("<img src='/img/icon_my1.png'>")
    $('.my .table .icon2').html("<img src='/img/icon_my2.png'>")
    $('.my .table .icon3').html("<img src='/img/icon_my3.png'>")
    $('.my .table .icon4').html("<img src='/img/icon_my4.png'>")
    $('.my .table .icon5').html("<img src='/img/icon_my5.png'>")
    $('.my .table .icon6').html("<img src='/img/icon_my6.png'>")
    
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
    var pageLink = 'https://jhw2bum.mycafe24.com'

    var referrer = document.referrer;
    if(referrer == pageLink + '/comm_sub_my.php' || referrer == pageLink + '/comm_inq_ok.php'){
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
        //location.href='comm_sub.php';
    });
    //내 게시글 수정 > 완료
    $('.comp2').click(function(){
        //location.href='comm_sub_my22.php';
    });


    //설정 > 알림설정 아이콘 클릭시
    $('.set .info_btn').click(function(){
        $('.setpop').addClass('on');
    });

    //설정 > 프로필수정 > 수정 클릭시
    $('.set1_ed').click(function(){

        user_nick = $("#user_nick").val();

        $("#nickSend").val(user_nick);

        $("#set_1_edit_f_id").submit();


        //location.href='set_1_edit.php';
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
        //history.go(-1);

        gender = $('input[name=gender]:checked').val();
        age= $("#age").val();
        height= $("#height").val();
        weight= $("#weight").val();
        disease= $("#disease").val();

        gender = encodeURIComponent(gender);
        age = encodeURIComponent(age);
        height = encodeURIComponent(height);
        weight = encodeURIComponent(weight);
        disease = encodeURIComponent(disease);



        $.ajax({
            type: "POST",
            url: "/bbs/certification_ajax.php",

            data: {
                nums: 11,
                gender : gender,
                age : age,
                height : height,
                weight : weight,
                disease : disease,
            },
            dataType: "text",
            success: function (result) {



                if(result == "ok"){
                    alert("건강 정보를 수정하였습니다.");
                    return;
               }

            }
        });





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
            //location.href='set_2_3.php';

            if(com2_btn2_var != ""){ // 차단 해제할 번호 체크

                $.ajax({
                    type: "POST",
                    url: "/bbs/certification_ajax.php",

                    data: {
                        nums: 12,
                        com2_btn2_var : com2_btn2_var,
                    },
                    dataType: "text",
                    success: function (result) {

                        if(result == "ok"){

                            alert("차단해제 되었습니다.");

                            location.href = './set_2_3.php';

                            return;
                        }

                    }
                });

            }

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
        //$('.com').addClass('on');
        //$('.com .con_p').html('비밀번호가 변경되었습니다.');

        // now_pw = $("#now_pw").val();
        new_pw = $("#new_pw").val();
        new_pw2 = $("#new_pw2").val();

        // if(now_pw == ""){
        //     $('.com').addClass('on');
        //     $('.com .con_p').html('현재 비밀번호를 입력하세요.');
        // }

        if(new_pw == ""){
            $('.com').addClass('on');
            $('.com .con_p').html('새 비밀번호를 입력하세요.');
        }

        if(new_pw2 == ""){
            $('.com').addClass('on');
            $('.com .con_p').html('새 비밀번호 확인을 입력하세요.');
        }

        new_pw_check_return = CheckPassF(new_pw);
        new_pw2_check_return = CheckPassF(new_pw2);

        if(new_pw_check_return != true){
            $('.com').addClass('on');
            $('.com .con_p').html('새 비밀번호(영문+숫자 8~16자 조합) 형식을 확인하세요.');
            return;
        }

        if(new_pw2_check_return != true){
            $('.com').addClass('on');
            $('.com .con_p').html('새 비밀번호 확인 (영문+숫자 8~16자 조합) 형식을 확인하세요.');
            return;
        }

        if(new_pw != new_pw2){
            $('.com').addClass('on');
            $('.com .con_p').html('새 비밀번호 와 새 비밀번호가 다릅니다.');
            return;
        }

        new_pw = encodeURIComponent(new_pw);
        new_pw2 = encodeURIComponent(new_pw2);

        $.ajax({
            type: "POST",
            url: "/bbs/certification_ajax.php",
            data: {
                nums: 13,
                new_pw : new_pw,
                new_pw2 : new_pw2,
            },
            dataType: "text",
            success: function (result) {

                if(result == "ok"){
                    $('.com').addClass('on');
                    $('.com .con_p').html('비밀번호가 변경 되었습니다.');

                    location.href = './set_5.php';
                }

            }
        });


        //현재 비밀번호 틀렸을때
        //$('.com .con_p').html('현재 비밀번호를<br>정확하게 입력해 주세요.');

        //새 비밀번호 잘못입력시
        //$('.com .con_p').html('새 비밀번호를<br>정확하게 입력해 주세요.');
    });




    //복약시간 알림
    $('.set .s_right .btn1').click(function(){

        if(alarm_add_de_temp == 1){ // 복약시간 알림
            location.href='set_time.php?nums=1';
        }
        else if(alarm_add_de_temp == 2){ // 병원일정 알림
            location.href='set_time.php?nums=2';
        }
        else if(alarm_add_de_temp == 3){ // 운동시간 알림
            location.href='set_time2.php?nums=3';
        }
        else{
            location.href='set_time.php?nums=1';

        }

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
        // $('.set .a_box').removeClass('del');
        // $('.s_right').addClass('on');
        // $('.set .btn_fixed').removeClass('on');
        // $('.set input[name="alarm"]').prop("checked", false);


        strS = "";

        for(i=0; i<sumCount; i++){




            if($('#alarm1_'+i).prop('checked') == true){


                strS += "-"+$('#alarm1_'+i).val();
            }
            else {

            }




        }







        $.ajax({
            type: "POST",
            url: "/bbs/alarm_ajax.php",
            data: {
                delimiter: "delete",
                strS : strS,
            },
            dataType: "text",
            success: function (result) {

                page_path = window.location.pathname;

                if(result == "ok") {

                    if(page_path == "/set_8.php"){
                        location.href = "set_8.php";
                    }
                    else{
                        location.href = "set_6.php";
                    }



                }

            }
        });





    });


    //병원 일정 추가
    $('.set7 #add_sc').change(function(){
        $('.set7 .next_btn').addClass('on');
    });
    $('.set7 .next_btn').click(function(){
        if($(this).hasClass('on')){
            //location.href='set_7.php';
        }
    });



});

var com2_btn2_var = 0;

function com2_btn2_varF(str){
    com2_btn2_var = str;
}

//최대글자수 제한 (join3.php)
function num_maxLength(e){
    if(e.value.length > e.maxLength){
        e.value = e.value.slice(e, e.maxLength);
    }
}

var alarm_add_de_temp = "";

function alarm_add_de_tempF(str){
    alarm_add_de_temp = str;
}