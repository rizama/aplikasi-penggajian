<h3 class="page-header">Form Manajemen Menu</h3>
<div class="actions">
	<a href="<?php echo $back; ?>"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Back</a>
</div>

<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<span>
		Apabila field ID Menu tidak diisi (dikosongkan), maka Nama Menu akan menjadi Menu Utama (Menu Induk) <br />
		Apabila field ID Menu diisi, maka Nama Menu akan menjadi Anak Menu berdasarkan Nama Menu yang dipilih
	</span>
</div>

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Nama</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="nama" placeholder="Nama" value="<?php echo $manajemen_menu->nama; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">URI</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="uri" placeholder="URI" value="<?php echo $manajemen_menu->uri; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">ID Menu</label>
		<div class="col-sm-4">
			<select name="id_menu_induk" required>
				<option value="0">--- Kosongkan ---</option>
				<?php echo modules::run('back_office/manajemen_menu/options_manajemen_menu', $manajemen_menu->id_menu_induk); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Aktif</label>
		<div class="col-sm-4">
			<?php if ($manajemen_menu->aktif == 'Y' || $manajemen_menu->aktif == '') { ?>
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
