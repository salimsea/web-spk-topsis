<?php include_once '../inc/header.php'; ?>

<div class="container-fluid">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">Data Kriteria</h1>
        <div align='left' class="mb-4">
			<span>
				<a href="kriteria_tambah.php">
				    <button class='btn btn-success'>
    				    <i class="fas fa-plus fa-fw"></i>
    				    Tambah Kriteria
				    </button>
				</a>
			</span>
		</div>
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Daftar Kriteria
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
			    <div>
    				<div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    						<thead>
    							<tr>
    								<th><center>NO.</center></th>
    								<th><center>NAMA KRITERIA</center></th>
    								<th><center>ATRIBUT</center></th>
    								<th><center>SETTING</center></th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php 
    							$no=0;
    							$hasil=mysqli_query($konek,"SELECT * FROM tbl_kriteria");
    							while ($data = mysqli_fetch_array($hasil)) {
    								?>
    							<tr>
    								<td><center><?php echo $no=$no+1; ?></center></td>
    								<td><center><?php print $data['nama_kriteria'] ?></center></td>
    								<td><center><?php print $data['atribut'] ?></center></td>
    								<td>
    									<div class='text-right'>
    										<center>
    											<a class='btn btn-info btn-circle btn-sm' href="kriteria_edit.php?id_kriteria=<?php print $data['id_kriteria']; ?>">
    												<i class='fas fa-pen fa-fw'></i>
    											</a>
    											<a class='btn btn-danger btn-circle btn-sm' href="kriteria_hapus.php?id_kriteria=<?php print $data['id_kriteria']; ?>">
    												<i class='fas fa-trash fa-fw'></i>
    											</a>
    										</center>
    									</div>
    								</td>
    							</tr>
    								<?php
    							}
    							?>
    						</tbody>
    					</table>
    				</div>
    			</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>
