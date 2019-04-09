<?php $this->load->view('page/header') ?>

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Barang</h1>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('web/index_barang', '<i class="fa fa-file-text fa-fw"></i> Data Barang'); ?></li>
                      <li class="active"><i class="fa fa-tasks fa-fw"></i> Detail Data Barang</li>
                      
                      <div style="clear: both;"></div>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-11">

                    <?php foreach($barang as $row) : ?>
                    <h4>ID Barang : <?=$row->kode_barang?></h4>
                        <table class="table table-hover">
                            <tr>
                                <td><strong>Nama Barang</strong></td>
                                <td>:</td>
                                <td><?=$row->nama_barang?></td>
                            </tr>

                            <tr>
                                <td><strong>Kategori Barang</strong></td>
                                <td>:</td>
                                <td><?=$row->kategori_barang?></td>
                            </tr>

                            <tr>
                                <td><strong>Tingkat Kebutuhan</strong></td>
                                <td>:</td>
                                <td><?=$row->tingkat_kebutuhan?></td>
                            </tr>

                            <tr>
                                <td><strong>Jumlah Dalam Kategori</strong></td>
                                <td>:</td>
                                <td><?=$row->jumlah_dalam_kategori?></td>
                            </tr>

                            <tr>
                                <td>
                                    <?=anchor('Web/delete_barang/' . $row->kode_barang,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                                </td>
                                <td></td>
                                <td>
                                    <?=anchor('Web/edit_barang/' . $row->kode_barang,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?>
                                </td>
                            </tr>
                        </table>
                    <?php endforeach; ?>

                </div>
            </div>
            
        </div>

<?php $this->load->view('page/footer') ?>