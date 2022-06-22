<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_model
{
    public function ajukanDataPengajuan()
    {
			$data = [
                'kode_pengajuan' => htmlspecialchars($this->input->post('kode_pengajuan', true)),
                'user_id' => htmlspecialchars($this->input->post('user_id', true)),
                'listrik_id' => htmlspecialchars($this->input->post('layanan', true)),
				'status' => 0,
                'delete' => 1,
				'tgl_pengajuan' => time(),
                'tgl_input_data' => date('Y-m-d')
			];
			$this->db->insert('ajukan_pemasangan', $data);

    }

    public function kirimDataTrackingPengajuan()
    {
			$data = [
                'ajukan_user_id' => htmlspecialchars($this->input->post('user_id', true)),
				'ket' => 'Diajukan',
                'tgl_tracking' => date('Y-m-d')
			];
			$this->db->insert('tracking', $data);

    }

    public function kirimDataTrackingVerifikasi($user_id)
    {
			$data = [
                'ajukan_user_id' => $user_id,
				'ket' => 'Disetujui',
                'tgl_tracking' => date('Y-m-d')
			];
			$this->db->insert('tracking', $data);

    }

    public function kirimDataTrackingTolak($user_id)
    {
			$data = [
                'ajukan_user_id' => $user_id,
				'ket' => 'Ditolak',
                'tgl_tracking' => date('Y-m-d')
			];
			$this->db->insert('tracking', $data);

    }

    public function getKodePengajuan()
    {
        $id = [
            'user_id' => $this->session->userdata('id')
        ];
        $q = $this->db->query("SELECT MAX(RIGHT(kode_pengajuan,4)) AS kd_max FROM ajukan_pemasangan WHERE DATE (tgl_input_data)=CURDATE() ");
        $kd = "";
        $data = $this->db->get_where('ajukan_pemasangan', $id)->row_array();
        
        if ($data) {
            $kd = $data['kode_pengajuan'];
            return $kd;
        } else {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
            date_default_timezone_set('Asia/Jakarta');
            return 'LSTRK' . date('dmy') . $kd . '';
        }
    }

    public function getDataPengajuanById()
    {
        $data = [
            'user_id' => $this->session->userdata('id')
        ];
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan,harga');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function batalDataPengajuan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ajukan_pemasangan');
    }

    public function getDataPengajuanAll()
    {
         $data = [
            'ajukan_pemasangan.delete' => 1
        ];
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataPengajuanVerify()
    {
         $data = [
            'ajukan_pemasangan.delete' => 1,
            'ajukan_pemasangan.status' != 0 AND 1 
        ];
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }

        public function updateStatusVerifikasi($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id', $id);
        $this->db->update('ajukan_pemasangan');
    }

    public function hapusDataPengajuan($id)
    {
       $data = [
            'status' => 1
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('ajukan_pemasangan');
    }

        public function updateStatusPengajuanSurvey()
    {
        $this->db->set('status', 3);
        $this->db->where('id', htmlspecialchars($this->input->post('ajukan_id', true)));
        $this->db->update('ajukan_pemasangan');
    }

        public function updateStatusSelesai($id)
    {
        $this->db->set('status', 5);
        $this->db->where('id', $id);
        $this->db->update('ajukan_pemasangan');
    }

    public function kirimDataTrackingSelesai($user_id)
    {
			$data = [
                'ajukan_user_id' => $user_id,
				'ket' => 'Pemasangan Selesai',
                'tgl_tracking' => date('Y-m-d')
			];
			$this->db->insert('tracking', $data);

    }
}