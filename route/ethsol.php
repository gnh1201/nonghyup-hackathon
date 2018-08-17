<?php
/**
 * @file ethsol.php
 * @date 2018-06-01
 * @author Go Namhyeon <gnh1201@gmail.com>
 * @brief Ethereum Smart Contract interface Controller
 */

$redirect_uri = get_requested_value("redirect_uri");
$subject = get_requested_value("subject");
$content = get_requested_value("content");
$amount = get_requested_value("amount");

$data = array(
	"redirect_uri" => $redirect_uri,
	"subject" => $subject,
	"content" => $content,
	"amount" => $amount,
);

renderView("view_ethsol", $data);
