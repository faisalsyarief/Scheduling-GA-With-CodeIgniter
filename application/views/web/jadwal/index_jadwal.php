<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jadwal</h1>
                </div>
            </div>

            <form class="form" method="POST" action="<?php echo base_url()?>index.php/Web/index_jadwal">
                <div class="row">
                    <div class="col-lg-12">

                        <?php $error = form_error("jumlah_dalam_kategori", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jumlah_dalam_kategori" name="jumlah_dalam_kategori" >
                                    <option value='1' <?php echo isset($jumlah_dalam_kategori) ? ($jumlah_dalam_kategori === '1' ? 'selected':'') : '' ;?> />Ganjil</option>
                                    <option value='0' <?php echo isset($jumlah_dalam_kategori) ? ($jumlah_dalam_kategori === '0' ? 'selected':'') : '' ;?> />Genap</option>
                                </select>
                            </div>
                        </div><br><br>
                        <?php echo $error; ?>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tahun Proyek</label>
                            <div class="col-sm-10"> 
                            <select class="form-control" name="tahun_proyek">
                                <option value='0'>--Pilih Tahun--</option>
                                <?php foreach($pengampu as $row) {
                                    echo "<option value='$row->tahun_proyek'>$row->tahun_proyek</option>";
                                } ?>
                            </select>
                            </div>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Tahun Proyek</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tahun_proyek" name="tahun_proyek" >
                                    <option value="2011" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2011' ? 'selected':'') : '' ;?> /> 2011</option>
                                    <option value="2012" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2012' ? 'selected':'') : '' ;?> /> 2012</option>
                                    <option value="2013" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2013' ? 'selected':'') : '' ;?> /> 2013</option>
                                    <option value="2014" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2014' ? 'selected':'') : '' ;?> /> 2014</option>
                                    <option value="2015" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2015' ? 'selected':'') : '' ;?> /> 2015</option>
                                    <option value="2016" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2016' ? 'selected':'') : '' ;?> /> 2016</option>
                                    <option value="2017" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2017' ? 'selected':'') : '' ;?> /> 2017</option>
                                    <option value="2018" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2018' ? 'selected':'') : '' ;?> /> 2018</option>
                                    <option value="2019" <?php echo isset($tahun_proyek) ? ($tahun_proyek === '2019' ? 'selected':'') : '' ;?> /> 2019</option>
                                </select>
                            </div>
                        </div> --><br><br>  
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah Populasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah_populasi" value="<?php echo isset($jumlah_populasi) ? $jumlah_populasi : '10' ;?>">  
                        </div><br><br><br>   
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Probabilitas CrossOver</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="probabilitas_crossover" value="<?php echo isset($probabilitas_crossover) ? $probabilitas_crossover: '0.70' ;?>">  
                        </div><br><br><br>  

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Probabilitas Mutasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="probabilitas_mutasi" value="<?php echo isset($probabilitas_mutasi) ? $probabilitas_mutasi : '0.40' ;?>"> 
                        </div><br><br><br>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah Generasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah_generasi" value="<?php echo isset($jumlah_generasi) ? $jumlah_generasi : '10000' ;?>">  
                        </div><br><br>
                
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary pull-right" >Proses</button>
                            </div>
                        </div><br>
                    
                    </div>  
                </div>
            </form>

            <?php if($jadwal->num_rows() !== 0):?>
                <?=anchor('web/excel_report','Cetak Jadwal',['class'=>'btn btn-primary btn-sm','style'=>'float:left;'])?>
                <br><br>
            <?php endif;?>

            <div class="row">
                <div class="container table-responsive">
                    <div class="col-lg-11">
                        <table id="dataTables-example" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="header">No</th>
                                <!-- <th class="header">Sesi</th> -->
                                <!-- <th class="header">Jam</th> -->
                                <th class="header">Nama Barang</th>
                                <!-- <th class="header">Tingkat Kebutuhan</th> -->
                                <!-- <th class="header">Jumlah Dalam Kategori</th> -->
                                <th class="header">Nama Vendor</th>
                                <th class="header">Tanggal</th>
                                <th class="header">Bulan Dan Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i =  1;
                                    foreach ($jadwal->result() as $row) { ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <!-- <td><?php echo $row->sesi;?></td> -->
                                        <!-- <td><?php echo $row->jam_kebutuhan;?></td> -->
                                        <td><?php echo $row->nama_barang;?></td>
                                        <!-- <td><?php echo $row->tingkat_kebutuhan;?></td> -->
                                        <!-- <td><?php echo $row->jumlah_dalam_kategori;?></td> -->
                                        <td><?php echo $row->nama_vendor;?></td>
                                        <td><?php echo $row->tanggal;?></td>
                                        <td><?php echo $row->nama_bulan_tahun;?></td> 
                                    </tr>
                            <?php $i++;} ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>


<?php $this->load->view('page/footer') ?>