<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Wilayah_model');
		
	}



	public function index()
	{
		$data['title'] = 'Wilayah Test';
		$this->load->library('form_validation');
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

		 $data['provinsi'] = $this->Wilayah_model->getDataProv();
      

		
		$this->load->view('user/wilayah', $data);
	
	}


	 public function getKabupaten()
    {
        $idprov = $this->input->post('id');
        $data = $this->Wilayah_model->getDatakabupaten($idprov);
        $output = '<option value="">--Pilih Kabupaten-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->nama . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getKecamatan()
    {
        $idkabupaten = $this->input->post('id');
        $data = $this->Wilayah_model->getDatakecamatan($idkabupaten);
        $output = '<option value="">--Pilih Kecamatan-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->nama . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getDesa()
    {
        $idkecamatan = $this->input->post('id');
        $data = $this->Wilayah_model->getDataDesa($idkecamatan);
        $output = '<option value="">--Pilih Desa-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->nama . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

}