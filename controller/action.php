<?php
if (isset($_POST['action'])) 
{
	if ($_POST['action'] == "insert") 
	{
		$form_data = array(
			'nama'			=> $_POST['nama'],
			'alamat'		=> $_POST['alamat'],
			'tgl_lahir'		=> $_POST['tgl_lahir']
		);

		$api_url 	= "http://localhost/test_crud_native/API/test_api.php?action=insert";
		$client 	= curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response 	= curl_exec($client);
		curl_close($client);
		$result 	= json_decode($response, true);
		foreach ($result as $keys => $values) 
		{
			if($result[$keys]['success'] == '1')
			{
				echo "insert";
			}
			else
			{
				echo "error";
			}
		}
	}

	if($_POST['action'] == "tampil_id")
	{
		$id 	  = $_POST['id'];
		$api_url  = "http://localhost/test_crud_native/API/test_api.php?action=tampil_id&id=".$id."";
		$client	  = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}

	if($_POST['action'] == "update")
	{
		$id = $_POST['hidden_id'];
		$form_data	= array(
			'nama'	 		=> $_POST['nama'],
			'alamat' 		=> $_POST['alamat'],
			'tgl_lahir'		=> $_POST['tgl_lahir']
		);
		$api_url  = "http://localhost/test_crud_native/API/test_api.php?action=edit&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach ($result as $keys => $values) 
		{
			if($result[$keys]['success'] == '1')
			{
				echo "edit";
			}
			else
			{
				echo "error";
			}
		}
	}

	if ($_POST['action'] == 'hapus') 
	{
		$id = $_POST['id'];
		$api_url  = "http://localhost/test_crud_native/API/test_api.php?action=hapus&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}
?>