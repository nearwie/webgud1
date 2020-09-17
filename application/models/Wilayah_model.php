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

     public function getDataProv()
    {
        return $this->db->get('wilayah_provinsi')->result_array();
    }

    public function getDatakabupaten($idprov)
    {
        return $this->db->get_where('wilayah_kabupaten', ['provinsi_id' => $idprov])->result();
    }

    public function getDatakecamatan($idkab)
    {
        return $this->db->get_where('wilayah_kecamatan', ['kabupaten_id' => $idkab])->result();
    }

    public function getDataDesa($idkec)
    {
        return $this->db->get_where('wilayah_desa', ['kecamatan_id' => $idkec])->result();
    }




 }
