<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penggajian extends CI_Model {

	
	public function get_data_penggajian($params){
		$bln_awal = $params['bln_awal'].'-01';
		$bln_akhir = $params['bln_akhir'].'-31';
		
		$query = "SELECT tg.id AS id,
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
				ORDER BY {$params['item']} {$params['order']}";
		
		return $this->db->query($query);
	}
	
}
/* End of file Model_penggajian.php */
/* Location: ./application/modules/transaksi/models/Model_penggajian.php */