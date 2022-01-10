<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

        /* COMMON :: ADMIN & PUBLIC */
        /* Load */
        $this->load->database();

        /* Data */
        $this->data['lang'] = element($this->config->item('language'), $this->config->item('language_abbr'));
        $this->data['charset'] = $this->config->item('charset');
        $this->data['frameworks_dir'] = $this->config->item('frameworks_dir');
        $this->data['plugins_dir'] = $this->config->item('plugins_dir');
        $this->data['avatar_dir'] = $this->config->item('avatar_dir');

        /* Any mobile device (phones or tablets) */
        if ($this->mobile_detect->isMobile())
        {
            $this->data['mobile'] = TRUE;

            if ($this->mobile_detect->isiOS()){
                $this->data['ios'] = TRUE;
                $this->data['android'] = FALSE;
            }
            elseif ($this->mobile_detect->isAndroidOS())
            {
                $this->data['ios'] = FALSE;
                $this->data['android'] = TRUE;
            }
            else
            {
                $this->data['ios'] = FALSE;
                $this->data['android'] = FALSE;
            }

            if ($this->mobile_detect->getBrowsers('IE')){
                $this->data['mobile_ie'] = TRUE;
            }
            else
            {
                $this->data['mobile_ie'] = FALSE;
            }
        }
        else
        {
            $this->data['mobile'] = FALSE;
            $this->data['ios'] = FALSE;
            $this->data['android'] = FALSE;
            $this->data['mobile_ie'] = FALSE;
        }
	}
}

class Admin_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Load */
            /* Configs de uso geral */
            $this->load->config('admin/dp_config');

            /* Gera caminhos de pao */
            $this->load->library('admin/breadcrumbs');

            /* Gera titulos H1 */
            $this->load->library('admin/page_title');

            /* Model com funcao de instalacao */
            $this->load->model('admin/core_model');

            /* Helper de Menu com funcoes como active_link_controller */
            $this->load->helper('menu');

            /* Arquivos de linguas pt-br,en */
            $this->lang->load(['admin/main_header', 'admin/main_sidebar', 'admin/footer', 'admin/actions']);

            /* Load library function  */
            $this->breadcrumbs->unshift(0, $this->lang->line('menu_dashboard'), 'admin/dashboard');

            /* Data */

            /* Titulos do dp_config.php */
            $this->data['title']        = $this->config->item('title');
            $this->data['title_lg']     = $this->config->item('title_lg');
            $this->data['title_mini']   = $this->config->item('title_mini');
            
            /* Modo de AUTH e Main Side Bar (Arvore ou Icones) do dp_config.php */
            $this->data['auth_mode']    = $this->config->item('auth_mode');
            $this->data['tree_mode']    = $this->config->item('tree_mode');

            /* Preferencias salvas no banco (NAO USADO) e do Ion Auth */
            $this->data['admin_prefs'] = $this->prefs_model->admin_prefs();
            $this->data['user_login'] = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);

            /* Controla o que carrega de JS e CSS extra para cada Controller */
            $this->data['includes'] = !empty($this->config->item('includes')) ? $this->config->item('includes') : null;

            /* Se o controller for dashboard */
            if ($this->router->fetch_class() == 'dashboard')
            {
                /* Verifica se tem o arquivo de instalacao Install.php (NAO USADO AINDA) */
                $this->data['dashboard_alert_file_install'] = $this->core_model->get_file_install();
                $this->data['header_alert_file_install'] = NULL;
            }
            else
            {
                $this->data['dashboard_alert_file_install'] = NULL;
                $this->data['header_alert_file_install'] = NULL; 
            }

            /* Id da sessao ION AUTH */
            $user_id = $this->session->user_id;

            $user = R::load("users", $user_id);

            /* Se e admin */
            $this->data['useradmin'] = $user->admin;

            /* Protege area admin */
            $this->load->model("admin/usuario_model");
            $isAdmin = $this->usuario_model->isAdmin($this->session->user_id);
            /* Admin */
            $this->data['isAdmin'] = $isAdmin;

            /* Menu Dinamico */
            $sections = R::findAll("menusection","publicado = 1");

            $SQLmenu = "SELECT 
                            mi.controller, 
                            mi.descricao, 
                            mi.icone                           
                        FROM menuitens mi";
            
            $itensMenu = array();
            foreach ($sections as $s) {
                if (!$isAdmin) {
                    $where = " INNER JOIN menugroups mg
                                ON mi.id = mg.menu
                                INNER JOIN users_groups ug
                                ON mg.grupo = ug.group_id
                                WHERE ug.user_id = {$this->session->user_id}
                                AND mi.section = {$s->id}
                                AND publicado = 1";
                } else {
                    $where = " WHERE mi.section = {$s->id}
                                AND publicado = 1";
                }
                // Itens de Menu
                $itensMenu[$s->descricao] = R::getAll($SQLmenu . $where);
            }
            $this->data['itensMenu'] = $itensMenu;
        }
    }
}

class Public_Controller extends MY_Controller
{
	public function __construct()
	{
        parent::__construct();
        
        /* Configs de uso geral */
        $this->load->config('public/dp_config');

        /* Data */
        
        /* Configs que vao para o o HEADER do template */
        $this->data['title']        = $this->config->item('title');
		$this->data['CHARSET']      = $this->config->item('CHARSET');		
		$this->data['favicon']      = $this->config->item('favicon');
		$this->data['description']  = $this->config->item('description');
		$this->data['copyright']    = $this->config->item('copyright');
		$this->data['author']       = $this->config->item('author');

		$this->data['arq_css']      = $this->config->item('arq_css');
		$this->data['arq_js']       = $this->config->item('arq_js');
		
		$this->data['frameworks_dir']   = $this->config->item('frameworks_dir');
		$this->data['plugins_dir']      = $this->config->item('plugins_dir');

		$this->data['public_js']        = $this->config->item('public_js');
		$this->data['public_css']       = $this->config->item('public_css');
		$this->data['public_plugins']   = $this->config->item('public_plugins');
		$this->data['public_images']    = $this->config->item('public_images');
        
        /* Admin */
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
        {
            $this->data['admin_link'] = TRUE;
        }
        else
        {
            $this->data['admin_link'] = FALSE;
        }

        /* Logado */
        if ($this->ion_auth->logged_in())
        {
            $this->data['logout_link'] = TRUE;
        }
        else
        {
            $this->data['logout_link'] = FALSE;
        }
	}
}
