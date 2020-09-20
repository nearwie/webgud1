<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  C_logkeluar extends CI_Controller
{

    

    public function __construct()
    {
        parent::__construct();
        //$this->permission->is_logged_in();
        //load model
        $this->load->helper('url');
        $this->load->helper('form');
        
        $this->load->model('Logger_model', 'logm');
        $this->load->library('form_validation');
        //$this->load->model('leave_model');
    }



    public function index ()
    {   
        $data['title'] = 'Input Stok Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->library('session');
         $data['barangkeluar'] = $this->logm->getBarangKeluar();
         
        
       
        $this->load->view('logger/brg_klr', $data);
     

    }


    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required|trim', [
            'required' => 'Kolom Tanggal Keluar wajib diisi' 
        ]);
       $this->form_validation->set_rules('barang_id', 'barang_id', 'required', [
            'required' => 'Kolom Pilih Barang wajib diisi' 
        ]);


        $input = $this->input->post('barang_id', true);
        $stok = $this->logm->get('master_logger', ['kode_brg' => $input])['stok']; 
        $stok_valid = $stok + 1;

         $this->form_validation->set_rules('jumlah_keluar', 'jumlah_keluar', 'required|trim|numeric|greater_than[0]');
    }


    public function add_stokklr()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Input Stok Keluar";
            $data['barang'] = $this->logm->get('master_logger', null);
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BK-' . date('ymd');
            $kode_terakhir = $this->logm->getMax('brgklr_log', 'id_barang_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_barang_keluar'] = $kode . $number;

            
            $this->load->view('logger/add_brgklr', $data);
            
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->logm->insert('brgklr_log', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('C_logkeluar');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('logger/add_brgklr');
            }
        }
    }



    
   


    public function delete()
    {   $this->load->model('batator_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang masuk</div>');
        redirect( base_url() . 'C_logkeluar'); 
        }
                
        $a = $this->logm->get_brgklr_by_id($id);
        
        $this->logm->delete_brgklr($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang keluar</div>');
        redirect( base_url() . 'C_logkeluar');        
    }


  


    

}