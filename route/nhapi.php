<?php
/**
 * @file nhapi.php
 * @date 2018-06-01
 * @author Go Namhyeon <gnh1201@gmail.com>
 * @brief NH API interface controller
 */

loadHelper("webpagetool");

$time_now = microtime(true);
$time_ms = substr($time_now - intval($time_now), 2, 3);

$fin_api_url = "http://10.10.3.51:8082/NH-KISA-OTA/ota/process.jsp";

$FinAcno = "00820111454251464051454054350";
$FintechApsno = "001";
$Tsymd = date("Ymd");
$Trtm = date("His");
$IsTuno = date("YmdHis") . $time_ms .  "001";
$Iscd = "000020"; // 기관코드

$response = array();

$result = array(
	"success" => false,
	"header" => false,
	"message" => "something wrong",
	"data" => false,
	"params" => false,
);

$action = get_requested_value("action");

$is_success = false;

switch($action) {
	case "withdraw": // 출금거래
		$amount = get_requested_value("amount");
		$subject = get_requested_value("subject");
		$content = get_requested_value("content");

		if(empty($amount)) $amount = 10;
		if(empty($subject)) $subject = "JKS_Company";
		if(empty($content)) $content = "Withdraw_by_JKS_Company";
		
		$params = array(
			"Header" => array(
				"ApiNm" => "DrawingTransfer",
				"Tsymd" => $Tsymd,
				"Trtm" => $Trtm,
				"Iscd" => $Iscd,
				"FintechApsno" => $FintechApsno,
				"ApiSvcCd" => "01D_001_00",
				"IsTuno" => $IsTuno,
			),
			"FinAcno" => $FinAcno,
			"Tram" => $amount,
			"DractOtlt" => $subject,
			"MractOtlt" => $content,
		);

		$response = get_web_json(get_web_build_qs($fin_api_url, array(
			"p" => "send",
			"fintechApsno" => $FintechApsno,
		)), "post", array(
			"JSONData" => get_adaptive_json($params),
		));

		$result['params'] = $params;
		$is_success = true;

		break;

	case "withdrawpop": // 출금거래조회
		$orderTram = get_requested_value("orderTram");
		$orderTsymd = get_requested_value("orderTsymd");
		$orderIsTuno = get_requested_value("orderIsTuno");
		
		if(empty($orderTram)) {
			$result['message'] = "orderTram can not empty";
			break;
		}
		
		if(empty($orderTsymd)) {
			$result['message'] = "orderTsymd can not empty";
			break;
		}

		if(empty($orderIsTuno)) {
			$result['message'] = "orderIsTuno can not empty";
			break;
		}

		$params = array(
			"Header" => array(
				"ApiNm" => "CheckOnDrawingTransfer",
				"Tsymd" => $Tsymd,
				"Trtm" => $Trtm,
				"Iscd" => $Iscd,
				"FintechApsno" => $FintechApsno,
				"ApiSvcCd" => "01D_001_00",
				"IsTuno" => $IsTuno,
			),
			"FinAcno" => $FinAcno,
			"Tram" => $orderTram,
			"OrtrYmd" => $orderTsymd,
			"OrtrIsTuno" => $orderIsTuno,
		);
	
		$response = get_web_json(get_web_build_qs($fin_api_url, array(
			"p" => "send",
			"fintechApsno" => $FintechApsno,
		)), "post", array(
			"JSONData" => get_adaptive_json($params),
		));

		$result['params'] = $params;
		$is_success = true;

		break;

	case "deposit": // 입금거래
		$amount = get_requested_value("amount");
		$subject = get_requested_value("subject");
		$content = get_requested_value("content");

		if(empty($amount)) $amount = 10;
		if(empty($subject)) $subject = "JKS_Company";
		if(empty($content)) $content = "Deposit_by_JKS_Company";
		
		$params = array(
			"Header"=> array(
				"ApiNm" => "ReceivedTransferFinAccount",
				"Tsymd" => $Tsymd,
				"Trtm" => $Trtm,
				"Iscd" => $Iscd,
				"FintechApsno" => $FintechApsno,
				"ApiSvcCd" => "02M_001_00",
				"IsTuno" => $IsTuno,
			),
			"FinAcno" => $FinAcno,
			"Tram" => $amount,
			"subject" => $subject,
			"content" => $content,
		);
	
		$response = get_web_json(get_web_build_qs($fin_api_url, array(
			"p" => "send",
			"fintechApsno" => $FintechApsno,
		)), "post", array(
			"JSONData" => get_adaptive_json($params),
		));
		
		$result['params'] = $params;
		$is_success = true;

		break;

	case "depositpop": // 입금거래조회
		$orderTram = get_requested_value("orderTram");
		$orderTsymd = get_requested_value("orderTsymd");
		$orderIsTuno = get_requested_value("orderIsTuno");
		
		if(empty($orderTram)) {
			$result['message'] = "orderTram can not empty";
			break;
		}
		
		if(empty($orderTsymd)) {
			$result['message'] = "orderTsymd can not empty";
			break;
		}

		if(empty($orderIsTuno)) {
			$result['message'] = "orderIsTuno can not empty";
			break;
		}

		$params = array(
			"Header" => array(
				"ApiNm" => "CheckOnDrawingTransfer",
				"Tsymd" => $Tsymd,
				"Trtm" => $Trtm,
				"Iscd" => $Iscd,
				"FintechApsno" => $FintechApsno,
				"ApiSvcCd" => "02M_001_00",
				"IsTuno" => $IsTuno,
			),
			"FinAcno" => $FinAcno,
			"Bncd" => "",
			"Acno" => "",
			"Tram" => $orderTram,
			"OrtrYmd" => $orderTsymd,
			"OrtrIsTuno" => $orderIsTuno,
		);
	
		$response = get_web_json(get_web_build_qs($fin_api_url, array(
			"p" => "send",
			"fintechApsno" => $FintechApsno,
		)), "post", array(
			"JSONData" => get_adaptive_json($params),
		));

		$result['params'] = $params;
		$is_success = true;

		break;

	case "balance": // 잔액 조회
		$params = array(
			"Header" => array(
				"ApiNm" => "InquireBalance",
				"Tsymd" => $Tsymd,
				"Trtm" => $Trtm,
				"Iscd" => $Iscd,
				"FintechApsno" => $FintechApsno,
				"ApiSvcCd" => "03Q_004_F0",
				"IsTuno" => $IsTuno,
			),
			"FinAcno" => $FinAcno,
		);
	
		$response = get_web_json(get_web_build_qs($fin_api_url, array(
			"p" => "send",
			"fintechApsno" => $FintechApsno,
		)), "post", array(
			"JSONData" => get_adaptive_json($params),
		));
		
		$result['params'] = $params;

		break;
		
	case "history":
		$startdate = get_requested_value("startdate");
		$enddate = get_requested_value("enddate");

		if(empty($startdate) || empty($enddate) || $startdate > $enddate) {
			$startdate = date("Ymd");
			$enddate = date("Ymd");
		}

		$params = array(
			"Header" => array(
				"ApiNm" => "InquireTransactionHistory",
				"Tsymd" => $Tsymd,
				"Trtm" => $Trtm,
				"Iscd" => $Iscd,
				"FintechApsno" => $FintechApsno,
				"ApiSvcCd" => "03Q_005_F0",
				"IsTuno" => $IsTuno,
			),
			"FinAcno" => $FinAcno,
			"Insymd" => $startdate,
			"Ineymd" => $enddate,
			"TrnsDsnc" => "A",
			"Lnsq" => "ASC",
			"PageNo" => "1",
			"Dmcnt" => "100",
		);
	
		$response = get_web_json(get_web_build_qs($fin_api_url, array(
			"p" => "send",
			"FintechApsno" => $FintechApsno
		)), "post", array(
			"JSONData" => get_adaptive_json($params),
		));
		
		$result['params'] = $params;
		$is_success = true;
	
		break;

	default:
		// set error message
		$result['message'] = "action not defined";
}

// if well done
if($is_success == true) {
	$result['success'] = true;
	$result['message'] = "Have a nice day";
	$result['data'] = $response;
}

header("Content-Type: application/json");
echo json_encode($result);
