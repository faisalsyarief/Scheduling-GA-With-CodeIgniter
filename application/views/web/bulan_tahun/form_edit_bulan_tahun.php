
<?php
    $kode_bulan_tahun   = $bulan_tahun->kode_bulan_tahun;
        if($this->input->post('is_submitted')){
            $nama_bulan_tahun       = set_value('nama_bulan_tahun');
            $kapasitas_bulan_tahun  = set_value('kapasitas_bulan_tahun');
            $kategori_barang        = set_value('kategori_barang');
        }else{
            $nama_bulan_tahun       = $bulan_tahun->nama_bulan_tahun;
            $kapasitas_bulan_tahun  = $bulan_tahun->kapasitas_bulan_tahun;
            $kategori_barang        = $bulan_tahun->kategori_barang;
        }
?>

<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Bulan Dan Tahun</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_bulan_tahun', '<i class="fa fa-file-text fa-fw"></i> Data Bulan Dan Tahun'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Edit Data Bulan Dan Tahun</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">
                    <?=form_open_multipart('web/edit_bulan_tahun/' . $kode_bulan_tahun,['class'=>'form-horizontal'])?>

                        <?php $error = form_error("nama_bulan_tahun", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Bulan Dan Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control datepicker" name="nama_bulan_tahun" value="<?= $nama_bulan_tahun ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("kapasitas_bulan_tahun", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Kapasitas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kapasitas_bulan_tahun" value="<?= $kapasitas_bulan_tahun ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("kategori_barang", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kategori_barang">
                                    <option value='<?= $kategori_barang ?>'><?= $kategori_barang ?></option>
                                    <option value='Piping'>Piping</option>
                                    <option value='Mechanical'>Mechanical</option>
                                    <option value='Instrument'>Instrument</option>
                                    <option value='Electrical'>Electrical</option>
                                    <option value='Safety'>Safety</option>
                                </select>
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </div>
                        </div>

                   </form>
                </div>
            </div>

        </div>

<?php $this->load->view('page/footer') ?>