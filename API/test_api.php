<?php
include 'Api.php';

$api_object = new API();

if($_GET['action'] == "tampil")
{
	$data = $api_object->tampilData();
}
if($_GET['action'] == "insert")
{
	$data = $api_object->tambahData();
}

if($_GET['action'] == "tampil_id")
{
	$data = $api_object->tampilID($_GET['id']);
}

if($_GET['action'] == "edit")
{
	$data = $api_object->Edit($_GET['id']);
}

if($_GET['action'] == "hapus")
{
	$data = $api_object->delete($_GET['id']);
}
echo json_encode($data);
?>