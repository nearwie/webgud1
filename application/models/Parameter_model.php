<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter_model extends CI_Model
{
	
  public function __construct()
    {
        $this->load->database();
    }


 

     public function getDataParam()
    {
        return $this->db->get('tbl_parameter')->result_array();
    }

    public function getDataBarang($idparam)
    {
        return $this->db->get_where('tbl_barangprm', ['parameter_id' => $idparam])->result();
    }

    public function getDataMerk($idbarang)
    {
        return $this->db->get_where('tbl_merk', ['brg_id' => $idbarang])->result();
    }

    public function getDataModel($idmodel)
    {
        return $this->db->get_where('tbl_model', ['merk_id' => $idmodel])->result();
    }
     public function getDataSeries($idseries)
    {
        return $this->db->get_where('tbl_noseries', ['model_id' => $idseries])->result();
    }




 }
