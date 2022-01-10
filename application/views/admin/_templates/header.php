<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!doctype html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="<?php echo $charset; ?>">
        <title><?php echo $title; ?></title>
        <!-- IE8 -->
        <?php if ($mobile === FALSE): ?>        
        <!--[if IE 8]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <?php else: ?>
        <meta name="HandheldFriendly" content="true">
        <?php endif; ?>
        <?php if ($mobile == TRUE && $mobile_ie == TRUE): ?>
        <meta http-equiv="cleartype" content="on">
        <?php endif; ?>        
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="google" content="notranslate">
        <meta name="robots" content="noindex, nofollow">
        <?php if ($mobile == TRUE && $ios == TRUE): ?>        
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php echo $title; ?>">
        <?php endif; ?>
        <?php if ($mobile == TRUE && $android == TRUE): ?>
            <meta name="mobile-web-app-capable" content="yes">
        <?php endif; ?>

        <?php
        $methods_array = array('create','edit','view','index');
        ?>

        <!-- FONTES -->
        <link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAqElEQVRYR+2WYQ6AIAiF8W7cq7oXd6v5I2eYAw2nbfivYq+vtwcUgB1EPPNbRBR4Tby2qivErYRvaEnPAdyB5AAi7gCwvSUeAA4iis/TkcKl1csBHu3HQXg7KgBUegVA7UW9AJKeA6znQKULoDcDkt46bahdHtZ1Por/54B2xmuz0uwA3wFfd0Y3gDTjhzvgANMdkGb8yAyY/ro1d4H2y7R1DuAOTHfgAn2CtjCe07uwAAAAAElFTkSuQmCC">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,700italic">

        <!-- /* O BASICO do Layout */ -->

        <!-- Normalize -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/normalize/normalize.css'); ?> ">
		<!-- BootStrap / Admin LTE -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/adminlte/css/adminlte.min.css'); ?> ">  
        <!-- FontAwesome -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/fontawesome-free/css/all.min.css'); ?> "> 
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/ionicons/css/ionicons.min.css'); ?> "> 
        <!-- ICheck -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/icheck/css/blue.css'); ?> ">       
        <!-- ICheck Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/icheck-bootstrap/icheck-bootstrap.min.css'); ?> ">                         
        <!-- Datatables -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?> ">
        <!-- Datatables Responsive -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/datatables-responsive/css/responsive.bootstrap4.min.css'); ?> ">
        <!-- Select Picker -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/bootstrap_select/bootstrap-select.min.css'); ?>"> 
        <!-- Select 2 -->
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/select2/css/select2.min.css'); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>"> 
        <!-- Overlay Scroll Bar -->    
        <link rel="stylesheet" href="<?php echo base_url($plugins_dir . '/overlayScrollbars/css/OverlayScrollbars.min.css'); ?> ">

        <!-- ANIMSITION TRANSITIONS -->
        <?php if ($mobile === FALSE && $admin_prefs['transition_page'] == TRUE): ?>
            <link rel="stylesheet" href="<?php echo base_url($plugins_dir . '/animsition/animsition.min.css'); ?>">
        <?php endif; ?>
        
        <!-- NO MOBILE -->
        <?php if ($mobile === FALSE): ?>
        <!--[if lt IE 9]>
            <script src="<?php echo base_url($frameworks_dir . '/html5shiv/html5shiv.min.js'); ?>"></script>
            <script src="<?php echo base_url($frameworks_dir . '/respond/respond.min.js'); ?>"></script>
        <![endif]-->
	    <?php endif; ?>

        <?php echo $header_extras; ?>

        <?php        
        //CSS do Controller (Só adiciona se achar)
        $css = FCPATH . "public/css/admin/controllers/" . $this->router->fetch_class().'.css';       
        if(file_exists($css)):          
        ?>

        <link rel="stylesheet" href="<?php echo base_url('public/css/admin/controllers/'.$this->router->fetch_class().'.css'); ?> "> 
        <?php endif; ?>
	
    </head>
    
    <body class="hold-transition sidebar-mini layout-fixed">
    
    <!-- Inputs para passar o BASE URL e Controller para o JS -->
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
    <input type="hidden" id="controlador" value="<?php echo $this->router->class; ?>" />
    <input type="hidden" id="ehmobile" value="<?php echo $mobile; ?>" />

    <?php if ($mobile === FALSE && $admin_prefs['transition_page'] == TRUE): ?>
        <div class="wrapper animsition">
    <?php else: ?>
        <div class="wrapper">
    <?php endif; ?>

    <!-- FIX JS -->   
    <script src="<?php echo base_url($plugins_dir . '/jsfix/fix_head.js'); ?>"></script>    

    <!-- BASE  URL pro JS -->
    <script>
        dir_base = "<?php echo base_url(); ?>";
    </script>