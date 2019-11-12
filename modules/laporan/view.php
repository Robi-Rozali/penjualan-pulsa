<div class="content-header row mb- 3" >
	<div class="col-md-12">
		<h5>
			<i class="fas fa-file-alt title-icon"></i>
		</h5>
		
	</div>
</div>

<div class="border mb-4"></div>

<div class="row">
	<div class="col-md- 12">
		<form id="formFilter" action="modules/laporan/export.php" method="get">
			<div class="row">
				<div class="col">
					<div class="form-group mb- 0">
						<label>Filter : </label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class="form-group">
						<input type="text" class="form-control date-picker" data- date-format="dd-mm- yyyy" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off" required>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-submit" id="btnTampil">Tampilkan</button>
					</div>
				</div>

				<div class="col">
					<div class="form-group right">
						<button type="submit" class="btn btn-success mb-3" id="btnExport">
							<i class="fas fa-file-excel title-icon"></i> Export ke Excel
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="border mt-2 mb-4"></div>

<div class="row">
	<div id="tabelLaporan" class="col-md-12">
		<table class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="center">No.</th>
					<th class="center">Tanggal</th>
					<th class="center">Nama Pelanggan</th>
					<th class="center">No. HP</th>
					<th class="center">Pulsa</th>
					<th class="center">Jumlah Bayar</th>
				</tr>
			</thead>

			<tbody id="loadData"></tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document). ready(function(){
		$('.date-picker' ). datepicker({
			autoclose: true,
			todayHighlight: true
		});

		$('#tabelLaporan' ). hide();
		$('#btnExport' ). hide();

		$('#btnTampil' ). click(function(){
			if ($('#tgl_awal' ). val() ==""){
				$( "#tgl_awal" ). focus();
				swal( "Peringatan!" , "Tanggal awal tidak boleh kosong.", "warning" );
			}

			else if ( $( '#tgl_akhir' ). val() ==""){
				$( "#tgl_akhir" ). focus();
				swal( "Peringatan!" , "Tanggal akhir tidak boleh kosong." , "warning");
			} else {
				var data = $( '#formFilter' ). serialize();

				$.ajax({
					type : "GET",
					url : "modules/laporan/get_data.php",
					data : data,
					success: function(data){
						$('#tabelLaporan' ). show();
						$('#loadData' ). html( data);
						$('#btnExport' ). show();
					}
				});
			}
		});

		$('#btnExport' ). click( function(){
			swal( "Sukses!", "Laporan Data Penjualan berhasil diexport." , "success" );
		});
	});
</script>