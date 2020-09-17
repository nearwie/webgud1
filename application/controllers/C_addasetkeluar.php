<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  C_addasetkeluar extends CI_Controller
{

    

    public function __construct()
    {
        parent::__construct();
        //$this->permission->is_logged_in();
        //load model
        $this->load->helper('url');
        $this->load->helper('form');
      
        $this->load->model('Maset_model', 'maset');

        $this->load->model('Parameter_model');
        $this->load->library('form_validation');
        //$this->load->model('leave_model');
    }




   private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required|trim', [
            'required' => 'Kolom Tanggal Keluar wajib diisi' 
        ]);
       

        
        $input = $this->input->post('aset_id', true);
        $stok = $this->maset->get('tbl_noseries', ['id' => $input])['stok']; 
        $stok_valid = $stok + 1;

         $this->form_validation->set_rules('jumlah_keluar', 'jumlah_keluar', 'required|trim|numeric|greater_than[0]');
    }


    public function index()
    {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Input Aset Keluar";
             $data['parameter'] = $this->Parameter_model->getDataParam();
            $data['series'] = $this->maset->get('tbl_noseries', null);
            $data['posid'] = $this->maset->get('tbl_poshujan', null);
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-AK-' . date('ymd');
            $kode_terakhir = $this->maset->getMax('aset_keluarsc', 'id_aset_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_aset_keluar'] = $kode . $number;

            
            $this->load->view('user/v_addasetkeluar', $data);
            
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->maset->insert('aset_keluarsc', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('C_asetkeluar');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('user/v_addasetkeluar');
            }
        }
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
        $data= $this->Parameter_model->getDataSeries($idseries);
        $output = '<option value="">--Pilih Series--</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->no_seri . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
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

    public function getstok($getId)
        {
            $id = encode_php_tags($getId);
            $query = $this->Maset_model->cekStok($id);
            output_json($query);
        }



    



    

}