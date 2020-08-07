<?php

if ($_POST["order_by_name"]) {
$order_by_text = $_POST["order_by_name"];
}
if ($_POST["order_by_email"]) {
$order_by_text = $_POST["order_by_email"];
}
if ($_POST["order_by_success"]) {
$order_by_text = $_POST["order_by_success"];
}

if ($_POST["order_by_name_asc_or_desc"]) {
$order_by_text_asc_or_desc = $_POST["order_by_name_asc_or_desc"];
}
if ($_POST["order_by_email_asc_or_desc"]) {
$order_by_text_asc_or_desc = $_POST["order_by_email_asc_or_desc"];
}
if ($_POST["order_by_success_asc_or_desc"]) {
$order_by_text_asc_or_desc = $_POST["order_by_success_asc_or_desc"];
}

$page = $_POST["page"];

if ($_POST["action"] =="fetch") {

$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=fetch_all&order_by_text=".$order_by_text."&order_by_text_asc_or_desc=".$order_by_text_asc_or_desc."&page=".$page."";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		if ($row->success == "1") {
		$output .= '
		<tr>
			<td>'.$row->name.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->description.'</td>
			<td>Выполнено</td>
		</tr>
		';
	}
	else
	{
		$output .= '
		<tr>
			<td>'.$row->name.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->description.'</td>
			<td>Не выполнено</td>
		</tr>
		';
	}
}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Не найдено</td>
	</tr>
	';
}

echo $output;

}
else if ($_POST["action"] =="page") {

$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=fetch_all&order_by_text=".$order_by_text."&order_by_text_asc_or_desc=".$order_by_text_asc_or_desc."&page=".$page."";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		if ($row->success == "1") {
		$output .= '
		<tr>
			<td>'.$row->name.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->description.'</td>
			<td>Выполнено</td>
		</tr>
		';
	}
	else
	{
		$output .= '
		<tr>
			<td>'.$row->name.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->description.'</td>
			<td>Не выполнено</td>
		</tr>
		';
	}
}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Не найдено</td>
	</tr>
	';
}

echo $output;

}
else
{
$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		if ($row->success == "1") {
		$output .= '
		<tr>
			<td>'.$row->name.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->description.'</td>
			<td>Выполнено</td>
		</tr>
		';
	}
	else
	{
		$output .= '
		<tr>
			<td>'.$row->name.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->description.'</td>
			<td>Не выполнено</td>
		</tr>
		';
	}
}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Не найдено</td>
	</tr>
	';
}

echo $output;
}
?>