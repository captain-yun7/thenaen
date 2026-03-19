<?php


include_once('./_common.php');

include "./top_login_check.php";

$ss_mb_id = $_SESSION["ss_mb_id"];


$delimiter = $_POST['delimiter'];

$intensity = $_POST['intensity'];

$REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];

if($delimiter == "daysave"){ // 메인 처음 접할때 강도 정보 운동 저장

    $insert1 = sql_query("insert into g5_work_info (mainworkoutinfo,kinds,mb_id,mb_ip,mb_write_time) values ('$intensity','main','$ss_mb_id','$REMOTE_ADDRS',now())");

    if($insert1 == true){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($delimiter == "workoutdaysave"){

    $before1 = $_POST['before1'];
    $before2 = $_POST['before2'];

    $insert1 = sql_query("insert into g5_work_info (sanfo,heartnum,kinds,mb_id,mb_ip,mb_write_time) values ('$before1','$before2','mainworkout','$ss_mb_id','$REMOTE_ADDRS',now())");

    if($insert1 == true){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($delimiter == "getHowfellgood"){

    $popupOpenVarSave1 = $_POST['popupOpenVarSave1'];
    $popupOpenVarSave2 = $_POST['popupOpenVarSave2'];

    if(strlen($popupOpenVarSave2) == 1){
        $popupOpenVarSave2 = "0".$popupOpenVarSave2;
    }

    $popupOpenVarSave3 = $_POST['popupOpenVarSave3'];

    if(strlen($popupOpenVarSave3) == 1){
        $popupOpenVarSave3 = "0".$popupOpenVarSave3;
    }



    $popupOpenVarSaveSum = $popupOpenVarSave1."-".$popupOpenVarSave2."-".$popupOpenVarSave3;

    $yoil = array("일","월","화","수","목","금","토");
    $yoil_str = ($yoil[date('w', strtotime($popupOpenVarSaveSum))]);

    $return_str_sum = "";

    $outs = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'mainworkout' and mb_id = '$ss_mb_id' and mb_write_time like '%$popupOpenVarSaveSum%'"));


    $rs = sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,2");

    $return_str_sum = $outs['sanfo']."-".$outs['heartnum']."(1)";

    $ii = 0;
    while($serach_outs = sql_fetch_array($rs)){

        $return_str_sum .= "-".$serach_outs['WOingsanfo'];
        $return_str_sum .= "-".$serach_outs['WOingMheartnum'];

        $return_str_sum .= "-".$serach_outs['usualHeartnumarea'];
        $return_str_sum .= "-".$serach_outs['nowusualmysanfo'];

        $ii++;
    }





//    $serach_outs = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and breathReWorkout = 'myh1_1_on-myh1_2_on-myh1_3_on' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,1"));
//
//    if($serach_outs['mb_no'] != ""){ // 3개다 체크 되었을때..
//
//        //echo "3 개 클릭";
//        //echo "<br>";
//
//        $return_str_sum = $outs['sanfo'];
//        $return_str_sum .= "-".$outs['heartnum'];
//        $return_str_sum .= "-".$serach_outs['WOingMheartnum'];
//        $return_str_sum .= "-".$serach_outs['usualHeartnumarea']."-".$popupOpenVarSaveSum."-".$yoil_str;
//
//
//    }
//    else{ // 2개 씩 체크가 되었는지 체크
//
//        $serach_outs2 = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and breathReWorkout = 'myh1_1_on-myh1_2_on-' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,1"));
//
//        if($serach_outs2['mb_no'] != "") { // 2 개중 1,2 번째 체크 되었을시
//            //echo "2 개 클릭 1,2 만";
//            //echo "<br>";
//
//            $return_str_sum = $outs['sanfo'];
//            $return_str_sum .= "-".$outs['heartnum'];
//            $return_str_sum .= "-".$serach_outs2['WOingMheartnum'];
//
//            $serach_outs2_1 = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and breathReWorkout = '--myh1_3_on' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,1"));
//
//            if($serach_outs2_1['usualHeartnumarea'] != ""){
//                $return_str_sum .= "-".$serach_outs2_1['usualHeartnumarea']."-".$popupOpenVarSaveSum."-".$yoil_str;
//            }
//            else{
//                $return_str_sum .= "-0-0-".$popupOpenVarSaveSum."-".$yoil_str;
//            }
//
//        }
//        else{
//
//            $serach_outs3 = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and breathReWorkout = '-myh1_2_on-myh1_3_on' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,1"));
//
//            if($serach_outs3['mb_no'] != "") { // 2 개중 3,4 번째 체크 되었을시
//                //echo "2 개 클릭 2,3 만";
//                //echo "<br>";
//
//                $return_str_sum = $outs['sanfo'];
//                $return_str_sum .= "-".$outs['heartnum'];
//
//                $serach_outs3_1 = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and breathReWorkout = 'myh1_1_on--' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,1"));
//
//                if($serach_outs3_1['WOingMheartnum'] != ""){
//                    $return_str_sum .= "-".$serach_outs3_1['WOingMheartnum'];
//                }
//                else{
//                    $return_str_sum .= "-0";
//                }
//
//                $return_str_sum .= "-".$serach_outs3['usualHeartnumarea']."-".$popupOpenVarSaveSum."-".$yoil_str;
//
//            }
//            else{
//
//                //echo "그럼 각각 따로다.";
//                //echo "<br>";
//
//                $return_str_sum = $outs['sanfo'];
//                $return_str_sum .= "-".$outs['heartnum'];
//
//                $outs2 = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and breathReWorkout = '-myh1_2_on-' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,1"));
//
//                if($outs2 != $outs2['WOingMheartnum']){
//                    $return_str_sum .= "-".$outs2['WOingMheartnum'];
//                }
//                else{
//                    $return_str_sum .= "-0";
//                }
//
//                $outs3 = sql_fetch_array(sql_query("select * FROM g5_work_info where kinds = 'safeworkoutyou' and mb_id = '$ss_mb_id' and breathReWorkout = '--myh1_3_on' and mb_write_time like '%$popupOpenVarSaveSum%' order by mb_no desc limit 0,1"));
//
//                if($outs3['usualHeartnumarea'] != ""){
//                    $return_str_sum .= "-".$outs3['usualHeartnumarea']."-".$popupOpenVarSaveSum."-".$yoil_str;
//                }
//                else{
//                    $return_str_sum .= "-0-0-".$popupOpenVarSaveSum."-".$yoil_str;
//                }
//            }
//        }
//}

    echo $return_str_sum."(2)".$popupOpenVarSaveSum."-".$yoil_str;

}
else if($delimiter == "moveTimeSave"){

    $timeSaveMovie = $_POST['timeSaveMovie'];
    $startPlayKey = $_POST['startPlayKey'];
    $endPlayKey = $_POST['endPlayKey'];
    $playTimeCount = $_POST['playTimeCount'];
    $kinds = $_POST['kinds'];
    $movieName = $_POST['movieName'];

    $kinds_str = "";
    if($kinds == 1){
        $kinds_str = "지구력 운동";
    }
    else if($kinds == 2){
        $kinds_str = "인터벌 운동";
    }
    else if($kinds == 3){
        $kinds_str = "저항/근력 운동";
    }
    else if($kinds == 4){
        $kinds_str = "호흡근 운동";
    }
    else if($kinds == 5){
        $kinds_str = "유연성 운동";
    }
    else if($kinds == 6){
        $kinds_str = "기침보조 운동";
    }

    $REMOTE_ADDRS = $_SERVER["REMOTE_ADDR"];
    $nowdate = date("Y-m-d");

    $outs_moveTimeSave = sql_fetch_array(sql_query("select mb_no,playTimeCount FROM g5_exercise_sub_moveingTime where startPlayKey = '1' and mb_write_time like '%$nowdate%' and kinds = '$kinds_str' and movieName = '$movieName' and mb_id = '$ss_mb_id' ORDER BY mb_no DESC limit 0,1"));

    $outs_moveTimeSave_mb_no = $outs_moveTimeSave['mb_no'];
    $outs_playTimeCount = $outs_moveTimeSave['playTimeCount'];

    if($startPlayKey == 1){ // 시작 눌렀을때 ..

        if($outs_moveTimeSave_mb_no == "") { // 스타트 누르고 계속진행일때
            $insert1 = sql_query("insert into g5_exercise_sub_moveingTime (startPlayKey,endPlayKey,playTimeCount,timeSaveMovie,kinds,movieName,mb_id,mb_ip,mb_write_time) values ('$startPlayKey','$endPlayKey','$playTimeCount','$timeSaveMovie','$kinds_str','$movieName','$ss_mb_id','$REMOTE_ADDRS',now())");
        }
        else{ // 스타트만 눌렀는데 업데이트 시간만 업데이트 할때 ..

            sql_query("update g5_exercise_sub_moveingTime set endPlayKey = '0' where mb_no = '$outs_moveTimeSave_mb_no' and mb_id = '$ss_mb_id'");

            $outs_playTimeCountSum = $outs_playTimeCount + $playTimeCount;
            $insert1 = sql_query("update g5_exercise_sub_moveingTime set playTimeCount = '$outs_playTimeCountSum' where mb_no = '$outs_moveTimeSave_mb_no' and mb_id = '$ss_mb_id'");
        }
    }
    else{ // 종료 눌렀을때
        //$insert1 = sql_query("insert into g5_exercise_sub_moveingTime (startPlayKey,endPlayKey,playTimeCount,timeSaveMovie,kinds,movieName,mb_id,mb_ip,mb_write_time) values ('$startPlayKey','$endPlayKey','$playTimeCount','$timeSaveMovie','$kinds_str','$movieName','$ss_mb_id','$REMOTE_ADDRS',now())");


        $insert1 = sql_query("update g5_exercise_sub_moveingTime set endPlayKey = '1' where mb_no = '$outs_moveTimeSave_mb_no' and mb_id = '$ss_mb_id'");

    }

    if($insert1 == true){
        echo "ok";
    }
    else{
        echo "false";
    }

}
else if($delimiter == "showchat"){









}
else{
    echo "false";
}

?>