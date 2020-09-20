<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logger extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Logger_model', 'logm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Data Logger';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();
        
        $data['barangs'] =  $this->logm->getBarang();
		
	
		$this->load->view('logger/data', $data);
		
		
	}



	public function tambah()
    {
       
       
        
		$this->form_validation->set_rules('kode_brg', 'kode_brg', 'required', [
			'required' => 'Kolom Kode Barang wajib diisi'
		]);
		$this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
			'required' => 'Kolom Nama Barang wajib diisi' 
		]);
        $this->form_validation->set_rules('tahun', 'tahun', 'required', [
            'required' => 'Kolom Tahun Datang wajib diisi'
        ]);
		$this->form_validation->set_rules('merk', 'merk', 'required', [
			'required' => 'Kolom Merk wajib diisi'
		]);
		$this->form_validation->set_rules('model', 'model', 'required', [
			'required' => 'Kolom Model wajib diisi'
		]);
        $this->form_validation->set_rules('ket', 'ket', 'required', [
            'required' => 'Kolom Lokasi wajib diisi'
        ]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah Barang';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            $kode_terakhir = $this->logm->getMax('master_logger', 'kode_brg');
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['kode_brg'] = 'LOG' . $number;

          
			$this->load->view('logger/add', $data);
			
        }
        else
        {

        	$input = $this->input->post(null, true);
            $insert = $this->logm->insert('master_logger', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('logger');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('logger/tambah');
            }
        }
    }
        

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
      
        
        $data['title'] = 'Edit Barang';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$this->load->model('logger_model');
       
        $this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
            'required' => 'Kolom Nama Barang wajib diisi' 
        ]);
        $this->form_validation->set_rules('tahun', 'tahun', 'required', [
            'required' => 'Kolom Tahun Datang wajib diisi'
        ]);
        $this->form_validation->set_rules('merk', 'merk', 'required', [
            'required' => 'Kolom Merk wajib diisi'
        ]);
        $this->form_validation->set_rules('model', 'model', 'required', [
            'required' => 'Kolom Model wajib diisi'
        ]);
        $this->form_validation->set_rules('ket', 'ket', 'required', [
            'required' => 'Kolom Lokasi wajib diisi'
        ]);
	
 
        if ($this->form_validation->run() === FALSE)
        { 
            $data['barang'] = $this->logm->get('master_logger', ['kode_brg' => $id]);
           
			$this->load->view('logger/edit', $data);
        }
        else
        {
            $input = $this->input->post(null, true);
            $update = $this->logm->update('master_logger', 'kode_brg', $id, $input);
            
           if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('logger');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('logger/edit/' . $id);
            }
        }
    }




    public function delete()
    {   $this->load->model('logger_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang </div>');
        redirect( base_url() . 'logger'); 
        }
        $a = $this->logm->get_brg_by_id($id);
        
        $this->logm->delete_brg($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang </div>');
        redirect( base_url() . 'logger');        
    }



    public function getAjax($kode_brg = null)
    {
        $barang = $this->db->get_where('master_logger', ['kode_brg' => $kode_brg])->row();
        
        $barang = json_encode($barang);
        echo $barang;
    }




public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->logm->cekStok($id);
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
        $data['barang'] = $this->barangm->count('barang');
        $data['barang_masuk'] = $this->barangm->count('barang_masuk');
        $data['barang_keluar'] = $this->barangm->count('barang_keluar');
       
        $data['stok'] = $this->barangm->sum('barang', 'stok');
        $data['barang_min'] = $this->barangm->min('barang', 'stok', 10);
        $data['transaksi'] = [
            'barang_masuk' => $this->barangm->getBarangMasuk(5),
            'barang_keluar' => $this->barangm->getBarangKeluar(5)
        ];

        // Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        $data['cbk'] = [];

        foreach ($bln as $b) {
            $data['cbm'][] = $this->barangm->chartBarangMasuk($b);
            $data['cbk'][] = $this->barangm->chartBarangKeluar($b);
        }

        

        
        $this->load->view('user/notif_pias', $data);
        
    }


    public function barcode(){

        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('logger');
        }
         $data['title'] = 'Barcode';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        $data['bar'] = $this->logm->get_barcode_by_id($id);
    
        $this->load->view('logger/bc_data', $data);
        
      
         }

        public function cetakBarcode(){
             $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('logger');
        }
        
    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $user = $this->session->userdata('email');
        $this->load->library('session');

        $this->load->model(array('logger_model'));

        
        $data['bar'] = $this->logm->get_barcode_by_id($id);
        
        $this->load->library('pdf');
        $this->pdf->load_barcode('logger/bc_cetak',$data);

    }
    

}