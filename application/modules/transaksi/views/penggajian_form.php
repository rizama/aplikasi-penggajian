<?php echo jquery_slimscrool(); ?>
<?php echo jquery_select2(); ?>

<script type="text/javascript">
var perkiraan_arr 	= new Array();
var perkiraan_index = 0;
var num_unit = 0;

var jumlah_total = 0;

function add_penggajian_detail(e){
	var id_perkiraan = $(this).attr('href');
	var kode = $(this).attr('data-kode');
	var nama = $(this).attr('data-nama');
	var status = $(this).attr('data-status');
	var elemen = '';
	var selektor = '';
	
	if (perkiraan_arr.indexOf(id_perkiraan) > -1) {
		alert('Nama perkiraan gaji sudah terdaftar di tabel transaksi gaji!');
		return false;
	}
	
	if(status == '1'){
		var elemen = 'pendapatan_arr';
		var selektor = 'pendapatan_arr';
	}
	else if(status == '0'){
		var elemen = 'potongan_arr';
		var selektor = 'potongan_arr';
	}
	
	num_unit++;
	var perkiraan =
		'<tr id="indent-perkiraan-' + id_perkiraan + '">' +
			'<td>' + num_unit + '</td>' +
			'<td class="nama-perkiraan">' + nama + '</td>' + 
			'<td><input type="hidden" name="id_perkiraan[' + id_perkiraan + ']" value="' + id_perkiraan + '" /> <input type="text" name="' + elemen + '[' + id_perkiraan + ']" class="' + selektor + ' nominal-perkiraan" data-status="' + status + '" value="" autocomplete="off" /></td>' +
			'<td align="center"><a href="#' + id_perkiraan + '" data-status="' + status + '" class="del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' +
		'</tr>';
	
	$('#perkiraan-unit-table').append(perkiraan);
	$('#indent-perkiraan-'  + id_perkiraan + ' .del').on('click', delete_perkiraan_details);
	
	e.preventDefault();
	perkiraan_arr[perkiraan_index] = id_perkiraan;
	perkiraan_index++;
	
	$('.pendapatan_arr').on('keydown', number_key);
	$('.pendapatan_arr').on('keyup', change_jumlah);
	$('.potongan_arr').on('keydown', number_key);
	$('.potongan_arr').on('keyup', change_jumlah);
	
	$('.pendapatan_arr, .potongan_arr').keyup(function(){
		$(this).val(numtocurrency($(this).val())); 
	});
}

function delete_perkiraan_details(){
	var href = $(this).attr('href');
	var href_arr = href.split('#');
	var id_perkiraan = href_arr[1];
	var status = $(this).attr('data-status');
	var total_pendapatan = 0;
	var total_potongan = 0;
	var gaji_bersih = 0;

	var selector = '#indent-perkiraan-' + id_perkiraan;
	$(selector).remove();
	
	$.each($('.pendapatan_arr'), function(key, obj) {
		total_pendapatan += currencytonum($(obj).val());
	});
	$('[name=pendapatan]').val(numtocurrency(total_pendapatan));
	
	$.each($('.potongan_arr'), function(key, obj) {
		total_potongan += currencytonum($(obj).val());
	});
	$('[name=potongan]').val(numtocurrency(total_potongan));

	gaji_bersih = total_pendapatan - total_potongan;
	$('[name=gaji_bersih]').val(numtocurrency(gaji_bersih));
	
	perkiraan_arr[perkiraan_arr.indexOf(id_perkiraan)] = 0;
	return false;
}

function number_key(e){
	var keyCode = e.keyCode || e.which; 

	if (
		keyCode == 8
		|| keyCode == 9
        || keyCode == 190
		|| (keyCode >= 48 && keyCode <= 57)
		|| (keyCode >= 96 && keyCode <= 105)
	) {
		// do nothing
	}
	else {
		e.preventDefault();
	}
}

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
	
	//for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
	//	num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
	
	return (((sign) ? '' : '-') + num + cents );
}

function currencytonum(str){
	if (str == "") return 0;

	// replace all dot to blank
	str = str.replace(/\,/g, "");
	
	// str to int
	return parseFloat(str);
}

