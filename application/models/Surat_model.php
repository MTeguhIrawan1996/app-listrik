<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_model
{
        public function getKodeSurat()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode_surat,4)) AS kd_max FROM surat_tugas WHERE DATE (tgl_input_surat)=CURDATE() ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'SRT/' . date('m/y/') . $kd ;
    }
    
    public function tambahDataSurat()
    {
        $data = [
                'kode_surat' => htmlspecialchars($this->input->post('kode_surat', true)),
                'petugas_id' => htmlspecialchars($this->input->post('nama_petugas', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
                'delete' => 1,
				'tgl_input_surat' => date('Y-m-d')
			];
			$this->db->insert('surat_tugas', $data);
    }
}