<div class="content-header row">
	<div class="col-md-12">
		<div class="alert alert-info" role="alert">
			<i class="fas fa-info-circle title-icon"></i>selamat datang di <strong>Toro Cell</strong>
		</div>
	</div>
</div>

<div class="row mt-4">

	<div class="col-md-3">
		<div class="card center">
			<div class="center mt-4">
				<i class="fas fa-user text-warning fa-7x"></i>
			</div>
			<div class="card-body">
				<h4 class="card-title" id="loadpelanggan"></h4>
				<p class="card-text">Data Pelanggan</p>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card center">
			<div class="center mt-4">
				<i class="fas fa-tablet-alt text-info fa-7x"></i>
			</div>
			<div class="card-body">
				<h4 class="card-title" id="loadpulsa"></h4>
				<p class="card-text">Data Pulsa</p>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card center">
			<div class="center mt-4">
				<i class="fas fa-shopping-cart text-danger fa-7x"></i>
			</div>
			<div class="card-body">
				<h4 class="card-title" id="loadpenjualan"></h4>
				<p class="card-text">Data Penjualan</p>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card center">
			<div class="center mt-4">
				<i class="fas fa-dollar-sign text-success fa-7x"></i>
			</div>
			<div class="card-body">
				<h4 class="card-title" id="loadTotal"></h4>
				<p class="card-text">Total Penjualan</p>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	$('#loadpelanggan').load('modules/beranda/get_pelanggan.php');
	$('#loadpulsa').load('modules/beranda/get_pulsa.php');
	$('#loadpenjualan').load('modules/beranda/get_penjualan.php');
	$('#loadTotal').load('modules/beranda/get_total.php');
});
</script>