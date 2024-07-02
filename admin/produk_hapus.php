<?php 
include '../config/koneksi.php';

$id = isset($_GET['id_produk']) ? $_GET['id_produk']:'';
$query = mysqli_query($konek,"DELETE FROM tbl_produk WHERE id_produk='$id'") or die(mysql_error());
if ($query) {
?>
	<script>
		alert('Data produk berhasil dihapus');
		document.location='produk.php';
	</script>
<?php
}
?>