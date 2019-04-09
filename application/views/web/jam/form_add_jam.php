<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Jam</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_jam', '<i class="fa fa-file-text fa-fw"></i> Data Jam'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Tambah Data Jam</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">
                    <?=form_open_multipart('web/add_jam/',['class'=>'form-horizontal'])?>

                        <?php $error = form_error("range_jam", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label class="col-sm-2 control-label">Range Jam</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="range_jam" value="<?= set_value('range_jam') ?>">
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