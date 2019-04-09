<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Vendor</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <?=anchor('Web/add_vendor','Tambah Data Vendor',['class'=>'btn btn-primary btn-sm','style'=>'float:left;'])?>
                        <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="container table-responsive">
                    <div class="col-lg-11">
                        <table id="dataTables-example" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="header">Nama Vendor</th>
                                <th class="header">Alamat Vendor</th>
                                <th class="header">Nomor Telepon Vendor</th>
                                <th class="header">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($vendor as $row) : ?> 
                            <tr>
                                <td><?=$row->nama_vendor?></td>
                                <td><?=$row->alamat_vendor?></td>
                                <td><?=$row->telepon_vendor?></td>
                                <td>
                                    <center>
                                        <?=anchor('Web/edit_vendor/' . $row->kode_vendor,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                                        <?=anchor('Web/delete_vendor/' . $row->kode_vendor,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah Anda Yakin ?\')'])?>
                                    </center>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>

<?php $this->load->view('page/footer') ?>