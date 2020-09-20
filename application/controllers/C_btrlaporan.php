<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_btrlaporan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('baterai_model', 'batm');
        $this->load->library('form_validation');
	
	}


	 public function index()
  {
  	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');

     	$this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[brgmsk_btr,brgklr_btr]',[
            'required' => 'Kolom Laporan Transaksi wajib diisi']);
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required', [
            'required' => 'Kolom Periode Tanggal wajib diisi']);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Laporan Transaksi (Baterai)";
            
			$this->load->view('baterai/laporan', $data);
			
        } else {
            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'brgmsk_btr') {
                $query = $this->batm->getBarangMasuk(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } else {
                $query = $this->batm->getBarangKeluar(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            }

            $this->_cetak($query, $table, $tanggal);
        }
  }



  private function _cetak($data, $table_, $tanggal)
    {
        $this->load->library('CustomPDF');
        $table = $table_ == 'brgmsk_btr' ? 'Barang Masuk' : 'Barang Keluar';

        $pdf = new FPDF();
        $pdf->AddPage('L', 'A5');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 7, 'Laporan ' . $table, 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(190, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);

        if ($table_ == 'brgmsk_btr') :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Tgl Masuk', 1, 0, 'C');
            $pdf->Cell(35, 7, 'ID Transaksi', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Nama Barang', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Merk', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Petugas', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Jumlah', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d['tanggal_masuk'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['id_barang_masuk'], 1, 0, 'C');
                $pdf->Cell(45, 7, $d['nama_brg'], 1, 0, 'L');
                $pdf->Cell(35, 7, $d['merk'], 1, 0, 'L');
                $pdf->Cell(20, 7, $d['name'], 1, 0, 'L');
                $pdf->Cell(25, 7, $d['jumlah_masuk'], 1, 0, 'C');
                $pdf->Ln();
            } else :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Tgl Keluar', 1, 0, 'C');
            $pdf->Cell(35, 7, 'ID Transaksi', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Nama Barang', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Merk', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Petugas', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Jumlah', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d['tanggal_keluar'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['id_barang_keluar'], 1, 0, 'C');
                $pdf->Cell(45, 7, $d['nama_brg'], 1, 0, 'L');
                $pdf->Cell(35, 7, $d['merk'], 1, 0, 'L');
                $pdf->Cell(20, 7, $d['name'], 1, 0, 'L');
                $pdf->Cell(25, 7, $d['jumlah_keluar'] , 1, 0, 'C');
                $pdf->Ln();
            }
        endif;

        $file_name = $table . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }


      public function createPdf(){
        
    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $user = $this->session->userdata('email');
        $this->load->library('session');

        $this->load->model(array('Baterai_model'));

        
        $data['getbarang'] = $this->batm->getBarang();
        
        $this->load->library('pdf');
        $this->pdf->load_view('baterai/lapbulbtr',$data);

    }
    


}