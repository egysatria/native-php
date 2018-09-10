$(document).ready(function(){

	tampilData();

	function tampilData()
	{
		$.ajax({
			url : 'view/fetch_data.php',
			success:function(data)
			{
				$('tbody').html(data);
			}
		});
	}

	$('#btnTambah').click(function()
	{
		$('#action').val('insert');
		$('#btnAction').val('Insert');
		$('.modal-title').text('Tambah Data');
		$('#modalKaryawan').modal('show');
	});

	$('#formKaryawan').on('submit', function(event){
		event.preventDefault();
		if($('#nama').val() == '')
		{
			alert("Silahkan Input Nama !!");
			$('#nama').focus();
		}
		else if($('#alamat').val() == '')
		{
			alert("Silahkan Input Alamat !!");
			$('#alamat').focus();
		}
		else if($('#tgl_lahir').val() == '')
		{
			alert("Silahkan Input Tanggal Lahir !!");
			$('#tgl_lahir').focus();
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url : 'controller/action.php',
				method : 'POST',
				data : form_data,
				success:function(data)
				{
					tampilData();
					$('#formKaryawan')[0].reset();
					$('#modalKaryawan').modal('hide');
					if(data == "insert")
					{
						swal('Success!', 'Data Berhasil di Inputkan', 'success');
					}
					if(data == "edit")
					{
						swal('Success!', 'Data Berhasil di Ubah', 'success');
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'tampil_id';
		$.ajax({
			url 	 : 'controller/action.php',
			method	 : 'POST',
			data 	 : {id:id, action:action},
			dataType : 'json',
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#nama').val(data.nama);
				$('#alamat').val(data.alamat);
				$('#tgl_lahir').val(data.tgl_lahir);
				$('#action').val('update');
				$('#btnAction').val('Update');
				$('.modal-title').text('Edit Data');
				$('#modalKaryawan').modal('show');
			}
		});
	});

	$(document).on('click', '.hapus_id', function(){
		var id = $(this).attr('id');
		var action = 'hapus';
		swal({
	      title: 'Are you sure?',
	      text: "Yakin anda ingin menghapus data ini ?",
	      type: 'warning',
	      showCancelButton: true,
	      confirmButtonColor: '#3085d6',
	      cancelButtonColor: '#d33',
	      confirmButtonText: 'Ya, Hapus!',
	      showLoaderOnConfirm: true,
	        
	      preConfirm: function() {
	        return new Promise(function(resolve) {
	             
	           $.ajax({
	            url : 'controller/action.php',
	            type: 'POST',
	            data: {id:id, action:action}
	           })
	           .done(function(){
	            swal('Deleted!', 'Data Berhasil Di Hapus !!', 'success');
	            tampilData();
	           })
	           .fail(function(){
	            swal('Oops...', 'Ada yang salah dengan ajax !', 'error');
	           });
	        });
	     },
	      allowOutsideClick: false        
	    }), function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        }
	});
});