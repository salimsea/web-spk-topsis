<?php include_once '../inc/header.php'; ?>

<?php
    if(isset($_POST['ubah'])){
        $id = $_POST['id_produk'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $terjual = $_POST['terjual'];
        $gudang = $_POST['gudang'];
        $rating = $_POST['rating'];
        
        $query=mysqli_query($konek,"UPDATE tbl_produk SET nama='$nama', harga='$harga', stok='$stok', terjual='$terjual', gudang='$gudang', rating='$rating'
        WHERE id_produk='$id'");
        if($query) {
            echo "<script>window.alert('Data produk berhasil diubah');
            window.location=(href='produk.php')</script>";
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
                  Perbarui Produk
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->

                <?php 
                $id = isset($_GET['id_produk']) ? $_GET['id_produk']:'';
                $sql = mysqli_query($konek,"SELECT * FROM tbl_produk WHERE id_produk='$id'");
                $data = mysqli_fetch_array($sql);
                ?>
                <form method='POST' action='produk_edit.php'>
                    <input type="hidden" name="id_produk" value="<?php echo $id; ?>"/>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="harga" name="harga" value="<?=$data['harga'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="stok" name="stok" value="<?=$data['stok'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Terjual</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="terjual" name="terjual" value="<?=$data['terjual'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Lokasi Gudang</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gudang" required>
                                <option <?=($data['gudang']=='Jakarta')?'selected="selected"':''?> value="Jakarta">Jakarta</option>
                                <option <?=($data['gudang']=='Tangerang Selatan')?'selected="selected"':''?> value="Tangerang Selatan">Tangerang Selatan</option>
                                <option <?=($data['gudang']=='Bandung')?'selected="selected"':''?> value="Bandung">Bandung</option>
                                <option <?=($data['gudang']=='Garut')?'selected="selected"':''?> value="Garut">Garut</option>
                                <option <?=($data['gudang']=='Jepara')?'selected="selected"':''?> value="Jepara">Jepara</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="rating" required>
                                <option value="5" <?=($data['rating']=='5')?'selected="selected"':''?>>5 Rating (⭐⭐⭐⭐⭐)</option>
                                <option value="4" <?=($data['rating']=='4')?'selected="selected"':''?>>4 Rating (⭐⭐⭐⭐)</option>
                                <option value="3" <?=($data['rating']=='3')?'selected="selected"':''?>>3 Rating (⭐⭐⭐)</option>
                                <option value="2" <?=($data['rating']=='2')?'selected="selected"':''?>>2 Rating (⭐⭐)</option>
                                <option value="1" <?=($data['rating']=='1')?'selected="selected"':''?>>1 Rating (⭐)</option>
                            </select>
                        </div>
                    </div>
                  
				    
				    <div class="mt-5">
    				    <button class='btn btn-danger' onclick=self.history.back()  type="button">
        				    <i class="fas fa-arrow-left fa-fw"></i>
        				    Batalkan
    				    </button>
                        <button class='btn btn-success' name="ubah" type='submit'>
        				    <i class="fas fa-pen fa-fw"></i>
        				    Perbarui Produk
    				    </button>
				    </div>
                   
                </form>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>