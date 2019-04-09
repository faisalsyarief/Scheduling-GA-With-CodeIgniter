<?php

class MDL_Hari extends CI_Model{

	function __construct(){
		parent::__construct();
	}

    
    public function get_hari(){
		$hasil=$this->db->get('hari');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
        }
    }


	// public function get_code_hari()
	// {
	// 	$hasil=$this->db->query("SELECT MAX(RIGHT(kode_hari,4)) AS kode_max FROM hari");
	// 	$kode = "";
	// 	if($hasil->num_rows() > 0){
	// 		foreach($hasil->result() as $kd){
    //             $tmp = ((int)$kd->kode_max)+1;
    //             $kode = sprintf("%04s", $tmp);
    //         }
	// 	}else{
	// 		$kode = "0001";
	// 	}

	// 	$karakter = "HR";
	// 	return $karakter.$kode;
	// }


	public function insert_hari($hari_data)
	{
		$this->db->insert('hari',$hari_data);
	}


	public function find_hari($kode_hari)
	{
		$hasil = $this->db->where('kode_hari',$kode_hari)->limit(1)->get('hari');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	
	public function update_hari($kode_hari, $hari_data)
	{
		$this->db->where('kode_hari',$kode_hari)
		->update('hari',$hari_data);	
	}
	

	public function delete_hari($kode_hari)
	{
		$this->db->where('kode_hari',$kode_hari)
		->delete('hari');
	}
	
}