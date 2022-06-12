<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_model
{

    public function tambahDataPetugas()
    {
			$data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
                'delete' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);

    }

    public function getPetugasAll()
    {
        $data = [
            'role_id' => 2,
            'delete' => 1
        ];
        return $this->db->get_where('user', $data)->result_array();
    }

    public function resetPasswordPetugas($id)
    {
        $data = [
            'password' => password_hash('reset', PASSWORD_DEFAULT),
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function hapusDataPetugas($id)
    {
        $data = [
            'delete' => 0
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

}