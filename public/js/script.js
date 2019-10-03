$(function() {

	$('.tombolTambahData').on('click', function() {

		$('#forModalLabel').html('Tambah Data Mahasiswa');
		$('button[type=submit]').html('Tambah Data');
		
	});

	$('.tampilModelUbah').on('click', function() {
		$('#forModalLabel').html('Ubah Data Mahasiswa');
		$('button[type=submit]').html('Ubah Data');
		$('form').attr('action', '/phpmvc/public/mahasiswa/ubah');
		const id = $(this).data('id');


		$.ajax({
				url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
				data: {id : id},
				method: 'POST',
				success: function(data) {
					$('#nama').val(JSON.parse(data).nama)
					$('#nrp').val(JSON.parse(data).nrp)
					$('#email').val(JSON.parse(data).email)
					$('#jurusan').val(JSON.parse(data).jurusan)
					$('#id').val(JSON.parse(data).id)


				}

		});

	});

});