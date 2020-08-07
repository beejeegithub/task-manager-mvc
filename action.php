<?php
if ($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=fetch_single&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}

	if ($_POST["action"] == 'insert')
	{
		$form_data1 = array(
			'name_user'	       =>	$_POST['name_user'],
			'text_email'	   =>	$_POST['text_email'],
			'text_description' => $_POST['text_description']
		);
		$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=insert";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data1);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if ($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}
	
if ($_POST["action"] == "delete") {
	$id = $_POST["id"];
	$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=delete&id=".$id."";
	$client = curl_init($api_url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);
	echo $response;
}

if ($_POST["action"] == "update") {
	$form_data = array(
		"name_user"        => $_POST["name_user"],
		"text_email"       => $_POST["text_email"],
		"text_description" => $_POST["text_description"],
		"id"               => $_POST["hidden_id"]
	);
	$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=update";
	$client = curl_init($api_url);
	curl_setopt($client, CURLOPT_POST, true);
	curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$respose = curl_exec($client);
	curl_close($client);
	$result = json_decode($response, true);

	foreach ($result as $keys => $values) {
		if ($result[$keys]["success"] == "1") {
			echo "Update this record";
		}
		else
		{
			echo "Error";
		}
	}
}

if ($_POST["action"] =="complete") {
	$id = $_POST["id"];
	$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=complete&id=".$id."";
	$client = curl_init($api_url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);
	echo $response;
}

if ($_POST["action"] =="backcomplete") {
	$id = $_POST["id"];
	$api_url = "http://cm50155-wordpress.tw1.ru/task/handler.php?action=backcomplete&id=".$id."";
	$client = curl_init($api_url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);
	echo $response;
}
?>