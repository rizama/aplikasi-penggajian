<?php echo bootstrap_datepicker3(); ?>

<script type="text/javascript">
$().ready(function() {
	//options method for call datepicker
	$(".input-group.date").datepicker({ 
		autoclose: true, 
		todayHighlight: true,
		viewMode: 'years',
		format: 'yyyy-mm',
		changeDate: false
	});
});	
</script>

<h3 class="page-header">Data Transaksi Penggajian</h3>

<?php echo form_open($search, array('class' => 'form-horizontal row-form')); ?>
	<div class="form-group">      	
    	<label class="col-sm-2 control-label lbl-left">Masukan Tanggal </label>
        <div class="col-sm-3"> 
           	<div class="input-group date" data-date="" data-date-format="yyyy-mm">
				<input class="form-control input-sm" type="text" name="bln_awal" placeholder="Tanggal Awal" value="<?php echo $bln_awal; ?>" readonly />
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
		<div class="col-sm-3">
           	<div class="input-group date" data-date="" data-date-format="yyyy-mm">
				<input class="form-control input-sm" type="text" name="bln_akhir" placeholder="Tanggal Akhir" value="<?php echo $bln_akhir; ?>" readonly />
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
		</div>
    </div>		 
	<div class="form-group">
		<div class="col-sm-6 col-md-offset-2">
			<button type="submit" class="btn btn btn-primary btn-sm button-blue" > Tampilkan </button>
			<a href="<?php echo $xls; ?>" class="btn btn btn-primary btn-sm button-gray"> Cetak ke EXCEL </a>
		</div>
	</div>
<?php echo form_close(); ?>

<div class="clearfix"></div>
<div class="border-tr" style="margin-top:10px;"></div>

<div class="block-table table-sorting table-responsive clearfix"><!-- block-fluid table-sorting clearfix -->
	<table cellpadding="0" cellspacing="0" class="tabel" id="datatables">
		<thead>
			<tr>
				<th width="10%">no</th>
				<th width="20%">no. slip</th>
				<th width="15%">tanggal</th>
				<th width="35%">nama</th>
				<th width="10%">jabatan</th>
				<th width="10%">pendapatan</th>
				<th width="10%">potongan</th>
				<th width="10%">gaji bersih</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1;
				foreach($grid->result() as $record) :
			?>
					<tr>
						<td align="center"><?php echo $no; ?></td>
						<td><?php echo $record->id; ?></td>
						<td><?php echo $record->tgl_gaji; ?></td>
						<td><?php echo $record->nama_karyawan; ?></td>
						<td><?php echo $record->nama_jabatan; ?></td>
						<td><?php echo $record->pendapatan; ?></td>
						<td><?php echo $record->potongan; ?></td>
						<td><?php echo $record->gaji_bersih; ?></td>
					</tr>
			<?php 
					$no++;
				endforeach;
			?>
		</tbody>
	</table>
</div>