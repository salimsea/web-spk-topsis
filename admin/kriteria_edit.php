<?php include_once '../inc/header.php'; ?>

<?php
if(isset($_POST['ubah'])){
		$id_kriteria = $_POST['kriteria_id'];
		$nama_kriteria = $_POST['nama_kriteria'];
		$atribut = $_POST['atribut'];
    $sql = mysqli_query($konek,"UPDATE tbl_kriteria SET nama_kriteria='$nama_kriteria', atribut='$atribut' WHERE id_kriteria='$id_kriteria'");
    if ($sql) {
    	echo "<script>window.alert('Data kriteria berhasil diubah');
       		 window.location=(href='kriteria.php')</script>";
    }
}
?>

<?php 
    $id = isset($_GET['id_kriteria']) ? $_GET['id_kriteria']:'';
    $sql = mysqli_query($konek,"SELECT * FROM tbl_kriteria WHERE id_kriteria='$id'");
    $data = mysqli_fetch_array($sql);
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Perbarui Kriteria
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->

                <form method='POST' action='kriteria_edit.php'>
                    <input type="hidden" name="kriteria_id" value="<?php print $id; ?>"/>
                    <div class="form-group row">
                        <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria"  value="<?php print $data['nama_kriteria'] ?>">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Atribut</label>
                        <div class="col-sm-10">
                            <select class="form-control" name='atribut'>
                                <option value="benefit" <?php if($data['atribut']=='benefit'){print 'selected';} ?>>Benefit</option>
								<option value="cost" <?php if($data['atribut']=='cost'){print 'selected';} ?>>Cost</option>
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
        				    Perbarui Kriteria
    				    </button>
				    </div>
                   
                </form>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>