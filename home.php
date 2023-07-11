<style>
	.a2 {
		color: #363636;
		font-family: Daddysgirl;
		font-size: 20px;
	}

	.lead {
		color: #363636;
		font-family: Daddysgirl;
		font-size: 20px;
	}

	.btn {
		font-family: "Showcard Gothic", sans-serif;
	}

	.btn {
		font-family: "Showcard Gothic", sans-serif;
	}

	.card-header {
		font-family: Daddysgirl;
	}

	label {
		font-family: Daddysgirl;
	}

	.card-header {
		background-color: #3a5f3a !important;
	}

	.table {
		font-family: Daddysgirl;
		font-size: 16px;
	}

	.btn-info {
		background-color: #363636;
		border-color: #363636;
		font-family: "Showcard Gothic", sans-serif;
	}
</style>

<div class="jumbotron mt-3">
	<h1 class="display-4">Selamat Datang Admin,</h1>
	<p class="lead">Nahida's Archieve adalah website manajemen dokumen. Arhieve ini dibuat untuk memenuhi tugas tugas UTS Mobile and Web Programming</p>
	<hr class="my-4">

	<div class="card mt-3">
		<div class="card-header bg-info text-white">
			<div class="d-flex align-items-center justify-content-between">
				<span>Dokumen yang Sudah Terdaftar (Gunakan Judul Untuk Melakukan Pencarian)</span>
				<form class="form-inline my-2 my-lg-0" action="" method="GET">
					<div class="input-group">
						<input class="form-control custom-search mr-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success" type="submit" value="search">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-borderd table-hovered table-striped">
			<tr>
				<th>No</th>
				<th>ID Dokumen</th>
				<th>Tanggal Terbit</th>
				<th>Tanggal Beli</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th>Pengirim</th>
				<th>File</th>
			</tr>
			<?php
			$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
			$query = "SELECT 
               tbl_arsip.*,
               tbl_departemen.nama_departemen,
               tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
          FROM 
               tbl_arsip, tbl_departemen, tbl_pengirim_surat
          WHERE 
               tbl_arsip.id_departemen = tbl_departemen.id_departemen
               AND tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
               AND tbl_arsip.prihal LIKE '%$keyword%'";
			$tampil = mysqli_query($koneksi, $query);
			$no = 1;
			while ($data = mysqli_fetch_array($tampil)) :
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['no_surat'] ?></td>
					<td><?= $data['tanggal_surat'] ?></td>
					<td><?= $data['tanggal_diterima'] ?></td>
					<td><?= $data['prihal'] ?></td>
					<td><?= $data['nama_departemen'] ?></td>
					<td><?= $data['nama_pengirim'] ?> / <?= $data['no_hp'] ?></td>
					<td>
						<?php
						//uji apakah file nya ada atau tidak
						if (empty($data['file'])) {
							echo " - ";
						} else {
						?>
							<a href="file/<?= $data['file'] ?>" target="$_blank"> lihat file </a>
						<?php
						}
						?>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
</div>

<hr class="my-4">

<p class="a2">Gunakan navbar diatas untuk mengakses menu-menu lainnya.</p>
<a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
</div>