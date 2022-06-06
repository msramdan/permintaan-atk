<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Konfigurasi_tambahan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Konfigurasi_tambahan_model');
		$this->load->model('App_setting_model');
		$this->load->library('form_validation');
	}

	public function index()
    {
        $data = array(
            'button' => 'Update',
            'action' => site_url('Konfigurasi_tambahan/update_action'),
            'sett_apps' => $this->App_setting_model->get_by_id(1),
            'konfigurasi_tambahan_data' => $this->Konfigurasi_tambahan_model->get_all(),
        );
        $this->template->load('template', 'konfigurasi_tambahan/page', $data);
    }

	public function update_action()
	{
        // update data where id_config = id_config from post input
        $id_config = $this->input->post('id_config', TRUE);
        $value = $this->input->post('value', TRUE);

        
        $configs = $this->Konfigurasi_tambahan_model->get_by_id($id_config);
        $configs_name = $configs->config_name;
    
        if ($_FILES['file']['name'] != '') {
            unlink('assets/audio/'.$configs->value);
			$name_sound = $_FILES['file']['name'];
            $config['upload_path'] = './assets/audio/';
            $config['allowed_types'] = 'wav';
            $config['file_name'] = 'audio_' . encrypt_url($id_config);
            $config['max_size'] = '2048';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            $file_name = $this->upload->data('file_name');
            $data = array(
                'value' => $file_name,
				'name_sound' => $name_sound,
            );
            
            $this->Konfigurasi_tambahan_model->update($id_config, $data);

            $anu = array(
                'status' => 'ok',
                'message' => 'ggwp'
            );
            echo json_encode($anu);
        }
	}
}

