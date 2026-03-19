<?php

global $g4;
include './_common.php';

$nums = $_POST['nums'];
$delimiter = $_POST['delimiter'];
$timePart1Temp = $_POST['timePart1Temp'];
$timePart2Temp = $_POST['timePart2Temp'];
$timePart3Temp = $_POST['timePart3Temp'];
$ss_mb_id = $_SESSION["ss_mb_id"];

if($delimiter == "add"){

    $REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];

    $times2 = $timePart2Temp." : ".$timePart3Temp;


    $outs = sql_fetch_array(sql_query("select count(*) as cnt FROM g5_alarm_info where times1 = '$timePart1Temp' and times2 = '$times2'"));

    if($outs['cnt'] != 0){
        echo "repeat";
        exit;
    }

    $insert1 = sql_query("insert into g5_alarm_info (times1,times2,kinds,mb_id,mb_ip,mb_write_time) values ('$timePart1Temp','$times2','$nums','$ss_mb_id','$REMOTE_ADDRS',now())");

    if($insert1 == true){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($delimiter == "modify"){

    $thisnum = $_POST['thisnum'];
    $thisnumStr = $_POST['thisnumStr'];
    $countnum = $_POST['countnum'];

    $update1 = sql_query("update g5_alarm_info set uses = '$thisnumStr' where mb_no = '$thisnum' ");

echo $thisnumStr."-".$countnum;




}
else if($delimiter == "delete"){


    $strS = $_POST['strS'];

    if($strS == ""){
        echo "false";
    }
    else{


        $strS_buri = explode("-",$strS);
        $strS_buri_count = count($strS_buri);


        for($i=0; $i<$strS_buri_count; $i++){

            $strS_buri_i = $strS_buri[$i];

            if($strS_buri_i != ""){


                $delete1 = sql_query("delete from g5_alarm_info where mb_no = '$strS_buri_i'");


            }


        }


    }

    echo "ok";

}
else if($delimiter == "change_time"){
    $times2 = $timePart2Temp." : ".$timePart3Temp;

    $sql = "UPDATE `g5_alarm_info` SET `times2` = '{$times2}' WHERE `mb_no` = '{$_REQUEST['mb_no']}'";
    sql_query($sql);
    
    echo "ok";
}
else{
    echo "false";
}

?>