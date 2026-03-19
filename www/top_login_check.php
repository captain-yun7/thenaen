<?php

// 로그인 여부
if($_SESSION[ 'ss_mb_id' ] == ""){
    header("location: /login.php");
    exit;
}

?>