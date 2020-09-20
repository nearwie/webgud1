<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapreg_model extends CI_Model
{
	

  public function __construct()
    {
        $this->load->database();
    }





    public function getBarang()
    {
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->order_by('kode_brg');
        return $this->db->get('barang b')->result_array();
    }

    



}

