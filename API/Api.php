<?php
/**
* 
*/
class API
{

	private $host 	 = 'localhost';
	private $user 	 = 'root';
	private $pass 	 = '';
	private $dbnm 	 = 'crud_native';
	private $connect = '';
	
	function __construct()
	{
		$this->koneksiDatabase();
	}

	function koneksiDatabase()
	{
		$this->connect = new mysqli ($this->host, $this->user, $this->pass, $this->dbnm);
	}
	
	function tampilData()
	{
		$sql = "SELECT * FROM tb_user";
		$statment = $this->connect->query($sql);
		if ($statment) 
		{
			while ($row = $statment->fetch_assoc()) 
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function tambahData()
	{
		if(isset($_POST['nama']))
		{
			$form_data = array(
				'nama'			=> $this->connect->real_escape_string($_POST['nama']),
				'alamat'		=> $this->connect->real_escape_string($_POST['alamat']),
				'tgl_lahir'		=> $this->connect->real_escape_string($_POST['tgl_lahir'])
			);

			$sql	= "INSERT INTO tb_user (nama, alamat, tgl_lahir) VALUES (";
			foreach ($form_data as $key) 
			{
				$sql .= "'$key', ";
			}
			$sql = substr($sql, 0, -2).")";
			$statment = $this->connect->query($sql);
			if($statment)
			{
				$data[] = array(
					'success'	=> '1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=> '0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=> '0'
			);
		}
		return $data;
	}

	function tampilID($id)
	{
		$sql	  = "SELECT * FROM tb_user WHERE id ='$id'";
		$statment = $this->connect->query($sql);
		if($statment)
		{
			foreach($statment as $row)
			{
				$data['nama'] = $row['nama'];
				$data['alamat'] = $row['alamat'];
				$data['tgl_lahir'] = $row['tgl_lahir'];
			}
			return $data;
		}
	}

	function Edit($id)
	{
		if(isset($_POST['nama']))
		{
			$sql = '';
			$form_data = array(
				'nama'			=> $this->connect->real_escape_string($_POST['nama']),
				'alamat'		=> $this->connect->real_escape_string($_POST['alamat']),
				'tgl_lahir'	    => $this->connect->real_escape_string($_POST['tgl_lahir'])
			);
			foreach ($form_data as $key => $value) 
			{
				$sql .= $key. " = '".$value."', ";
			}
			$sql 	  = substr($sql, 0, -2);
			$queri    = "UPDATE tb_user SET ".$sql." WHERE id= '$id'";
			if($this->connect->query($queri))
			{
				$data[] = array(
					'success'	=> '1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=> '0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=> '0'
			);
		}
		return $data;
	}

	function delete($id)
	{
		$sql 	= "DELETE FROM tb_user WHERE id = '$id'";
		$statment = $this->connect->query($sql);
		if($statment)
		{
				$data[] = array(
					'success'	=> '1'
				);
		}
		else
		{
			$data[] = array(
				'success'	=> '0'
			);
		}
		return $data;
	}
}
?>