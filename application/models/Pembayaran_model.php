<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_model
{
        public function getKodePembayaran()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode_pembayaran,4)) AS kd_max FROM pembayaran WHERE DATE (tgl_pembayaran)=CURDATE() ");
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
        return 'TRK' . date('dmy') . $kd ;
    }

    public function getPembayaranAll()
    {

        $this->db->select('pembayaran.id,kode_pembayaran,kode_pengajuan,harga_lain,total,tgl_pembayaran,pembayaran.status,user_id');
        $this->db->from('pembayaran');
        $this->db->join('ajukan_pemasangan', 'pembayaran.ajukan_id=ajukan_pemasangan.id');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function tambahDataPembayaran()
    {
        $harga_lain = htmlspecialchars($this->input->post('biaya_lain', true));
        $biaya = htmlspecialchars($this->input->post('biaya', true));
        $total = $harga_lain + $biaya;
        $data = [
                'kode_pembayaran' => htmlspecialchars($this->input->post('kode_pembayaran', true)),
                'ajukan_id' => htmlspecialchars($this->input->post('ajukan_id', true)),
				'status' => 0,
                'harga_lain' => htmlspecialchars($this->input->post('biaya_lain', true)),
                'total' => $total,
				'tgl_pembayaran' => date('Y-m-d')
			];
			$this->db->insert('pembayaran', $data);
    }

    public function hapusDataPembayaran($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pembayaran');
    }

        public function updateStatusPembayaran($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('pembayaran');
    }

        public function updateStatusPengajuan($user_id)
    {

        $this->db->set('status', 4);
        $this->db->where('user_id', $user_id);
        $this->db->update('ajukan_pemasangan');
    }

    public function kirimDataTrackingPembayaran($user_id)
    {
        $data = [
                'ajukan_user_id' => $user_id,
				'ket' => 'Sudah dibayar dan proses pemasangan',
				'tgl_tracking' => date('Y-m-d'),
			];
			$this->db->insert('tracking', $data);
    }
}