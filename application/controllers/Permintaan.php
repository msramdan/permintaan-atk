<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permintaan extends MY_Controller
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

        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        if (!empty($startDate) && !empty($endDate)) {
            $data = array(
                'permintaan_data' => $this->getDataRow('permintaan', '*', array('tanggal_permintaan >=' => $startDate, 'tanggal_permintaan <=' => $endDate)),
                'startDate' => $startDate,
                'endDate' => $endDate,
            );
        } else {
            $data = array(
                'permintaan_data' => $this->getDataRow('permintaan', '*'),
                'startDate' => $startDate,
                'endDate' => $endDate,

            );
        }

        // $data = array(
        //     'permintaan_data' => c,
        // );
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
        where permintaan_detail.permintaan_detail_id='$id'");
        $output = '';
        $output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data->result() as $row) {
            $output .= '<tr>
            <td>' . $row->kode_barang . '</td>
            <td>' . $row->nama_barang . '</td>
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
        redirect(site_url('permintaan'));
    }

    public function reject($id)
    {
        $this->db->query("UPDATE permintaan
        SET status='Reject'
        WHERE permintaan_id='$id'");
        redirect(site_url('permintaan'));
    }

    public function pdf($id)
    {
        $table = 'permintaan_detail';
        $join = array(
            array('barang', 'barang.barang_id=' . $table . '.barang_id', 'left'),
            array('permintaan', 'permintaan.permintaan_id=' . $table . '.permintaan_id', 'left'),
        );
        $select = $table . '.*,
        permintaan.kode_permintaan as code,
        permintaan.nama_karyawan as name,
        permintaan.nip as nip,
        permintaan.jabatan as jabatan,
        permintaan.tanggal_permintaan as date,
        permintaan.status as status,
        barang.kode_barang as kode_barang,
        barang.nama_barang as nama_barang,
        barang.jumlah as jumlah,
        ';

        $detail = $this->getDataRow($table, $select, array($table . '.permintaan_id' => $id), '', $join);
        $data['data'] = $detail;


        $this->load->library('Dompdf_gen');
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

        $mpdf->Bookmark('Start of the document');
        $mpdf->WriteHTML($this->load->view('permintaan/pdf', $data, true));

        $mpdf->Output();
    }
    public function filterDate($start, $end)
    {
        $this->session->set_flashdata('filterDate', array('start' => $start, 'end' => $end));
        redirect(base_url('permintaan'));
    }
}
