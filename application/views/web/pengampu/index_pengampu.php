<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengampu</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <?=anchor('Web/add_pengampu','Tambah Data Pengampu',['class'=>'btn btn-primary btn-sm','style'=>'float:left;'])?>
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
                                <th class="header">Kode Barang</th>
                                <th class="header">Kode Vendor</th>
                                <th class="header">Tanggal</th>
                                <th class="header">Tahun Proyek</th>
                                <th class="header">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pengampu as $row) : ?> 
                            <tr>
                                <td><?=$row->kode_barang?></td>
                                <td><?=$row->kode_vendor?></td>
                                <td><?=$row->tanggal?></td>
                                <td><?=$row->tahun_proyek?></td>
                                <td>
                                    <center>
                                        <?=anchor('Web/edit_pengampu/' . $row->kode_pengampu,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                                        <?=anchor('Web/delete_pengampu/' . $row->kode_pengampu,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah Anda Yakin ?\')'])?>
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