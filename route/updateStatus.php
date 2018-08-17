<?php
loadHelper("fintech.dbt");

$action = get_requested_value("action");
$it_id = get_requested_value("it_id");
$status_matrix = get_requested_value("status_matrix");

switch($action) {
	case "update":
		$result = fintech_iot_set_status($it_id, array(
			"status_matrix" => $status_matrix
		));
		
		echo get_route_link("formStatus", array(
			"it_id" => $it_id
		));

		redirect_uri(get_route_link("formStatus", array(
			"it_id" => $it_id
		), false));
		break;
	case "pay":
		break;
	case "contract":
		break;
}
