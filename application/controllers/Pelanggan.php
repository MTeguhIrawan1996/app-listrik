<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Halaman Pelanggan';
        $data['user'] = $this->db->get_where('user', ['no_hp' => $this->session->userdata('no_hp')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataPelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['no_hp' => $this->session->userdata('no_hp')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/data-pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function dataPemasangan()
    {
        $data['title'] = 'Data Pemasangan';
        $data['user'] = $this->db->get_where('user', ['no_hp' => $this->session->userdata('no_hp')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/ajukan-pemasangan', $data);
        $this->load->view('templates/footer');
    }
}