<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Bulan Dan Tahun</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_bulan_tahun', '<i class="fa fa-file-text fa-fw"></i> Data Bulan Dan Tahun'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Tambah Data Bulan Dan Tahun</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">
                    <?=form_open_multipart('web/add_bulan_tahun/',['class'=>'form-horizontal'])?>

                        <?php $error = form_error("nama_bulan_tahun", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Bulan Dan Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control datepicker" name="nama_bulan_tahun" value="<?= set_value('nama_bulan_tahun') ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("kapasitas_bulan_tahun", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Kapasitas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kapasitas_bulan_tahun" value="<?= set_value('kapasitas_bulan_tahun') ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("kategori_barang", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kategori_barang">
                                    <option value=''>--Pilih Kategori Barang--</option>
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