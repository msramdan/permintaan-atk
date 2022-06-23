<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permintaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Permintaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $permintaan = $this->Permintaan_model->get_all();
        $data = array(
            'permintaan_data' => $permintaan,
        );
        $this->template->load('template', 'permintaan/permintaan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Permintaan_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'permintaan_id' => $row->permintaan_id,
                'kode_permintaan' => $row->kode_permintaan,
                'nama_karyawan' => $row->nama_karyawan,
                'nip' => $row->nip,
                'jabatan' => $row->jabatan,
                'tanggal_permintaan' => $row->tanggal_permintaan,
                'status' => $row->status,
            );
            $this->template->load('template', 'permintaan/permintaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('permintaan/create_action'),
            'permintaan_id' => set_value('permintaan_id'),
            'kode_permintaan' => set_value('kode_permintaan'),
            'nama_karyawan' => set_value('nama_karyawan'),
            'nip' => set_value('nip'),
            'jabatan' => set_value('jabatan'),
            'tanggal_permintaan' => set_value('tanggal_permintaan'),
            'status' => set_value('status'),
        );
        $this->template->load('template', 'permintaan/permintaan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode_permintaan' => $this->input->post('kode_permintaan', TRUE),
                'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                'nip' => $this->input->post('nip', TRUE),
                'jabatan' => $this->input->post('jabatan', TRUE),
                'tanggal_permintaan' => $this->input->post('tanggal_permintaan', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Permintaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('permintaan'));
        }
    }

    public function update($id)
    {
        $row = $this->Permintaan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permintaan/update_action'),
                'permintaan_id' => set_value('permintaan_id', $row->permintaan_id),
                'kode_permintaan' => set_value('kode_permintaan', $row->kode_permintaan),
                'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
                'nip' => set_value('nip', $row->nip),
                'jabatan' => set_value('jabatan', $row->jabatan),
                'tanggal_permintaan' => set_value('tanggal_permintaan', $row->tanggal_permintaan),
                'status' => set_value('status', $row->status),
            );
            $this->template->load('template', 'permintaan/permintaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('permintaan_id', TRUE));
        } else {
            $data = array(
                'kode_permintaan' => $this->input->post('kode_permintaan', TRUE),
                'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                'nip' => $this->input->post('nip', TRUE),
                'jabatan' => $this->input->post('jabatan', TRUE),
                'tanggal_permintaan' => $this->input->post('tanggal_permintaan', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Permintaan_model->update($this->input->post('permintaan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permintaan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Permintaan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Permintaan_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permintaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_permintaan', 'kode permintaan', 'trim|required');
        $this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
        $this->form_validation->set_rules('tanggal_permintaan', 'tanggal permintaan', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');

        $this->form_validation->set_rules('permintaan_id', 'permintaan_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function getById($id)
    {
        $data = $this->db->query("SELECT * from permintaan_detail
        join barang on barang.barang_id=permintaan_detail.barang_id 
        where permintaan_detail.permintaan_id='$id'");
        $output = '';
        $output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok Tersedia</th>
                <th>Jumlah Permintaan</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data->result() as $row) {
            $output .= '<tr>
            <td>' . $row->kode_barang . '</td>
            <td>' . $row->nama_barang . '</td>
            <td>' . $row->jumlah . '</td>
            <td>' . $row->qty . '</td>

        </tr>';
        }
        $output .= '</tbody>
        </table>';
        echo $output;
    }

    public function approved($id)
    {
        $this->db->query("UPDATE permintaan
        SET status='Approved'
        WHERE permintaan_id='$id'");
        //get detail permintaan
        $detailPermintaan = $this->db->query("SELECT * from permintaan_detail WHERE permintaan_id='$id'")->result();

        foreach ($detailPermintaan as $data) {
            $barang_id = $data->barang_id;
            $qty = $data->qty;
            $this->db->query("UPDATE barang SET jumlah = jumlah - $qty WHERE barang_id = '$barang_id'");
        }
        $this->session->set_flashdata('message', 'Permintaan Berhasil di Approved');
        redirect(site_url('permintaan'));
    }

    public function reject($id)
    {
        $this->db->query("UPDATE permintaan
        SET status='Reject'
        WHERE permintaan_id='$id'");
         $this->session->set_flashdata('message', 'Permintaan di Reject');
        redirect(site_url('permintaan'));
    }
}

/* End of file Permintaan.php */
/* Location: ./application/controllers/Permintaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-06 03:58:34 */
/* http://harviacode.com */