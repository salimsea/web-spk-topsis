<?php include_once '../inc/header.php'; ?>
 <?php
	$sql = "SELECT  
		a.nama name, b.nama_kriteria as criteria, c.nilai as value,b.bobot_kriteria as weight, b.atribut as attribute  
		FROM
		tbl_produk a, tbl_kriteria b, tbl_himpunan c,  tbl_klasifikasi d 
		where  
		a.id_produk=d.id_produk and c.id_himpunan=d.id_himpunan and b.id_kriteria=c.id_kriteria
		order by a.id_produk asc, b.id_kriteria asc ";

	$result = mysqli_query($konek, $sql);
	$data = array();
	$kriterias = array();
	$bobot = array();
	$atribut = array();
	$nilai_kuadrat = array();
	while ($row = mysqli_fetch_object($result)) {
		if (!isset($data[$row->name])) {
			$data[$row->name] = array();
		}
		if (!isset($data[$row->name][$row->criteria])) {
			$data[$row->name][$row->criteria] = array();
		}
		if (!isset($nilai_kuadrat[$row->criteria])) {
			$nilai_kuadrat[$row->criteria] = 0;
		}
		$bobot[$row->criteria] = $row->weight;
		$atribut[$row->criteria] = $row->attribute;
		$data[$row->name][$row->criteria] = $row->value;
		$nilai_kuadrat[$row->criteria] += pow($row->value, 2);
		$kriterias[] = $row->criteria;
	}
	$kriteria = array_unique($kriterias);
	$jml_kriteria = count($kriteria);
