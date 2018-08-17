<?php
loadHelper("fintech.dbt");

$it_id = get_requested_value("it_id");
$it_info = fintech_get_item_by_id($it_id);

$amount = get_requested_value("amount");

$status_matrix = array(
	"q1" => array(),
	"q2" => array(),
	"q3" => array(),
	"q4" => array(),
	"amt" => array(),
	"p1" => array(),
	"p2" => array(),
	"p3" => array(),
);

$it_exists = false;
if(!empty($it_id)) {
	$status_info = fintech_iot_get_status($it_id);
	if(!array_key_empty("status_id", $status_info)) {
		$it_exists = true;
	}
}

if(!$it_exists) {
	// 초기값 (기등록된 재배 온도표가 없을 시)
	for($i = 0; $i < 12; $i++) {
		if($i > 0) {
			$status_matrix['q1'][$i] = fintech_iot_rand_night();
			$status_matrix['q2'][$i] = fintech_iot_rand_day();
			$status_matrix['q3'][$i] = fintech_iot_rand_day();
			$status_matrix['q4'][$i] = fintech_iot_rand_night();
		} else {
			$status_matrix['q1'][$i] = "";
			$status_matrix['q2'][$i] = "";
			$status_matrix['q3'][$i] = "";
			$status_matrix['q4'][$i] = "";
		}
		$status_matrix['p1'][$i] = 0;
		$status_matrix['p2'][$i] = 0;
		$status_matrix['p3'][$i] = 0;
		$status_matrix['amt'][$i] = ($i > 0) ? "" : $it_info['it_price'];
	}
	
	for($i = 0; $i < count($status_matrix['amt']); $i++) {
		if($i > 0) {
			// 15 16 17 => +1원 (Q1, Q4)
			// 18 19 20 => +1원 (Q2, Q3)
			// 그 외 => -1원

			$previous_balence = $status_matrix['p2'][$i - 1];
			$move_cost = 0;
			
			if($previous_balence > 0) {
				if($status_matrix['q1'][$i] >= 15 && $status_matrix['q1'][$i] <= 17) {
					$move_cost += 1;
				} else {
					$move_cost -= 1;
				}
				
				if($status_matrix['q4'][$i] >= 15 && $status_matrix['q4'][$i] <= 17) {
					$move_cost += 1;
				} else {
					$move_cost -= 1;
				}
				
				if($status_matrix['q2'][$i] >= 18 && $status_matrix['q4'][$i] <= 20) {
					$move_cost += 1;
				} else {
					$move_cost -= 1;
				}
				
				if($status_matrix['q3'][$i] >= 18 && $status_matrix['q3'][$i] <= 20) {
					$move_cost += 1;
				} else {
					$move_cost -= 1;
				}

				// 스마트 계좌에 반영
				if($move_cost > 0) {
					$status_matrix['p2'][$i] = $previous_balence - $move_cost;
				} else {
					$status_matrix['p2'][$i] = $previous_balence;
				}

				// 생산자 계좌에 반영
				if($move_cost > 0) {
					$status_matrix['p1'][$i] = $status_matrix['p1'][$i - 1] + $move_cost;
				} else {
					$status_matrix['p1'][$i] = $status_matrix['p1'][$i - 1];
				}
				
				// 음수인 경우
				if($status_matrix['p2'][$i] < 0) {
					$status_matrix['p1'][$i] += $status_matrix['p2'][$i];
					$status_matrix['p2'][$i] -= $status_matrix['p2'][$i];
				}
			} else {
				$status_matrix['p1'][$i] = $status_matrix['p1'][$i - 1];
				$status_matrix['p2'][$i] = $status_matrix['p2'][$i - 1];
			}
		} else {
			$status_matrix['p2'][$i] = $status_matrix['amt'][0];
		}
	}
	
	// 요청 받은 금액이 있을 시
	if($amount) {
		$status_matrix['amt'][11] = $amount;
	}
} else {
	$status_info = fintech_iot_get_status($it_id);
	$status_matrix = json_decode($status_info['status_content'], true);
}

$data = array(
	"it_id" => $it_id,
	"it_info" => $it_info,
	"item_list" => fintech_get_item_list(array(
		"it_type1" => 1,
	)),
	"status_matrix" => $status_matrix,
	"it_exists" => $it_exists,
	"amount" => $amount,
	"contracted" => get_requested_value("contracted"),
);

renderView("templates/jkscompany/header", $data);
renderView("view_formStatus", $data);
renderView("templates/jkscompany/footer", $data);
