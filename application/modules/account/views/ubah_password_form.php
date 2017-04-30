<h3 class="page-header">Ubah Password</h3>

<?php if ($this->session->flashdata('status') == 'ok'): ?>
<div class="col-sm-12">
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
		<span>Ubah password berhasil!!</span>
	</div>
</div>
<?php elseif ($this->session->flashdata('status') == 'wrong'): ?>
<div class="col-sm-12">
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
		<span>Ubah password gagal!!</span>
	</div>
</div>
<?php elseif ($this->session->flashdata('status') == 'unmatch'): ?>
<div class="col-sm-12">
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
		<span>Penulisan ulang ubah password tidak sama!!</span>
	</div>
</div>
<?php endif; ?>

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Password Lama</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="password" name="current" placeholder="Password Lama" value="" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Password Baru</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="password" name="new" placeholder="Password Lama" value="" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Ulangi Password Baru</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="password" name="retype" placeholder="Ulangi Password Baru" value="" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn btn-primary btn-sm button-blue" > Simpan </button>
			<button type="reset" class="btn btn btn-primary btn-sm button-red" > Reset </button>
		</div>
	</div>
<?php echo form_close(); ?>