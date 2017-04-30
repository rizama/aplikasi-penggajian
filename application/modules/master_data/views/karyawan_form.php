<?php echo jquery_select2(); ?>
<?php echo bootstrap_datepicker3(); ?>

<script type="text/javascript">
$().ready(function() {
	
	$(".input-group.date").datepicker({ 
		autoclose: true, 
		todayHighlight: true 
	});
	
	$('[name=id_jabatan]').select2({width: '100%'}); 

});	
</script>

<h3 class="page-header">Form Karyawan</h3>
<div class="actions">
	<a href="<?php echo $back; ?>"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Back</a>
</div>

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Nama</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="nama" placeholder="Nama" value="<?php echo $karyawan->nama; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Alamat</label>
		<div class="col-sm-4">
			<textarea name="alamat" class="form-control" rows="3" placeholder="Alamat" required><?php echo $karyawan->alamat; ?></textarea>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Jabatan</label>
		<div class="col-sm-3">
			<select name="id_jabatan" required>
				<option value="">--- Pilih Jabatan ---</option>
				<?php echo modules::run('master_data/jabatan/options_jabatan', $karyawan->id_jabatan); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">No. Telepon</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="no_telp" placeholder="No. Telepon" value="<?php echo $karyawan->no_telp; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Jenis Kelamin</label>
		<div class="col-sm-4">
			<?php if ($karyawan->jk == 'L' || $karyawan->jk == '') { ?>
				<label>
					<input type="radio" name="jk" value="L" checked> Laki-Laki
				</label>
				<label>
					<input type="radio" name="jk" value="P"> Perempuan
				</label>
			<?php } else { ?>
				<label>
					<input type="radio" name="jk" value="L"> Laki-Laki
				</label>
				<label>
					<input type="radio" name="jk" value="P" checked> Perempuan
				</label>
			<?php } ?>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Tempat Lahir</label>
		<div class="col-sm-3">
		  <input class="form-control input-sm" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $karyawan->tempat_lahir; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Tanggal Lahir</label>
		<div class="col-sm-3">
           	<div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
				<input class="form-control input-sm" type="text" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $karyawan->tgl_lahir; ?>" required readonly />
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Email</label>
		<div class="col-sm-3">
		  <input class="form-control input-sm" type="text" name="email" placeholder="Email" value="<?php echo $karyawan->email; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Pendidikan</label>
		<div class="col-sm-2">
			<select name="pendidikan" class="form-control" required>
				<?php if($karyawan->pendidikan == ''){ ?>
					<option value="">-- Pilih Pendidikan --</option>
				<?php } else { ?>
					<option value="<?php echo $karyawan->pendidikan; ?>"><?php echo $karyawan->pendidikan; ?></option>
				<?php } ?>
				<option value="SD">SD</option>
				<option value="SMP">SMP</option>
				<option value="SMA/SMK">SMA/SMK</option>
				<option value="D1">D1</option>
				<option value="D3">D3</option>
				<option value="S1">S1</option>
				<option value="S2">S2</option>
				<option value="S3">S3</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn btn-primary btn-sm button-blue" > Simpan </button>
			<button type="reset" class="btn btn btn-primary btn-sm button-red" > Reset </button>
		</div>
	</div>
<?php echo form_close(); ?>