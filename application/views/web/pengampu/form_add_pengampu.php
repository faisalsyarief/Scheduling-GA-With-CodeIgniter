<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Pengampu</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_pengampu', '<i class="fa fa-file-text fa-fw"></i> Data Pengampu'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Tambah Data Pengampu</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">
                    <?=form_open_multipart('Web/add_pengampu/',['class'=>'form-horizontal'])?>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-sm-10"> 
                            <select class="form-control" name="kode_barang">
                                <option value='0'>--Pilih Nama Barang--</option>
                                <?php foreach($barang as $row) {
                                    echo "<option value='$row->kode_barang'>$row->nama_barang</option>";
                                } ?>
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Vendor</label>
                            <div class="col-sm-10"> 
                            <select class="form-control" name="kode_vendor">
                                <option value='0'>--Pilih Nama Vendor--</option>
                                <?php foreach($vendor as $row) {
                                    echo "<option value='$row->kode_vendor'>$row->nama_vendor</option>";
                                } ?>
                            </select>
                            </div>
                        </div>

                        <?php $error = form_error("tanggal", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal" value="<?= set_value('tanggal') ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>
                        
                        <?php $error = form_error("tahun_proyek", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Tahun Proyek</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control datepickertahun" name="tahun_proyek" value="<?= set_value('tahun_proyek') ?>">
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