<?php 
include '../config/koneksi.php';

$id = isset($_GET['id_himpunan']) ? $_GET['id_himpunan']:'';
$query = mysqli_query($konek,"DELETE FROM tbl_himpunan WHERE id_himpunan='$id'") or die(mysql_error());
if ($query) {
?>
	<script>
		alert('Data himpunan berhasil dihapus');
		document.location='himpunan.php';
	</script>
<?php
}
?>