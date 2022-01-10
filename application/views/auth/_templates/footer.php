<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
        <!-- /* O BASICO do Layout */ -->

        <!-- BASICO ADMINLTE -->

        <!-- JQuery -->
        <script src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>     
        <!-- AdminLTE -->
        <script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>    
        <!-- JQuery Validation -->
        <script src="<?php echo base_url($frameworks_dir . '/jquery-validation/jquery.validate.min.js'); ?>"></script>
        <!-- JQuery Validation Extras -->
        <script src="<?php echo base_url($frameworks_dir . '/jquery-validation/additional-methods.min.js'); ?>"></script>        
        <!-- ICheck -->
        <script src="<?php echo base_url($frameworks_dir . '/icheck/js/icheck.min.js'); ?>"></script>      
        <!-- Holder -->
        <script src="<?php echo base_url($frameworks_dir . '/holderjs/holder.min.js'); ?>"></script> 
        <!-- JS Mask -->        
        <script src="<?php echo base_url($plugins_dir . '/jquery-mask/jquery.mask.min.js'); ?>"></script>                    
        <!-- BackStretch -->
        <script src="<?php echo base_url($plugins_dir . '/backstretch/jquery.backstretch.min.js'); ?>"></script>

        <!-- JS da pagina -->
        <script src="<?php echo base_url($frameworks_dir . '/auth/auth.js'); ?>"></script>       
        
        <!-- Funções extras da Pagina -->
        <script src="<?php echo base_url('public/javascript/funcoes.js'); ?>"></script>

        <!-- FIX BODY -->
        <script src="<?php echo base_url($plugins_dir . '/jsfix/fix_body.js'); ?>"></script>
                
    </body>
</html>