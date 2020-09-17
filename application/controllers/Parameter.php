<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
         $this->load->model('Asetsc_model', 'asetscm');
	
		$this->load->model('Parameter_model');
		
	}


    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required|trim', [
            'required' => 'Kolom Tanggal Keluar wajib diisi' 
        ]);
       

        
        $input = $this->input->post('aset_id', true);
        $stok = $this->asetscm->get('tbl_series', ['id' => $input])['stok']; 
        $stok_valid = $stok + 1;

         $this->form_validation->set_rules('jumlah_keluar', 'jumlah_keluar', 'required|trim|numeric|greater_than[0]');
    }



	public function index()
	{
		$data['title'] = 'Input Aset Keluar';
		$this->load->library('form_validation');
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

		 $data['parameter'] = $this->Parameter_model->getDataParam();
      

		
		$this->load->view('user/Parameter', $data);
	
	}


	 public function getBarang()
    {
        $idparam = $this->input->post('id');
        $data = $this->Parameter_model->getDataBarang($idparam);
        $output = '<option value="">--Pilih Barang-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->nama_brgprm . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getMerk()
    {
        $idbarang = $this->input->post('id');
        $data = $this->Parameter_model->getDataMerk($idbarang);
        $output = '<option value="">--Pilih Merk-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->nama_merk . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getModel()
    {
        $idmodel = $this->input->post('id');
        $data = $this->Parameter_model->getDataModel($idmodel);
        $output = '<option value="">--Pilih Model-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->nama_model . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

     public function getSeries()
    {
        $idseries = $this->input->post('id');
        $data = $this->Parameter_model->getDataSeries($idseries);
        $output = '<option value="">--Pilih Series-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->no_seri . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


}