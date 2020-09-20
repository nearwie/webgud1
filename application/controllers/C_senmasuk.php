<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  C_senmasuk extends CI_Controller
{

    

    public function __construct()
    {
        parent::__construct();
        //$this->permission->is_logged_in();
        //load model
        $this->load->helper('url');
        $this->load->helper('form');
        
        $this->load->model('sensor_model', 'senm');
        $this->load->library('form_validation');
        //$this->load->model('leave_model');
    }



    public function index ()
    {   
        $data['title'] = 'Input Stok Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->library('session');
         $data['barangmasuk'] = $this->senm->getBarangMasuk();
         
        
       
        $this->load->view('sensor/brg_msk', $data);
     

    }


    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required|trim', [
            'required' => 'Kolom Tanggal Masuk wajib diisi' 
        ]);
        $this->form_validation->set_rules('barang_id', 'barang_id', 'required', [
            'required' => 'Kolom Pilih Barang wajib diisi' 
        ]);


        $input = $this->input->post('barang_id', true);
        $stok = $this->senm->get('master_sensor', ['kode_brg' => $input])['stok']; 
        $stok_valid = $stok + 1;

         $this->form_validation->set_rules('jumlah_masuk', 'jumlah_masuk', 'required|trim|numeric|greater_than[0]');
    }


    public function add_stokmsk()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Input Stok Masuk";
            $data['barang'] = $this->senm->get('master_sensor', null);
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->senm->getMax('brgmsk_snsr', 'id_barang_masuk', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_barang_masuk'] = $kode . $number;

            
            $this->load->view('sensor/add_brgmsk', $data);
            
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->senm->insert('brgmsk_snsr', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('C_senmasuk');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('sensor/add_brgmsk');
            }
        }
    }



    
   


    public function delete()
    {   $this->load->model('sensor_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang masuk</div>');
        redirect( base_url() . 'C_senmasuk'); 
        }
                
        $a = $this->senm->get_brgmsk_by_id($id);
        
        $this->senm->delete_brgmsk($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang masuk</div>');
        redirect( base_url() . 'C_senmasuk');        
    }


  


    

}