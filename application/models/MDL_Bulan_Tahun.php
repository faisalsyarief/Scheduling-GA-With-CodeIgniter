<?php

class MDL_Bulan_Tahun extends CI_Model{

	function __construct(){
		parent::__construct();
	}

    
    public function get_bulan_tahun(){
		$hasil=$this->db->get('bulan_tahun');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
        }
    }


    public function get_bulan_tahun_distinct(){
		$this->db->select('nama_bulan_tahun');
		$this->db->from('bulan_tahun');
		$this->db->distinct('nama_bulan_tahun');
		$query = $this->db->get();
		return $query->result();
    }


	// public function get_code_bulan_tahun()
	// {
	// 	$hasil=$this->db->query("SELECT MAX(RIGHT(kode_bulan_tahun,4)) AS kode_max FROM bulan_tahun");
	// 	$kode = "";
	// 	if($hasil->num_rows() > 0){
	// 		foreach($hasil->result() as $kd){
    //             $tmp = ((int)$kd->kode_max)+1;
    //             $kode = sprintf("%04s", $tmp);
    //         }
	// 	}else{
	// 		$kode = "0001";
	// 	}

	// 	$karakter = "BT";
	// 	return $karakter.$kode;
	// }


	public function insert_bulan_tahun($bulan_tahun_data)
	{
		$this->db->insert('bulan_tahun',$bulan_tahun_data);
	}


	public function find_bulan_tahun($kode_bulan_tahun)
	{
		$hasil = $this->db->where('kode_bulan_tahun',$kode_bulan_tahun)->limit(1)->get('bulan_tahun');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	
	public function update_bulan_tahun($kode_bulan_tahun, $bulan_tahun_data)
	{
		$this->db->where('kode_bulan_tahun',$kode_bulan_tahun)
		->update('bulan_tahun',$bulan_tahun_data);	
	}
	

	public function delete_bulan_tahun($kode_bulan_tahun)
	{
		$this->db->where('kode_bulan_tahun',$kode_bulan_tahun)
		->delete('bulan_tahun');
	}
	
}