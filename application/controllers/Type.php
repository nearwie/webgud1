<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Barang_model', 'barangm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Daftar Type';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Barang_model');
        
        
        $data['type'] =  $this->barangm->get('tbl_type');
		
		
		
		$this->load->view('user/dttype', $data);
		
		
	}



	public function add_type()
    {
       
       
        
		
		$this->form_validation->set_rules('nama_type', 'nama_type', 'required|trim', [
			'required' => 'Kolom type wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah Type';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

			
			$this->load->view('user/add_typebrg', $data);
		
 
        }
        else
        {

        	$input = $this->input->post(null, true);
            $insert = $this->barangm->insert('tbl_type', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('type');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('type/add_typebrg');
            }
        }
    }
        

    public function edit_type()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('type');
        }
        
        $this->load->helper('url');
      
        
        $data['title'] = 'Edit type';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$data['type'] = $this->db->get('tbl_type')->result_array();
		$this->load->model('Barang_model');
        
        $data['a'] = $this->barangm->get_type_by_id($id);

  
		$this->form_validation->set_rules('nama_type', 'nama_type', 'required|trim', [
			'required' => 'Kolom type wajib diisi'
		]);
 
        if ($this->form_validation->run() === FALSE)
        {
            
			$this->load->view('user/edit_type', $data);
			
 
        }
        else
        {
            $this->barangm->set_type($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit data type</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'type');
        }
    }




    public function delete()
    {   $this->load->model('Barang_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus type </div>');
        redirect( base_url() . 'type'); 
        }
                
        $a = $this->barangm->get_type_by_id($id);
        
        $this->barangm->delete_type($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus type </div>');
        redirect( base_url() . 'type');        
    }


 
}