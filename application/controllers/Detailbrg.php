<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailbrg extends CI_Controller
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
		$data['title'] = 'Detail Persediaan Barang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Barang_model');
        
        
        $data['barangs'] =  $this->barangm->getBarang();
		
	
		$this->load->view('user/dtbarang', $data);
		
		
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




    public function delete()
    {   $this->load->model('Barang_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang </div>');
        redirect( base_url() . 'detailbrg'); 
        }
                
        $a = $this->barangm->get_brg_by_id($id);
        
        $this->barangm->delete_brg($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang </div>');
        redirect( base_url() . 'detailbrg');        
    }



    public function getAjax($kode_brg = null)
    {
        $barang = $this->db->get_where('barang', ['kode_brg' => $kode_brg])->row();
        
        $barang = json_encode($barang);
        echo $barang;
    }



    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang";
            $data['jenis'] = $this->barangm->get('jenis');
            $data['satuan'] = $this->barangm->get('satuan');

            // Mengenerate ID Barang
            $kode_terakhir = $this->barangm->getMax('barang', 'kode_brg');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_barang'] = 'BB' . $number;

           
			$this->load->view('admin/tambahbarang', $data);
		
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->barangm->insert('barang', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');

                redirect('barang');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('barang/add');
            }
        }
    }

 


	


public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->barangm->cekStok($id);
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
            redirect('detailbrg');
        }
         $data['title'] = 'Barcode';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        $data['bar'] = $this->barangm->get_barcode_by_id($id);
    
        $this->load->view('user/bc_dtbarang', $data);
        
      
         }

        public function cetakBarcode(){
             $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('detailbrg');
        }
        
    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $user = $this->session->userdata('email');
        $this->load->library('session');

        $this->load->model(array('Laporan_model'));

        
        $data['bar'] = $this->barangm->get_barcode_by_id($id);
        
        $this->load->library('pdf');
        $this->pdf->load_barcode('user/bc_cetak',$data);

    }
    

}