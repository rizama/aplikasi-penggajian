<?php newline(); ?>
<?php tab(); ?>Tanggal Cetak : <b><?php echo date('Y-m-d'); ?></b><?php newline(); ?>
<?php tab(); ?>Laporan dari bulan : <b><?php echo $bln_awal; ?></b> sampai bulan : <b><?php echo $bln_akhir; ?></b><?php newline(); ?>
<?php newline(); ?>
<?php tab(); ?>
<table border="1">
	<?php if($src->num_rows()>0) : ?>
	<tr>
		<th>No.</th>
		<th>No. Slip</th>
		<th>Tanggal</th>
		<th>Nama</th>
		<th>Jabatan</th>
		<th>Pendapatan</th>
		<th>Potongan</th>
		<th>Gaji Bersih</th>
	</tr>
	<?php $i = 1; $total_pendapatan=0; $total_potongan=0; $total_gaji_bersih=0; ?>
	<?php foreach ($src->result() as $row): ?>
	<tr>
		<td align="right"><?php echo $i++; ?>.</td>
		<td><?php echo $row->id; ?></td>
		<td align="center"><?php echo $row->tgl_gaji; ?></td>
		<td><?php echo $row->nama_karyawan; ?></td>
		<td><?php echo $row->nama_jabatan; ?></td>
		<td align="right"><?php echo my_number_format($row->pendapatan); ?></td>
		<td align="right"><?php echo my_number_format($row->potongan); ?></td>
		<td align="right"><?php echo my_number_format($row->gaji_bersih); ?></td>
		<?php $total_pendapatan += $row->pendapatan; ?>
		<?php $total_potongan += $row->potongan; ?>
		<?php $total_gaji_bersih += $row->gaji_bersih; ?>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td align="center" colspan="5"><b>Total</b></td>
		<td><b><?php echo my_number_format($total_pendapatan); ?></b></td>
		<td><b><?php echo my_number_format($total_potongan); ?></b></td>
		<td><b><?php echo my_number_format($total_gaji_bersih); ?></b></td>
	</tr>
	<?php else : ?>
        <b>Data Tidak Ditemukan</b>
    <?php endif;?>
</table>