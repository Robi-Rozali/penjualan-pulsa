<div class="content-header row mb-3">
	<div class="col-md-12">
		<h5>
			<i class="fas fa-user title-icon"></i> Data Plenaggan
			<a class="btn btn-info float-right" id="btnTambah" href="javascript;void(0);" data-toggle="modal" data-target="#modalpelanggan" role="button"><i class="fas fa-plus"></i>Tambah</a>
		</h5>
	</div>
</div>

<div class="border mb-4"></div>

<div class="row">
	<div class="col-md-12">
		<table id="table-pelanggan" class="table table-striped table-bordered style="width:100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>ID Pelanggan</th>
					<th>Nama Pelanggan</th>
					<th>No. HP</th>
					<th></th>
				</tr>
			</thead>
			
		</table>
	</div>
</div>

<div class="modal fade" id="modalpelanggan" tabindex="-1" role="dialog" aria-labelledby="modalpelanggan" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title"><i class="fas fa-edit title-icon"></i><span id="modallabel"></span></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form id="formpelanggan">
			<div class="modal-body">
				<input type="hidden" id="id_pelanggan" name="id-pelanggan">
				<div class="form-group">
					<label>Nama Pelanggan</label>
					<input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
				</div>
				<div class="form-group">
					<label>No Hp</label>
					<input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info btn-submit" id="btnsimpan">Simpan</button>
				<button type="button" class="btn btn-secondary btn-reset" data-dismiss="modal">Batal</button>
			</div>
		</form>
	</div>	
	</div>
</div>

<script type="text/javascript">
	 $(document).ready(function(){ 
	 	$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) 
	 	{
	 		return{
	 			"iStart": oSettings._iDisplayStart, 
	 			"iEnd": oSettings.fnDisplayEnd(), 
	 			"ilength": oSettings._iDisplayLenght,
	 			"iTotal": oSettings.fnRecordsTotal(),
	 			"iFilteredTotal": oSettings.fnRecordsDisplay(), 
	 			 "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
	 			 "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength) 

	 		};
	 	};

	 	var table = $('#tabel-pelanggan').dataTable({
	 		"scrolly": '45vh',
	 		"scrollCollapse": true,
	 		"processing": true,
	 		"serverside": true,
	 		"ajax": 'modules/Pelanggan/data.php',
	 		"columnDefs":[
	 		{"targets": 0, "data": null, "orderable": false,"searchable": false, "width": '30px', "className": 'center'},
	 		{ "targets": 1, "visible": false }, 
	 		{ "targets": 2, "width": '180px' }, 
	 		{ "targets": 3, "width": '100px', "className": 'center' }, 
	 		{
	 			 "targets": 4, "data": null, "orderable": false, "searchable": false, "width": '70px', "className": 'center',
	 			 "render": function(data, type, row) { 
	 			 	var btn = "<a style=\"margin-right:7px\" title=\"Ubah\" class=\"btn btn-info btn-sm getUbah\" href=\"javascript:void(0);\"><i class=\"fas fa-edit\"></i></a><a title=\"Hapus\" class=\"btn btn-danger btn-sm btnHapus\" href=\"javascript:void(0);\"> <i class=\"fas fa-trash\"></i></a>";
	 			 	return btn;
	 			 }
	 		}
	 		],
	 		"order": [[ 1, "desc" ]],
	 		"iDisplayLength": 10,
	 		"rowcallback": function(row, data, iDisplayindex){
	 			var info = this.fnPagingInfo();
	 			var page = info.iPage;
	 			var length = info.iLength;
	 			var index = page * length + (iDisplayIndex + 1); 
	 			$('td:eq(0)', row).html(index); 

	 		}
	 	});

	 	$('#btnTambah').click(function(){ 
	 		$('#formPelanggan')[0].reset(); 
	 		$('#modalLabel').text('Entri Data Pelanggan'); 
	 	});

	 	$('#tabel-pelanggan tbody').on( 'click', '.getUbah', function (){ 
	 		$('#modalLabel').text('Ubah Data Pelanggan');
var data = table.row($(this).parents('tr')).data(); 134:
135:var id_pelanggan=data[1];
			$.ajax({
				type : "GET"
				url : "modules/pelanggan/get_data.php",
				data : {id_pelanggan:id_pelanggan},
				datatype : "json",
				success : function(result){
					$('#modalPelanggan').modal('show'); 
					$('#id_pelanggan').val(result.id_pelanggan);
					$('#nama').val(result.nama); 
					$('#no_hp').val(result.no_hp);
				}
				});
			});
	 	 // ===============================================================================================
</script>