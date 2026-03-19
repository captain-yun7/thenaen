<? if($footer['is_footer']) { ?>

    <footer class="footer">
        <a href="index.php" class="f_a <?=$footer['page'] == 'home' ? 'on' :''?>">
            <img src="/img/f_menu1<?=$footer['page'] == 'home' ? '_on' :''?>.png" alt="홈">
            <div class="f_txt">홈</div>
        </a>
        <a href="my.php" class="f_a <?=$footer['page'] == 'my' ? 'on' :''?>">
            <img src="/img/f_menu2<?=$footer['page'] == 'my' ? '_on' :''?>.png" alt="나의 재활일지">
            <div class="f_txt">나의 재활일지</div>
        </a>
        <a href="comm.php" class="f_a <?=$footer['page'] == 'comm' ? 'on' :''?>">
            <img src="/img/f_menu3<?=$footer['page'] == 'comm' ? '_on' :''?>.png" alt="함께 운동하기">
            <div class="f_txt">함께 운동하기</div>
        </a>
        <a href="set.php" class="f_a <?=$footer['page'] == 'set' ? 'on' :''?>">
            <img src="/img/f_menu4<?=$footer['page'] == 'set' ? '_on' :''?>.png" alt="설정">
            <div class="f_txt">설정</div>
        </a>
    </footer>

    <? }else { ?>

        <footer></footer>

   <? } ?>

</body>
</html>