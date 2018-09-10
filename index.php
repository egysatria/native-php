<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="assests/swal2/sweetalert2.min.css" type="text/css" />
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">CRUD NATIVE</h1> </center>

				<div class="removeMessages"></div>

				<button name="btnTambah" class="btn btn-default pull pull-right" id="btnTambah">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add Karyawan
				</button>

				<br /> <br /> <br />
				<div class="panel panel-primary">
					<div class="panel-heading">Data Karyawan</div>
					<div class="panel-body">
						<div class="table table-responsive">
							<table class="table table-bordered table-striped">					
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>													
										<th>Alamat</th>
										<th>Tanggal Lahir</th>
										<th>Edit</th>								
										<th>Hapus</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" role="dialog" id="modalKaryawan">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <form class="form-horizontal" id="formKaryawan">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Tambah Data</h4>
		    </div>
		      <div class="modal-body">

				  <div class="form-group"> <!--/here teh addclass has-error will appear -->
				    <label for="nama" class="col-sm-2 control-label">Nama</label>
				    <div class="col-sm-10"> 
				      <input type="text" class="form-control" id="nama" name="nama">
					<!-- here the text will apper  -->
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" rows="5" cols="15" name="alamat" id="alamat"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="tgl_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
				    <div class="col-sm-10">
				      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
				    </div>
				  </div>
		      </div>
		      <div class="modal-footer">
		      	<input type="hidden" name="hidden_id" id="hidden_id">
		        <input type="hidden" name="action" id="action" value="insert"/>
		        <input type="submit" class="btn btn-primary" name="btnAction" id="btnAction" value="Insert" />
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<script src="assests/swal2/sweetalert2.min.js"></script>
	<script type="text/javascript" src="custom/karyawan.js"></script>

</body>
</html>