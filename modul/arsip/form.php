<?php
	//panggil function.php untuk upload file
	include "config/function.php";

	//Uji Jika klik tombol edit / hapus
	if(isset($_GET['hal']))
	{

		if($_GET['hal'] == "edit")
		{

			//tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT 
    				  	tbl_arsip.*,
    				  	tbl_departemen.nama_departemen,
    				  	tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
    				  FROM 
    				  	tbl_arsip, tbl_departemen, tbl_pengirim_surat
    				  WHERE 
    				  	tbl_arsip.id_departemen = tbl_departemen.id_departemen
    				  	and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
					    and tbl_arsip.id_arsip='$_GET[id]'");


			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vno_surat = $data['no_surat'];
				$vtanggal_surat = $data['tanggal_surat'];
				$vtanggal_diterima = $data['tanggal_diterima'];
				$vprihal = $data['prihal'];
				$vid_departemen = $data['id_departemen'];
				$vnama_departemen = $data['nama_departemen'];
				$vid_pengirim = $data['id_pengirim'];
				$vnama_pengirim = $data['nama_pengirim'];
				$vfile = $data['file'];
			}

		}
		elseif($_GET['hal'] == 'hapus')
		{
			$hapus = mysqli_query($koneksi, "DELETE FROM tbl_arsip WHERE id_arsip='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=arsip_surat';
					  </script>";
			}
		}
		

	}
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if(@$_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data

			// cek apakah user pilih file/gambar atau tidak 
			if($_FILES['file']['error'] === 4){
				$file = $vfile;
			}else{
				$file = upload();
			}

			$ubah = mysqli_query($koneksi, "UPDATE tbl_arsip SET 
												no_surat 		= '$_POST[no_surat]',
												tanggal_surat	= '$_POST[tanggal_surat]',
												tanggal_diterima = '$_POST[tanggal_diterima]',
												prihal 			= '$_POST[prihal]',
												id_departemen 	= '$_POST[id_departemen]',
												id_pengirim 	= '$_POST[id_pengirim]',
												file 			= '$file'
											where id_arsip = '$_GET[id]' ");
			
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=arsip_surat';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=arsip_surat';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$file = upload();
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip 
											  VALUES (	'', 
											  		  	'$_POST[no_surat]', 
											  		  	'$_POST[tanggal_surat]',
											  		  	'$_POST[tanggal_diterima]',
											  		  	'$_POST[prihal]',
											  		  	'$_POST[id_departemen]',
											  		  	'$_POST[id_pengirim]',
											  		  	'$file'
											  		  ) ");

			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=arsip_surat';
					  </script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=arsip_surat';
					  </script>";
			}

		}


		
	}

	

?>

<style>
	.btn {
	font-family: "Showcard Gothic", sans-serif;
	}
	.card-header{
	font-family: Daddysgirl;
	}
	label{
	font-family: Daddysgirl;
	}
	.card-header {
    background-color: #3a5f3a !important;
    }
	.table {
    font-family: Daddysgirl;
	font-size: 16px;
  	}
</style>

<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    Form Data Arsip Dokumen
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data" >
	  <div class="form-group">
	    <label for="no_surat">ID Dokumen</label>
	    <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?=@$vno_surat?>">
	  </div>
	  <div class="form-group">
	    <label for="tanggal_surat">Tanggal Terbit</label>
	    <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?=@$vtanggal_surat?>">
	  </div>
	  <div class="form-group">
	    <label for="tanggal_diterima">Tanggal Beli</label>
	    <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" value="<?=@$vtanggal_diterima?>">
	  </div>
	  <div class="form-group">
	    <label for="prihal">Judul</label>
	    <input type="text" class="form-control" id="prihal" name="prihal" value="<?=@$vprihal?>">
	  </div>
	  <div class="form-group">
	    <label for="id_departemen">Kategori</label>
	   	<select class="form-control" name="id_departemen">
	   		<option value="<?=@$vid_departemen?>"><?=@$vnama_departemen?></option>
	   		<?php
	   			$tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by nama_departemen asc");
	   			while($data = mysqli_fetch_array($tampil)){
	   				echo "<option value = '$data[id_departemen]'> $data[nama_departemen] </option> ";
	   			}

	   		?>
	   	</select>
	  </div>
	  <div class="form-group">
	    <label for="id_pengirim">Pengirim Dokumen</label>
	   	<select class="form-control" name="id_pengirim">
	   		<option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
	   		<?php
	   			$tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by nama_pengirim asc");
	   			while($data = mysqli_fetch_array($tampil)){
	   				echo "<option value = '$data[id_pengirim_surat]'> $data[nama_pengirim] </option> ";
	   			}

	   		?>
	   	</select>
	  </div>

	  <div class="form-group">
	    <label for="file">Pilih File</label>
	    <input type="file" class="form-control" id="file" name="file" value="<?=@$vfile?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>