<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="<?php echo $charset; ?>">
        <title><?php echo $title; ?></title>

        <?php if ($mobile === FALSE): ?>
            <!--[if IE 8]>
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <?php endif; ?>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="google" content="notranslate">
        <meta name="robots" content="noindex, nofollow">
        
        <link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAqElEQVRYR+2WYQ6AIAiF8W7cq7oXd6v5I2eYAw2nbfivYq+vtwcUgB1EPPNbRBR4Tby2qivErYRvaEnPAdyB5AAi7gCwvSUeAA4iis/TkcKl1csBHu3HQXg7KgBUegVA7UW9AJKeA6znQKULoDcDkt46bahdHtZ1Por/54B2xmuz0uwA3wFfd0Y3gDTjhzvgANMdkGb8yAyY/ro1d4H2y7R1DuAOTHfgAn2CtjCe07uwAAAAAElFTkSuQmCC">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,700italic">
     
        <!-- /* O BASICO do Layout */ -->

        <!-- Normalize -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/normalize/normalize.css'); ?> ">
		<!-- BootStrap / Admin LTE -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/adminlte/css/adminlte.min.css'); ?> ">  
        <!-- FontAwesome -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/fontawesome-free/css/all.min.css'); ?> ">  
        <!-- ICheck -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/icheck/css/blue.css'); ?> ">       
        <!-- ICheck Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/icheck-bootstrap/icheck-bootstrap.min.css'); ?> ">                   
        
        <!-- Responde e Html5Shiv são para navegadores antigos terem HTML5 e CSS -->
        <?php if ($mobile === FALSE): ?>
            <!--[if lt IE 9]>
                <script src="<?php echo base_url($plugins_dir . '/html5shiv/html5shiv.min.js'); ?>"></script>
                <script src="<?php echo base_url($plugins_dir . '/respond-js/respond.min.js'); ?>"></script>
            <![endif]-->
        <?php endif; ?>
        
        <!-- CSS da Pagina -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/auth/auth.css'); ?> ">   
        
        <!-- FIX HEADER -->
        <script src="<?php echo base_url($plugins_dir . '/jsfix/fix_head.js'); ?>"></script>  
        
        <script type="text/javascript">
            var dir_base = "<?php echo base_url(); ?>"   
        </script>

    </head>