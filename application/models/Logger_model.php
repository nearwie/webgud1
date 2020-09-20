<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logger_model extends CI_Model
{
	

  public function __construct()
    {
        $this->load->database();
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }


    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    public function chartBarangMasuk($bulan)
    {
        $like = 'T-BM-' . date('y') . $bulan;
        $this->db->like('id_barang_masuk', $like, 'after');
        return count($this->db->get('brgmsk_log')->result_array());
    }

    public function chartBarangKeluar($bulan)
    {
        $like = 'T-BK-' . date('y') . $bulan;
        $this->db->like('id_barang_keluar', $like, 'after');
        return count($this->db->get('brgklr_log')->result_array());
    }


     public function get_barcode_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('master_logger');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('master_logger', array('kode_brg' => $id));
        return $query->row_array();
    }


    

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        $inserted = $this->db->get_where($this->table, array('kode_brg' => $id))->row();
        return $inserted;
    }

    public function get_brg_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('master_logger');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('master_logger', array('kode_brg' => $id));
        return $query->row_array();
    }

    public function delete_brg($id)
    {
        $this->db->where('kode_brg', $id);
        return $this->db->delete('master_logger');
    }


        public function update($table, $pk, $id, $data)
            {
                $this->db->where($pk, $id);
                return $this->db->update($table, $data);
            }




    public function add_t($post)
    {      
        $params = [
                        'kode_brg' => $post['kode_brg'],
                        'nama_brg' => $post['nama_brg'],
                        'no_seri' => $post['no_seri'],
                        'jenis_id' => $post['jenis_id'],
                        'stok' => $post['stok'],
                        'satuan_id' => $post['satuan_id'],
                        
                    ];

            $this->db->insert('barang', $params);
    }


    public function add_stok_n($post)
    {      
        $params = [
                        'id_barang_masuk' => $post['id_barang_masuk'],
                       'user_id' => $$this->session->userdata('user_id'),
                        'barang_id' => $post['barang_id'],
                       'jenis_id' => $post['jenis_id'],
                        'jumlah_masuk' => $post['jumlah_masuk'],
                        'tanggal_masuk' => $post['tanggal_masuk'],
                        
                    ];

            $this->db->insert('barang_masuk', $params);
    }

    public function update_stok_in($data)
    {      
        $qty = $data['jumlah_masuk'];
        $id = $data['barang_id'];
        $ql = "UPDATE barang SET stok = stok + '$qty' WHERE kode_brg = '$id' ";
    }



    public function get_brgmsk_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('brgmsk_log');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('brgmsk_log', array('id_barang_masuk' => $id));
        return $query->row_array();
    }


    public function delete_brgmsk($id)
    {
        $this->db->where('id_barang_masuk', $id);
        return $this->db->delete('brgmsk_log');
    }


    public function get_brgklr_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('brgklr_log');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('brgklr_log', array('id_barang_keluar' => $id));
        return $query->row_array();
    }


    public function delete_brgklr($id)
    {
        $this->db->where('id_barang_keluar', $id);
        return $this->db->delete('brgklr_log');
    }



    public function getBarang()
    {
       
        $this->db->order_by('kode_brg');
        return $this->db->get('master_logger ')->result_array();
    }
   
    
     public function getUserRecords()
     {
         
         
         $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by('kode_brg', 'asc');
        $query = $this->db->get();
        return $query->result_array();
     }


      
    
    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }



    public function getBarangMasuk($limit = null, $kode_brg = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bm.user_id = u.id');
        $this->db->join('master_logger b', 'bm.barang_id = b.kode_brg');
              
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

        $this->db->order_by('id_barang_masuk', 'DESC');
        return $this->db->get('brgmsk_log bm')->result_array();
    }

    public function getBarangKeluar($limit = null, $kode_brg = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bk.user_id = u.id');
        $this->db->join('master_logger b', 'bk.barang_id = b.kode_brg');
       
        
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
        $this->db->order_by('id_barang_keluar', 'DESC');
        return $this->db->get('brgklr_log bk')->result_array();
    }

    


     public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }


public function cekStok($id)
    {
       
        $query = $this->db->get_where('master_regulator', array('kode_brg' => $id));
        return $query->row_array();
    }


   


}

