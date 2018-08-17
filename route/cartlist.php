<?php
loadHelper("jskcompany.dbt");

$cartlist = jskcompany_get_cart_list();

foreach($cartlist as $row) {
	echo "=========== 정보 시작 ==============<br>";
	foreach($row as $k=>$v) {
		echo "{$k}: {$v}<br>";
	}
	echo "=========== 정보 끝 ==============<br><br>";
}
