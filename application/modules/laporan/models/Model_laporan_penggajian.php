<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan_penggajian extends CI_Model {
	
	public function get_data_penggajian_xls($params){
		$bln_awal = $params['bln_awal'].'-01';
		$bln_akhir = $params['bln_akhir'].'-31';
		
		$query = "
			SELECT tg.id AS id,
					tg.tgl_gaji,
					tg.pendapatan,
					tg.potongan,
					tg.gaji_bersih,
					k.nama AS nama_karyawan,
					j.nama AS nama_jabatan
			FROM(SELECT *
				FROM transaksi_gaji
				WHERE tgl_gaji >= '{$bln_awal}' AND tgl_gaji <= '{$bln_akhir}'
			) AS tg
			LEFT JOIN karyawan AS k
				ON tg.id_karyawan = k.id
			LEFT JOIN jabatan AS j
				ON k.id_jabatan = j.id
		";
		return $this->db->query($query);
	}
	
	public function show_noslip_options($id){
		$query = "
			SELECT k.id AS id_karyawan,
					k.nama,
					k.alamat,
					j.nama AS jabatan,
					tg.id,
					tg.tgl_gaji,
					tg.pendapatan,
					tg.potongan,
					tg.gaji_bersih
			FROM transaksi_gaji AS tg
			LEFT JOIN karyawan AS k
				ON tg.id_karyawan = k.id
			LEFT JOIN jabatan AS j
				ON k.id_jabatan = j.id
			WHERE tg.id = '{$id}'
		";		
		return $this->db->query($query)->row();
	}
	
	public function show_list_gaji($id){
		$query = "
			SELECT rtg.id,
					rtg.jumlah,
					p.nama
			FROM rincian_transaksi_gaji AS rtg
			LEFT JOIN perkiraan AS p
			   ON rtg.id_perkiraan = p.id
			LEFT JOIN transaksi_gaji AS tg
			   ON rtg.id_transaksi_gaji = tg.id
			WHERE rtg.id_transaksi_gaji = '{$id}'
			ORDER BY rtg.id ASC
		";
		return $this->db->query($query)->result();	
	}
	
}
/* End of file Model_laporan_penggajian.php */
/* Location: ./application/modules/laporan/models/Model_laporan_penggajian.php */