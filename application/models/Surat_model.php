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

    public function getSuratAll()
    {

        $this->db->select('surat_tugas.id,kode_surat,nama,kode_pengajuan,ket,tgl_surat,nik,ajukan_id');
        $this->db->from('surat_tugas');
        $this->db->join('user', 'surat_tugas.petugas_id=user.id');
        $this->db->join('ajukan_pemasangan', 'surat_tugas.ajukan_id=ajukan_pemasangan.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSuratById($id)
    {
         $data = [
            'surat_tugas.id' => $id
        ];
        $this->db->select('surat_tugas.id,kode_surat,nama,kode_pengajuan,ket,tgl_surat,nik');
        $this->db->from('surat_tugas');
        $this->db->join('user', 'surat_tugas.petugas_id=user.id');
        $this->db->join('ajukan_pemasangan', 'surat_tugas.ajukan_id=ajukan_pemasangan.id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getSuratByAjukanId($ajukan_id)
    {
        $data = [
            'ajukan_pemasangan.id' => $ajukan_id
        ];
        
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function tambahDataSurat()
    {
        $data = [
                'kode_surat' => htmlspecialchars($this->input->post('kode_surat', true)),
                'petugas_id' => htmlspecialchars($this->input->post('user_id', true)),
                'ajukan_id' => htmlspecialchars($this->input->post('ajukan_id', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
				'tgl_input_surat' => date('Y-m-d'),
                'tgl_surat' => time()
			];
			$this->db->insert('surat_tugas', $data);
    }

    public function hapusDataSurat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_tugas');
    }

    //AJAX
    // public function getUserByidAjax($id)
    // {

    //     $data = [
    //         'id' => $id
    //     ];
    //     $hsl = $this->db->get_where('user', $data);
    //     if ($hsl->num_rows() > 0) {
    //         foreach ($hsl->result() as $tampil) {
    //             $hasil = array(
    //                 'nik' => $tampil->nik,
    //                 'no_hp' => $tampil->no_hp,
    //                 'alamat' => $tampil->alamat,
    //                 'kelurahan' => $tampil->kelurahan,
    //                 'kecamatan' => $tampil->kecamatan,
    //                 'provinsi' => $tampil->provinsi,
    //             );
    //         }
    //     }
    //     return $hasil;
    // }

     public function getAjukanPemasanganByidAjax($ajukan_id)
    {

        $data = [
            'ajukan_pemasangan.id' => $ajukan_id
        ];
        
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where($data);
        $hsl = $this->db->get();
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $tampil) {
                $hasil = array(
                    'nik' => $tampil->nik,
                    'no_hp' => $tampil->no_hp,
                    'alamat' => $tampil->alamat,
                    'kelurahan' => $tampil->kelurahan,
                    'kecamatan' => $tampil->kecamatan,
                    'provinsi' => $tampil->provinsi,
                    'produk_layanan' => $tampil->produk_layanan,
                    'daya' => $tampil->daya,
                );
            }
        }
        return $hasil;
    }
}