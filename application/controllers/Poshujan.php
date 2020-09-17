<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poshujan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Poshujan_model', 'poshujanm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Detail Pos Hujan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Poshujan_model');
        
        
        $data['hujans'] =  $this->poshujanm->getPos();
		
	
		$this->load->view('user/data_poshujan', $data);
		
		
	}



	public function tambah()
    {
       
       
        $this->form_validation->set_rules('id_sta', 'id_sta', 'required', [
            'required' => 'Kolom STA ID wajib diisi'
        ]);
        $this->form_validation->set_rules('nama_pos', 'nama_pos', 'required', [
            'required' => 'Kolom Pos Hujan wajib diisi' 
        ]);
        $this->form_validation->set_rules('wilayah', 'wilayah', 'required', [
            'required' => 'Kolom Wilayah wajib diisi'
        ]);
        $this->form_validation->set_rules('pengamat', 'pengamat', 'required', [
            'required' => 'Kolom Pengamat wajib diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
            'required' => 'Kolom No.HP wajib diisi'
        ]);
        $this->form_validation->set_rules('koor', 'koor', 'required', [
            'required' => 'Kolom Koordinator wajib diisi'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'Kolom Keterangan wajib diisi'
        ]);
        
 
        if ($this->form_validation->run() === FALSE)
        {
             $data['title'] = 'Tambah Pos Hujan';        
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            
          
            $this->load->view('user/add_poshujan', $data);
            
        }
        else
        {

            $input = $this->input->post(null, true);
            $insert = $this->poshujanm->insert('tbl_poshujan', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('poshujan');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('user/add_poshujan');
            }
        }
    }
        

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
      
        
        $data['title'] = 'Edit Pos Hujan';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$this->load->model('Poshujan_model');
        
        
        $this->form_validation->set_rules('id_sta', 'id_sta', 'required', [
            'required' => 'Kolom STA ID wajib diisi'
        ]);
        $this->form_validation->set_rules('nama_pos', 'nama_pos', 'required', [
            'required' => 'Kolom Pos Hujan wajib diisi' 
        ]);
        $this->form_validation->set_rules('wilayah', 'wilayah', 'required', [
            'required' => 'Kolom Wilayah wajib diisi'
        ]);
        $this->form_validation->set_rules('pengamat', 'pengamat', 'required', [
            'required' => 'Kolom Pengamat wajib diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
            'required' => 'Kolom No.HP wajib diisi'
        ]);
        $this->form_validation->set_rules('koor', 'koor', 'required', [
            'required' => 'Kolom Koordinator wajib diisi'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'Kolom Keterangan wajib diisi'
        ]);
 
        if ($this->form_validation->run() === FALSE)
        {

            
            $data['pos'] = $this->poshujanm->get('tbl_poshujan', ['id_sta' => $id]);
           
			$this->load->view('User/edit_poshujan', $data);
		
 
        }
        else
        {


            $input = $this->input->post(null, true);
            $update = $this->poshujanm->update('tbl_poshujan', 'id_sta', $id, $input);
            
           if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('poshujan');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('poshujan/edit/' . $id);
            }
        }
    }


    public function delete()
    {   $this->load->model('Poshujan_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data pos hujan </div>');
        redirect( base_url() . 'poshujan'); 
        }
                
        $a = $this->poshujanm->get_brg_by_id($id);
        
        $this->poshujanm->delete_brg($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data pos hujan </div>');
        redirect( base_url() . 'poshujan');        
    }






}