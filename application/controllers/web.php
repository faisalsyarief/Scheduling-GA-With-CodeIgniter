<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller
{

	function __construct()
    {
        parent::__construct();
		$this->load->model(array('MDL_Vendor',
								 'MDL_Barang',
								 'MDL_Bulan_Tahun',
								 'MDL_Hari',
								 'MDL_Jam',
								 'MDL_Pengampu',
								 'MDL_Waktu_Tidak_Bersedia',
								 'MDL_Jadwal'));
		include_once("genetik.php");
		define('IS_TEST','FALSE');
    }

	function render_view($data)
	{
      $this->load->view('page',$data);
	}

	function index()
	{
		$data = array();	
		$data['page_name'] = 'home';
		$data['page_title'] = 'Welcome';
		
		$this->render_view($data);
	}
	
	
	
/************************************************************************************************************************************************/
	/* V E N D O R */
/************************************************************************************************************************************************/
	
	public function index_vendor(){
		$data['vendor'] = $this->MDL_Vendor->get_vendor();
        $this->load->view('web/vendor/index_vendor', $data);		
	}


	public function add_vendor()
	{
		$this->form_validation->set_rules('nama_vendor','Nama Vendor','required');
		$this->form_validation->set_rules('alamat_vendor','Alamat Vendor','required');
		$this->form_validation->set_rules('telepon_vendor','Nomor Telepon Vendor','required|numeric|is_unique[vendor.telepon_vendor]');
		
		if($this->form_validation->run() == FALSE){
            $this->load->view('web/vendor/form_add_vendor');
		}else{
			$vendor_data = array (
				// 'kode_vendor'		=> $this->MDL_Vendor->get_code_vendor(),
				'nama_vendor'		=> set_value('nama_vendor'),
				'alamat_vendor'		=> set_value('alamat_vendor'),
				'telepon_vendor'	=> set_value('telepon_vendor')
			);
			$this->MDL_Vendor->insert_vendor($vendor_data);
			$this->session->set_flashdata('notif','Data Berhasil Di Simpan');

			redirect('web/index_vendor');	
		}
	}


	public function edit_vendor($kode_vendor)
	{
		$this->form_validation->set_rules('nama_vendor','Nama Vendor','required');
		$this->form_validation->set_rules('alamat_vendor','Alamat Vendor','required');
		$this->form_validation->set_rules('telepon_vendor','Nomor Telepon Vendor','required|numeric|is_unique[vendor.telepon_vendor]');
		
		if($this->form_validation->run() == FALSE){
			$data['vendor'] = $this->MDL_Vendor->find_vendor($kode_vendor);
			$this->load->view('web/vendor/form_edit_vendor', $data);
		}else{
			$vendor_data = array (
				'nama_vendor'		=> set_value('nama_vendor'),
				'alamat_vendor'		=> set_value('alamat_vendor'),
				'telepon_vendor'	=> set_value('telepon_vendor')
			);
			$this->MDL_Vendor->update_vendor($kode_vendor, $vendor_data);
			redirect('web/index_vendor');
		}	
	}
	

	public function delete_vendor($kode_vendor)
	{
		$this->MDL_Vendor->delete_vendor($kode_vendor);
		redirect('web/index_vendor');	
	}


/************************************************************************************************************************************************/
	/* B A R A N G */
/************************************************************************************************************************************************/
	
	public function index_barang(){
		$data['barang'] = $this->MDL_Barang->get_barang();
        $this->load->view('web/barang/index_barang', $data);		
	}


	public function add_barang()
	{
		$this->form_validation->set_rules('nama_barang','Nama barang','required');
		$this->form_validation->set_rules('kategori_barang','Kategori Barang','required');
		$this->form_validation->set_rules('tingkat_kebutuhan','Tingkat Kebutuhan','required');
		$this->form_validation->set_rules('jumlah_dalam_kategori','Jumlah Dalam Kategori','required');
		
		if($this->form_validation->run() == FALSE){
            $this->load->view('web/barang/form_add_barang');
		}else{
			$barang_data = array (
				// 'kode_barang'			=> $this->MDL_Barang->get_code_barang(),
				'nama_barang'			=> set_value('nama_barang'),
				'kategori_barang'		=> set_value('kategori_barang'),
				'tingkat_kebutuhan'		=> set_value('tingkat_kebutuhan'),
				'jumlah_dalam_kategori'	=> set_value('jumlah_dalam_kategori')
			);
			$this->MDL_Barang->insert_barang($barang_data);
			$this->session->set_flashdata('notif','Data Berhasil Di Simpan');

			redirect('web/index_barang');	
		}
	}


	public function edit_barang($kode_barang)
	{
		$this->form_validation->set_rules('nama_barang','Nama barang','required');
		$this->form_validation->set_rules('kategori_barang','Kategori Barang','required');
		$this->form_validation->set_rules('tingkat_kebutuhan','Tingkat Kebutuhan','required');
		$this->form_validation->set_rules('jumlah_dalam_kategori','Jumlah Dalam Kategori','required');
		
		if($this->form_validation->run() == FALSE){
			$data['barang'] = $this->MDL_Barang->find_barang($kode_barang);
			$this->load->view('web/barang/form_edit_barang', $data);
		}else{
			$barang_data = array (
				'nama_barang'			=> set_value('nama_barang'),
				'kategori_barang'		=> set_value('kategori_barang'),
				'tingkat_kebutuhan'		=> set_value('tingkat_kebutuhan'),
				'jumlah_dalam_kategori'	=> set_value('jumlah_dalam_kategori')
			);
			$this->MDL_Barang->update_barang($kode_barang, $barang_data);
			redirect('web/index_barang');
		}	
	}

	
	public function delete_barang($kode_barang)
	{
		$this->MDL_Barang->delete_barang($kode_barang);
		redirect('web/index_barang');	
	}


	public function detail_barang($kode_barang)
	{
		$data['barang'] = $this->MDL_Barang->detail_barang($kode_barang);
        $this->load->view('web/barang/detail_barang', $data);
	}
	

/************************************************************************************************************************************************/
	/* B U L A N  D A N  T A H U N */
/************************************************************************************************************************************************/
	
	public function index_bulan_tahun(){
		$data['bulan_tahun'] = $this->MDL_Bulan_Tahun->get_bulan_tahun();
        $this->load->view('web/bulan_tahun/index_bulan_tahun', $data);		
	}


	public function add_bulan_tahun()
	{
		$this->form_validation->set_rules('nama_bulan_tahun','Nama Bulan Tahun','required');
		$this->form_validation->set_rules('kapasitas_bulan_tahun','Kapasitas Bulan Tahun','required|numeric');
		$this->form_validation->set_rules('kategori_barang','Kategori Barang','required');
		
		if($this->form_validation->run() == FALSE){
            $this->load->view('web/bulan_tahun/form_add_bulan_tahun');
		}else{
			$bulan_tahun_data = array (
				// 'kode_bulan_tahun'		=> $this->MDL_Bulan_Tahun->get_code_bulan_tahun(),
				'nama_bulan_tahun'		=> set_value('nama_bulan_tahun'),
				'kapasitas_bulan_tahun'	=> set_value('kapasitas_bulan_tahun'),
				'kategori_barang'		=> set_value('kategori_barang')
			);
			$this->MDL_Bulan_Tahun->insert_bulan_tahun($bulan_tahun_data);
			$this->session->set_flashdata('notif','Data Berhasil Di Simpan');

			redirect('web/index_bulan_tahun');	
		}
	}


	public function edit_bulan_tahun($kode_bulan_tahun)
	{
		$this->form_validation->set_rules('nama_bulan_tahun','Nama Bulan Tahun','required');
		$this->form_validation->set_rules('kapasitas_bulan_tahun','Kapasitas Bulan Tahun','required');
		$this->form_validation->set_rules('kategori_barang','Kategori Barang','required');
		
		if($this->form_validation->run() == FALSE){
			$data['bulan_tahun'] = $this->MDL_Bulan_Tahun->find_bulan_tahun($kode_bulan_tahun);
			$this->load->view('web/bulan_tahun/form_edit_bulan_tahun', $data);
		}else{
			$bulan_tahun_data = array (
				'nama_bulan_tahun'		=> set_value('nama_bulan_tahun'),
				'kapasitas_bulan_tahun'	=> set_value('kapasitas_bulan_tahun'),
				'kategori_barang'		=> set_value('kategori_barang')
			);
			$this->MDL_Bulan_Tahun->update_bulan_tahun($kode_bulan_tahun, $bulan_tahun_data);
			redirect('web/index_bulan_tahun');
		}	
	}
	

	public function delete_bulan_tahun($kode_bulan_tahun)
	{
		$this->MDL_Bulan_Tahun->delete_bulan_tahun($kode_bulan_tahun);
		redirect('web/index_bulan_tahun');	
	}
	

/************************************************************************************************************************************************/
	/* H A R I */
/************************************************************************************************************************************************/
		
	public function index_hari(){
		$data['hari'] = $this->MDL_Hari->get_hari();
		$this->load->view('web/hari/index_hari', $data);		
	}


	public function add_hari()
	{
		$this->form_validation->set_rules('nama_hari','Nama Hari','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('web/hari/form_add_hari');
		}else{
			$hari_data = array (
				// 'kode_hari'		=> $this->MDL_Hari->get_code_hari(),
				'nama_hari'		=> set_value('nama_hari')
			);
			$this->MDL_Hari->insert_hari($hari_data);
			$this->session->set_flashdata('notif','Data Berhasil Di Simpan');

			redirect('web/index_hari');	
		}
	}


	public function edit_hari($kode_hari)
	{
		$this->form_validation->set_rules('nama_hari','Nama Hari','required');
		
		if($this->form_validation->run() == FALSE){
			$data['hari'] = $this->MDL_Hari->find_hari($kode_hari);
			$this->load->view('web/hari/form_edit_hari', $data);
		}else{
			$hari_data = array (
				'nama_hari'		=> set_value('nama_hari')
			);
			$this->MDL_Hari->update_hari($kode_hari, $hari_data);
			redirect('web/index_hari');
		}	
	}


	public function delete_hari($kode_hari)
	{
		$this->MDL_Hari->delete_hari($kode_hari);
		redirect('web/index_hari');	
	}
	

/************************************************************************************************************************************************/
	/* J A M */
/************************************************************************************************************************************************/
		
	public function index_jam(){
		$data['jam'] = $this->MDL_Jam->get_jam();
		$this->load->view('web/jam/index_jam', $data);		
	}


	public function add_jam()
	{
		$this->form_validation->set_rules('range_jam','Range jam','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('web/jam/form_add_jam');
		}else{
			$jam_data = array (
				// 'kode_jam'		=> $this->MDL_Jam->get_code_jam(),
				'range_jam'		=> set_value('range_jam')
			);
			$this->MDL_Jam->insert_jam($jam_data);
			$this->session->set_flashdata('notif','Data Berhasil Di Simpan');

			redirect('web/index_jam');	
		}
	}


	public function edit_jam($kode_jam)
	{
		$this->form_validation->set_rules('range_jam','Range jam','required');
		
		if($this->form_validation->run() == FALSE){
			$data['jam'] = $this->MDL_Jam->find_jam($kode_jam);
			$this->load->view('web/jam/form_edit_jam', $data);
		}else{
			$jam_data = array (
				'range_jam'		=> set_value('range_jam')
			);
			$this->MDL_Jam->update_jam($kode_jam, $jam_data);
			redirect('web/index_jam');
		}	
	}


	public function delete_jam($kode_jam)
	{
		$this->MDL_Jam->delete_jam($kode_jam);
		redirect('web/index_jam');	
	}
	

/************************************************************************************************************************************************/
	/* P E N G A M P U */
/************************************************************************************************************************************************/
		
	public function index_pengampu(){
		$data['pengampu'] = $this->MDL_Pengampu->get_pengampu();
		$this->load->view('web/pengampu/index_pengampu', $data);		
	}


	public function add_pengampu()
	{
		$this->form_validation->set_rules('kode_barang','Nama Barang','required');
		$this->form_validation->set_rules('kode_vendor','Nama Vendor','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required|numeric');
		$this->form_validation->set_rules('tahun_proyek','Tahun Proyek','required');
		
		if($this->form_validation->run() == FALSE){
			$data['barang'] = $this->MDL_Barang->get_barang();
			$data['vendor'] = $this->MDL_Vendor->get_vendor();
			$this->load->view('web/pengampu/form_add_pengampu', $data);
		}else{
			$pengampu_data = array (
				// 'kode_pengampu'		=> $this->MDL_pengampu->get_code_pengampu(),
				'kode_barang'		=> set_value('kode_barang'),
				'kode_vendor'		=> set_value('kode_vendor'),
				'tanggal'			=> set_value('tanggal'),
				'tahun_proyek'		=> set_value('tahun_proyek')
			);
			$this->MDL_Pengampu->insert_pengampu($pengampu_data);
			$this->session->set_flashdata('notif','Data Berhasil Di Simpan');

			redirect('web/index_pengampu');	
		}
	}


	public function edit_pengampu($kode_pengampu)
	{
		$this->form_validation->set_rules('kode_barang','Nama Barang','required');
		$this->form_validation->set_rules('kode_vendor','Nama Vendor','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required|numeric');
		$this->form_validation->set_rules('tahun_proyek','Tahun Proyek','required|year');
		
		if($this->form_validation->run() == FALSE){
			$data['pengampu'] = $this->MDL_Pengampu->find_pengampu($kode_pengampu);
			$this->load->view('web/pengampu/form_edit_pengampu', $data);
		}else{
			$pengampu_data = array (
				'kode_barang'		=> set_value('kode_barang'),
				'kode_vendor'		=> set_value('kode_vendor'),
				'tanggal'			=> set_value('tanggal'),
				'tahun_proyek'		=> set_value('tahun_proyek')
			);
			$this->MDL_pengampu->update_pengampu($kode_pengampu, $pengampu_data);
			redirect('web/index_pengampu');
		}	
	}


	public function delete_pengampu($kode_pengampu)
	{
		$this->MDL_pengampu->delete_pengampu($kode_pengampu);
		redirect('web/index_pengampu');	
	}
	
	
/************************************************************************************************************************************************/
	/* W A K T U  T I D A K  T E R S E D I A */
/************************************************************************************************************************************************/
		
	function waktu_tidak_bersedia($kode_vendor = NULL){
		
		$data = array();
		if($kode_vendor == NULL){
			$kode_vendor = $this->db->query("SELECT kode_vendor FROM vendor ORDER BY nama_vendor LIMIT 1")->row()->kode_vendor;
		}
		
		if (array_key_exists('arr_tidak_bersedia', $_POST) && !empty($_POST['arr_tidak_bersedia'])){
			
			
			if(IS_TEST === 'FALSE'){
				$this->db->query("DELETE FROM waktu_tidak_bersedia WHERE kode_vendor = $kode_vendor");
				
				foreach($_POST['arr_tidak_bersedia'] as $tidak_bersedia) {				
					
					$waktu_tidak_bersedia = explode('-',$tidak_bersedia);				
					$this->db->query("INSERT INTO waktu_tidak_bersedia(kode_vendor,kode_hari,kode_jam) VALUES($waktu_tidak_bersedia[0],$waktu_tidak_bersedia[1],$waktu_tidak_bersedia[2])");
				}						
				
				// $data['msg'] = 'Data telah berhasil diupdate';
				echo "<script>alert('Data telah berhasil diupdate');history.go(-1);</script>";			
			}else{
				// $data['msg'] = 'WARNING: READ ONLY !';
				echo "<script>alert('WARNING: READ ONLY !');history.go(-1);</script>";
			}
		}elseif(!empty($_POST['hide_me']) && empty($_POST['arr_tidak_bersedia'])){
			$this->db->query("DELETE FROM waktu_tidak_bersedia WHERE kode_vendor = $kode_vendor");
			// $data['msg'] = 'Data telah berhasil diupdate';		
			echo "<script>alert('Data telah berhasil diupdate');history.go(-1);</script>";			
		}
		
		
		
		$data['rs_vendor'] = $this->MDL_Vendor->get_vendor();
		$data['rs_waktu_tidak_bersedia'] = $this->MDL_Waktu_Tidak_Bersedia->get_by_vendor($kode_vendor);
		$data['rs_hari']  =$this->MDL_Hari->get_hari();
		$data['rs_jam'] = $this->MDL_Jam->get_jam();
		$data['rs_bt'] = $this->MDL_Bulan_Tahun->get_bulan_tahun_distinct();
		
		// $data['page_title'] = 'Waktu Tidak Bersedia';
		// $data['page_name'] = 'waktu_tidak_bersedia';
		$data['kode_vendor'] = $kode_vendor;
		// $this->render_view($data);

		$this->load->view('web/waktu_tidak_tersedia/index_waktu_tidak_tersedia', $data);
	}
	

/************************************************************************************************************************************************/
	/* J A D W A L */
/************************************************************************************************************************************************/
		
	public function index_jadwal(){
		
		$data = array();
		
		if(!empty($_POST)){
			$this->form_validation->set_rules('jumlah_dalam_kategori','Jumlah Dalam Kategori','required');
			$this->form_validation->set_rules('tahun_proyek','Tahun Proyek','required');
			$this->form_validation->set_rules('jumlah_populasi','Jumlah Populiasi','required');
			$this->form_validation->set_rules('probabilitas_crossover','Probabilitas CrossOver','required');
			$this->form_validation->set_rules('probabilitas_mutasi','Probabilitas Mutasi','required');
			$this->form_validation->set_rules('jumlah_generasi','Jumlah Generasi','required');
			
			if($this->form_validation->run() == TRUE)
			{				
				$jumlah_dalam_kategori = $this->input->post('jumlah_dalam_kategori');
				$tahun_proyek = $this->input->post('tahun_proyek');
				$jumlah_populasi = $this->input->post('jumlah_populasi');
				$crossOver = $this->input->post('probabilitas_crossover');
				$mutasi = $this->input->post('probabilitas_mutasi');
				$jumlah_generasi = $this->input->post('jumlah_generasi');
				
				$data['jumlah_dalam_kategori'] = $jumlah_dalam_kategori;
				$data['tahun_proyek'] = $tahun_proyek;
				$data['jumlah_populasi'] = $jumlah_populasi;
				$data['probabilitas_crossover'] = $crossOver;
				$data['probabilitas_mutasi'] = $mutasi;
				$data['jumlah_generasi'] = $jumlah_generasi;
				
			    $rs_data = $this->db->query("SELECT a.kode_pengampu, b.tingkat_kebutuhan, a.kode_vendor, b.kategori_barang
											FROM pengampu a
												LEFT JOIN barang b ON a.kode_barang = b.kode_barang
											WHERE 
												b.jumlah_dalam_kategori%2 = '$jumlah_dalam_kategori'
											AND a.tahun_proyek = '$tahun_proyek'");
											// var_dump($rs_data);exit;
				
				if($rs_data->num_rows() == 0){
					echo "<script>alert('Tidak Ada Data dengan Proyek Tahun ini!');history.go(-1);</script>";
					
					// $data['msg'] = 'Tidak Ada Data dengan Proyek Tahun ini <br>Data yang tampil dibawah adalah data dari proses sebelumnya';
					// var_dump($data['msg']);exit;

				}else{
					// echo"aaaaaaaaaaaaaaaaaaaa <br>";
					$genetik = new genetik ($jumlah_dalam_kategori,$tahun_proyek,$jumlah_populasi,$crossOver,$mutasi,5,'4-5-6',6);
					// var_dump($genetik);exit;

					
					// $genetik = new genetik($jumlah_dalam_kategori,
					// 					   $tahun_proyek,
					// 					   $jumlah_populasi,
					// 					   $crossOver,
					// 					   $mutasi,
					// 					   5,										   
					// 					   '4-5-6',
					// 					   6);
					// var_dump($genetik);exit;

					$genetik->AmbilData();
					$genetik->Inisialisai();

					
					$found = false;
					for($i = 0;$i < $jumlah_generasi;$i++ ){
						$fitness = $genetik->HitungFitness();
						
						$genetik->Seleksi($fitness);
						$genetik->StartCrossOver();
						
						$fitnessAfterMutation = $genetik->Mutasi();
						
						for ($j = 0; $j < count($fitnessAfterMutation); $j++){
							//test here
							if($fitnessAfterMutation[$j] == 1){
								
								$this->db->query("TRUNCATE TABLE jadwal");
								$jadwal = array(array());
								$jadwal = $genetik->GetIndividu($j);
								
								for($k = 0; $k < count($jadwal);$k++){
									
									$kode_pengampu = intval($jadwal[$k][0]);
									$kode_jam = intval($jadwal[$k][1]);
									$kode_hari = intval($jadwal[$k][2]);
									$kode_bulan_tahun = intval($jadwal[$k][3]);
									$this->db->query("INSERT INTO jadwal(kode_pengampu,kode_jam,kode_hari,kode_bulan_tahun) ".
													 "VALUES($kode_pengampu,$kode_jam,$kode_hari,$kode_bulan_tahun)");
								}
								
								$found = true;								
							}
							
							if($found){break;}
						}
						
						if($found){break;}
					}
					
					if(!$found){

						echo "<script>alert('Tidak Ditemukan Solusi Optimal');history.go(-1);</script>";
						// $data['msg'] = 'Tidak Ditemukan Solusi Optimal';
					}
					
				}
			}else{
				$data['msg'] = validation_errors();
			}
		}	
		
		// $data['page_name'] = 'penjadwalan';
		// $data['page_title'] = 'Penjadwalan';
		// $data['rs_jadwal'] = $this->MDL_Jadwal->get();
		// $this->render_view($data);

		$data['pengampu'] = $this->MDL_Pengampu->get_pengampu_distinct();
		$data['jadwal'] = $this->MDL_Jadwal->get();
		$this->load->view('web/jadwal/index_jadwal', $data);
	}
	
	
/************************************************************************************************************************************************/
	/* R E P O R T  E X C E L  */
/************************************************************************************************************************************************/
		
	function excel_report(){
		$query = $this->MDL_Jadwal->get();
		if(!$query)
            return false;
		
		// Starting the PHPExcel library
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
		
		$objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
 
        $objPHPExcel->setActiveSheetIndex(0);
		 // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
		
		// Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
		
		$objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Products_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
	}
}