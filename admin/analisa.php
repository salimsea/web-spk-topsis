<?php include_once '../inc/header.php'; ?>

 <?php 
    if (isset($_POST['btnSubmit'])) {
      $q = mysqli_query($konek, "SELECT * FROM tbl_kriteria");
      while ($h = mysqli_fetch_array($q)) {
        $bobot_kriteria = $_POST['bobot_'.$h['id_kriteria']];
        $up = "UPDATE `tbl_kriteria` SET `bobot_kriteria`=$bobot_kriteria WHERE id_kriteria=$h[id_kriteria]";
        mysqli_query($konek, $up);
      }
      exit("<script>location.href='analisa_hasil.php';</script>");
    }

    # menampilkan bobot
    $b = mysqli_query($konek, "SELECT * FROM tbl_bobot");
    $bobot = array();
    $nmBobot = array();
    while ($bobot1 = mysqli_fetch_array($b)) {
      $bobot[] = $bobot1['nilai'];
      $nmBobot[] = $bobot1['nama_bobot'];
    }

    $q = mysqli_query($konek, "SELECT * FROM tbl_kriteria");
    $no = 0;
    $daftarKriteria = '';
    while ($h = mysqli_fetch_array($q)) {
      $no++;
      $listBobot = '';
      for ($i = 0; $i < count($bobot); $i++) { 
        $s = ($h['bobot_kriteria'] == $bobot[$i]) ? ' selected' : '';
        $listBobot .= '<option value="'.$bobot[$i].'"'.$s.'>'.$nmBobot[$i].'</option>';
      }
      $daftarKriteria .= '
      <tr>
        <td width="160"><strong>C'.$no.'.</strong>&nbsp;&nbsp; '.$h['nama_kriteria'].'</td>
        <td><select class="form-control" name="bobot_'.$h['id_kriteria'].'" style="width:150px">'.$listBobot.'</select></td>
      </tr>
      ';
    }
?>

<div class="container-fluid">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">Analisa TOPSIS</h1>
        <div class="alert alert-warning">Tentukan bobot terlebih dahulu!</div>
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Analisa TOPSIS
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
                <form action="analisa.php" method="post">
                    <div class="box-content box-no-padding">
                        <div class="responsive-table">
                            <table class="table" style="margin-bottom: 0;">
                              <?php echo $daftarKriteria; ?>
                            </table>
                        </div>
                    </div>
                    <br />
                    <button type="submit" name="btnSubmit" class="btn btn-info">
                        <i class="fas fa-cog fa-fw"></i> Mulai Analisa 
                    </button>
                </form>
			
            	<!--CONTENTHERE-->
            </div>
        </div>
      </div>
	
</div>

<?php include_once '../inc/footer.php'; ?>

