<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Barang</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_barang', '<i class="fa fa-file-text fa-fw"></i> Data Barang'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Tambah Data Barang</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">
                    <?=form_open_multipart('web/add_barang/',['class'=>'form-horizontal'])?>

                        <?php $error = form_error("nama_barang", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Nama barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_barang" value="<?= set_value('nama_barang') ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("kategori_barang", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Kategori Barang</label>
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

                        <?php $error = form_error("tingkat_kebutuhan", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Tingkat Kebutuhan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tingkat_kebutuhan">
                                    <option value=''>--Pilih Tingkat Kebutuhan--</option>
                                    <option value='1'>1 (Dibutuhkan Paling Akhir)</option>
                                    <option value='2'>2 (Dibutuhkan Setelah Point 3 Selesai)</option>
                                    <option value='3'>3 (Dibutuhkan Setelah Barang Utama Datang)</option>
                                    <option value='4'>4 (Dibutuhkan Paling Utama)</option>
                                </select>
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("jumlah_dalam_kategori", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Jumlah Dalam Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jumlah_dalam_kategori">
                                    <option value=''>--Pilih Jumlah Dalam Kategori--</option>
                                    <option value='1'>Kurang Dari 10 Barang</option>
                                    <option value='2'>Kurang Dari 20 Barang</option>
                                    <option value='3'>Kurang Dari 30 Barang</option>
                                    <option value='4'>Kurang Dari 40 Barang</option>
                                    <option value='5'>Kurang Dari 50 Barang</option>
                                    <option value='6'>Kurang Dari 60 Barang</option>
                                    <option value='7'>Kurang Dari 70 Barang</option>
                                    <option value='8'>Kurang Dari 80 Barang</option>
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