<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataasetsc extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Asetsc_model', 'asetscm');
		$this->load->model('Datasetsc_model', 'datastm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Detail Aset SU-CA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Datasetsc_model');
        
        
        $data['dataasets'] =  $this->datastm->getAset();
		
	
		$this->load->view('user/data_aset', $data);
		
		
	}


	public function tambah()
    {
       
       
        
	
		$this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
			'required' => 'Kolom Nama Barang wajib diisi' 
		]);
		$this->form_validation->set_rules('type_id', 'type', 'required', [
			'required' => 'Kolom Type Barang wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'merk', 'required', [
			'required' => 'Kolom Merk wajib diisi'
		]);
		$this->form_validation->set_rules('no_seri', 'no_seri', 'required', [
			'required' => 'Kolom Serial Number  wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah Suku Cadang';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        	$data['type'] = $this->datastm->get('tbl_type', null);
        
           

            $kode_terakhir = $this->datastm->getMax('tbl_brgsc', 'kode_brg');
            $kode_tambah = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['kode_brg'] = 'BS' . $number;

          
			$this->load->view('user/add_asetsc', $data);
			
        }
        else
        {	$kode_brg	 = $this->input->post('kode_brg');
			$nama_brg	 = $this->input->post('nama_brg');
			$type_id	 = $this->input->post('type_id');
			$merk 		= $this->input->post('merk');
			$no_seri 	= $this->input->post('no_seri');
			$stok 	= $this->input->post('stok');
			$gambar 	= $_FILES['gambar']['name'];

			if($gambar=''){}else{
				$config['allowed_types'] = 'gif|jpg|png|jpeg|tiff';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/upload/';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar Gagal Diupload!";
				} else{
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = [
				'kode_brg' => $kode_brg,
				'nama_brg' => $nama_brg,
				'type_id' => $type_id,
				'merk' => $merk,
				'no_seri' => $no_seri,
				'stok' => 0,
				'gambar' => $gambar,

			];
			

		


            $insert = $this->datastm->insert('tbl_brgsc', $data);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('dataasetsc');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('dataasetsc/tambah');
            }
        }
    }



    public function edit($getId)
    {
        $id = encode_php_tags($getId);
      
        
        $data['title'] = 'Edit Suku Cadang';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
        
		$this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
			'required' => 'Kolom Nama Aset wajib diisi' 
		]);
		$this->form_validation->set_rules('type_id', 'type', 'required', [
			'required' => 'Kolom Type Aset wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'merk', 'required', [
			'required' => 'Kolom Merk wajib diisi'
		]);
		$this->form_validation->set_rules('no_seri', 'no_seri', 'required', [
			'required' => 'Kolom Serial Number  wajib diisi'
		]);
		$data['type'] = $this->datastm->get('tbl_type', null);
		
 
        if ($this->form_validation->run() === FALSE)
        {

           
            $data['barangsc'] = $this->datastm->get('tbl_brgsc', ['kode_brg' => $id]);
           
			$this->load->view('User/edit_brgasetsc', $data);
		
 
        }
        else
        {

            $input = $this->input->post(null, true);
            $update = $this->datastm->update('tbl_brgsc', 'kode_brg', $id, $input);
            
           if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('dataasetsc');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('dataasetsc/edit/' . $id);
            }
        }
    }



    public function delete()
    {   $this->load->model('Datasetsc_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data aset suku cadang </div>');
        redirect( base_url() . 'dataasetsc'); 
        }
                
        $a = $this->datastm->get_brg_by_id($id);
        
        $this->datastm->delete_brg($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data aset suku cadang </div>');
        redirect( base_url() . 'dataasetsc');        
    }


	public function getstok($getId)
	    {
	        $id = encode_php_tags($getId);
	        $query = $this->asetscm->cekStok($id);
	        output_json($query);
	    }



	public function get_barang(){
	        $kode=$this->input->post('kode');
	        $data=$this->m_pos->get_data_barang_bykode($kode);
	        echo json_encode($data);
	    }


	     public function dynamis ()
    {
        $data['title'] = 'Notifikasi Dynamis ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->library('session');
        $data['aset'] = $this->asetscm->count('tbl_brgsc');
        $data['aset_masuk'] = $this->asetscm->count('asetsc_masuk');
        $data['aset_keluar'] = $this->asetscm->count('asetsc_keluar');
       
        $data['stok'] = $this->asetscm->sum('tbl_brgsc', 'stok');
        $data['aset_min'] = $this->asetscm->min('tbl_brgsc', 'stok', 10);
        $data['transaksi'] = [
            'asetsc_masuk' => $this->asetscm->getAsetMasuk(5),
            'asetsc_keluar' => $this->asetscm->getAsetKeluar(5)
        ];

        // Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        $data['cbk'] = [];

        foreach ($bln as $b) {
            $data['cbm'][] = $this->asetscm->chartAsetMasuk($b);
            $data['cbk'][] = $this->asetscm->chartAsetKeluar($b);
        }

        

        
        $this->load->view('user/notif_sc', $data);
        
    }





    


}
