<style>
table{
	width:100%; 
	font-size:9px;
}
table.total-gaji{border-top: 1px solid #000000;}
table.list-gaji th{
	color: #000000;
   	text-transform:capitalize;
   	text-align: center;
	padding: 5px 0 5px 0;
   	border-top: 1px solid #000000;
	border-bottom: 1px solid #000000;
}
table.list-gaji tr td.number_format,
table.total-gaji tr td.number_format{text-align:right;}
table td{
	padding: 5px 0 5px 0;
   	vertical-align:middle;
   	border: none;
}
</style>

<table class="lap">
	<tr>
		<td width="20%">No. Slip Gaji</td>
		<td width="3%">:</td>
		<td width="77%"><?php echo $karyawan->id; ?></td>
	</tr>
	<tr>
		<td>Tanggal Gaji</td>
		<td>:</td>
		<td><?php echo $karyawan->tgl_gaji; ?></td>
	</tr>
	<tr>
		<td>NIK</td>
		<td>:</td>
		<td><?php echo $karyawan->id_karyawan; ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $karyawan->nama; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $karyawan->alamat; ?></td>
	</tr>
	<tr>
		<td>Jabatan</td>
		<td>:</td>
		<td><?php echo $karyawan->jabatan; ?></td>
	</tr>
</table>
<table class="list-gaji">
	<tr>
		<th>Pembayaran</th>
		<th>Jumlah</th>
	</tr>
	<?php foreach($list_gaji as $row) : ?>
	<tr>
		<td><?php echo $row->nama; ?></td>
		<td class="number_format"><?php echo my_number_format($row->jumlah); ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<table class="total-gaji">
	<tr>
		<td>Pendapatan</td>
		<td class="number_format"><?php echo my_number_format($karyawan->pendapatan); ?></td>
	</tr>
	<tr>
		<td>Potongan</td>
		<td class="number_format"><?php echo my_number_format($karyawan->potongan); ?></td>
	</tr>
	<tr>
		<td>Gaji Bersih</td>
		<td class="number_format"><?php echo my_number_format($karyawan->gaji_bersih); ?></td>
	</tr>
</table>