<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jayapura');
class Request extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Permintaan_model');
    }

    public function index()
    {
        $barang = $this->Barang_model->get_all();
        $kode = $this->Permintaan_model->generatekodeReq();
        $data = array(
            'barang_data' => $barang,
            'kode' => $kode,
        );
        $this->load->view('request', $data);
    }

    public function simpan()
    {
        $tanggal_permintaan =   $this->input->post('tanggal');
        $nama =   $this->input->post('nama');
        $nip =   $this->input->post('nip');
        $jabatan =   $this->input->post('jabatan');
        $kode_permintaan =   $this->input->post('kode');
        $data = array(
            'kode_permintaan' => $kode_permintaan,
            'nip' => $nip,
            'jabatan' => $jabatan,
            'nama_karyawan' => $nama,
            'tanggal_permintaan' => $tanggal_permintaan,
            'status' => "Waiting"
        );
        $permintaan = $this->db->insert('permintaan', $data);
        $permintaan_id = $this->db->insert_id();
        if ($permintaan) {
            foreach ($_REQUEST['produk'] as $key => $value) {
                $data = array(
                    'permintaan_id' => $permintaan_id,
                    'barang_id' => $value,
                    'qty' => $_REQUEST['qty'][$key],
                );
                $this->db->insert('permintaan_detail', $data);
            }
            echo json_encode('success');
        }
    }

    function getListBarangForPelaksana()
    {
        $id = $this->input->post('jabatan_id');
        $output = '';
        if ($id == "Pelaksana") {
            $data = $this->db->query("SELECT * from barang where is_pelaksana='Ya'")->result();
            $query_cek = $this->db->query("SELECT * from barang where is_pelaksana='Ya'");
        } else {
            $data = $this->db->query("SELECT * from barang")->result();
            $query_cek = $this->db->query("SELECT * from barang");
        }

        $jml = $query_cek->num_rows();
        if ($id == null || $id == '') {
            $output .= '<option value=""  style="color: black;">-- Pilih --</option>';
        } else {
            if ($jml > 0) {
                $output .= '
							<option value=""  style="color: black;">-- Pilih --</option>';
                foreach ($data as $row) {
                    $output .= ' <option  style="color: black;" value="' . $row->barang_id . '">' . $row->kode_barang . ' - ' . $row->nama_barang . ' - Stok : ' . $row->jumlah . '</option>
				  ';
                }
            } else {
                $output .= '<option value=""  style="color: black;">-- Pilih --</option>';
            }
        }
        echo $output;
    }
}