?>
<div class="container-fluid">
    
	<div class="col-md-12">
	    <h1 class="h3 mb-4 text-gray-800">Hasil Analisa TOPSIS</h1>
	    <div class="alert alert-success"><b>Berhasil!</b> Analisa dalam perhitungan TOPSIS telah ditampilkan</div>
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Evaluation Matrix (x<sub>ij</sub>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th rowspan="4">No</th> 
								<th rowspan="3">Alternatif</th>
								<th rowspan="3">nama</th>
								<th colspan='<?php echo $jml_kriteria ?>'><center>Keriteria</center></th>
							</tr>
							<tr>
							<?php 
								foreach ($kriteria as $k) {
								echo "<th>{$k}</th>";
								}
							?>
							</tr>
							<tr>
							<?php 
							for ($n=1; $n<=$jml_kriteria; $n++) { 
								echo "<th>C{$n}</th>";
							}
								?>
							</tr>
							</thead>
							<tbody>
							<?php 
							$i=0;
							foreach ($data as $nama=>$krit) {
								echo "<tr>
								<td>".(++$i)."</td>
								<th>A{$i}</th>
								<th>{$nama}</th>";
								foreach ($kriteria as $k) {
								echo "<td align='center'>{$krit[$k]}</td>";
								}
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Rating Kinerja Ternormalisasi (r<sub>ij</sub>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th rowspan="4">No</th> 
								<th rowspan="3">Alternatif</th>
								<th rowspan="3">nama</th>
								<th colspan='<?php echo $jml_kriteria ?>'><center>Keriteria</center></th>
							</tr>
							<tr>
							<?php 
								foreach ($kriteria as $k) {
								echo "<th>{$k}</th>";
								}
							?>
							</tr>
							<tr>
							<?php 
							for ($n=1; $n<=$jml_kriteria; $n++) { 
								echo "<th>C{$n}</th>";
							}
								?>
							</tr>
							</thead>
							<tbody>
							<?php 
							$i=0;
							foreach ($data as $nama=>$krit) {
								echo "<tr>
								<td>".(++$i)."</td>
								<th>A{$i}</th>
								<th>{$nama}</th>";
								foreach ($kriteria as $k) {
								echo "<td align='center'>".round(($krit[$k])/sqrt($nilai_kuadrat[$k]),4)."</td>";
								}
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Rating Bobot Ternormalisasi(y<sub>ij</sub>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th rowspan="4">No</th> 
								<th rowspan="3">Alternatif</th>
								<th rowspan="3">nama</th>
								<th colspan='<?php echo $jml_kriteria ?>'><center>Keriteria</center></th>
							</tr>
							<tr>
							<?php 
								foreach ($kriteria as $k) {
								echo "<th>{$k}</th>";
								}
							?>
							</tr>
							<tr>
							<?php 
							for ($n=1; $n<=$jml_kriteria; $n++) { 
								echo "<th>C{$n}</th>";
							}
								?>
							</tr>
							</thead>
							<tbody>
							<?php 
							$i=0;
							foreach ($data as $nama=>$krit) {
								echo "<tr>
								<td>".(++$i)."</td>
								<th>A{$i}</th>
								<th>{$nama}</th>";
								foreach ($kriteria as $k) {
								$y[$k][$i-1]=round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4)*$bobot[$k];
								echo "<td align='center'>".$y[$k][$i-1]."</td>";
								}
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Solusi Ideal positif (A<sup>+</sup>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th colspan='<?php echo $jml_kriteria ?>'><center>Keriteria</center></th>
							</tr>
							<tr>
							<?php 
								foreach ($kriteria as $k) {
								echo "<th>{$k}</th>";
								}
							?>
							</tr>
							<tr>
							<?php  
							for ($n=1; $n<=$jml_kriteria; $n++) { 
								echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
							}
							?>
							</tr>
							</thead>
							<tbody>
							<tr>
						<?php 
						$yplus=array();
						foreach ($kriteria as $k) {
							$yplus[$k]=($atribut[$k]=='benefit'?max($y[$k]):min($y[$k]));
							echo "<th>{$yplus[$k]}</th>";
						}
						?>
							</tr>
							</tbody>
						</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Solusi Ideal Negatif (A<sup>-</sup>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th colspan='<?php echo $jml_kriteria ?>'><center>Keriteria</center></th>
							</tr>
							<tr>
							<?php 
								foreach ($kriteria as $k) {
								echo "<th>{$k}</th>";
								}
							?>
							</tr>
							<tr>
							<?php  
							for ($n=1; $n<=$jml_kriteria; $n++) { 
								echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
							}
							?>
							</tr>
							</thead>
							<tbody>
							<tr>
						<?php 
						$ymin=array();
						foreach ($kriteria as $k) {
							$ymin[$k]=($atribut[$k]=='cost'?max($y[$k]):min($y[$k]));
							echo "<th>{$ymin[$k]}</th>";
						}
						?>
							</tr>
							</tbody>
						</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Jarak positif (D <sub>i</sub><sup>+</sup>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th>No</th>
								<th>Alternatif</th>
								<th>Nama</th>
								<th>D <sub>i</sub><sup>+</sup></th>
							</tr>												    
							</thead>
							<tbody>
							<?php 
							$i=0;
							$dplus=array();
							foreach ($data as $nama => $krit) {
							echo "<tr>
							<td>".(++$i)."</td>
							<th>A{$i}</th>
							<td>{$nama}</td>";
							foreach ($kriteria as $k) {
								if (!isset($dplus[$i-1])) $dplus[$i-1]=0;
								$dplus[$i-1]+=pow($yplus[$k]-$y[$k][$i-1],2);
							}
							echo "<td>".round(sqrt($dplus[$i-1]),6)."</td>
							</tr>";
							}
							?>
							</tbody>
						</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Jarak negatif (D <sub>i</sub><sup>-</sup>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th>No</th>
								<th>Alternatif</th>
								<th>Nama</th>
								<th>D <sub>i</sub><sup>-</sup></th>
							</tr>												    
							</thead>
							<tbody>
							<?php 
							$i=0;
							$dmin=array();
							foreach ($data as $nama => $krit) {
							echo "<tr>
							<td>".(++$i)."</td>
							<th>A{$i}</th>
							<td>{$nama}</td>";
							foreach ($kriteria as $k) {
								if (!isset($dmin[$i-1])) $dmin[$i-1]=0;
								$dmin[$i-1]+=pow($ymin[$k]-$y[$k][$i-1],2);
							}
							echo "<td>".round(sqrt($dmin[$i-1]),6)."</td>
							</tr>";
							}
							?>
							</tbody>
						</table>
					</form>
				</div>
				
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Nilai Preferensi (V <sub>i</sub>)
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
						<table class="table" style="margin-bottom: 0;">
							<thead>
							<tr>
								<th>No</th>
								<th>Alternatif</th>
								<th>Nama</th>
								<th>V <sub>i</sub></th>
							</tr>												    
							</thead>
							<tbody>
							<?php 
							$i=0;
							$V=array();
							foreach ($data as $nama => $krit) {
							echo "<tr>
							<td>".(++$i)."</td>
							<th>A{$i}</th>
							<td>{$nama}</td>";
							foreach ($kriteria as $k) {
								$V[$i-1]=$dmin[$i-1]/($dmin[$i-1]+$dplus[$i-1]);
							}
							echo "<td>{$V[$i-1]}</td></tr>";
							}
							?>
							</tbody>
						</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

	<div class="col-md-12">
        <div class="card shadow mb-4">
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                  Ranking
                </h6>
            </div>
            <div class="card-body">
                <!--CONTENTHERE-->
				<div class="responsive-table">
					<form>
					<table class="table" style="margin-bottom: 0;">
						<thead>
						<tr>
							<th>Nama</th>
							<th>Ranking</th>
						</tr>												    
						</thead>
						<tbody>
						<?php 
						$i = 0;
						
						// Mengurutkan array $V berdasarkan nilai terendah
						array_multisort($V, SORT_ASC, $data);
					
						$i = 0;
						foreach ($data as $nama => $krit) {
							++$i;
						echo "<tr>
							<td>{$nama}</td>
							<td>".($i)."</td></tr>";
						}
						?>
						</tbody>
					</table>
					</form>
				</div>
            	<!--CONTENTHERE-->
            </div>
        </div>
	</div>

</div>

<?php include_once '../inc/footer.php'; ?>


