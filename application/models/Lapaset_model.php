<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapaset_model extends CI_Model
{
	

  public function __construct()
    {
        $this->load->database();
    }


public function getAsetMasuk($limit = null, $kode_brg = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bm.user_id = u.id');
      
        $this->db->join('tbl_brg b', 'bm.aset_id = b.kode_brg');
       
        $this->db->join('tbl_type j', 'b.type_id = j.id_type');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($kode_brg != null) {
            $this->db->where('kode_brg', $kode_brg);
        }

        if ($range != null) {
            $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
            $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_aset_masuk', 'DESC');
        return $this->db->get('aset_masuk bm')->result_array();
    }

public function getAsetKeluar($limit = null, $kode_brg = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bk.user_id = u.id');
        $this->db->join('tbl_brg b', 'bk.aset_id = b.kode_brg');
       
        $this->db->join('tbl_type j', 'b.type_id = j.id_type');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($kode_brg != null) {
            $this->db->where('kode_brg', $kode_brg);
        }
        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_aset_keluar', 'DESC');
        return $this->db->get('aset_keluar bk')->result_array();
    }



    public function getAset()
    {
        $this->db->join('tbl_type j', 'b.type_id = j.id_type');
        $this->db->order_by('kode_brg');
        return $this->db->get('tbl_brg b')->result_array();
    }

    



}

