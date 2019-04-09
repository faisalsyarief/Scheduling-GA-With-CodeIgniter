        <div class="container-fluid">
            <p class="footer">
                &copy; Faisal Syarifuddin <?php echo date('Y') ?><br>
                Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
            </p>
        </div>

    </div>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/raphael/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/data/morris-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

    <!-- Table Responsive -->
    <script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script src=".<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        $( ".datepicker" ).datepicker({
            viewMode: "months",
            minViewMode: "months",
            format: "MM yyyy"
        });
        
        $( ".datepickertahun" ).datepicker({
            viewMode: "years",
            minViewMode: "years",
            format: "yyyy"
        });
    });

    </script>

</body>

</html>