<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )){
	require_once "../../config/config.php";
	$query = "INSERT INTO tbl_pulsa(provider, nominal, harga) VALUES (?,?,?)";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("sii", $provider, $nominal, $harga);

	$provider = trim($_POST['provider']);
	$nominal = trim($_POST['nominal']);
	$harga = trim($_POST['harga']);

	$stmt->execute();

	if ($stmt) {
		echo "sukses";
	} else {
		echo "gagal";
	}
	$stmt->close();
	$mysqli->close();
} else {
	echo '<script>window.location="../../index.php"</script>';
}
?>