<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bulan Dan Tahun</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <?=anchor('Web/add_bulan_tahun','Tambah Data Bulan Dan Tahun',['class'=>'btn btn-primary btn-sm','style'=>'float:left;'])?>
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
                                <th class="header">Bulan Dan Tahun</th>
                                <th class="header">Kapasitas</th>
                                <th class="header">Kategori</th>
                                <th class="header">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($bulan_tahun as $row) : ?> 
                            <tr>
                                <td><?=$row->nama_bulan_tahun?></td>
                                <td><?=$row->kapasitas_bulan_tahun?></td>
                                <td><?=$row->kategori_barang?></td>
                                <td>
                                    <center>
                                        <?=anchor('Web/edit_bulan_tahun/' . $row->kode_bulan_tahun,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                                        <?=anchor('Web/delete_bulan_tahun/' . $row->kode_bulan_tahun,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah Anda Yakin ?\')'])?>
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