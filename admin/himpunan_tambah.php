<?php include_once '../inc/header.php'; ?>

<?php 
if (isset($_POST['simpan'])) {
	$kriteria_id = $_POST['kriteria_id'];
	$namahimp = $_POST['namahimpunan'];
	$nilai = $_POST['nilai'];

	$cek_data = mysqli_num_rows(mysqli_query($konek,"SELECT nama, nilai FROM tbl_himpunan WHERE nama='$_POST[namahimpunan]' AND nilai='$_POST[nilai]'"));
	if ($cek_data>0) {
		echo "<script>window.alert('Data himpunan sudah ada! Mohon ulangi.');
        window.location=(href='himpunan_tambah.php')</script>";
	} else {
		$sql = "INSERT INTO tbl_himpunan VALUES('','$kriteria_id','$namahimp','$nilai')";
		$query = mysqli_query($konek,$sql);
		if ($query) {
			echo "<script>window.alert('Data himpunan berhasil ditambah');
            window.location=(href='himpunan.php')</script>";
		}
	}
}
?>

<?php 
	$id = isset($_GET['id_kriteria']) ? $_GET['id_kriteria']:'';
	$query = "SELECT * FROM tbl_kriteria WHERE id_kriteria='".$id."'";
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
                  Tambah Himpunan
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
    
                <form method='POST' action='himpunan_tambah.php'>
                    <input type="hidden" name="kriteria_id" value="<?php print $id; ?>" />
                    <div class="form-group row">
                        <label for="nama_bobot" class="col-sm-2 col-form-label">Nama Kriteria</label>
                        <div class="col-sm-10">
                          <?php print $rows['nama_kriteria'] ?>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="namahimpunan" class="col-sm-2 col-form-label">Nama Himpunan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="namahimpunan" name="namahimpunan" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="nilai" name="nilai" required>
                        </div>
                    </div>
                  
    			    <div class="mt-5">
    				    <button class='btn btn-danger' onclick=self.history.back()  type="button">
        				    <i class="fas fa-arrow-left fa-fw"></i>
        				    Batalkan
    				    </button>
                        <button class='btn btn-success' name="simpan" type='submit'>
        				    <i class="fas fa-pen fa-fw"></i>
        				    Tambah Himpunan
    				    </button>
    			    </div>
                   
                </form>
    		
            	<!--CONTENTHERE-->
            </div>
        </div>
    </div>
</div>

<?php include_once '../inc/footer.php'; ?>
