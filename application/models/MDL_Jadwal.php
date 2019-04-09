<?php

class MDL_Jadwal extends CI_Model{

	function __construct(){
		parent::__construct();
	}


    function get(){
		// $rs = $this->db->query(	"SELECT e.nama_hari as hari,".
		// 						"          Concat_WS('-',  concat('(', g.kode_jam), concat( (SELECT kode_jam".  
		// 						"                                  FROM jam ". 
		// 						"                                  WHERE kode_jam = (SELECT jm.kode_jam ".
		// 						"                                                FROM jam jm  ".
		// 						"                                                WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.tingkat_kebutuhan - 1)),')')) as sesi, ". 
		// 						" 		  Concat_WS('-', MID(g.range_jam,1,5),".
		// 						"                (SELECT MID(range_jam,7,5) ".
		// 						"                 FROM jam ".
		// 						"                 WHERE kode_jam = (SELECT jm.kode_jam   ".
		// 						"                               FROM jam jm ".
		// 						"                               WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.tingkat_kebutuhan - 1))) as jam_kebutuhan, ".
			   
		// 						"        c.nama_barang as nama_barang,".
		// 						"        c.tingkat_kebutuhan as tingkat_kebutuhan,".
		// 						"        c.jumlah_dalam_kategori as jumlah_dalam_kategori,".
		// 						"        b.tanggal as tanggal,".
		// 						"        d.nama_vendor as nama_vendor,".
		// 						"        f.nama_bulan_tahun as nama_bulan_tahun ".
		// 						"FROM jadwal a ".
		// 						"LEFT JOIN pengampu b ".
		// 						"ON a.kode_pengampu = b.kode_pengampu ".
		// 						"LEFT JOIN barang c ".
		// 						"ON b.kode_barang = c.kode_barang ".
		// 						"LEFT JOIN vendor d ".
		// 						"ON b.kode_vendor = d.kode_vendor ".
		// 						"LEFT JOIN hari e ".
		// 						"ON a.kode_hari = e.kode_hari ".
		// 						"LEFT JOIN bulan_tahun f ".
		// 						"ON a.kode_bulan_tahun = f.kode_bulan_tahun ".
		// 						"LEFT JOIN jam g ".
		// 						"ON a.kode_jam = g.kode_jam ".
		// 						"order by e.kode_hari asc,g.kode_jam asc;");
		// return $rs;

		$rs = $this->db->query(	"SELECT e.nama_hari as hari, 
									Concat_WS('-', concat('(', g.kode_jam), concat( 
								(SELECT kode_jam
									FROM jam
								WHERE kode_jam = 
								(SELECT jm.kode_jam 
									FROM jam jm
								WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.tingkat_kebutuhan - 1)),')')) as sesi,
									Concat_WS('-', MID(g.range_jam,1,5),
								(SELECT MID(range_jam,7,5)
									FROM jam
								WHERE kode_jam = 
								(SELECT jm.kode_jam
									FROM jam jm
								WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.tingkat_kebutuhan - 1))) as jam_kebutuhan,
									c.nama_barang as nama_barang,
									c.tingkat_kebutuhan as tingkat_kebutuhan,
									c.jumlah_dalam_kategori as jumlah_dalam_kategori,
									b.tanggal as tanggal,
									d.nama_vendor as nama_vendor,
									f.nama_bulan_tahun as nama_bulan_tahun
								FROM jadwal a
									LEFT JOIN pengampu b ON a.kode_pengampu = b.kode_pengampu
									LEFT JOIN barang c ON b.kode_barang = c.kode_barang
									LEFT JOIN vendor d ON b.kode_vendor = d.kode_vendor
									LEFT JOIN hari e ON a.kode_hari = e.kode_hari
									LEFT JOIN bulan_tahun f ON a.kode_bulan_tahun = f.kode_bulan_tahun
									LEFT JOIN jam g ON a.kode_jam = g.kode_jam
								Order by e.kode_hari asc,g.kode_jam asc;");
		return $rs;
	}
	
}