<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_model
{
    // Pengajuan
    public function getPengajuanByTgl1($tgl_awal, $tgl_akhir)
    {
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan,harga');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where('tgl_input_data >=', $tgl_awal);
        $this->db->where('tgl_input_data <=', $tgl_akhir);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPengajuanByTgl($tgl_awal, $tgl_akhir)
    {
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan,harga');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where('tgl_input_data >=', $tgl_awal);
        $this->db->where('tgl_input_data <=', $tgl_akhir);
        $result = $this->db->get();
        return $result->result();
    }

    // surat tugas

    public function getSuratTugasByTgl($tgl_awal, $tgl_akhir)
    {
        $this->db->select('surat_tugas.id,kode_surat,nama,kode_pengajuan,ket,tgl_surat,nik,ajukan_id');
        $this->db->from('surat_tugas');
        $this->db->join('user', 'surat_tugas.petugas_id=user.id');
        $this->db->join('ajukan_pemasangan', 'surat_tugas.ajukan_id=ajukan_pemasangan.id');
        $this->db->where('tgl_input_surat >=', $tgl_awal);
        $this->db->where('tgl_input_surat <=', $tgl_akhir);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSuratAjaxByTgl($tgl_awal, $tgl_akhir)
    {
        $this->db->select('surat_tugas.id,kode_surat,nama,kode_pengajuan,ket,tgl_surat,nik,ajukan_id');
        $this->db->from('surat_tugas');
        $this->db->join('user', 'surat_tugas.petugas_id=user.id');
        $this->db->join('ajukan_pemasangan', 'surat_tugas.ajukan_id=ajukan_pemasangan.id');
        $this->db->where('tgl_input_surat >=', $tgl_awal);
        $this->db->where('tgl_input_surat <=', $tgl_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    // Pelanggan
    public function getPelangganByStatus($status)
    {
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan,harga');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where('status', $status);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPelangganAjaxstatus($status)
    {
        $this->db->select('ajukan_pemasangan.id,ajukan_pemasangan.user_id,kode_pengajuan,nama,nik,no_hp,tgl_pengajuan,alamat,kelurahan,kecamatan,provinsi,status,daya,produk_layanan,harga');
        $this->db->from('ajukan_pemasangan');
        $this->db->join('user', 'ajukan_pemasangan.user_id=user.id');
        $this->db->join('listrik', 'ajukan_pemasangan.listrik_id=listrik.id');
        $this->db->where('status', $status);
        $result = $this->db->get();
        return $result->result();
    }

    // Survey

    public function getSurveyByTgl($tgl_awal, $tgl_akhir)
    {
        $this->db->select('surat_tugas.id,kode_surat,nama,kode_pengajuan,ket,tgl_surat,nik,ajukan_id');
        $this->db->from('surat_tugas');
        $this->db->join('user', 'surat_tugas.petugas_id=user.id');
        $this->db->join('ajukan_pemasangan', 'surat_tugas.ajukan_id=ajukan_pemasangan.id');
        $this->db->where_in('ket',['BISA DILAKUKAN PEMASANGAN','TIDAK BISA DILAKUKAN PEMASANGAN']);
        $this->db->where('tgl_input_surat >=', $tgl_awal);
        $this->db->where('tgl_input_surat <=', $tgl_akhir);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSurveyAjaxByTgl($tgl_awal, $tgl_akhir)
    {
        $this->db->select('surat_tugas.id,kode_surat,nama,kode_pengajuan,ket,tgl_surat,nik,ajukan_id');
        $this->db->from('surat_tugas');
        $this->db->join('user', 'surat_tugas.petugas_id=user.id');
        $this->db->join('ajukan_pemasangan', 'surat_tugas.ajukan_id=ajukan_pemasangan.id');
        $this->db->where_in('ket',['BISA DILAKUKAN PEMASANGAN','TIDAK BISA DILAKUKAN PEMASANGAN']);
        $this->db->where('tgl_input_surat >=', $tgl_awal);
        $this->db->where('tgl_input_surat <=', $tgl_akhir);
        $query = $this->db->get();
        return $query->result();
    }
}