<?php
loadHelper("string.utl");

$csvdata = "16,16,16,14,16,16,14,16,16,16
19,19,20,19,19,19,19,19,19,19
19,19,20,19,19,19,19,19,19,19
16,16,16,14,16,16,19,16,16,16";

$data = array();
$lines = explode_by_line($csvdata);

foreach($lines as $k=>$v) {
	$d = explode(",", $v);
	$data[] = $d;
}

foreach($data as $k=>$v) {
	foreach($v as $i=>$j) {
		$rownum = $k + 1;
		$colnum = $i + 1;
		
		$bind = array(
			"temperture_type" => "best",
			"temperture_day" => $rownum,
			"temperture_day_q" => $colnum,
			"temperture_value" => $j,
			"temperture_datetime" => get_current_datetime(),
		);

		$sql = get_bind_to_sql_insert("jksc_tempertures", $bind);
		exec_db_query($sql, $bind);
	}
}

echo "done.";
