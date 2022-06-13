<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pengajuan_model', 'pengajuan');
        $this->load->model('Surat_model', 'surat');
        $this->load->model('Petugas_model', 'petugas');
        
    }

    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengajuan'] = $this->pengajuan->getDataPengajuanAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');

    }

    public function verifikasi($id)
    {
        $this->pengajuan->updateStatusVerifikasi($id);
        $this->session->set_flashdata('message', 'Verifikasi berhasil');
        redirect('transaksi');
    }

    public function hapus($id)
    {
        $this->pengajuan->hapusDataPengajuan($id);
        $this->session->set_flashdata('message', 'Data pengajuan berhasil dihapus');
        redirect('transaksi');
    }


    // SURAT TUGAS
    public function suratTugas()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/surat-tugas', $data);
        $this->load->view('templates/footer');

    }

    public function formSuratTugas()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kode_surat'] = $this->surat->getKodesurat();
        $data['petugas'] = $this->petugas->getPetugasAll();

        $this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required|trim|is_unique[surat_tugas.kode_surat]', ['is_unique' => 'Kode surat Sudah digunakan']);
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/form-surat-tugas', $data);
        $this->load->view('templates/footer');
        } else {

            $this->surat->tambahDataSurat();
            $this->session->set_flashdata('message', 'Surat Tugas Berhasil dibuat');
            redirect('transaksi/surattugas');
        }
    }

}