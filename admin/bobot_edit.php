<?php include_once '../inc/header.php'; ?>

<?php
if(isset($_POST['ubah'])){
	$id_bobot = $_POST['bobot_id'];
	$nama_bobot = $_POST['nama_bobot'];
	$nilai = $_POST['nilai'];

  $sql = mysqli_query($konek,"UPDATE tbl_bobot SET nama_bobot='$nama_bobot', nilai='$nilai' WHERE id_bobot='$id_bobot'");
 if ($sql) {
 	echo "<script>window.alert('Data bobot berhasil diubah');
          window.location=(href='bobot.php')</script>";
 }
}
?>

<?php 
    $id = isset($_GET['id_bobot']) ? $_GET['id_bobot']:'';
    $sql = mysqli_query($konek,"SELECT * FROM tbl_bobot WHERE id_bobot='$id'");
    $data = mysqli_fetch_array($sql);
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Perbarui Bobot
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->

                <form method='POST' action='bobot_edit.php'>
                    <input type="hidden" name="bobot_id" value="<?php print $id; ?>">
                    <div class="form-group row">
                        <label for="nama_bobot" class="col-sm-2 col-form-label">Nama Bobot</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_bobot" name="nama_bobot" value="<?php print $data['nama_bobot'] ?>" required>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nilai" name="nilai" value="<?php print $data['nilai'] ?>" required>
                        </div>
                    </div>
                  
				    
				    <div class="mt-5">
    				    <button class='btn btn-danger' onclick=self.history.back()  type="button">
        				    <i class="fas fa-arrow-left fa-fw"></i>
        				    Batalkan
    				    </button>
                        <button class='btn btn-success' name="ubah" type='submit'>
        				    <i class="fas fa-pen fa-fw"></i>
        				    Perbarui Bobot
    				    </button>
				    </div>
                   
                </form>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>