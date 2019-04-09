<?php

class MDL_Vendor extends CI_Model{

	function __construct(){
		parent::__construct();
	}

    
    public function get_vendor(){
		$hasil=$this->db->get('vendor');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
        }
    }


	// public function get_code_vendor()
	// {
	// 	$hasil=$this->db->query("SELECT MAX(RIGHT(kode_vendor,4)) AS kode_max FROM vendor");
	// 	$kode = "";
	// 	if($hasil->num_rows() > 0){
	// 		foreach($hasil->result() as $kd){
    //             $tmp = ((int)$kd->kode_max)+1;
    //             $kode = sprintf("%04s", $tmp);
    //         }
	// 	}else{
	// 		$kode = "0001";
	// 	}

	// 	$karakter = "VNDR";
	// 	return $karakter.$kode;
	// }


	public function insert_vendor($vendor_data)
	{
		$this->db->insert('vendor',$vendor_data);
	}


	public function find_vendor($kode_vendor)
	{
		$hasil = $this->db->where('kode_vendor',$kode_vendor)->limit(1)->get('vendor');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	
	public function update_vendor($kode_vendor, $vendor_data)
	{
		$this->db->where('kode_vendor',$kode_vendor)
		->update('vendor',$vendor_data);	
	}
	

	public function delete_vendor($kode_vendor)
	{
		$this->db->where('kode_vendor',$kode_vendor)
		->delete('vendor');
	}
	
}