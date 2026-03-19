<?
$header = array(
    'is_header' => true,
    'head_name' => '일정추가', //제목 수정
    'right_menu' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<?include("set7_datepop.php")?>

<style>
/*=================▼ 병원일정 부분 추가됨==================*/
input[type="date"]::-webkit-inner-spin-button,
input[type="date"]::-webkit-calendar-picker-indicator {display: none;-webkit-appearance: none;}
table {border-collapse: inherit; border-spacing: 0;}

.set7 .date {border: none; color: #4683D2; font-size: 4.1667vw; font-weight: 500; width: 29.1667vw; appearance: none; background: url("/org/img/icon_cal.png") no-repeat center right / 3.6111vw;}
.set7 .date_area {margin-bottom: 1.3889vw;}


/*달력*/
.datepop .white_bg {width: 91.6667vw; border-radius: 2.7778vw;}
.datepop .white_bg .p_h2 {font-size: 4.7222vw; font-weight: 500; padding-top:5.5556vw; box-sizing: border-box; text-align: center;}

.s7cal .calendar .cal_bot .th {font-size: 2.7778vw;}
.s7cal .calendar .cal_bot .tr .td {font-size: 3.0556vw; height: 11.1111vw; cursor: pointer;}
.s7cal .calendar .cal_top .ct2 .d_btns {color: #ACACAC; font-size: 3.0556vw;}
.s7cal .calendar .cal_top .ct2 .mg {margin: 0 3.3333vw;}

.datepop .btn_area {padding: 0 4.1667vw; box-sizing: border-box; margin-bottom: 5.5556vw;}
.datepop .btn_area .pop_btn {font-size: 4.1667vw; color: #fff; padding: 3.0556vw 0; box-sizing: border-box; width: 100%; background: #4683D2; border-radius: 2.7778vw;}


/*=================▲ 병원일정 부분 추가됨==================*/
</style>




<section class="set set7">

    <div class="pd15">
        <form>
            <div class="block">
                <label for="add_sc" class="a_lab">일정추가</label>
                <div class="date_area">
                    <input type="date" name="date" id="date" class="date" value="2023-03-22">
                </div>
                <input type="text" name="add_sc" id="add_sc" class="text" placeholder="OOO병원 채혈">
            </div>

            <div class="b_sub">
                예정되어 있는 OOO병원 채혈 / CT검사 / 호흡기내과
                외래진료 / 재활치료 예약 등의 내용을 입력하세요
            </div>

            <div class="push">
                <div class="p_top">
                    <label for="push" class="p_lab vt_mid">푸시알림 받기</label>
                    <input type="checkbox" name="push" id="push" class="toggle vt_mid">
                </div>
                <div class="p_bot">
                    예약된 일정의 이틀 전 오전 10시에 알림을 제공합니다.
                </div>
            </div>

            <div class="btn_fixed">
                <button type="button" class="next_btn">저장</button>
            </div>
        </form>
    </div>

</section>

<script>
    $('.set7 .date').click(function(){
        $('.datepop').addClass('on');
    });

    $('.datepop .td').click(function(){
        if($(this).hasClass('prev')){

        }else if($(this).hasClass('next')){

        }else{
            $('.datepop .td').removeClass('on');
            $(this).addClass('on');
        }
    });
</script>

<?include('footer.php')?>