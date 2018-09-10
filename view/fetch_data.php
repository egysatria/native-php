<?php

$api_url = "http://localhost/test_crud_native/API/test_api.php?action=tampil";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';
if (count($result) > 0) 
{
	$no = 1;
	foreach ($result as $key) 
	{
		$output .= '
			<tr>
				<td>'.$no.'</td>
				<td>'.$key->nama.'</td>
				<td>'.$key->alamat.'</td>
				<td>'.date('d F Y', strtotime($key->tgl_lahir)).'</td>
				<td>
					<button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$key->id.'">Edit</button>
				</td>
				<td>
					<button type="button" name="hapus" class="btn btn-danger btn-xs hapus_id" id="'.$key->id.'">Hapus</button>
				</td>
			</tr>
		';
		$no++;
	}
}
else
{
	$output .= '
		<tr>
			<td colspan="5" align="center"> Tidak Ada Data</td>
		</tr>
	';
}

echo $output;
?>