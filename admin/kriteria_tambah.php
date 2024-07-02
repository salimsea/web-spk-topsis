<?php include_once '../inc/header.php'; ?>

<?php
if(isset($_POST['simpan'])){
    $cek_data = mysqli_num_rows(mysqli_query($konek,"SELECT nama_kriteria FROM tbl_kriteria WHERE nama_kriteria='$_POST[nama_kriteria]'"));
    if ($cek_data > 0){
        echo "<script>window.alert('Data kriteria sudah ada! Mohon ulangi.'); window.location.href='kriteria_tambah.php';</script>";
    } else {
        $sql = "INSERT INTO tbl_kriteria (nama_kriteria, atribut) VALUES ('$_POST[nama_kriteria]', '$_POST[atribut]')";
        $query = mysqli_query($konek, $sql);
        if($query) {
            echo "<script>window.alert('Data kriteria berhasil ditambah'); window.location.href='kriteria.php';</script>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Tambah Kriteria
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->

                <form method='POST' action='kriteria_tambah.php'>
                    <div class="form-group row">
                        <label for="namaKriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="namaKriteria" name="nama_kriteria" >
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Atribut</label>
                        <div class="col-sm-10">
                            <select class="form-control" name='atribut'>
                                <option selected disabled>Pilih Salah Satu</option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                    </div>
                  
                    <div class="mt-5">
                        <button class='btn btn-danger' onclick="window.history.back()" type="button">
                            <i class="fas fa-arrow-left fa-fw"></i>
                            Batalkan
                        </button>
                        <button class='btn btn-success' name="simpan" type='submit'>
                            <i class="fas fa-pen fa-fw"></i>
                            Tambah Kriteria
                        </button>
                    </div>
                   
                </form>
            
                <!--CONTENTHERE-->
            </div>
        </div>
    </div>
</div>

<?php include_once '../inc/footer.php'; ?>