function change_jumlah(){
	var status = $(this).attr('data-status');
	var pendapatan = $('[name=pendapatan]').val();
	var potongan = $('[name=potongan]').val();
	var pendapatan_jml = parseInt(pendapatan.replace('.',''));
	var potongan_jml = parseInt(potongan.replace('.',''));
	var total_pendapatan = 0;
	var total_potongan = 0;
	var gaji_bersih = 0;
	
	$.each($('.pendapatan_arr'), function(key, obj) {
		total_pendapatan += currencytonum($(obj).val());
	});
	$('[name=pendapatan]').val(numtocurrency(total_pendapatan));
	
	$.each($('.potongan_arr'), function(key, obj) {
		total_potongan += currencytonum($(obj).val());
	});
	$('[name=potongan]').val(numtocurrency(total_potongan));

	gaji_bersih = total_pendapatan - total_potongan;
	$('[name=gaji_bersih]').val(numtocurrency(gaji_bersih));
}

$().ready(function(){

	$('[name=id_karyawan]').select2({width: '100%'}); 
	$('.list-perkiraan').slimscroll({ height: '190px', alwaysVisible: true }); 
		
	$('[name=id_karyawan]').change(function() {
		var id_karyawan = $(this).val();
		if (id_karyawan != '') {
			$.post (
				'<?php echo site_url('/master_data/karyawan/ajax_karyawan_options'); ?>'
				, {
					id_karyawan : id_karyawan
				}
				, function(data) {
					var karyawan = data.split('#');
					$('[name=nama]').val(karyawan[1]);
					$('[name=alamat]').val(karyawan[2])
					$('[name=jabatan]').val(karyawan[3]);
				}
			);
		}
	});
	
	$('a.add').click(add_penggajian_detail);

});
</script>

<h3 class="page-header">Transaksi Penggajian</h3>

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">No. Slip</label>
		<div class="col-sm-8">
		  <input class="form-control input-sm" type="text" name="no_slip" placeholder="No. Slip" value="<?php echo no_slip(); ?>" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Tanggal</label>
		<div class="col-sm-8">
		  <input class="form-control input-sm" type="text" name="tgl_gaji" placeholder="Tanggal" value="<?php echo date("Y-m-d"); ?>" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Petugas</label>
		<div class="col-sm-8">
		  <input class="form-control input-sm" type="text" name="petugas" placeholder="Petugas" value="<?php echo $this->session->userdata('pengguna')->nama; ?>" readonly />
		</div>
	</div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Nama</label>
		<div class="col-sm-8">
			<select name="id_karyawan">
				<option value="">--- Pilih Karyawan ---</option>
				<?php echo modules::run('master_data/karyawan/options_karyawan'); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Jabatan</label>
		<div class="col-sm-8">
		  <input class="form-control input-sm" type="text" name="jabatan" placeholder="Jabatan" value="" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Alamat</label>
		<div class="col-sm-8">
			<textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="border-tr"></div>

<?php if ($this->session->flashdata('cek_field') == 'failed') { ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
		<span>Data tidak berhasil disimpan!! Pastikan text No. Slip, Tanggal, dan ID Karyawan terisi</span>
	</div>
<?php } elseif ($this->session->flashdata('cek_field') == 'sukses') { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
		<span>Data berhasil disimpan kedalam database!!</span>
	</div>
<?php } ?>

<div class="col-sm-8">
	<div class="table-responsive table-transaksi">
		<table class="tabel table" id="perkiraan-unit-table">
			<thead>
				<tr>
					<th width="5%">No</th>
					<th width="60%">Nama Perkiraan</th>
					<th width="20%">Jumlah</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<div class="col-sm-4">
	<div class="list-perkiraan">
		<ul>
			<?php foreach($perkiraan as $p) : ?>
				<li><a class="add" href="<?php echo $p->id; ?>" data-kode="<?php echo $p->kode; ?>" data-nama="<?php echo $p->nama; ?>" data-status="<?php echo $p->status; ?>"><?php echo $p->nama; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<div class="clearfix"></div>
<div class="non-border-tr"></div>

<div class="col-sm-6">
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Pendapatan</label>
		<div class="col-sm-5">
		  <input class="form-control input-sm" type="text" name="pendapatan" placeholder="Pendapatan" value="" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Potongan</label>
		<div class="col-sm-5">
		  <input class="form-control input-sm" type="text" name="potongan" placeholder="Potongan" value="" readonly />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-3 control-label input-sm lbl-left">Gaji Bersih</label>
		<div class="col-sm-5">
		  <input class="form-control input-sm" type="text" name="gaji_bersih" placeholder="Gaji Bersih" value="" readonly />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<button type="submit" class="btn btn btn-primary btn-sm button-blue" > Simpan </button>
			<button type="reset" class="btn btn btn-primary btn-sm button-red" > Reset </button>
		</div>
	</div>
</div>
<?php echo form_close(); ?>