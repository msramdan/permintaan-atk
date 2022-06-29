<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $barang = $this->Barang_model->get_all();
        
        $data = array(
            'barang_data' => $barang,
            
        );
        $this->template->load('template', 'barang/barang_list', $data);
    }

    public function read($id)
    {
        $row = $this->Barang_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'barang_id' => $row->barang_id,
                'kode_barang' => $row->kode_barang,
                'nama_barang' => $row->nama_barang,
                'jumlah' => $row->jumlah,
                'desk' => $row->desk,
                'photo' => $row->photo,
            );
            $this->template->load('template', 'barang/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create()
    {
        $kode = $this->Barang_model->generatekode();
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
            'barang_id' => set_value('barang_id'),
            'kode_barang' => set_value('kode_barang'),
            'nama_barang' => set_value('nama_barang'),
            'jumlah' => set_value('jumlah'),
            'desk' => set_value('desk'),
            'photo' => set_value('photo'),
            'kode' => $kode,
        );
        $this->template->load('template', 'barang/barang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']      = './assets/assets/img/barang';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = 10048;
            $config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload("photo");
            $data = $this->upload->data();
            $photo = $data['file_name'];

            $data = array(
                'kode_barang' => $this->input->post('kode_barang', TRUE),
                'nama_barang' => $this->input->post('nama_barang', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
                'desk' => $this->input->post('desk', TRUE),
                'photo' => $photo,
            );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }

    public function update($id)
    {
        $row = $this->Barang_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
                'barang_id' => set_value('barang_id', $row->barang_id),
                'kode_barang' => set_value('kode_barang', $row->kode_barang),
                'nama_barang' => set_value('nama_barang', $row->nama_barang),
                'jumlah' => set_value('jumlah', $row->jumlah),
                'desk' => set_value('desk', $row->desk),
                'photo' => set_value('photo', $row->photo),
            );
            $this->template->load('template', 'barang/barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $barang_id = encrypt_url($this->input->post('barang_id'));
            $this->update($barang_id);
        } else {

            $config['upload_path']      = './assets/assets/img/barang';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo")) {
				$id = $this->input->post('barang_id');
				$row = $this->Barang_model->get_by_id($id);

				$data = $this->upload->data();
				$photo = $data['file_name'];
				if ($row->photo == null || $row->photo == '') {
				} else {
					$target_file = './assets/assets/img/barang/' . $row->photo;
					unlink($target_file);
				}
			} else {
				$photo = $this->input->post('photo_lama');
			}
            $data = array(
                'kode_barang' => $this->input->post('kode_barang', TRUE),
                'nama_barang' => $this->input->post('nama_barang', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
                'desk' => $this->input->post('desk', TRUE),
                'photo' => $photo,
            );

            $this->Barang_model->update($this->input->post('barang_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Barang_model->get_by_id(decrypt_url($id));

        if ($row) {
            if ($row->photo == null || $row->photo == '') {
			} else {
				$target_file = './assets/assets/img/barang/' . $row->photo;
				unlink($target_file);
			}

            $this->Barang_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
        $this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
        $this->form_validation->set_rules('desk', 'desk', 'trim|required');
        $this->form_validation->set_rules('photo', 'photo', 'trim');
        $this->form_validation->set_rules('barang_id', 'barang_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function getBarangById($barang_id){

        $query = $this->db->query("SELECT * from barang where barang_id='$barang_id'")->row();
        echo json_encode($query);

    }
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-06 00:12:19 */
/* http://harviacode.com */