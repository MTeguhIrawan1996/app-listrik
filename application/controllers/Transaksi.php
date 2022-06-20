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
        $this->load->model('Pembayaran_model', 'pembayaran');
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

    public function verifikasi($id,$user_id)
    {
        $this->pengajuan->updateStatusVerifikasi($id);
        $this->pengajuan->kirimDataTrackingVerifikasi($user_id);
        $this->session->set_flashdata('message', 'Verifikasi berhasil');
        redirect('transaksi');
    }

    public function selesaiPemasangan($id,$user_id)
    {
        $this->pengajuan->updateStatusSelesai($id);
        $this->pengajuan->kirimDataTrackingSelesai($user_id);
        $this->session->set_flashdata('message', 'Pemasangan selesai');
        redirect('transaksi');
    }

    public function hapus($id)
    {
        $this->pengajuan->hapusDataPengajuan($id);
        $this->session->set_flashdata('message', 'Data pengajuan berhasil ditolak');
        redirect('transaksi');
    }


    // SURAT TUGAS
    public function suratTugas()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->surat->getSuratAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/surat-tugas', $data);
        $this->load->view('templates/footer');

    }

    public function detailsurat($id, $ajukan_id)
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->surat->getSuratById($id);
        $data['pengajuan'] = $this->surat->getSuratByAjukanId($ajukan_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail-surat', $data);
        $this->load->view('templates/footer');

    }

    public function hapusSurat($id)
    {
        $this->surat->hapusDataSurat($id);
        $this->session->set_flashdata('message', 'Data surat berhasil dihapus!');
        redirect('transaksi/surattugas');
    }

    public function formSuratTugas()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kode_surat'] = $this->surat->getKodesurat();
        $data['petugas'] = $this->petugas->getPetugasAll();
        $data['pengajuan'] = $this->pengajuan->getDataPengajuanVerify();

        $this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required|trim|is_unique[surat_tugas.kode_surat]', ['is_unique' => 'Kode surat Sudah digunakan']);
        $this->form_validation->set_rules('user_id', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('ajukan_id', 'Kode Pengajuan', 'required|trim|is_unique[surat_tugas.ajukan_id]', ['is_unique' => 'Sudah ada surat untuk kode pengajuan tersebut']);
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/form-surat-tugas', $data);
        $this->load->view('templates/footer');
        } else {
            $this->surat->tambahDataSurat();
            $this->pengajuan->updateStatusPengajuanSurvey();
            $this->surat->kirimDataTrackingSurvey();
            $this->session->set_flashdata('message', 'Surat Tugas Berhasil dibuat');
            redirect('transaksi/surattugas');
        }
    }

    public function aksi()
    {
        $this->surat->kirimDataAksi();
        $this->session->set_flashdata('message', 'Aksi Berhasil dikirim');
        redirect('transaksi/surattugas');
    }

    // PEMBAYARAN
    public function pembayaran()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pembayaran'] = $this->pembayaran->getPembayaranAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function formPembayaran()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kode_pembayaran'] = $this->pembayaran->getKodePembayaran();
        $data['pengajuan'] = $this->pengajuan->getDataPengajuanVerify();
        $this->form_validation->set_rules('kode_pembayaran', 'Kode Pembayaran', 'required|trim|is_unique[pembayaran.kode_pembayaran]', ['is_unique' => 'Kode pembayaran Sudah ada']);
        $this->form_validation->set_rules('ajukan_id', 'Kode Pengajuan', 'required|trim|is_unique[pembayaran.ajukan_id]', ['is_unique' => 'Sudah ada pembayaran untuk kode pengajuan tersebut']);
        $this->form_validation->set_rules('biaya_lain', 'Biaya Lain', 'required|trim');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/form-pembayaran', $data);
        $this->load->view('templates/footer');
        } else {
            $this->pembayaran->tambahDataPembayaran();
            
            // $this->pembayaran->kirimDataTrackingPembayaran();
            $this->session->set_flashdata('message', 'Data Pembayaran Berhasil diinput');
            redirect('transaksi/pembayaran');
        }
    }

    public function hapusPembayaran($id)
    {
        $this->pembayaran->hapusDataPembayaran($id);
        $this->session->set_flashdata('message', 'Data pembayaran berhasil dihapus!');
        redirect('transaksi/pembayaran');
    }

    public function bayar($id,$user_id)
    {
        $this->pembayaran->updateStatusPembayaran($id);
        $this->pembayaran->updateStatusPengajuan($user_id);
        $this->pembayaran->kirimDataTrackingPembayaran($user_id);
        $this->session->set_flashdata('message', 'Pembayaran berhasil');
        redirect('transaksi/pembayaran');
    }


    //AJAX
    public function getUserAjax()
    {
        $ajukan_id = $this->input->post('ajukan_id');
        // $data = $this->surat->getUserByidAjax($id);
        $data = $this->surat->getAjukanPemasanganByidAjax($ajukan_id);
        echo json_encode($data);
    }

}