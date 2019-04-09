<?php

class MDL_Jam extends CI_Model{

	function __construct(){
		parent::__construct();
	}

    
    public function get_jam(){
		$hasil=$this->db->get('jam');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
        }
    }


	// public function get_code_jam()
	// {
	// 	$hasil=$this->db->query("SELECT MAX(RIGHT(kode_jam,4)) AS kode_max FROM jam");
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


	public function insert_jam($jam_data)
	{
		$this->db->insert('jam',$jam_data);
	}


	public function find_jam($kode_jam)
	{
		$hasil = $this->db->where('kode_jam',$kode_jam)->limit(1)->get('jam');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	
	public function update_jam($kode_jam, $jam_data)
	{
		$this->db->where('kode_jam',$kode_jam)
		->update('jam',$jam_data);	
	}
	

	public function delete_jam($kode_jam)
	{
		$this->db->where('kode_jam',$kode_jam)
		->delete('jam');
	}
	
}