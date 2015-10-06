    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>js/luana_val.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/modal.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/tooltip.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>js/sb-admin-2.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>js/luana.js"></script>
    <script src="<?php echo base_url(); ?>js/luana_produccion_crear.js"></script>
        <!-- Custom Theme JavaScript -->
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>js/chosen.jquery.js"></script>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
    <?php 
    if(isset($js))
    {
    	for ($i=0; $i < count($js); $i++) { 
    		echo '<script src="'.base_url().'js/'.$js[$i].'"></script>';
    	}
    }
    ?>