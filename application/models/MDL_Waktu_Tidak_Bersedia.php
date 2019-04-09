<?php

class MDL_Waktu_Tidak_Bersedia extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
    
    function get_by_vendor($kode_vendor){
      $rs = $this->db->query("SELECT kode_hari,kode_jam ".
                             "FROM waktu_tidak_bersedia ".
                             "WHERE kode_vendor = $kode_vendor");
      return $rs;
    }
    
    function update($kode,$data){
      /*
      string.Format(
                        "UPDATE waktu_tidak_bersedia " +
                        "SET kode_dosen = {0} " +
                        "WHERE kode_dosen = {1}",
                        txtKode.Text,
                        _selectedkode);
      */
      
        $this->db->where('kode',$kode);
        $this->db->update('waktu_tidak_bersedia',$data);
    }
    
    
    function delete_by_vendor($kode_vendor){
        $this->db->query("DELETE FROM waktu_tidak_bersedia ".
                         "WHERE kode_vendor = $kode_vendor");       
      
    }
    
    
}