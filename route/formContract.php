<?php
$data = array(
	"b1" => "jsSim",
	"b2" => "jhKim",
	"b3" => "300일",
	"b4" => "일",
	"b5" => "40%",
	"b6" => "-40%",
);
renderView("templates/jkscompany/header", $data);
renderView("view_formContract", $data);
renderView("templates/jkscompany/footer", $data);
