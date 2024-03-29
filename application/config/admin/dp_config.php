<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['title']      = 'Concurso Público';
$config['title_mini'] = 'CP';
$config['title_lg']   = 'Concurso Público';

$config['auth_mode']   = 'DATABASE';   //LDAP ou DATABASE
$config['tree_mode']   = 'TREE';   //TREE ou ICON

/* Display panel login */
$config['auth_social_network'] = FALSE;
$config['forgot_password']     = FALSE;
$config['new_membership']      = FALSE;

/*
 * **********************
 * AdminLTE
 * **********************
 */
/* Page Title */

$config['pagetitle_open']     = '<h1>';
$config['pagetitle_close']    = '</h1>';
$config['pagetitle_el_open']  = '<small>';
$config['pagetitle_el_close'] = '</small>';

/* Breadcrumbs */
$config['breadcrumb_open']     = '<ol class="breadcrumb">';
$config['breadcrumb_close']    = '</ol>';
$config['breadcrumb_el_open']  = '<li>';
$config['breadcrumb_el_close'] = '</li>';
$config['breadcrumb_el_first'] = '<i class="fa fa-dashboard"></i>';
$config['breadcrumb_el_last']  = '<li class="active">';