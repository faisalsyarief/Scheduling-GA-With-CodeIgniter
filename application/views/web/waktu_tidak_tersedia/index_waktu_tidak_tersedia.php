<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Waktu Tidak Tersedia</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>

            <div class="row">
                <div class="container table-responsive">
                    <div class="col-lg-11">
                        <form class="form" method="POST">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Vendor</label>
                                <div class="col-sm-10"> 
                                    <select class="form-control" name="kode_vendor">
                                        <option value='0'>--Pilih Nama Vendor--</option>
                                        <?php foreach($rs_vendor as $row) {
                                            echo "<option value='$row->kode_vendor'>$row->nama_vendor</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div><br><br>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="hidden" name="hide_me" value="hide_me">
                                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="container table-responsive">
                                    <div class="col-lg-11">
                                        <table id="dataTables-example" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="header">Hari</th>
                                                <th class="header">Jam</th>
                                                <th class="header">Bulan Dan Tahun</th>
                                                <th class="header">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php                 
                                                foreach($rs_hari as $hari) {
                                                   foreach($rs_jam as $jam) {
                                                    foreach($rs_bt as $bt) { ?> 
                                            <tr>
                                                <td><?php echo $hari->nama_hari;?></td>
                                                <td><?php echo $jam->range_jam;?></td>
                                                <td><?php echo $bt->nama_bulan_tahun;?></td>

                                                    <?php
                                                        $status = '';
                                                        foreach($rs_waktu_tidak_bersedia->result() as $wtb) {                           

                                                            if($wtb->kode_hari === $hari->kode_hari && $wtb->kode_jam === $jam->kode_jam) {
                                                            $status = 'checked';
                                                        }
                                                    } ?>
                                                <td>
                                                    <input type="checkbox" name="arr_tidak_bersedia[]" value="<?php echo $kode_vendor . '-'. $hari->kode_hari . '-' . $jam->kode_jam ?>" <?php echo $status; ?>> Tidak Bersedia
                                                </td>
                                            </tr>
                                            <?php     
                                                        }      
                                                    }                  
                                                }
                                            ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

<?php $this->load->view('page/footer') ?>