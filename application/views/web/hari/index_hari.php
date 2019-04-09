<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hari</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <?=anchor('Web/add_hari','Tambah Data Hari',['class'=>'btn btn-primary btn-sm','style'=>'float:left;'])?>
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
                                <th class="header">Nama Hari</th>
                                <th class="header">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($hari as $row) : ?> 
                            <tr>
                                <td><?=$row->nama_hari?></td>
                                <td>
                                    <center>
                                        <?=anchor('Web/edit_hari/' . $row->kode_hari,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                                        <?=anchor('Web/delete_hari/' . $row->kode_hari,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah Anda Yakin ?\')'])?>
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