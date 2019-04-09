<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penjadwalan Expediting</title>

    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/morrisjs/morris.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- Tabel Responsive -->
    <link href="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.css'); ?>" rel="stylesheet">

    <!-- DatePicker -->
    <link href="<?php echo base_url('assets/datepicker/datepicker.css'); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('assets/datepicker/datepicker.js'); ?>"></script>

    <style type="text/css">
         body .frmModalMsg {
            /* new custom width */
            width: 740px;
            /* must be half of the width, minus scrollbar on the left (30px) */
            margin-left: -280px;
         }
   
         #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
         }
         .brand { font-family: georgia, serif; }
         .brand .first {
         color: #ccc;
            font-style: italic;
         }
         .brand .second {
            color: #fff;
            font-weight: bold;
         }
         
         #loading-div-background{
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            background: #fff;
            width: 100%;
            height: 100%;
        }
        
        #loading-div{
            width: 300px;
            height: 150px;
            background-color: #fff;
            border: 5px solid #1468b3;
            text-align: center;
            color: #202020;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -150px;
            margin-top: -100px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
      </style>

      <script type="text/javascript">
         
         
         
        
        $(document).ready(function (){
            $("#loading-div-background").css({ opacity: 0.5 });
         <?php if(isset($clear_text_box)) { ?>    
            $('input[type=text]').each(function() {
                $(this).val('');
            });
         <?php } ?>
        });
    
        function ShowProgressAnimation(){
            $("#loading-div-background").show();
        }
         
         function change_get(){     
            var semester_tipe = document.getElementById('semester_tipe');
            var tahun_akademik = document.getElementById('tahun_akademik');
            window.location.href = "<?php echo base_url().'web/pengampu/' ?>" + semester_tipe.options[semester_tipe.selectedIndex].value  + "/"   + tahun_akademik.options[tahun_akademik.selectedIndex].value;     
         }
         
         function change_dosen_tidak_bersedia() {
            
            var kode_dosen = document.getElementById('kode_dosen');         
            window.location.href = "<?php echo base_url().'web/waktu_tidak_bersedia/' ?>" + kode_dosen.options[kode_dosen.selectedIndex].value;     
         }
         
        function get_matakuliah() {        
            var semester_tipe = document.getElementById('semester_tipe');
            //
            $.ajax({
               type:"POST",
               async   : false,
               cache   : false,
               url: "<?php echo base_url()?>web/option_matakuliah_ajax/" + semester_tipe.options[semester_tipe.selectedIndex].value,
               success: function(msg){
                  //alert(msg);
                  $('#option_matakuliah').html(msg);
               }
            });
            return false;        
        }
        
        /*
      $('#myTable tr').click({
         $(this).remove();
           return false;
       };
        
        */
        function delete_row(link,kode) {
            var answer =  confirm('Anda yakin ingin menghapus data ini?');
            if(answer){
               $.ajax({
                  type:"POST",
                  async   : false,
                  cache   : false,
                  url: "<?php echo base_url()?>" + link + kode,
                  success: function(msg){
                     //alert(msg);
                     //$('#option_matakuliah').html(msg);
                     var tr  = $('#row_' + kode);
                     tr.css("background-color","#FF3700");
                     tr.fadeOut(400, function(){
                       tr.remove();
                     });                  
                  }
               });
               
            }
            return false;
        }
        
        $(function() {
                applyPagination();
             
                function applyPagination() {
                 $("#ajax_paging a").click(function() {             
             
                   var url = $(this).attr("href");
                   $.ajax({
                     type: "POST",
                     data: "ajax=1",
                     url: url, 
                     success: function(msg) {
                       $('#content_ajax').fadeOut(0,function(){
                           $('#content_ajax').html(msg);
                           $("#content_ajax").removeAttr("style");
                           applyPagination();                 
                       }).fadeIn(0);                       
                     }
                   });              
                   return false;
                 });
               }
         
         
             });
          
      </script>

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">Algoritma Genetika</a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li> -->
                        
                        <li>
                            <a href="<?php echo base_url();?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php echo anchor('Web/index_vendor', '<i class="fa fa-file-text fa-fw"></i> Vendor'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('Web/index_barang', '<i class="fa fa-file-text fa-fw"></i> Barang'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('Web/index_bulan_tahun', '<i class="fa fa-file-text fa-fw"></i> Bulan Dan Tahun'); ?>
                                </li>
                                <!-- <li>
                                    <?php echo anchor('Web/index_hari', '<i class="fa fa-file-text fa-fw"></i> Hari'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('Web/index_jam', '<i class="fa fa-file-text fa-fw"></i> Jam'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('Web/index_pengampu', '<i class="fa fa-file-text fa-fw"></i> Pengampu'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('Web/waktu_tidak_bersedia', '<i class="fa fa-file-text fa-fw"></i> Waktu Tidak Bersedia'); ?>
                                </li> -->
                            </ul>
                        </li>
                        
                        <li>
                            <?php echo anchor('web/index_jadwal', '<i class="fa fa-table fa-fw"></i> Jadwal'); ?>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>