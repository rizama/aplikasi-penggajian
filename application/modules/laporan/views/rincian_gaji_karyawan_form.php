<?php echo jquery_select2(); ?>

<script type="text/javascript">
function numtocurrency(num){
	num = num.toString().replace(/\$|\,/g, '');
	
	if (isNaN(num)) num = "0";
	
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	cents = num % 100;
	num = Math.floor(num / 100).toString();
	
	if (cents == 0) cents = '';
	else if (cents < 10) cents = ".0" + cents;
	else cents = '.' + cents;
	
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
		num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
	
	return (((sign) ? '' : '-') + num + cents );
}

$().ready(function(){
	
	$('[name=no_slip]').select2({width: '100%'});
	
	$('[name=no_slip]').change(function(){
		var no_slip = $(this).val();
		if(no_slip != ''){
			$.post (
				'<?php echo site_url('/laporan/rincian_gaji_karyawan/ajax_rinciangaji_options'); ?>'
				, {
					no_slip : no_slip
				}
				, function(data) {
					var gaji = data.split('#');
					$('[name=nik]').val(gaji[0]);
					$('[name=nama]').val(gaji[1]);
					$('[name=alamat]').val(gaji[2])
					$('[name=jabatan]').val(gaji[3]);
					$('[name=pendapatan]').val(numtocurrency(gaji[4]));
					$('[name=potongan]').val(numtocurrency(gaji[5]));
					$('[name=gaji_bersih]').val(numtocurrency(gaji[6]));
				}
			);
			
			$('#list-perkiraan-gaji').find('tr:gt(0)').remove();
			var loading = '<tr><td colspan="3">Memuat list perkiraan penggajian...</td></tr>';
			$('#list-perkiraan-gaji').append(loading);
			$.post(
				'<?php echo site_url('/laporan/rincian_gaji_karyawan/ajax_list_perkiraan_gaji'); ?>'
				, {
					no_slip : no_slip
				}
				, function(data) {
					var list_gaji = JSON.parse(data);
					var num = 1;
					
					$('#list-perkiraan-gaji').find('tr:eq(1)').remove();
					if (list_gaji.length == 0) {
						$('#list-perkiraan-gaji').append('<tr><td align="center" colspan="3">Tidak ada list perkiraan gaji</td></tr>');
					}
					$.each(list_gaji, function(key, value) {
						var row = '';					
						row +=
							'<tr id="perkiraan-' + value.id + '">' +
								'<td>' + num + '</td>' +
								'<td>' + value.nama + '</td>' +
								'<td align="right">' + numtocurrency(value.jumlah) + '</td>' +
							'</tr>';
							$('#list-perkiraan-gaji').append(row);
						num++;
					});
				}
			);
		}
	});
});
</script>

<h3 class="page-header">Rincian Gaji Karyawan</h3>

<?php echo form_open($pdf, array('class' => 'form-horizontal row-form')); ?>
<div class="col-sm-12">
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm lbl-left">No. Slip Gaji</label>
		<div class="col-sm-3">
			<select name="no_slip">
				<option value="">--- Pilih No Slip ---</option>
				<?php echo modules::run('laporan/rincian_gaji_karyawan/options_slipgaji'); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm lbl-left">NIK</label>
		<div class="col-sm-3">
		  <input class="form-control input-sm" type="text" name="nik" placeholder="NIK" value="" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm lbl-left">Nama</label>
		<div class="col-sm-5">
		  <input class="form-control input-sm" type="text" name="nama" placeholder="Nama" value="" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm lbl-left">Alamat</label>
		<div class="col-sm-5">
			<textarea name="alamat" class="form-control" rows="10" placeholder="Alamat"></textarea>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm lbl-left">Jabatan</label>
		<div class="col-sm-3">
		  <input class="form-control input-sm" type="text" name="jabatan" placeholder="Jabatan" value="" readonly />
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="border-tr"></div>

<div class="col-sm-8">
	<div class="table-responsive table-transaksi">
		<table class="tabel table" id="list-perkiraan-gaji">
			<thead>
				<tr>
					<th width="5%">No</th>
					<th width="60%">Nama Perkiraan</th>
					<th width="20%">Jumlah</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<div class="col-sm-4 border-left">
    <div class="form-group">
        <label class="col-sm-4 control-label input-sm lbl-left">Pendapatan</label>
		<div class="col-sm-8">
		  <input class="form-control input-sm" type="text" name="pendapatan" placeholder="Pendapatan" value="" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-4 control-label input-sm lbl-left">Potongan</label>
		<div class="col-sm-8">
		  <input class="form-control input-sm" type="text" name="potongan" placeholder="Potongan" value="" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-4 control-label input-sm lbl-left">Gaji Bersih</label>
		<div class="col-sm-8">
		  <input class="form-control input-sm" type="text" name="gaji_bersih" placeholder="Gaji Bersih" value="" readonly />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-6">
			<button type="submit" class="btn btn btn-primary btn-sm button-blue" > Cetak PDF </button>
		</div>
	</div>
</div>
<?php echo form_close(); ?>