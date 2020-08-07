<?php
include("api.php");

$api_object=new API();

if ($_GET["action"] == "fetch_all") {
	$data = $api_object->fetch_all($_GET["order_by_text"], $_GET["order_by_text_asc_or_desc"], $_GET["page"]);
}

if ($_GET["action"] == "fetch_single") {
	$data = $api_object->fetch_single($_GET["id"]);
}

if($_GET["action"] == 'insert')
{
	$data = $api_object->insert();
}

if ($_GET["action"] == "delete") {
	$data = $api_object->delete($_GET["id"]);
}

if ($_GET["action"] == "update") {
	$data = $api_object->update();
}

if ($_GET["action"] == "complete") {
	$data = $api_object->complete($_GET["id"]);
}

if ($_GET["action"] == "backcomplete") {
	$data = $api_object->backcomplete($_GET["id"]);
}

echo json_encode($data);
?>