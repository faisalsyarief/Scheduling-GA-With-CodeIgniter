<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class genetik extends CI_Controller
{
     
    private $Mechanical = 'Mechanical';
    private $Piping = 'Piping';
    private $Instrument = 'Instrument';
    private $Electrical = 'Electrical';
    private $Safety = 'Safety';
    
    private $jumlah_dalam_kategori;
    private $tahun_proyek;
    private $populasi;
    private $crossOver;
    private $mutasi;
    
    private $pengampu = array();
    private $individu = array(array(array()));
    private $tingkat_kebutuhan = array();
    private $vendor = array();
    
    private $jam = array();
    private $hari = array();
    private $ivendor = array();
    
    //waktu keinginan vendor
    private $waktu_vendor = array(array());
    private $jenis_mk = array(); //reguler or praktikum
    
    private $rMechanical = array();
    private $rPiping = array();
    private $rInstrument = array();
    private $rElectrical = array();
    private $rSafety = array();

    private $logAmbilData;
    private $logInisialisasi;
    
    private $log;
    private $induk = array();
    
    //jumat
    private $kode_jumat;
    private $range_jumat = array();
    private $kode_dhuhur;
    private $is_waktu_vendor_tidak_bersedia_empty;
    
    function __construct($jumlah_dalam_kategori, $tahun_proyek, $populasi, $crossOver, $mutasi, $kode_jumat, $range_jumat, $kode_dhuhur)
    {        
        parent::__construct();        
        
        $this->jumlah_dalam_kategori = $jumlah_dalam_kategori;
        $this->tahun_proyek = $tahun_proyek;
        $this->populasi       = intval($populasi);
        $this->crossOver      = $crossOver;
        $this->mutasi         = $mutasi;
        $this->kode_jumat     = intval($kode_jumat);
        $this->range_jumat    = explode('-',$range_jumat);//$hari_jam = explode(':', $this->waktu_vendor[$j][1]);
        $this->kode_dhuhur    = intval($kode_dhuhur);
       
    }
    
    public function AmbilData()
    {
        
        $rs_data = $this->db->query("SELECT   a.kode_pengampu,"
                                    . "       b.tingkat_kebutuhan,"
                                    . "       a.kode_vendor,"
                                    . "       b.kategori_barang "
                                    . "FROM pengampu a "
                                    . "LEFT JOIN barang b "
                                    . "ON a.kode_barang = b.kode_barang "
                                    . "WHERE b.jumlah_dalam_kategori%2 = $this->jumlah_dalam_kategori "
                                    . "      AND a.tahun_proyek = '$this->tahun_proyek'");
        
        $i = 0;
        foreach ($rs_data->result() as $data) {
            $this->pengampu[$i] = intval($data->kode_pengampu);
            $this->tingkat_kebutuhan[$i]         = intval($data->tingkat_kebutuhan);
            $this->vendor[$i]       = intval($data->kode_vendor);
            $this->jenis_mk[$i]    = $data->kategori_barang;
            $i++;
        }
        
        //var_dump($this->jenis_mk);
        //exit();
        
        //Fill Array of Jam Variables
        $rs_jam = $this->db->query("SELECT kode_jam FROM jam");
        $i      = 0;
        foreach ($rs_jam->result() as $data) {
            $this->jam[$i] = intval($data->kode_jam);
            $i++;
        }
        
        //Fill Array of Hari Variables
        $rs_hari = $this->db->query("SELECT kode_hari FROM hari");
        $i       = 0;
        foreach ($rs_hari->result() as $data) {
            $this->hari[$i] = intval($data->kode_hari);
            $i++;
        }
        
        
        $rs_Mechanical = $this->db->query("SELECT kode_bulan_tahun "
                                            ."FROM bulan_tahun "
                                            ."WHERE kategori_barang = 'Mechanical'");
        $i               = 0;
        foreach ($rs_Mechanical->result() as $data) {
            $this->rMechanical[$i] = intval($data->kode_bulan_tahun);
            $i++;
        }
        
        
        $rs_Piping = $this->db->query("SELECT kode_bulan_tahun "
                                                 ."FROM bulan_tahun "
                                                 ."WHERE kategori_barang = 'Piping'");
        $i                    = 0;
        foreach ($rs_Piping->result() as $data) {
            $this->rPiping[$i] = intval($data->kode_bulan_tahun);
            $i++;
        }


        $rs_Instrument = $this->db->query("SELECT kode_bulan_tahun "
                                            ."FROM bulan_tahun "
                                            ."WHERE kategori_barang = 'Instrument'");
        $i               = 0;
        foreach ($rs_Instrument->result() as $data) {
            $this->rInstrument[$i] = intval($data->kode_bulan_tahun);
            $i++;
        }
        
        
        $rs_Electrical = $this->db->query("SELECT kode_bulan_tahun "
                                                 ."FROM bulan_tahun "
                                                 ."WHERE kategori_barang = 'Electrical'");
        $i                    = 0;
        foreach ($rs_Electrical->result() as $data) {
            $this->rElectrical[$i] = intval($data->kode_bulan_tahun);
            $i++;
        }
        
        
        $rs_Safety = $this->db->query("SELECT kode_bulan_tahun "
                                                 ."FROM bulan_tahun "
                                                 ."WHERE kategori_barang = 'Safety'");
        $i                    = 0;
        foreach ($rs_Safety->result() as $data) {
            $this->rSafety[$i] = intval($data->kode_bulan_tahun);
            $i++;
        }
        
        // var_dump($this->rs_Piping);
        //exit(0);
        
        $rs_Waktuvendor = $this->db->query("SELECT kode_vendor,".
                                          "CONCAT_WS(':',kode_hari,kode_jam) as kode_hari_jam ".
                                          "FROM waktu_tidak_bersedia");        
        $i             = 0;
        foreach ($rs_Waktuvendor->result() as $data) {
            $this->ivendor[$i]         = intval($data->kode_vendor);
            $this->waktu_vendor[$i][0] = intval($data->kode_vendor);
            $this->waktu_vendor[$i][1] = $data->kode_hari_jam;
            $i++;
        }  
     
        
    }
    
    
    public function Inisialisai()
    {
        
        $jumlah_pengampu = count($this->pengampu);        
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);
        $jumlah_rMechanical = count($this->rMechanical);
        $jumlah_rPiping = count($this->rPiping);
        $jumlah_rInstrument = count($this->rInstrument);
        $jumlah_rElectrical = count($this->rElectrical);
        $jumlah_rSafety = count($this->rSafety);
        // var_dump($jumlah_rSafety);exit;
        
        for ($i = 0; $i < $this->populasi; $i++) {
            
            for ($j = 0; $j < $jumlah_pengampu; $j++) {
                
                $tingkat_kebutuhan = $this->tingkat_kebutuhan[$j];
                
                $this->individu[$i][$j][0] = $j;
                
                // Penentuan jam secara acak ketika 1 tingkat_kebutuhan 
                if ($tingkat_kebutuhan == 1) {
                    $this->individu[$i][$j][1] = mt_rand(0,  $jumlah_jam - 1);
                }
                
                // Penentuan jam secara acak ketika 2 tingkat_kebutuhan 
                if ($tingkat_kebutuhan == 2) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                }
                
                // Penentuan jam secara acak ketika 3 tingkat_kebutuhan
                if ($tingkat_kebutuhan == 3) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                }
                
                // Penentuan jam secara acak ketika 4 tingkat_kebutuhan
                if ($tingkat_kebutuhan == 4) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                }
                
                $this->individu[$i][$j][2] = mt_rand(0, $jumlah_hari - 1); // Penentuan hari secara acak 
                
                if ($this->jenis_mk[$j] === 'Mechanical') {
                    $this->individu[$i][$j][3] = intval($this->rMechanical[mt_rand(0, $jumlah_rMechanical - 1)]);
                } elseif ($this->jenis_mk[$j] === 'Piping') {
                    $this->individu[$i][$j][3] = intval($this->rPiping[mt_rand(0, $jumlah_rPiping - 1)]);
                } elseif ($this->jenis_mk[$j] === 'Instrument') {
                    $this->individu[$i][$j][3] = intval($this->rInstrument[mt_rand(0, $jumlah_rInstrument - 1)]);
                } elseif ($this->jenis_mk[$j] === 'Electrical') {
                    $this->individu[$i][$j][3] = intval($this->rElectrical[mt_rand(0, $jumlah_rElectrical - 1)]);
                } else {
                    $this->individu[$i][$j][3] = intval($this->rSafety[mt_rand(0, $jumlah_rSafety - 1)]);                    
                }
            }
        }
    }
    
    private function CekFitness($indv)
    {
        $penalty = 0;
        
        $hari_jumat = intval($this->kode_jumat);
        $jumat_0 = intval($this->range_jumat[0]);
        $jumat_1 = intval($this->range_jumat[1]);
        $jumat_2 = intval($this->range_jumat[2]);
        
        //var_dump($this->range_jumat);
        //exit();
        
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $jumlah_pengampu; $i++)
        {
          
          $tingkat_kebutuhan = intval($this->tingkat_kebutuhan[$i]);
          
          $jam_a = intval($this->individu[$indv][$i][1]);
          $hari_a = intval($this->individu[$indv][$i][2]);
          $ruang_a = intval($this->individu[$indv][$i][3]);
          $vendor_a = intval($this->vendor[$i]);        
          
          
            for ($j = 0; $j < $jumlah_pengampu; $j++) {                 
              
                $jam_b = intval($this->individu[$indv][$j][1]);
                $hari_b = intval($this->individu[$indv][$j][2]);
                $ruang_b = intval($this->individu[$indv][$j][3]);
                $vendor_b = intval($this->vendor[$j]);
                  
                  
                //1.bentrok ruang dan waktu dan 3.bentrok vendor
                
                //ketika pemasaran matakuliah sama, maka langsung ke perulangan berikutnya
                if ($i == $j)
                    continue;
                
                //#region Bentrok Ruang dan Waktu
                //Ketika jam,hari dan ruangnya sama, maka penalty + satu
                if ($jam_a == $jam_b &&
                    $hari_a == $hari_b &&
                    $ruang_a == $ruang_b)
                {
                    $penalty += 1;
                }
                
                //Ketika tingkat_kebutuhan  = 2, 
                //hari dan ruang sama, dan 
                //jam kedua sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($tingkat_kebutuhan >= 2)
                {
                    if ($jam_a + 1 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                
                //Ketika tingkat_kebutuhan  = 3, 
                //hari dan ruang sama dan 
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($tingkat_kebutuhan >= 3) {
                    if ($jam_a + 2 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                //Ketika tingkat_kebutuhan  = 4, 
                //hari dan ruang sama dan 
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($tingkat_kebutuhan >= 4) {
                    if ($jam_a + 3 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                //______________________BENTROK vendor
                if (
                //ketika jam sama
                    $jam_a == $jam_b && 
                //dan hari sama
                    $hari_a == $hari_b && 
                //dan vendornya sama
                    $vendor_a == $vendor_b)
                {
                  //maka...
                  $penalty += 1;
                }
                
                
                
                if ($tingkat_kebutuhan >= 2) {
                    if (
                    //ketika jam sama
                      ($jam_a + 1) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan vendornya sama
                      $vendor_a == $vendor_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($tingkat_kebutuhan >= 3) {
                    if (
                    //ketika jam sama
                      ($jam_a + 2) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan vendornya sama
                      $vendor_a == $vendor_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($tingkat_kebutuhan >= 4) {
                    if (
                    //ketika jam sama
                      ($jam_a + 3) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan vendornya sama
                      $vendor_a == $vendor_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }                
            }
            
            //
            // #region Bentrok sholat Jumat
            if (($hari_a  + 1) == $hari_jumat) //2.bentrok sholat jumat
            {
                
                if ($tingkat_kebutuhan == 1)
                {
                   if (
                       
                        ($jam_a == ($jumat_0 - 1)) ||
                        ($jam_a == ($jumat_1 - 1)) ||
                        ($jam_a == ($jumat_2 - 1))
                       
                       )
                   {
                       
                       $penalty += 1;
                   }
                }
                
                
                if ($tingkat_kebutuhan == 2)
                {
                    if (
                          ($jam_a == ($jumat_0 - 2)) ||
                          ($jam_a == ($jumat_0 - 1)) ||
                          ($jam_a == ($jumat_1 - 1)) ||
                          ($jam_a == ($jumat_2 - 1))
                        )
                    {
                        /*
                        echo '$tingkat_kebutuhan = ' . $tingkat_kebutuhan. '<br>';
                        echo '$jam_a = ' . $jam_a. '<br>';
                        echo '($jumat_0 - 2) = ' . ($jumat_0 - 2) . '<br>';
                        echo '($jumat_0 - 1) = ' . ($jumat_0 - 1). '<br>';
                        echo '($jumat_1 - 1) = ' . ($jumat_1 - 1). '<br>';
                        echo '($jumat_2 - 1) = ' . ($jumat_2- 1). '<br>';
                        exit();
                        */
                        
                        $penalty += 1;                        
                    }
                }
                
                if ($tingkat_kebutuhan == 3)
                {
                    if (
                          ($jam_a == ($jumat_0 - 3)) ||
                          ($jam_a == ($jumat_0 - 2)) ||
                          ($jam_a == ($jumat_0 - 1)) ||
                          ($jam_a == ($jumat_1 - 1)) ||
                          ($jam_a == ($jumat_2 - 1))
                        )
                    {                        
                        $penalty += 1;                        
                    }
                }
                
                if ($tingkat_kebutuhan == 4)
                {
                    if (
                          ($jam_a == ($jumat_0 - 4)) ||
                          ($jam_a == ($jumat_0 - 3)) ||
                          ($jam_a == ($jumat_0 - 2)) ||
                          ($jam_a == ($jumat_0 - 1)) ||
                          ($jam_a == ($jumat_1 - 1)) ||
                          ($jam_a == ($jumat_2 - 1))
                        )
                    {                        
                        $penalty += 1;                        
                    }
                }
            }
            //#endregion
            
            //#region Bentrok dengan Waktu Keinginan vendor
            //Boolean penaltyForKeinginanvendor = false;
            
            $jumlah_waktu_tidak_bersedia = count($this->ivendor);
            
            for ($j = 0; $j < $jumlah_waktu_tidak_bersedia; $j++)
            {
                if ($vendor_a == $this->ivendor[$j])
                {
                    $hari_jam = explode(':', $this->waktu_vendor[$j][1]);
                    
                    if ($this->jam[$jam_a] == $hari_jam[1] &&
                        $this->hari[$hari_a] == $hari_jam[0])
                    {                    
                        $penalty += 1;                        
                    }
                }                            
            }
                       
            
            //#endregion
            
            //#region Bentrok waktu dhuhur
            /*
            if ($jam_a == ($this->kode_dhuhur - 1))
            {                
                $penalty += 1;
            }
            */
            
        }      
        
        $fitness = floatval(1 / (1 + $penalty));  
        
        return $fitness;        
    }
    
    public function HitungFitness()
    {
        //hard constraint
        //1.bentrok ruang dan waktu
        //2.bentrok sholat jumat
        //3.bentrok vendor
        //4.bentrok keinginan waktu vendor 
        //5.bentrok waktu dhuhur 
        //=>6.praktikum harus pada ruang lab {telah ditetapkan dari awal perandoman
        //    bahwa jika praktikum harus ada pada LAB dan mata kuliah reguler harus 
        //    pada kelas reguler
        
        
        //soft constraint //TODO
        //$fitness = array();
        
        for ($indv = 0; $indv < $this->populasi; $indv++)
        {            
            $fitness[$indv] = $this->CekFitness($indv);            
        }
        
        return $fitness;
    }
    
    #endregion
    
    #region Seleksi
    public function Seleksi($fitness)
    {
        $jumlah = 0;
        $rank   = array();
        
        
        for ($i = 0; $i < $this->populasi; $i++)
        {
          //proses ranking berdasarkan nilai fitness
            $rank[$i] = 1;
            for ($j = 0; $j < $this->populasi; $j++)
            {
              //ketika nilai fitness jadwal sekarang lebih dari nilai fitness jadwal yang lain,
              //ranking + 1;
              //if (i == j) continue;
                
                $fitnessA = floatval($fitness[$i]);
                $fitnessB = floatval($fitness[$j]);
                
                if ( $fitnessA > $fitnessB)
                {
                    $rank[$i] += 1;                    
                }
            }
            
            $jumlah += $rank[$i];
        }
        
        $jumlah_rank = count($rank);
        for ($i = 0; $i < $this->populasi; $i++)
        {
            //proses seleksi berdasarkan ranking yang telah dibuat
            //int nexRandom = random.Next(1, jumlah);
            //random = new Random(nexRandom);
            $target = mt_rand(0, $jumlah - 1);           
          
            $cek    = 0;
            for ($j = 0; $j < $jumlah_rank; $j++) {
                $cek += $rank[$j];
                if (intval($cek) >= intval($target)) {
                    $this->induk[$i] = $j;
                    break;
                }
            }
        }
    }
    //#endregion
    
    public function StartCrossOver()
    {
        $individu_baru = array(array(array()));
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $this->populasi; $i += 2) //perulangan untuk jadwal yang terpilih
        {
            $b = 0;
            
            $cr = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
            
            //Two point crossover
            if (floatval($cr) < floatval($this->crossOver)) {
                //ketika nilai random kurang dari nilai probabilitas pertukaran
                //maka jadwal mengalami prtukaran
                
                $a = mt_rand(0, $jumlah_pengampu - 2);
                while ($b <= $a) {
                    $b = mt_rand(0, $jumlah_pengampu - 1);
                }
                
                
                //var_dump($this->induk);
                
                
                //penentuan jadwal baru dari awal sampai titik pertama
                for ($j = 0; $j < $a; $j++) {
                    for ($k = 0; $k < 4; $k++) {                        
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
                
                //Penentuan jadwal baru dai titik pertama sampai titik kedua
                for ($j = $a; $j < $b; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i + 1]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i]][$j][$k];
                    }
                }
                
                //penentuan jadwal baru dari titik kedua sampai akhir
                for ($j = $b; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
            } else { //Ketika nilai random lebih dari nilai probabilitas pertukaran, maka jadwal baru sama dengan jadwal terpilih
                for ($j = 0; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
            }
        }
        
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $this->populasi; $i += 2) {
          for ($j = 0; $j < $jumlah_pengampu ; $j++) {
            for ($k = 0; $k < 4; $k++) {
                $this->individu[$i][$j][$k] = $individu_baru[$i][$j][$k];
                $this->individu[$i + 1][$j][$k] = $individu_baru[$i + 1][$j][$k];
            }
          }
        }
    }
    
    public function Mutasi()
    {
        $fitness = array();
        //proses perandoman atau penggantian komponen untuk tiap jadwal baru
        $r       = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
        $jumlah_pengampu = count($this->pengampu);
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);

        $jumlah_rMechanical = count($this->rMechanical);
        $jumlah_rPiping = count($this->rPiping);
        $jumlah_rInstrument = count($this->rInstrument);
        $jumlah_rElectrical = count($this->rElectrical);
        $jumlah_rSafety = count($this->rSafety);
        
        for ($i = 0; $i < $this->populasi; $i++) {
            //Ketika nilai random kurang dari nilai probalitas Mutasi, 
            //maka terjadi penggantian komponen
            
            if ($r < $this->mutasi) {
                //Penentuan pada matakuliah dan kelas yang mana yang akan dirandomkan atau diganti
                $krom = mt_rand(0, $jumlah_pengampu - 1);
                
                $j = intval($this->tingkat_kebutuhan[$krom]);
                
                switch ($j) {
                    case 1:
                        $this->individu[$i][$krom][1] = mt_rand(0, $jumlah_jam - 1);
                        break;
                    case 2:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                        break;
                    case 3:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                        break;
                    case 4:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                        break;
                }
                //Proses penggantian hari
                $this->individu[$i][$krom][2] = mt_rand(0, $jumlah_hari - 1);
                
                //proses penggantian ruang               
                
                if ($this->jenis_mk[$krom] === 'Mechanical') {
                    $this->individu[$i][$krom][3] = $this->rMechanical[mt_rand(0, $jumlah_rMechanical - 1)];
                } elseif ($this->jenis_mk[$krom] === 'Piping ') {
                    $this->individu[$i][$krom][3] = $this->rPiping[mt_rand(0, $jumlah_rPiping - 1)];
                } elseif ($this->jenis_mk[$krom] === 'Instrument') {
                    $this->individu[$i][$krom][3] = $this->rInstrument[mt_rand(0, $jumlah_rInstrument - 1)];
                } elseif ($this->jenis_mk[$krom] === 'Electrical') {
                    $this->individu[$i][$krom][3] = $this->rElectrical[mt_rand(0, $jumlah_rElectrical - 1)];
                } else {
                    $this->individu[$i][$krom][3] = $this->rSafety[mt_rand(0, $jumlah_rSafety - 1)];
                }
                
                
            }
            
            $fitness[$i] = $this->CekFitness($i);
        }
        return $fitness;
    }
    
    
    public function GetIndividu($indv)
    {
        //return individu;
        
        //int[,] individu_solusi = new int[mata_kuliah.Length, 4];
        $individu_solusi = array(array());
        
        for ($j = 0; $j < count($this->pengampu); $j++)
        {
            $individu_solusi[$j][0] = intval($this->pengampu[$this->individu[$indv][$j][0]]);
            $individu_solusi[$j][1] = intval($this->jam[$this->individu[$indv][$j][1]]);
            $individu_solusi[$j][2] = intval($this->hari[$this->individu[$indv][$j][2]]);                        
            $individu_solusi[$j][3] = intval($this->individu[$indv][$j][3]);            
        }
        
        return $individu_solusi;
    }
    
    
}