<?php
function fintech_get_db_cms_prefix() {
	return "cms";
}

function fintech_get_cart_list() {
	$sql = "select * from " . fintech_get_db_cms_prefix() . "_shop_cart";
	$rows = exec_db_fetch_all($sql);
	return $rows;
}

function fintech_get_item_list($bind=array()) {
	$sql = "select * from " . fintech_get_db_cms_prefix() . "_shop_item where 1" . get_bind_to_sql_where($bind);
	$rows = exec_db_fetch_all($sql, $bind);
	return $rows;
}

function fintech_get_item_by_id($it_id) {
	$sql = "select * from " . fintech_get_db_cms_prefix() . "_shop_item where it_id = :it_id";
	$bind = array(	
		"it_id" => $it_id
	);
	$result = exec_db_fetch($sql, $bind);
	return $result;
}

function fintech_iot_rand_night() {
	return rand(15, 17) - rand(0, 1);
}

function fintech_iot_rand_day() {
	return rand(18, 20) + rand(0, 1);
}

function fintech_iot_set_status($it_id, $options) {
	$result = false;

	$cnt = get_value_in_array("cnt", exec_db_fetch("select count(*) as cnt from fintech_status where it_id = :it_id", array(
		"it_id" => $it_id
	)));

	$status_content = json_encode(get_value_in_array("status_matrix", $options, array()));

	if($cnt == 0) {
		$bind = array(
			"it_id" => $it_id,
			"status_content" => $status_content,
			"status_pay" => 0,
			"status_contract" => 0,
			"status_datetime" => get_current_datetime(),
		);
		$sql = get_bind_to_sql_insert("fintech_status", $bind);
		$result = exec_db_query($sql, $bind);
	} else {
		/*
		$sql = "update fintech_status set status_content = :status_content where it_id = :it_id";
		$bind = array(
			"status_content" => $status_content,
			"it_id" => $it_id,
		);
		$result = exec_db_query($sql, $bind);
		*/
		
		$result = true;
	}

	return $result;
}

function fintech_iot_get_status($it_id) {
	$sql = "select * from fintech_status where it_id = :it_id";
	$bind = array(
		"it_id" => $it_id
	);
	$row = exec_db_fetch($sql, $bind);
	return $row;
}

function fintech_get_user_list() {
	$sql = "select * from " . fintech_get_db_cms_prefix() . "_member";
	$rows = exec_db_fetch_all($sql);
	return $rows;
}
