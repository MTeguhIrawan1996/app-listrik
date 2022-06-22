<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Laporan_model', 'laporan');
        $this->load->model('Pengajuan_model', 'pengajuan');

    }

    // Laporan Pengajuan
    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');   
        

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-pemasangan', $data);
        $this->load->view('templates/footer');
        } else {
            $this->_prosesCetakPengajuan();
        }
    }

    private function _prosesCetakPengajuan()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan'] = $this->laporan->getPengajuanByTgl1($tgl_awal, $tgl_akhir);
        $data['tglawal'] = $this->input->post('tgl_awal');
        $data['tglakhir'] = $this->input->post('tgl_akhir');

        $this->load->view('laporan/cetak-pengajuan', $data);
    }

    public function getPengajuanTgl()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $results = $this->laporan->getPengajuanByTgl($tgl_awal,$tgl_akhir);
        $data = [];
        $no = 1;
        foreach($results as $result) {
            $row = [];
            $row[] = $no++;
            $row[] = $result->kode_pengajuan;
            $row[] = $result->nik;
            $row[] = $result->nama;
            $row[] = $result->alamat;
            $row[] = $result->produk_layanan;
            $row[] = date('d F Y', $result->tgl_pengajuan);
            $row[] = $result->status;
            $data[] = $row;
        }

        $output = [
            "data" => $data,
        ];
        echo json_encode($output);

    }

    // SuratTugas

    public function suratTugas()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');   
        

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-surat-tugas', $data);
        $this->load->view('templates/footer');
        } else {
            $this->_prosesCetakSuratTugas();
        }
    }

    private function _prosesCetakSuratTugas()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan'] = $this->laporan->getSuratTugasByTgl($tgl_awal, $tgl_akhir);
        $data['tglawal'] = $this->input->post('tgl_awal');
        $data['tglakhir'] = $this->input->post('tgl_akhir');

        $this->load->view('laporan/cetak-surat-tugas', $data);
    }

    public function getSuratTugasAjax()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $results = $this->laporan->getSuratAjaxByTgl($tgl_awal,$tgl_akhir);
        $data = [];
        $no = 1;
        foreach($results as $result) {
            $row = [];
            $row[] = $no++;
            $row[] = $result->kode_surat;
            $row[] = $result->nama;
            $row[] = $result->kode_pengajuan;
            $row[] = $result->ket;
            $row[] = date('d F Y', $result->tgl_surat);
            $data[] = $row;
        }

        $output = [
            "data" => $data,
        ];
        echo json_encode($output);

    }

    // Data Pelanggan

    public function dataPelanggan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('status', 'Status', 'required|trim'); 
        

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-data-pelanggan', $data);
        $this->load->view('templates/footer');
        } else {
            $this->_prosesCetakPelanggan();
        }
    }

    private function _prosesCetakPelanggan()
    {
        $status = $this->input->post('status');

        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan'] = $this->laporan->getPelangganByStatus($status);
        $data['status'] = $this->input->post('status');

        $this->load->view('laporan/cetak-pelanggan', $data);
    }

    public function getPelangganAjax()
    {
        $status = $this->input->post('status');
        $results = $this->laporan->getPelangganAjaxStatus($status);
        $data = [];
        $no = 1;
        foreach($results as $result) {
            $row = [];
            $row[] = $no++;
            $row[] = $result->nik;
            $row[] = $result->nama;
            $row[] = $result->no_hp;
            $row[] = $result->alamat;
            $row[] = $result->kelurahan;
            $row[] = $result->kecamatan;
            $row[] = $result->provinsi;
            $row[] = $result->status;
            $data[] = $row;
        }

        $output = [
            "data" => $data,
        ];
        echo json_encode($output);

    }

    // hasilsurvey
    public function hasilSurvey()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
         $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim'); 
        

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-hasil-survey', $data);
        $this->load->view('templates/footer');
        } else {
            $this->_prosesCetakSurvey();
        }
    }

    private function _prosesCetakSurvey()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan'] = $this->laporan->getSurveyByTgl($tgl_awal, $tgl_akhir);
        $data['tglawal'] = $this->input->post('tgl_awal');
        $data['tglakhir'] = $this->input->post('tgl_akhir');

        $this->load->view('laporan/cetak-hasil-survey', $data);
    }

    public function getSurveyAjax()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $results = $this->laporan->getSurveyAjaxByTgl($tgl_awal, $tgl_akhir);
        $data = [];
        $no = 1;
        foreach($results as $result) {
            $row = [];
            $row[] = $no++;
            $row[] = $result->kode_surat;
            $row[] = $result->nama;
            $row[] = $result->kode_pengajuan;
            $row[] = $result->ket;
            $row[] = date('d F Y', $result->tgl_surat);
            $data[] = $row;
        }

        $output = [
            "data" => $data,
        ];
        echo json_encode($output);

    }

}