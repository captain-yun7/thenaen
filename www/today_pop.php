


<div class="pop tdpop on" id="pop_tdpop_on">
    <div class="black_bg"></div>
    <div class="white_bg">
        <h2 class="p_h2">
            <?=$g5_member_mb_name?>님,<br>
            어제보다 더 나은 호흡이 되기를 바라며<br>
            오늘의 재활운동을 시작해보세요!
        </h2>

        <h3 class="p_h3">오늘의 운동강도 설정하기</h3>
        <select name="intensity" id="intensity" class="select">
            <option value="저강도 운동" <?php if($common_nowdate_prev_info['mainworkoutinfo'] == '저강도 운동'){ echo 'selected'; }?>>저강도 운동</option>
            <option value="중강도 운동" <?php if($common_nowdate_prev_info['mainworkoutinfo'] == '중강도 운동'){ echo 'selected'; }?>>중강도 운동</option>
            <option value="고강도 운동" <?php if($common_nowdate_prev_info['mainworkoutinfo'] == '고강도 운동'){ echo 'selected'; }?>>고강도 운동</option>
        </select>

        <div class="img_area">
            <img src="/img/tdpop_img.png" alt="운동강도 설정하기">
        </div>

        <div class="close_area">
            <input type="checkbox" name="td_close" id="td_close" class="ckbox2" onChange = 'main_day_check_popup_showhide()'>
            <label for="td_close" class="td_lab">하루동안 보지 않기</label>
        </div>

        <div class="td_btnarea">
            <button type="button" class="td_btn" onClick = 'main_day_select_save()'>닫기</button>
        </div>
    </div>
</div>