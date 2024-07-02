<?php include_once '../inc/header.php'; ?>

<?php
if(isset($_POST['simpan'])){
    $cek_data = mysqli_num_rows(mysqli_query($konek,"SELECT nip FROM tbl_produk WHERE nama='$_POST[nama]'"));
    if ($cek_data > 0){
        echo "<script>window.alert('Data sudah ada! Mohon ulangi.');
                window.location=(href='pegawai_tambah.php')</script>";
    } else {
        $sql = "INSERT INTO tbl_produk VALUES('','$_POST[nama]','$_POST[harga]','$_POST[stok]',
                '$_POST[terjual]','$_POST[gudang]','$_POST[rating]')";
        $query = mysqli_query($konek,$sql) or die(mysqli_error());
        if($query) {
        echo "<script>window.alert('Data produk berhasil ditambah');
            window.location=(href='produk.php')</script>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Tambah Produk
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->

                <form method='POST' action='produk_tambah.php'>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" name="nama" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="harga" name="harga" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="stok" name="stok" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Terjual</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="terjual" name="terjual">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Lokasi Gudang</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gudang" required>
                                <option selected>Pilih Salah Satu</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Tangerang Selatan">Tangerang Selatan</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Garut">Garut</option>
                                <option value="Jepara">Jepara</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="rating" required>
                                <option selected>Pilih Salah Satu</option>
                                <option value="5">5 Rating (⭐⭐⭐⭐⭐)</option>
                                <option value="4">4 Rating (⭐⭐⭐⭐)</option>
                                <option value="3">3 Rating (⭐⭐⭐)</option>
                                <option value="2">2 Rating (⭐⭐)</option>
                                <option value="1">1 Rating (⭐)</option>
                            </select>
                        </div>
                    </div>
                  
				    
				    <div class="mt-5">
    				    <button class='btn btn-danger' onclick=self.history.back()  type="button">
        				    <i class="fas fa-arrow-left fa-fw"></i>
        				    Batalkan
    				    </button>
                        <button class='btn btn-success' name="simpan" type='submit'>
        				    <i class="fas fa-pen fa-fw"></i>
        				    Tambah Produk
    				    </button>
				    </div>
                   
                </form>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>