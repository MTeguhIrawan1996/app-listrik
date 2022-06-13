<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listrik_model extends CI_model
{

    public function tambahDataListrik()
    {
			$data = [
                'produk_layanan' => htmlspecialchars($this->input->post('produk_layanan', true)),
				'daya' => htmlspecialchars($this->input->post('daya', true)),
                'delete' => 1,
			];
			$this->db->insert('listrik', $data);

    }

    public function getListrikAll()
    {
        $data = [
            'delete' => 1
        ];
        return $this->db->get_where('listrik', $data)->result_array();
    }

    public function hapusDataListrik($id)
    {
        $data = [
            'delete' => 0
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('listrik');
    }

    public function getListrikById($id)
    {
        $data = [
            'id' => $id
        ];
        return $this->db->get_where('listrik', $data)->row_array();
    }

        public function editDataListrik($id)
    {
        $data = [
            'produk_layanan' => htmlspecialchars($this->input->post('produk_layanan', true)),
            'daya' => htmlspecialchars($this->input->post('daya', true))
        ];
        $this->db->where('id', $id);
        $this->db->update('listrik', $data);
    }

}