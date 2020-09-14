<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_model extends CI_Model
{
	var $table = 'tbl_kec';
    var $pkey = 'id';

  public function __construct()
    {
        $this->load->database();
    }


     function get_list_kabupaten() {
        return $this->db->get('tbl_kab')->result(); 
    }

     function get_list_kec($id_kab){
        $this->db->where('id_kab', $id_kab);
        $result = $this->db->get($this->table)->result(); // Tampilkan semua data kota berdasarkan id provinsi
        return $result; 
    }




 }
