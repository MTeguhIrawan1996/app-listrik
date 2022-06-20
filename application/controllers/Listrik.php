<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listrik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Listrik_model', 'listrik');
    }

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['listrik'] = $this->listrik->getListrikAll();

        $this->form_validation->set_rules('produk_layanan', 'Produk Layanan', 'required|trim');
        $this->form_validation->set_rules('daya', 'Daya', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('listrik/index', $data);
        $this->load->view('templates/footer');
        } else {
            $this->listrik->tambahDataListrik();
            $this->session->set_flashdata('message', 'Jenis Listrik Berhasil ditambahkan');
            redirect('listrik');
        }
    }

    public function hapusListrik($id)
    {
        $this->listrik->hapusDataListrik($id);
        $this->session->set_flashdata('message', 'Data listrik berhasil dihapus!');
        redirect('listrik');
    }

    public function ubahListrik($id)
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['listrik'] = $this->listrik->getListrikById($id);
        $this->form_validation->set_rules('produk_layanan', 'Produk layanan', 'required|trim');
        $this->form_validation->set_rules('daya', 'daya', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('listrik/edit', $data);
            $this->load->view('templates/footer');  
            }else{
                $this->listrik->editDataListrik($id);
                $this->session->set_flashdata('message', 'Ubah Jenis Listrik Berhasil!');
                redirect('Listrik');
            }
    }

}