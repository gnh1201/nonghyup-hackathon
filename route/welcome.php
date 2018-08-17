<?php
$data = array(
	"link_doc" => "https://gist.github.com/gnh1201/e092acac68ef1b1ed95b1e3599d21415",
	"link_shop" => "http://192.168.10.33/shop",
	"link_nh_withdraw" => "http://192.168.10.33/api/?route=nhapi&action=withdraw&amount=10",
	"link_nh_deposit" => "http://192.168.10.33/api/?route=nhapi&action=deposit&amount=10",
	"link_nh_history" => "http://192.168.10.33/api/?route=nhapi&action=history",
	"link_sc" => "http://192.168.10.33/api/?route=ethsol",
	"link_sc_now" => "http://192.168.10.33/api/?route=ethsol&redirect_uri=http://192.168.10.33/shop/&subject=apple&content=banana&amount=10",
	"link_sc_fund" => "http://192.168.10.33/api/?route=formContract",
	"link_sc_mon" => "http://192.168.10.33/api?route=ethmon",
	"link_form_status" => "http://192.168.10.33/api/?route=formStatus",
	"link_show_credits" => "http://192.168.10.33/api/?route=showCredits",
);

renderView("templates/jkscompany/header", $data);
renderView("view_welcome", $data);
renderView("templates/jkscompany/footer", $data);
