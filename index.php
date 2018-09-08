<?php
/**
 * Created by PhpStorm.
 * User: Jager
 * Date: 08.09.18
 * Time: 12:49
 */
/*
 * Написать форму обратной связи с полями имя, телефон, email без капчи с проверкой заполняемости (сохранять результат не нужно) просто почтовое уведомление
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?><?$APPLICATION->IncludeComponent(
	"premont:feedback", 
	"default", 
	array(
		"EMAIL_TO" => "demo@demo.com",
		"EVENT_MESSAGE_ID" => array(
			0 => "7",
		),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "PHONE",
		),
		"COMPONENT_TEMPLATE" => "default"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
