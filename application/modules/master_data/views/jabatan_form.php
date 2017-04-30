<h3 class="page-header">Form Jabatan</h3>
<div class="actions">
	<a href="<?php echo $back; ?>"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
</div>

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Nama Jabatan</label>
		<div class="col-sm-3">
		  <input class="form-control input-sm" type="text" name="nama" placeholder="Nama Jabatan" value="<?php echo $jabatan->nama; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Aktif</label>
		<div class="col-sm-4">
			<?php if ($jabatan->aktif == 'Y' || $jabatan->aktif == '') { ?>
				<label>
					<input type="radio" name="aktif" value="Y" checked> Y
				</label>
				<label>
					<input type="radio" name="aktif" value="N"> N
				</label>
			<?php } else { ?>
				<label>
					<input type="radio" name="aktif" value="Y"> Y
				</label>
				<label>
					<input type="radio" name="aktif" value="N" checked> N
				</label>
			<?php } ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn btn-primary btn-sm button-blue" > Simpan </button>
			<button type="reset" class="btn btn btn-primary btn-sm button-red" > Reset </button>
		</div>
	</div>
<?php echo form_close(); ?>