<h3 class="page-header">Form Pengguna</h3>
<div class="actions">
	<a href="<?php echo $back; ?>"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Back</a>
</div>

<?php echo form_open_multipart($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Username</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="username" placeholder="Username" value="<?php echo $pengguna->username; ?>" required />
		</div>
	</div>
	<?php if($this->uri->segment(3) == 'add'):?>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Password</label>
			<div class="col-sm-4">
			  <input class="form-control input-sm" type="password" name="password" placeholder="" value="" required />
			</div>
		</div>
	<?php endif; ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Nama</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="nama" placeholder="Nama" value="<?php echo $pengguna->nama; ?>" required />
		</div>
	</div>
	<?php if($this->uri->segment(3) == 'edit') { ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Foto</label>
		<div class="col-sm-3">
		<div class="image">
			<?php $pengguna->foto != '' ? $img_photo = $pengguna->foto : $img_photo = "foto_default.jpg"; ?>
			<img src="<?php echo base_url('foto/foto_pengguna/thumbnails/'.$img_photo); ?>" class="img-responsive img-thumbnail" alt="Responsive image" />
		</div>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Ganti Foto</label>
		<div class="col-sm-3">
			<input class="form-control input-sm" type="file" name="userfile" />
		</div>
	</div>
	<?php } else { ?>
	<div class="form-group">
		<label class="col-sm-2 control-label input-sm">Foto</label>
		<div class="col-sm-3">
			<input class="form-control input-sm" type="file" name="userfile" />
		</div>
	</div>
	<?php } ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Grup Pengguna</label>
		<div class="col-sm-4">
			<select name="id_pengguna_grup" required>
				<option value="0">--- Pilih Grup Pengguna ---</option>
				<?php echo modules::run('back_office/pengguna_grup/options_pengguna_grup', $pengguna->id_pengguna_grup); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Blokir</label>
		<div class="col-sm-4">
			<?php if ($pengguna->blokir == 'Y' || $pengguna->blokir == '') { ?>
				<label>
					<input type="radio" name="blokir" value="Y" checked> Y
				</label>
				<label>
					<input type="radio" name="blokir" value="N"> N
				</label>
			<?php } else { ?>
				<label>
					<input type="radio" name="blokir" value="Y"> Y
				</label>
				<label>
					<input type="radio" name="blokir" value="N" checked> N
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