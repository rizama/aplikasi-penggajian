<script type="text/javascript">
$(document).ready(function(){
 	
	$('.parent').change(function(){
		var id = $(this).attr('id');
		$('.child-'+id).prop('checked', $(this).prop('checked'));		
	});
	
});
</script>

<h3 class="page-header">Form Pengguna Grup</h3>
<div class="actions">
	<a href="<?php echo $back; ?>"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Back</a>
</div>

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Nama</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="nama" placeholder="Nama" value="<?php echo $pengguna_grup->nama; ?>" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn btn-primary btn-sm button-blue" > Simpan </button>
		</div>
	</div>
	<?php $a = 0;?>
	<?php if($menu->num_rows() > 0) :?>
	<table>	
		<?php foreach($menu->result() as $indeks => $p) :?>			
		<tr>
			<td width="50"></td>
			<td width="50"></td>
			<td width="50"></td>
			<td width="50"></td>			
			<td>
				<label>
					<input type="checkbox" class="parent" id="<?php echo $p->id;?>" name="id_menu[<?php echo $a++;?>]" value="<?php echo $p->id;?>" <?php if($p->id_menu_akses!=NULL){echo 'checked';} ?> />
					<?php echo $p->nama;?>
				</label>
			</td>
		</tr>
			<?php if($submenu->num_rows() > 0) :?>
				<?php foreach ($submenu->result() as $key => $q) :?>
					<?php if($q->id_menu_induk == $p->id) :?>
						<tr>
							<td colspan="4"></td>
							<td></td>
							<td>
								<label>
									<input type="checkbox" class="child-<?php echo $p->id;?>" name="id_menu[<?php echo $a++;?>]" value="<?php echo $q->id;?>" <?php if($q->id_menu_akses!=NULL){echo 'checked';} ?> />
									<?php echo $q->nama;?>
								</label>
							</td>
						</tr>
					<?php endif;?>
				<?php endforeach;?>
			<?php endif;?>		
		<?php endforeach;?>
	</table>
	<?php endif;?>
<?php echo form_close(); ?>