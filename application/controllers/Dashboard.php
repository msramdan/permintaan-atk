<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jayapura');
class Dashboard extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        is_login();
		check_admin();
		$this->load->model('Permintaan_model');
    }

	public function index()
	{
		$permintaan = $this->Permintaan_model->get_limit();
		$data = array(
            'permintaan_data' => $permintaan,
        );
		$this->template->load('template','dashboard', $data);
	}
}
