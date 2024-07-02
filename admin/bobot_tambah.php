<?php include_once '../inc/header.php'; ?>

<?php
if(isset($_POST['simpan'])){

    $cek_data = mysqli_num_rows(mysqli_query($konek,"SELECT nama_bobot FROM tbl_bobot WHERE nama_bobot='$_POST[nama_bobot]'"));
    if ($cek_data > 0){
        echo "<script>window.alert('Data kriteria sudah ada! Mohon ulangi.');
                window.location=(href='bobot_tambah.php')</script>";
	} else {
        $sql = "INSERT INTO tbl_bobot VALUES('','$_POST[nama_bobot]','$_POST[nilai]')";
        $query = mysqli_query($konek,$sql);
        if($query) {
        echo "<script>window.alert('Data Bobot berhasil ditambah');
                window.location=(href='bobot.php')</script>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Tambah Bobot
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->

                <form method='POST' action='bobot_tambah.php'>
                    <div class="form-group row">
                        <label for="nama_bobot" class="col-sm-2 col-form-label">Nama Kriteria</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_bobot" name="nama_bobot" >
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="nilai" name="nilai" >
                        </div>
                    </div>
                  
                    <div class="mt-5">
                        <button class='btn btn-danger' onclick="window.history.back()" type="button">
                            <i class="fas fa-arrow-left fa-fw"></i>
                            Batalkan
                        </button>
                        <button class='btn btn-success' name="simpan" type='submit'>
                            <i class="fas fa-pen fa-fw"></i>
                            Tambah Bobot
                        </button>
                    </div>
                </form>
            
                <!--CONTENTHERE-->
            </div>
        </div>
    </div>
</div>

<?php include_once '../inc/footer.php'; ?>