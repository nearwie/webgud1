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
       
       
        
		$this->form_validation->set_rules('kode_brg', 'kode_brg', 'required', [
			'required' => 'Kolom Kode Barang wajib diisi'
		]);
		$this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
			'required' => 'Kolom Nama Barang wajib diisi' 
		]);
		$this->form_validation->set_rules('jenis_id', 'jenis_id', 'required', [
			'required' => 'Kolom Jenis wajib diisi'
		]);
		$this->form_validation->set_rules('satuan_id', 'satuan_id', 'required', [
			'required' => 'Kolom S/N wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah Barang';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        	$data['jenis'] = $this->barangm->get('jenis');
            $data['satuan'] = $this->barangm->get('satuan');

            $kode_terakhir = $this->barangm->getMax('barang', 'kode_brg');
            $kode_tambah = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['kode_brg'] = 'B' . $number;

          
			$this->load->view('user/add_barang', $data);
			
        }
        else
        {

        	$input = $this->input->post(null, true);
            $insert = $this->barangm->insert('barang', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('detailbrg');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('user/add_barang');
            }
        }
    }
        

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
      
        
        $data['title'] = 'Edit Barang';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$this->load->model('Barang_model');
        
        
  
		
		$this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
			'required' => 'Kolom Nama Barang wajib diisi' 
		]);
		$this->form_validation->set_rules('jenis_id', 'jenis_id', 'required', [
			'required' => 'Kolom Jenis wajib diisi'
		]);
        $this->form_validation->set_rules('satuan_id', 'satuan_id', 'required', [
            'required' => 'Kolom Jenis wajib diisi'
        ]);
         $this->form_validation->set_rules('no_seri', 'Serial Number', 'required', [
            'required' => 'Kolom Serial Number wajib diisi'
        ]);
	
 
        if ($this->form_validation->run() === FALSE)
        {

            $data['jenis'] = $this->barangm->get('jenis');
            $data['satuan'] = $this->barangm->get('satuan');
            $data['barang'] = $this->barangm->get('barang', ['kode_brg' => $id]);
           
			$this->load->view('User/edit_barang', $data);
		
 
        }
        else
        {


            $input = $this->input->post(null, true);
            $update = $this->barangm->update('barang', 'kode_brg', $id, $input);
            
           if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('detailbrg');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('detailbrg/edit/' . $id);
            }
        }
    }





}