<?php include_once '../inc/header.php'; ?>

<?php 
if (!empty($_POST['btnSimpan'])) {
	# hapus semua data klasifikasi pada pegawai tertentu
	mysqli_query($konek,"DELETE FROM tbl_klasifikasi WHERE id_produk='".$_POST['id_produk']."'");
	$q=mysqli_query($konek,"SELECT * FROM tbl_kriteria");
	if (mysqli_num_rows($q) > 0) {
		while ($h=mysqli_fetch_array($q)) {
			# insert data klasifikasi
			if (!empty($_POST['himpunan_'.$h['id_kriteria']])) {
				mysqli_query($konek,"INSERT INTO tbl_klasifikasi(id_produk,id_himpunan) VALUES('".$_POST['id_produk']."','".$_POST['himpunan_'.$h['id_kriteria']]."')");
			}
		}
	}
	echo "<script>alert('Data berhasil tersimpan');location.href='klasifikasi.php';</script>";
}

$q=mysqli_query($konek,"SELECT * FROM tbl_produk ORDER BY id_produk");
if (mysqli_num_rows($q)>0) {
	while ($h=mysqli_fetch_array($q)) {
		$daftarKriteria='';
		$n=0;
		# menampilkan data kriteria untuk tiap pegawai
		$qq=mysqli_query($konek,"SELECT * FROM tbl_kriteria");
		if (mysqli_num_rows($qq)>0) {
			while ($hh=mysqli_fetch_array($qq)) {
				# menampilkan data himpunan untuk dimasukan ke dalam combobox kriteria
				$listKriteria='<option value="">-Pilih Salah Satu-</option>';
				$qqq=mysqli_query($konek,"SELECT * FROM tbl_himpunan WHERE id_kriteria='".$hh['id_kriteria']."'");
				if (mysqli_num_rows($qqq)>0) {
					while ($hhh=mysqli_fetch_array($qqq)) {
						if (mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tbl_klasifikasi WHERE id_produk='".$h['id_produk']."' AND id_himpunan='".$hhh['id_himpunan']."'"))>0) {
							# merupakan himpunan yang terpilih/ tersimpan
							$s=' selected';
						}else{
							$s='';
						}
						$listKriteria.='<option value="'.$hhh['id_himpunan'].'"'.$s.'>'.$hhh['nama'].' - Nilai: ('.$hhh['nilai'].')</option>';
					}
				}
				$n++;
				$input='<select class="form-control" name="himpunan_'.$hh['id_kriteria'].'">'.$listKriteria.'</select>';

				$daftarKriteria.='
				<tr>
					<td width="120">'.$hh['nama_kriteria'].'</td>
					<td>'.$input.'</td>
				</tr>
				';
			}
		}

		$no++;

		$daftar.='
		<tr>
			<td align="center" valign="top"><center>'.$no.'</center></td>
			<td align="center" valign="top"><center>'.$h['nama'].'</center></td>
			<td align="center" valign="top"><center><span id="cmd_'.$h['id_produk'].'"><strong>Edit Klasifikasi</strong></span></center></td>
		</tr>

		<tr>
		<td valign="top" colspan="5">
		<form action="" name="" method="post" id="kla_'.$h['id_produk'].'" style="display:none">
		<input name="id_produk" type="hidden" value="'.$h['id_produk'].'" />
			<table class="table" style="margin-bottom:0;">
				<!--<tr>
				<td colspan="2"><strong>'.$no.'. '.strtoupper($h['nama']).'</strong></td>
			  </tr>-->
			'.$daftarKriteria.'
			<tr>
				<td width="140"></td>
				<td><input name="btnSimpan" class="btn btn-danger" type="submit" value="Simpan"></td>
			</tr>
			</table>
		</form>
		</td>
		</tr>
		';

		$js.="
		$('#cmd_".$h['id_produk']."').css( 'cursor', 'pointer' );
		$('#cmd_".$h['id_produk']."').click(function() {
			$('#kla_".$h['id_produk']."').toggle('slow', function() {				
			});
		});
		";
	}
}

?>

<div class="container-fluid">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">Proses Klasifikasi</h1>
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Klasifikasi Produk
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th><center>NO.</center></th>
									<th><center>PRODUK</center></th>
									<th><center>SETTING</center></th>
								</tr>
							</thead>
							<tbody>
								<?php echo $daftar; ?>
							</tbody>
						</table>
					</div>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
</div>


<!-- toggle edit klasifikasi -->
<script type="text/javascript" src="../assets/js/jquery-1.3.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
	<?php echo $js; ?>
</script>

<?php include_once '../inc/footer.php'; ?>
