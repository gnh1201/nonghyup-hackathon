<?php
loadHelper("fintech.dbt");

$user_list = fintech_get_user_list();
$asset_sum = 0;
foreach($user_list as $row) {
	$asset_sum += $row['mb_point'];
}
$asset_avg = $asset_sum / count($row);

$data = array(
	"user_list" => fintech_get_user_list(),
	"asset_avg" => $asset_avg,
);

renderView("templates/jkscompany/header", $data);
renderView("view_showCredits", $data);
renderView("templates/jkscompany/footer", $data);
