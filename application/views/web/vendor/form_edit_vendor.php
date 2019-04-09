
<?php
    $kode_vendor    = $vendor->kode_vendor;
        if($this->input->post('is_submitted')){
            $nama_vendor    = set_value('nama_vendor');
            $alamat_vendor  = set_value('alamat_vendor');
            $telepon_vendor = set_value('telepon_vendor');
        }else{
            $nama_vendor    = $vendor->nama_vendor;
            $alamat_vendor  = $vendor->alamat_vendor;
            $telepon_vendor = $vendor->telepon_vendor;
        }
?>

<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Vendor</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_vendor', '<i class="fa fa-file-text fa-fw"></i> Data Vendor'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Edit Data Vendor</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">
                    <?=form_open_multipart('web/edit_vendor/' . $kode_vendor,['class'=>'form-horizontal'])?>

                        <?php $error = form_error("nama_vendor", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Nama Vendor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_vendor" value="<?= $nama_vendor ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("alamat_vendor", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Alamat Vendor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat_vendor" value="<?= $alamat_vendor ?>">
                            </div>
                        </div>
                        <?php echo $error; ?>

                        <?php $error = form_error("telepon_vendor", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Nomor Telepon Vendor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telepon_vendor" value="<?= $telepon_vendor ?>">
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