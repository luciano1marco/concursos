<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));     
        $this->lang->load('auth');
        $this->auth_mode = 'DATABASE';
        $this->form_validation->set_error_delimiters('<div class="form_val_error">', '</div>'); 
	}

	function index()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            die;
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
	}

    function login()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            /* Load */
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');

            /* Valid form */
            $this->form_validation->set_rules('identity', 'Identity', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            /* Data */
            $this->data['title']               = $this->config->item('title');
            $this->data['title_lg']            = $this->config->item('title_lg');
            $this->data['auth_social_network'] = $this->config->item('auth_social_network');
            $this->data['forgot_password']     = $this->config->item('forgot_password');
            $this->data['new_membership']      = $this->config->item('new_membership');

            $this->data['auth_mode']           = $this->config->item('auth_mode');
           
            $this->auth_mode  = isset($this->data['auth_mode']) ? $this->data['auth_mode'] : 'DATABASE';

            if ($this->form_validation->run() == TRUE) {
              
                if($this->auth_mode == 'LDAP'){
                /* COMECO LDAP LOGIN */      
                    $login = explode("@", $this->input->post("identity"));
                    $login = $login[0];
                    $password = $this->input->post("password");
                    $ldap_val = false;

                    $user = R::find("users", "username = '{$login}' AND active = 1");

                    if (count($user) > 0) {
                        $user = array_pop($user);
                        $conexao = ldap_connect("ldap://192.168.0.18", 389);
                        ldap_set_option($conexao, LDAP_OPT_PROTOCOL_VERSION, 3);
                        ldap_set_option($conexao, LDAP_OPT_REFERRALS, 0);
                        $ldap_val = @ldap_bind($conexao, "uid=" . $login . ",ou=usuarios,dc=riogrande,dc=local", $password);
                        ldap_close($conexao);
                    }

                    $remember = (bool) $this->input->post('remember');

                    if ($ldap_val) {
                        $this->ion_auth->set_session($user);
                        $this->ion_auth->update_last_login($user->id);
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('message', "Usuário e/ou senha incorretos");
                        redirect('auth/login', 'refresh');
                    }
                }
                /* FIM LDAP LOGIN */
                else{                
                    // NO LDAP
                    $remember = (bool) $this->input->post('remember');

                    if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                    {
                        if ( ! $this->ion_auth->is_admin())
                        {
                            $this->session->set_flashdata('message', $this->ion_auth->messages());
                            redirect('/', 'refresh');
                        }
                        else
                        {
                            // Data 
                            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                            // Load Template 
                            //$this->template->auth_render('auth/choice', $this->data);

                            redirect('admin');
                        }
                    }
                    else
                    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect('auth/login', 'refresh');
                    }
                }
            }
            /* FIM FORM VALIDATION */
            else
            {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                
                if($this->auth_mode == 'LDAP'){                    
                    $this->data['identity'] = array(
                        'name'        => 'identity',
                        'id'          => 'identity',                       
                        'type'        => 'text',
                        'value'       => $this->form_validation->set_value('identity'),
                        'class'       => 'form-control',
                        'placeholder' => lang('auth_your_email')
                    );
                }
                else{
                    $this->data['identity'] = array(
                        'name'        => 'identity',
                        'id'          => 'identity',
                        'type'        => 'email',                       
                        'value'       => $this->form_validation->set_value('identity'),
                        'class'       => 'form-control',
                        'placeholder' => lang('auth_your_email')
                    );
                }

                $this->data['password'] = array(
                    'name'        => 'password',
                    'id'          => 'password',
                    'type'        => 'password',
                    'class'       => 'form-control',
                    'placeholder' => lang('auth_your_password')
                );

                /* Load Template */
                $this->template->auth_render('auth/login', $this->data);
            }
        }
        else
        {
            redirect('/', 'refresh');
        }
    }

    function logout($src = NULL)
	{
        $logout = $this->ion_auth->logout();

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        if ($src == 'admin')
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
    }
    
    function newuser()
    {   
        $this->newusers = false;
        if (!$this->newusers)
        {          
            redirect('auth/login', 'refresh');
        }

        /* Validate form input */
		$this->form_validation->set_rules('nomecompleto', 'Nome Completo', 'required');
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
       
        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('message', 'Item de Menu atualizado');

        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            
            $this->session->set_flashdata('message', 'Item de Menu atualizado');

            $this->data['nomecompleto'] = array(
                'name'        => 'nomecompleto',
                'id'          => 'nomecompleto',                       
                'type'        => 'text',
                'value'       => $this->form_validation->set_value('nomecompleto'),
                'class'       => 'form-control',
                'placeholder' => 'Nome Completo'
            );

            $this->data['cpf'] = array(
                'name'        => 'cpf',
                'id'          => 'cpf',                       
                'type'        => 'text',
                'value'       => $this->form_validation->set_value('cpf'),
                'class'       => 'form-control',
                'placeholder' => 'CPF'
            );

            $this->data['email'] = array(
                'name'        => 'email',
                'id'          => 'email',                       
                'type'        => 'text',
                'value'       => $this->form_validation->set_value('email'),
                'class'       => 'form-control',
                'placeholder' => 'E-Mail'
            );

            $this->data['email2'] = array(
                'name'        => 'email2',
                'id'          => 'email2',                       
                'type'        => 'text',
                'value'       => $this->form_validation->set_value('email2'),
                'class'       => 'form-control',
                'placeholder' => 'E-Mail Confirmar'
            );

            $this->data['password'] = array(
                'name'        => 'password',
                'id'          => 'password',
                'type'        => 'password',
                'class'       => 'form-control',
                'placeholder' => 'Password'
            );

            $this->data['password2'] = array(
                'name'        => 'password2',
                'id'          => 'password2',
                'type'        => 'password2',
                'class'       => 'form-control',
                'placeholder' => 'Password Confirmar'
            );
           
            /* Load Template */
            $this->template->auth_render('auth/newuser', $this->data);        
        }        
	}

}