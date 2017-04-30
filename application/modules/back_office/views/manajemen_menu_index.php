<h3 class="page-header">Data Manajemen Menu</h3>
<div class="actions">
	<a href="<?php echo $add; ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add Data</a>
</div>
<div class="block-table table-sorting clearfix"><!-- block-fluid table-sorting clearfix -->
	<table cellpadding="0" cellspacing="0" class="tabel" id="datatables">
		<thead>
			<tr>
				<th width="7%">no</th>
				<th width="25%">nama menu</th>
				<th width="40%">URI</th>
				<th width="13%">ID menu induk</th>
				<th width="8%">aktif</th>
				<th width="7%">aksi</th>
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
						<td><?php echo $record->uri; ?></td>
						<td><?php echo $record->id_menu_induk; ?></td>
						<td align="center"><?php echo $record->aktif; ?></td>
						<td align="center">
							<a href="<?php echo site_url('/back_office/manajemen_menu/edit/'.$record->id); ?>" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						</td>
					</tr>
			<?php 
					$no++;
				endforeach;
			?>
		</tbody>
	</table>
</div>