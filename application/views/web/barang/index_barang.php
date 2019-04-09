<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Barang</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <?=anchor('Web/add_barang','Tambah Data Barang',['class'=>'btn btn-primary btn-sm','style'=>'float:left;'])?>
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
                                <th class="header">Nama Barang</th>
                                <th class="header">Kategori Barang</th>
                                <th class="header">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($barang as $row) : ?> 
                            <tr>
                                <td><?=$row->nama_barang?></td>
                                <td><?=$row->kategori_barang?></td>
                                <td>
                                    <center>
                                        <?=anchor('Web/detail_barang/' . $row->kode_barang,'Detail',['class'=>'btn btn-info btn-sm'])?>
                                        <?=anchor('Web/edit_barang/' . $row->kode_barang,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                                        <?=anchor('Web/delete_barang/' . $row->kode_barang,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah Anda Yakin ?\')'])?>
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