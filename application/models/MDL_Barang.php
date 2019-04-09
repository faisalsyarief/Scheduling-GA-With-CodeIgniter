<?php

class MDL_Barang extends CI_Model{

	function __construct(){
		parent::__construct();
	}

    
    public function get_barang(){
		$hasil=$this->db->get('barang');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
        }
    }


	// public function get_code_barang()
	// {
	// 	$hasil=$this->db->query("SELECT MAX(RIGHT(kode_barang,4)) AS kode_max FROM barang");
	// 	$kode = "";
	// 	if($hasil->num_rows() > 0){
	// 		foreach($hasil->result() as $kd){
    //             $tmp = ((int)$kd->kode_max)+1;
    //             $kode = sprintf("%04s", $tmp);
    //         }
	// 	}else{
	// 		$kode = "0001";
	// 	}

	// 	$karakter = "LPG";
	// 	return $karakter.$kode;
	// }


	public function insert_barang($barang_data)
	{
		$this->db->insert('barang',$barang_data);
	}


	public function find_barang($kode_barang)
	{
		$hasil = $this->db->where('kode_barang',$kode_barang)->limit(1)->get('barang');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	
	public function update_barang($kode_barang, $barang_data)
	{
		$this->db->where('kode_barang',$kode_barang)
		->update('barang',$barang_data);	
	}
	

	public function delete_barang($kode_barang)
	{
		$this->db->where('kode_barang',$kode_barang)
		->delete('barang');
	}


	public function detail_barang($kode_barang)
	{
		$hasil = $this->db->where('kode_barang',$kode_barang)->limit(1)->get('barang');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	
}