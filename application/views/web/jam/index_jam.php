<?php $this->load->view('page/header') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jam</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <?=anchor('Web/add_jam','Tambah Data Jam',['class'=>'btn btn-primary btn-sm','style'=>'float:left;'])?>
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
                                <th class="header">Range Jam</th>
                                <th class="header">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($jam as $row) : ?> 
                            <tr>
                                <td><?=$row->range_jam?></td>
                                <td>
                                    <center>
                                        <?=anchor('Web/edit_jam/' . $row->kode_jam,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                                        <?=anchor('Web/delete_jam/' . $row->kode_jam,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah Anda Yakin ?\')'])?>
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