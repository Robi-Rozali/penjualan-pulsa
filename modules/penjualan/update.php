<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
	require_once "../../config/config.php";

	if (isset($_POST['id_penjualan'])){
		$query = "UPDATE tbl_penjualan SET tanggal	= ?,
			pelanggan	= ?,
			jumlah_bayar	= ?
			where id_penjualan	= ?",
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("siiii", $tanggal, $pelanggan, $pulsa, $jumlah_bayar, $id_penjualan);
		$id_penjualan = trim($_POST['id_penjualan']);
		$tanggal = trim(date('Y-m-d', strtotime($_POST['tanggal'])));
		$pelanggan = trim($_POST['id_pelanggan']);
		$pulsa = trim($_POST['id_pulsa']);
		$jumlah_bayar = trim($_POST['harga']);

		$stmt->execute();

		if ($stmt){
			echo "sukses";
		} else {
			echo "gagal";
		}

		$stmt->close();
	}

	$mysqli->close();
} else {
	echo '<script>window.location="../../index.php"</script>';
}
?>