
<?php
    $kode_hari    = $hari->kode_hari;
        if($this->input->post('is_submitted')){
            $nama_hari    = set_value('nama_hari');
        }else{
            $nama_hari    = $hari->nama_hari;
        }
?>

<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Hari</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_hari', '<i class="fa fa-file-text fa-fw"></i> Data Hari'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Edit Data Hari</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">
                    <?=form_open_multipart('web/edit_hari/' . $kode_hari,['class'=>'form-horizontal'])?>

                        <?php $error = form_error("nama_hari", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Nama Hari</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_hari" value="<?= $nama_hari ?>">
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