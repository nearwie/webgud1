<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Asetkeluar extends CI_Controller
{

    

    public function __construct()
    {
        parent::__construct();
        //$this->permission->is_logged_in();
        //load model
        $this->load->helper('url');
        $this->load->helper('form');
        
        $this->load->model('Aset_model', 'asetm');
        $this->load->library('form_validation');
        //$this->load->model('leave_model');
    }



    public function index ()
    {   
        $data['title'] = 'Daftar Aset Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->library('session');
         $data['asetkeluar'] = $this->asetm->getAsetKeluar();
         
        
       
        $this->load->view('user/asetkeluar', $data);
     

    }


    
   

 public function delete()
    {   $this->load->model('Aset_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data aset keluar</div>');
        redirect( base_url() . 'asetkeluar'); 
        }
                
        $a = $this->asetm->get_astklr_by_id($id);
        
        $this->asetm->delete_astklr($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data aset keluar</div>');
        redirect( base_url() . 'asetkeluar');        
    }


  


    

}