<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model', 'barangm');
		
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		
	}


	public function index ()
	{
		$data['title'] = 'Dasboard Si-GUDANG';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
		$data['barang'] = $this->barangm->count('barang');
		$data['pengguna'] = $this->barangm->count('user');
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

		

		
		$this->load->view('user/view_dashboard', $data);
		
	}
}
