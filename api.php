<?php
class API
{
private $connect="";

function __construct() {
	$this->database_connection();
}

function database_connection() {
	$this->connect=new PDO("mysql:host=localhost; dbname=cm50155_0", "cm50155_0", "SVNZH42C");
}

function fetch_all($order_by_text, $order_by_text_asc_or_desc, $page) {
	if ($order_by_text) {
		$order_by_text = $order_by_text;
	}

	if($order_by_text_asc_or_desc) {
		$order_by_text_asc_or_desc = $order_by_text_asc_or_desc;
	}

	if($page) {
		$page = $page;
	}
	else
	{
		$page = 1;
	}

	$page_limit = 3;

	$page_rows = ($page * $page_limit) - $page_limit;

	$limit = " LIMIT $page_rows, $page_limit";

	$ordertext = " ORDER BY $order_by_text $order_by_text_asc_or_desc";

	if ($order_by_text) {
	$query = "SELECT * FROM records".$ordertext.$limit;
	}
	else
	{
	$query = "SELECT * FROM records".$limit;
	}

	$statement = $this->connect->prepare($query);
	if ($statement->execute()) {
		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
}

function insert()
	{
		if (isset($_POST["name_user"]))
		{
			$form_data = array(
				':name_user'		=>	$_POST["name_user"],
				':text_email'		=>	$_POST["text_email"],
				':text_description' =>  $_POST["text_description"]
			);
			$query = "
			INSERT INTO records 
			(name, email, description, success) VALUES 
			(:name_user, :text_email, :text_description, '0')
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	    =>   '0'
			);
		}
		return $data;
	}

function delete($id) {
	$query = "DELETE FROM records WHERE id='".$id."'";
	$statement = $this->connect->prepare($query);
	if ($statement->execute()) {
		$data[] = array(
			"success" => "1"
		);
	}
	else
	{
		$data[] = array(
			"success" => "0"
		);
	}
	return $data;
}

function fetch_single($id) {
	$query = "SELECT * FROM records WHERE id='".$id."'";
	$statement = $this->connect->prepare($query);
	if ($statement->execute()) {
		foreach ($statement->fetchAll() as $row) {
			$data["name_user"] = $row["name"];
			$data["text_email"] = $row["email"];
			$data["text_description"] = $row["description"];
		}
		return $data;
	}
}

function update() {
	if (isset($_POST["name_user"])) {
		$form_data=array(
			":name_user"        => $_POST["name_user"],
			":text_email"       => $_POST["text_email"],
			":text_description" => $_POST["text_description"],
			":id"               => $_POST["id"]
		);
		$query = "
		UPDATE records
		SET name=:name_user, email=:text_email, description=:text_description
		WHERE id=:id
		";
		$statement = $this->connect->prepare($query);
		if ($statement->execute($form_data)) {
			$data[] = array(
				"success" => "1"
			);
		}
		else
		{
			$data[] = array(
				"success" => "0"
			);
		}
	}
		else
		{
			$data[] = array(
				"success" => "0"
			);
		}
		return $data;
	}

function complete($id) {
	$query = "UPDATE records
	SET success=1 WHERE id='".$id."'";
	$statement = $this->connect->prepare($query);
	if ($statement->execute()) {
		$data[] = array(
			"success" => "1"
		);
	}
	else
	{
		$data[] = array(
			"success" => "0"
		);
	}
	return $data;
}

function backcomplete($id) {
	$query = "UPDATE records
	SET success=0 WHERE id='".$id."'";
	$statement = $this->connect->prepare($query);
	if ($statement->execute()) {
		$data[] = array(
			"success" => "1"
		);
	}
	else
	{
		$data[] = array(
			"success" => "0"
		);
	}
	return $data;
}
}
?>