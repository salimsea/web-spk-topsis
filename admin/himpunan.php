<?php include_once '../inc/header.php'; ?>

<div class="container-fluid">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">Data Himpunan Kriteria</h1>
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Daftar Himpunan
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
                
                <?php
                	$id = isset($_GET['id_kriteria']) ? $_GET['id_kriteria'] : false;
					$result = mysqli_query($konek,"SELECT * FROM tbl_kriteria");
					echo "<div class=\"row\"><div class=\"col-md-4\">";
					echo "<select name=\"prdId\" class=\"form-control\" onchange=\"changeValue(this.value)\">";
					echo "<option>- Pilih -</option>";
					while ($row=mysqli_fetch_array($result)) {
						echo "<option value=\"".$row['id_kriteria']."\"".($id ? ($id==$row['id_kriteria'] ? 'selected' : '') : '').">".$row['nama_kriteria']."</option>";
					}
					echo "<select></div></div>";
                ?>
                
                
                <div>
                    <div class='responsive-table'>
    					<div class='scrollable-area'>
    						<div align='right' class="mb-4"><?php if($id>0){?><a href="himpunan_tambah.php?id_kriteria=<?php print $id; ?>"><button class='btn btn-success'><i class="fas fa-plus fa-fw"></i> Tambah Himpunan</button></a><?php } ?></div>
    							<div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            							<thead>
            								<tr>
            									<th><center>NO.</center></th>
            									<th><center>NAMA</center></th>
            									<th><center>NILAI</center></th>
            									<th><center>AKSI</center></th>
            								</tr>
            							</thead>
            							<?php 
            							if ($id) {
            								$q = "SELECT tbl_kriteria.id_kriteria,tbl_kriteria.nama_kriteria, tbl_himpunan.id_himpunan,tbl_himpunan.nama,tbl_himpunan.nilai
            								FROM tbl_kriteria JOIN tbl_himpunan ON tbl_kriteria.id_kriteria=tbl_himpunan.id_kriteria
            								WHERE tbl_kriteria.id_kriteria='$id'";
            								$result = mysqli_query($konek,$q);
            								$no=1;
            								while ($row=mysqli_fetch_array($result)) {
            									?>
            								<tbody>
            									<tr>
            										<td><center><?php print $no; ?></center></td>
            										<td><center><?php print $row['nama'] ?></center></td>
            										<td><center><?php print $row['nilai'] ?></center></td>
            										<td>
            											<div class="text-right">
            												<center>
            													<a class="btn btn-info btn-circle btn-sm" href="himpunan_edit.php?id_himpunan=<?php print $row['id_himpunan']; ?>">
            														<i class="fas fa-pen fa-fw"></i>
            													</a>
            													<a class="btn btn-danger btn-circle btn-sm" href="himpunan_hapus.php?id_himpunan=<?php print $row['id_himpunan']; ?>">
            														<i class="fas fa-trash fa-fw"></i>
            													</a>
            												</center>
            											</div>
            										</td>
            									</tr>
            								</tbody>
            							<?php
            							$no++;
            								}
            							}
            							?>
            							
            							<script type="text/javascript">
                                            function changeValue(id) {
                                                window.location = "?id_kriteria="+id;
                                            };
                                        </script>
            						</table>
            					</div>
        					</div>
        				</div>
        			</div>
                </div>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>


