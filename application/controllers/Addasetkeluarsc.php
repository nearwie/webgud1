<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Addasetkeluarsc extends CI_Controller
{

    

    public function __construct()
    {
        parent::__construct();
        //$this->permission->is_logged_in();
        //load model
        $this->load->helper('url');
        $this->load->helper('form');
      
        $this->load->model('Asetsc_model', 'asetscm');
        $this->load->library('form_validation');
        //$this->load->model('leave_model');
    }




   private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required|trim', [
            'required' => 'Kolom Tanggal Keluar wajib diisi' 
        ]);
        $this->form_validation->set_rules('aset_id', 'aset_id', 'required',[
            'required' => 'Kolom Nama Aset Keluar wajib diisi' 
        ]);

        $input = $this->input->post('aset_id', true);
        $stok = $this->asetscm->get('tbl_brgsc', ['kode_brg' => $input])['stok']; 
        $stok_valid = $stok + 1;

         $this->form_validation->set_rules('jumlah_keluar', 'jumlah_keluar', 'required|trim|numeric|greater_than[0]');
    }


    public function index()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Input Aset Keluar";
            $data['aset'] = $this->asetscm->get('tbl_brgsc', null);
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-AK-' . date('ymd');
            $kode_terakhir = $this->asetscm->getMax('asetsc_keluar', 'id_aset_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_aset_keluar'] = $kode . $number;

            
            $this->load->view('user/add_aksc', $data);
            
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->asetscm->insert('asetsc_keluar', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('asetkeluarsc');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('user/add_aksc');
            }
        }
    }


   

    
    public function delete()
    {   $this->load->model('Asetsc_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data aset keluar</div>');
        redirect( base_url() . 'Asetkeluarsc'); 
        }
                
        $a = $this->asetsc_model->get_brgmsk_by_id($id);
        
        $this->asetsc_model->delete_astklr($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data aset keluar</div>');
        redirect( base_url() . 'asetkeluarsc');        
    }


    



    

}