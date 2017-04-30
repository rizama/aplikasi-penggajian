<h3 class="page-header">Data Jabatan</h3>
<div class="actions">
	<a href="<?php echo $add; ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add Data</a>
</div>
<div class="block-table table-sorting clearfix"><!-- block-fluid table-sorting clearfix -->
	<table cellpadding="0" cellspacing="0" class="tabel" id="datatables">
		<thead>
			<tr>
				<th width="10%">no</th>
				<th width="60%">jabatan</th>
				<th width="20%">aktif</th>
				<th width="10%">aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1;
				foreach($grid as $record) :
			?>
					<tr>
						<td align="center"><?php echo $no; ?></td>
						<td><?php echo $record->nama; ?></td>
						<td align="center"><?php echo $record->aktif; ?></td>
						<td align="center">
							<a href="<?php echo site_url('/master_data/jabatan/edit/'.$record->id); ?>" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
							<a href="<?php echo site_url('/master_data/jabatan/delete/'.$record->id); ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data <?php echo $record->nama; ?>?')" title="Delete Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						</td>
					</tr>
			<?php 
					$no++;
				endforeach;
			?>
		</tbody>
	</table>
</div>