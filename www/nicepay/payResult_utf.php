<?php
include $_SERVER['DOCUMENT_ROOT'].'/_header.php';
header("Content-Type:text/html; charset=utf-8;"); 
/*
****************************************************************************************
* <인증 결과 파라미터>
****************************************************************************************
*/


$authResultCode = $_POST['AuthResultCode'];		// 인증결과 : 0000(성공)
$authResultMsg = $_POST['AuthResultMsg'];		// 인증결과 메시지
$nextAppURL = $_POST['NextAppURL'];				// 승인 요청 URL
$txTid = $_POST['TxTid'];						// 거래 ID
$authToken = $_POST['AuthToken'];				// 인증 TOKEN
$payMethod = $_POST['PayMethod'];				// 결제수단
$mid = $_POST['MID'];							// 상점 아이디
$moid = $_POST['Moid'];							// 상점 주문번호
$amt = $_POST['Amt'];							// 결제 금액
$reqReserved = $_POST['ReqReserved'];			// 상점 예약필드
$netCancelURL = $_POST['NetCancelURL'];			// 망취소 요청 URL

$expReserv = explode("|", $reqReserved);
$seq = $expReserv[0];
$grp = $expReserv[1];



	

/*
****************************************************************************************
* <승인 결과 파라미터 정의>
* 샘플페이지에서는 승인 결과 파라미터 중 일부만 예시되어 있으며, 
* 추가적으로 사용하실 파라미터는 연동메뉴얼을 참고하세요.
****************************************************************************************
*/

$response = "";

if($authResultCode === "0000"){
	/*
	****************************************************************************************
	* <해쉬암호화> (수정하지 마세요)
	* SHA-256 해쉬암호화는 거래 위변조를 막기위한 방법입니다. 
	****************************************************************************************
	*/	
	$ediDate = date("YmdHis");
	$merchantKey = "lRLvIkR+sygkc662lo3bNYXAf27rgfqpVurizK9763PzIAxU3GcNIOrUfwZfjr6f04L9kbrhqQPBoAUWckhoiA=="; // 상점키
	$signData = bin2hex(hash('sha256', $authToken . $mid . $amt . $ediDate . $merchantKey, true));

	try{
		$data = Array(
			'TID' => $txTid,
			'AuthToken' => $authToken,
			'MID' => $mid,
			'Amt' => $amt,
			'EdiDate' => $ediDate,
			'SignData' => $signData,
			'CharSet' => 'utf-8'
		);		
		$response = reqPost($data, $nextAppURL); //승인 호출
		jsonRespDump($response); //response json dump example
		
		$sQue = "select ws.*, m.mb_name from mb_work_settle ws, mb_member m where ws.worker=m.seq and ws.seq='".$seq."'";
		$sRow = sql_fetch($sQue);
		
		$to_id = $sRow['worker'];
		$from_id = $sRow['employer'];
		$work_seq = $sRow['goods_seq'];

		$_SESSION['login_seq'] = $from_id;
	
		$sql = "update mb_work_settle set status='C' where seq='".$seq."'";
		sql_default($sql);
		
		$pQue = "insert into mb_pay_log set work_seq='".$work_seq."',
		tid='".$txTid."',
		authtoken='".$authToken."',
		mid='".$mid."',
		amt='".$amt."',
		edidate='".$ediDate."',
		moid='".$moid."',
		signdata='".$signData."'";
		sql_default($pQue);

		$str = '
			<div style="padding: 15px; border: 1px solid #cc0000; bordr-radius: 5px;">
				<p>'.stripslashes($mb['mb_nick']).'님이 결제하였습니다. '.stripslashes($sRow['mb_nick']).'님은 일을 시작해주세요.</p>
				<p>'.stripslashes($mb['mb_nick']).'은 일의 진행 상황과 완료 여부를 반드시 확인 후에 \'일완료\' 버튼을 누르세요.</p>
				<p >\'일완료\' 버튼을 누르면 철회되지 않으니 주의하세요.</p>
				<p style="padding-top: 10px;">\'일 완료\ 버튼을 누르면 '.stripslashes($sRow['mb_nick']).'님께 입금돼요.</p>
				<p>그전까지 할까말까에서 안전하게 보관하고 있을게요.</p>
			</div>';
		$str =addslashes($str);

		$chatQue = "insert into mb_chat set to_id='".$to_id."', from_id='".$from_id."', work_seq='".$work_seq."', grp='".$grp."',  contents='".$str."', regdt=now()";
		sql_default($chatQue);

		$content = "결제가 완료되었어요. 일의 진행 상황과 완료 여부를 반드시 확인 후에 <strong>일 완료</strong>버튼을 누르세요.";
		activity_insert('common', 'work', $work_seq, $content);
	/* 일하는자에게 보냄 */
		$content2 = "일을 시작해 주세요! 일의 진행 상황과 완료 사실을 ".$meb['mb_nick']."님에게 반드시 인증(사진,영상) 해주세요.";
		activity_insert('common', 'work', $work_seq, $content2, '', '', $to_id);

	/* 일시킨자 */
		$mk = select_sql('mb_work_make', 'seq', $work_seq);
		$meb = select_sql('mb_member', 'seq', $from_id);
		$push_title = $mk['work_title'];
		$push_body = '결제가 완료되었어요. 일의 진행 상황과 완료여부를 반드시 확인 후에 \'일 완료\' 버튼을 누르세요.';
		$push_url = "https://halkamalka.com/";
		$push_key = $meb['push_key'];
		$device = $meb['device'];
		$emoticon = "https://halkamalka.com/img/congraturation.png";

		list($adr_cnt, $ios_cnt)=push_send_chk($push_key, $device, $push_title, $push_body, $push_url, $emoticon);
	/* 일하는 자 */
		$work = select_sql('mb_member', 'seq', $to_id);
		$push_body = '일을 시작해주세요! 일의 진행 상황과 완료 사실을 '.$meb['mb_nick'].'님에게 반드시 인증(사진,영상) 해주세요.';
		$push_key = $work['push_key'];
		$device = $work['device'];

		list($adr_cnt, $ios_cnt)=push_send_chk($push_key, $device, $push_title, $push_body, $push_url, $emoticon);
		
		header("Location: /chat_view.html?to_id=".$sRow['worker']."&from_id=".$sRow['employer']."&inSeq=".$sRow['goods_seq']."&grp=".$grp);
	}catch(Exception $e){
		$e->getMessage();
		$data = Array(
			'TID' => $txTid,
			'AuthToken' => $authToken,
			'MID' => $mid,
			'Amt' => $amt,
			'EdiDate' => $ediDate,
			'SignData' => $signData,
			'NetCancel' => '1',
			'CharSet' => 'utf-8'
		);
		$response = reqPost($data, $netCancelURL); //예외 발생시 망취소 진행
		jsonRespDump($response); //response json dump example
	}	
	
}else{
	//인증 실패 하는 경우 결과코드, 메시지
	$ResultCode = $authResultCode; 	
	$ResultMsg = $authResultMsg;
}

// API CALL foreach 예시
function jsonRespDump($resp){
	$respArr = json_decode($resp);
	foreach ( $respArr as $key => $value ){
		echo "$key=". $value."<br />";
	}
}

//Post api call
function reqPost(Array $data, $url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);					//connection timeout 15 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));	//POST data
	curl_setopt($ch, CURLOPT_POST, true);
	$response = curl_exec($ch);
	curl_close($ch);	 
	return $response;
}

?>