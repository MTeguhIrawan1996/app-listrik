<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pelanggan_model', 'pelanggan');
    }

    public function index()
    {
        $data['title'] = 'Halaman Pelanggan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataPelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/data-pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function editPelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelanggan/edit-pelanggan', $data);
            $this->load->view('templates/footer');
        } else {

            $this->pelanggan->editDataPelanggan();
            $this->session->set_flashdata('message', 'Data Pelanggan Berhasil di Perbaharui');
            redirect('pelanggan/datapelanggan');
        }
    }

    public function dataPemasangan()
    {
        $data['title'] = 'Data Pemasangan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/ajukan-pemasangan', $data);
        $this->load->view('templates/footer');
    }
}