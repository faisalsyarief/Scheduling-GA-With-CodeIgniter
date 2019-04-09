<?php

class MDL_Pengampu extends CI_Model{

	function __construct(){
		parent::__construct();
	}

    
    public function get_pengampu(){
		$hasil=$this->db->get('pengampu');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
        }
    }


    public function get_pengampu_distinct(){
		$this->db->select('tahun_proyek');
		$this->db->from('pengampu');
		$this->db->distinct('tahun_proyek');
		$query = $this->db->get();
		return $query->result();
    }


	// public function get_code_pengampu()
	// {
	// 	$hasil=$this->db->query("SELECT MAX(RIGHT(kode_pengampu,4)) AS kode_max FROM pengampu");
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


	public function insert_pengampu($pengampu_data)
	{
		$this->db->insert('pengampu',$pengampu_data);
	}


	public function find_pengampu($kode_pengampu)
	{
		$hasil = $this->db->where('kode_pengampu',$kode_pengampu)->limit(1)->get('pengampu');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	
	public function update_pengampu($kode_pengampu, $pengampu_data)
	{
		$this->db->where('kode_pengampu',$kode_pengampu)
		->update('pengampu',$pengampu_data);	
	}
	

	public function delete_pengampu($kode_pengampu)
	{
		$this->db->where('kode_pengampu',$kode_pengampu)
		->delete('pengampu');
	}
	
}