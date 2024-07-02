<?php include_once '../inc/header.php'; ?>

<?php 
	if (isset($_POST['ubah'])) {
		$id = $_POST['id'];
		$nama = $_POST['namahimpunan'];
		$nilai = $_POST['nilai'];

		$query = mysqli_query($konek,"UPDATE tbl_himpunan SET nama='$nama', nilai='$nilai' WHERE id_himpunan='$id'");

		if ($query) {
			echo "<script>window.alert('Data himpunan berhasil diubah');
                    window.location=(href='himpunan.php')</script>";
		}
	}
?>

<?php 
	$id = isset($_GET['id_himpunan']) ? $_GET['id_himpunan']:'';
	$query = "SELECT tbl_himpunan.id_himpunan,tbl_himpunan.nama,tbl_himpunan.nilai,
	tbl_kriteria.id_kriteria,tbl_kriteria.nama_kriteria 
	FROM tbl_kriteria JOIN tbl_himpunan ON 
	tbl_kriteria.id_kriteria=tbl_himpunan.id_kriteria WHERE id_himpunan='".$id."'";
	$sql = mysqli_query($konek,$query);
	if (mysqli_num_rows($sql)>0) {
		$rows=mysqli_fetch_array($sql);
	}
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Perbarui Himpunan
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->

                <form method='POST' action='himpunan_edit.php'>
                    <input type="hidden" name="id" value="<?php print $id; ?>">
                    <div class="form-group row">
                        <label for="nama_bobot" class="col-sm-2 col-form-label">Nama Kriteria</label>
                        <div class="col-sm-10">
                          <?php print $rows['nama_kriteria'] ?>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="namahimpunan" class="col-sm-2 col-form-label">Nama Himpunan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="namahimpunan" name="namahimpunan" value="<?php print $rows['nama'] ?>" required>
                        </div>
                    </div>
                    
                 <div class="form-group row">
                        <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="nilai" name="nilai" value="<?php print $rows['nilai'] ?>" required>
                        </div>
                    </div>
                  
				    
				    <div class="mt-5">
    				    <button class='btn btn-danger' onclick=self.history.back()  type="button">
        				    <i class="fas fa-arrow-left fa-fw"></i>
        				    Batalkan
    				    </button>
                        <button class='btn btn-success' name="ubah" type='submit'>
        				    <i class="fas fa-pen fa-fw"></i>
        				    Perbarui Himpunan
    				    </button>
				    </div>
                   
                </form>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>