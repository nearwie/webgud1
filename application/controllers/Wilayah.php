<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Wilayah_model', 'wilm');
		
	}



	public function index()
	{
		$data['title'] = 'Wilayah Test';
		$this->load->library('form_validation');
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

		$data['kabupaten'] = $this->wilm->get_list_kabupaten();


		
		$this->load->view('user/wilayah', $data);
	
	}


	public function list_kec()
	{
		
		$this->load->library('form_validation');
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$id_kab = $this->input->post('kab_id');
		$kecamatan = $this->wilm->get_list_kec($id_kab);

		 $lists = "<option value=''>--Please-Select---</option>";
        foreach($kecamatan as $data){
            $lists .= "<option value='".$data->id."'>".$data->kec."</option>"; 

        }
        $callback = array('list_kecamatan' => $lists);
        echo json_encode($callback);
		
		
	
	}

}