<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
*/

/*
// Possible hosts locally. You can add some if needed.
$config['host_dev'] = array('dev.riogrande.rs.gov.br', 'dev.riogrande.local', 'localhost', '127.0.0.1', '::1');

// Fill in the file of your project here when you develop locally.
$host_dev = 'concursos';

// Fill in the domain name here when your project is online.
// Example : www.johndoe.com
$host_prod = 'www.riogrande.rs.gov.br/concursos';

// WARNING: Do not modify the lines below
$domain = (in_array($_SERVER['HTTP_HOST'], $config['host_dev'], TRUE)) ? $_SERVER['HTTP_HOST'] . '/' . $host_dev : $host_prod;

$config['base_url'] = ( ! empty($_SERVER['HTTPS'])) ? 'https://' . $domain : 'http://' . $domain;
*/

//$WEB_PROTOCOL = (($_SERVER['SERVER_PORT'] == '443' || $_SERVER['REQUEST_SCHEME'] == 'https') ? 'https://' : 'http://');
$config['base_url'] = (( ! empty($_SERVER['HTTPS'])) ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'];
$config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
*/
$config['index_page'] = '';

/*
|--------------------------------------------------------------------------
| Assets
|--------------------------------------------------------------------------
|
*/
$config['assets_dir']     = 'assets';
$config['frameworks_dir'] = $config['assets_dir'] . '/frameworks';
$config['plugins_dir']    = $config['assets_dir'] . '/plugins';

/*
|--------------------------------------------------------------------------
| Upload
|--------------------------------------------------------------------------
|
*/
$config['upload_dir']     = 'upload';
$config['avatar_dir']     = $config['upload_dir'] . '/avatar';
