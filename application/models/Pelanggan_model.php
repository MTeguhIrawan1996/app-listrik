<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_model
{

    public function editDataPelanggan()
    {
        $data = [
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
            'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
            'provinsi' => htmlspecialchars($this->input->post('provinsi', true))
        ];
        $id = [
            'id' => $this->session->userdata('id')
        ];
        $this->db->where($id);
        $this->db->update('user', $data);
    }
}