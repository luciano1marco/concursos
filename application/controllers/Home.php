<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct() {
        parent::__construct();
        // Carrega helper  
        $this->load->helper('configuracao');
        $this->load->helper('utilidades'); 
                    
    }
	public function index($at = null) {      
       
        /* Os dados da Model aqui*/
            $dados = array(
                array('id' =>1, 'nome' => 'Arroz'),
                array('id' =>2, 'nome' => 'Feijão'),
                array('id' =>3, 'nome' => 'Massa'),
            );
           
        // pessoas
        $this->data['pessoa'] = R::findAll("pessoas");

         // dados do menu estagio
        $sql1 = "SELECT * FROM menuestagio as me
				inner join arquivosestagio as ae
				on ae.idmenu = me.id";

		$this->data['menuarquivo'] = R::getAll($sql1);	 
        $this->data['menuestagio'] = R::findAll("menuestagio");

        //select teste
        if($at == null){$teste = " order by num asc";}      //todos
        if($at == "a") {$teste = " where ativo = 1 ";}      //ativos
        if($at == "i") {$teste = " where ativo = 0";}       //inativos
        if($at == 1)   {$teste = " where con.titulo = 1";}  //ps simplificado
        if($at == 2)   {$teste = " where con.titulo = 2";}  //ps estagiario
        if($at == 3)   {$teste = " where con.titulo = 3";}  //concurso publico
        if($at == 4)   {$teste = " where con.titulo = 4";}  //ps interno
        
        $sql ="SELECT dep.sigla as descdep,
                        dep.descricao as descdesc,
                        ti.sigla as siti,
                        ti.descricao as desctitulo,
                        con.id as idcon,
                        subtitulo,responsavel,empresa,link,criador, ativo,num,ano,data_p,data_e
                FROM `concursos` as con
                inner join titulos as ti
                on con.titulo = ti.id
                inner join departamentos as dep
                on con.departamento = dep.id 
                ".$teste;

        $this->data['conhome'] = R::getAll($sql);	     
        
        //------modulos----------
       $this->data['modulo_meiogeral'] = $this->load->view('public/includes/meiogeral.php', $this->data, TRUE);
       $this->data['modulo_menu'] = $this->load->view('public/includes/menu.php', $this->data, TRUE);	
       $this->data['modulo_meio'] = $this->load->view('public/includes/meio.php', $this->data, TRUE);	
       $this->data['dados'] = $dados;

        /* Load Template */
        $this->template->public_render('public/home', $this->data);
    }
    public function mostrar($id) {
        // pessoas
        // $this->data['pessoa'] = R::findAll("pessoas");
        // concursos
        $this->data['p'] = R::findAll("concursos");

        /* -- chama concursos pelo id  --------------------------------------- */
        $concurso = R::load('concursos', $id);
        //$this->data['p'] = $concurso;

        $sqlmostra = "SELECT dep.sigla as descsigla,
                            dep.descricao as descdep,
                            ti.descricao as desctitulo,
                            con.id as idcon,
                            subtitulo,responsavel,empresa,link,criador, ativo,num,ano,data_p,data_e

            FROM `concursos` as con

            inner join titulos as ti
            on con.titulo = ti.id

            inner join departamentos as dep
            on con.departamento = dep.id

            where con.id =".$id;

        $this->data['conmostra'] = R::getAll($sqlmostra);	 


        /* -- chama responsavel da tabela users ------------------------------- */
        $this->data['usuario'] = R::load('users', $concurso->responsavel);

        /* -- select para busar etapas --------------------------------------- */
        $sql = "select  e.id, e.titulo,t.descricao as descrit, e.tipo, s.descricao, u.username, 
                           dataini, datafim, e.status, e.responsavel
                    from etapas as e 
                  
                    inner join tipos t
                    on e.tipo = t.id
        
                    inner join users u
                    on e.responsavel = u.id

                    inner join status s
                    on e.status = s.id
                    
                    where e.con_et = " . $id;
        //$this->data['etapa']= R::getAll($sql); 

        $etapas = array();
        // arquivos etapas--------------------------------------------------
        $ae = R::getAll($sql);
        foreach ($ae as $a) {
            $a['arquivos'] = R::findAll('arquivosetapas', 'etapa = ' . $a['id']);
            $etapas[] = $a;
        }
        $this->data['etapa'] = $etapas;

        /* -- Busca areas do concurso pelo id do concurso--------------------- */
        $asql = " select a.descricao 
                     from areas a

                    inner join concarea ca 
                    on a.id = ca.area

                    inner join concursos c
                    on ca.conc = c.id

                    where ca.conc = " . $id;

        $this->data['ar'] = R::getAll($asql);

        $this->load->view('public/_templates/header', $this->data);
        $this->load->view('public/_templates/menu', $this->data);
        $this->load->view('public/mostrar', $this->data);
        $this->load->view('public/_templates/footer', $this->data);
    }
    public function createPessoas() {

        /* Load */
        //$this->load->config('admin/dp_config');
        $this->load->config('common/dp_config');

        /* Data */
        $this->data['cpf'] = $this->config->item('cpf');
        $this->data['nome'] = $this->config->item('nome');
        $this->data['email'] = $this->config->item('email');
        $this->data['telefone'] = $this->config->item('telefone');
        $this->data['senha'] = $this->config->item('senha');
        
        /* Valid form */
        //$this->form_validation->set_rules('identity', 'Identity', 'required');
        //if ($this->form_validation->run() == TRUE) {
        if (count($this->input->post()) > 0) {
            //--- carrega a variavel $pessoa com objeto
            $pessoa = R::dispense('pessoas');

            $pessoa->cpf = $this->input->post('cpf');
            $pessoa->nome = $this->input->post('nome');
            $pessoa->email = $this->input->post('email');
            $pessoa->telefone = $this->input->post('telefone');
            $pessoa->senha = $this->input->post('senha');
            $pessoa->senha = md5($pessoa->senha);

            R::store($pessoa);
            redirect('./', 'refresh');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['nome'] = array(
                'name' => 'nome',
                'id' => 'nome',
                'type' => 'text',
                'value' => $this->form_validation->set_value('nome'),
                'class' => 'form-control',
                'placeholder' => "Digite seu Nome Completo",
                'required' => 'required'
            );

            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'email',
                'value' => $this->form_validation->set_value('email'),
                'class' => 'form-control',
                'placeholder' => "Digite seu e-mail",
                'required' => 'required'
            );
            $this->data['cpf'] = array(
                'name' => 'cpf',
                'id' => 'cpf',
                'type' => 'int',
                'value' => $this->form_validation->set_value('cpf'),
                'class' => 'form-control',
                'placeholder' => "Digite seu cpf",
                'required' => 'required'
            );
            $this->data['telefone'] = array(
                'name' => 'telefone',
                'id' => 'telefone',
                'type' => 'int',
                'value' => $this->form_validation->set_value('telefone'),
                'class' => 'form-control',
                'placeholder' => "Digite seu Telefone",
                'required' => 'required'
            );
            $this->data['senha'] = array(
                'name' => 'senha',
                'id' => 'senha',
                'type' => 'password',
                'value' => $this->form_validation->set_value('senha'),
                'class' => 'form-control',
                'placeholder' => "Digite sua Senha",
                'required' => 'required'
            );
            /* Load Template */
            $this->template->auth_render('public/createPessoas', $this->data);
        }
    }
    public function login(){

        /* Load */
        //$this->load->config('admin/dp_config');
        $this->load->config('common/dp_config');

        /* Data */
        $this->data['usuario'] = $this->config->item('email');
        $this->data['senha'] = $this->config->item('senha');
        
        if (count($this->input->post()) > 0) {
            
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $senha = md5($senha);
            //criar aqui o teste para verificar senha e email
           // $pessoa = R::findAll("pessoas");

           // busca no banco se tem email e senha que o usuario digitou
            $user = R::find("pessoas", "email = '{$email}' and senha = '{$senha}'");

            if (count($user) > 0) {
                $user = array_pop($user);//tira array de array
                $id = $user['id'];
                header('Location: ./candidatoarea/'.$id);
           
            }else{
                header('Location: ./login/'); 
            }
            
            
        } else {
                $this->data['email'] = array(
                    'name' => 'email',
                    'id' => 'email',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('email'),
                    'class' => 'form-control',
                    'placeholder' => "Digite seu Usuario (email) ",
                    'required' => 'required'
                );
                $this->data['senha'] = array(
                    'name' => 'senha',
                    'id' => 'senha',
                    'type' => 'password',
                    'value' => $this->form_validation->set_value('senha'),
                    'class' => 'form-control',
                    'placeholder' => "Digite sua senha",
                    'required' => 'required'
                );
    
                $this->template->auth_render('public/login', $this->data);  
        }      
    }
    public function candidatoarea($id){
        
        $this->data['modulo_menu'] = $this->load->view('public/includes/menu.php', $this->data, TRUE);	
      
        // dados candidatoarea
        $this->data['cand'] = R::load('pessoas', $id);
        $this->data['areaint'] = R::findAll('areas');
        //dados da senha
        $altsenha = R::load("pessoas",$id);
       
        //dados areas selecionadas pelo candidato
        $sql1 = "SELECT a.descricao,ac.idarea 
                FROM areacandidato as ac

                inner join areas as a
                on a.id = ac.idarea
            
                where ac.idcand =".$id;

        $this->data['areacand']= R::getAll($sql1);      
        //dados historico de interesse
        $sql= "SELECT  Distinct(ti.descricao), con.num,con.ano,con.ativo,con.id 
        from concursos as con
        
        inner join titulos as ti
        on ti.id = con.titulo 
        
        inner join concarea as cona
        on cona.conc = con.id
        
        inner join areas as ar
        on ar.id = cona.area
        
        inner join areacandidato as arcand
        on arcand.idarea = ar.id
        
        inner join pessoas as pes
        on pes.id = arcand.idcand
        
        where pes.id = ".$id; 
        $this->data['historico']= R::getAll($sql);  
       
        $this->data['idarea'] = array(
            'name'  => 'idarea',
            'id'    => 'idarea',
            'type'  => 'checkbox',
            'options'  => $this->getAreas(),
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('idarea'),
                    
        );
        $this->data['senha'] = array(
            'name'  => 'senha',
            'id'    => 'senha',
            'type'  => 'password',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('senha'),
        );
        $this->data['confirmarsenha'] = array(
            'name'  => 'confirmarsenha',
            'id'    => 'confirmarsenha',
            'type'  => 'password',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('confirmarsenha'),
        );

        $this->load->view('public/_templates/header', $this->data);
        $this->load->view('public/_templates/menu', $this->data);
        $this->load->view('public/candidatoarea', $this->data);
        $this->load->view('public/_templates/footer', $this->data);
    }
    public function getAreas() {
        $tipo = R::findAll("areas");
		foreach ($tipo as $e) {
			$options[$e->id] = $e->descricao;
                      
		}
		return $options;
    }
    public function createcandidatoarea($id){
      /* Load */
        //$this->load->config('admin/dp_config');
        $this->load->config('common/dp_config');

        /* Data */
        $this->data['idarea'] = $this->config->item('idarea');
        
        if (count($this->input->post()) > 0) {
            
             $areas = $this->input->post('idarea');  
             foreach ($areas as $row){
                 $ca = R::dispense("areacandidato");
                 $ca->idcand = $id;
                 $ca->idarea = $row;
                 R::store($ca);
             } 
            redirect('./home/candidatoarea/'.$id, 'refresh');
       
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            
            $this->data['idarea'] = array(
				'name'  => 'idarea',
				'id'    => 'idarea',
				'type'  => 'checkbox',
				'options'  => $this->getAreas(),
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('idarea'),
                       
			);
           
            /* Load Template */
            $this->template->auth_render('public/candidatoarea', $this->data);
        }
	}  
    public function deletcandidatoarea($id){
       
        if (count($this->input->post()) > 0) {
            $idarea = $this->input->post('iddel'); 
               
            foreach($idarea as $ida){
              $books = R::find("areacandidato","idarea = '{$ida}' and idcand = '{$id}'");        
              $books = array_pop($books);
            
              R::trash($books);    
            }
          
        }
        redirect('./home/candidatoarea/'.$id, 'refresh');
       
    }  
    public function editpessoas($id){
        $id = (int) $id;

         /* Load */
        //$this->load->config('admin/dp_config');
        $pessoa = R::load("pessoas", $id);

        $this->data['id'] = $id;

       $this->form_validation->set_rules('identity', 'Identity', 'required');
        //if ($this->form_validation->run() == TRUE) {
        if (count($this->input->post()) > 0) {
            //--- carrega a variavel $pessoa com objeto
            //$pessoa = R::dispense('pessoas');
            $pessoa = R::load("pessoas", $id);

            $pessoa->cpf = $this->input->post('cpf');
            $pessoa->nome = $this->input->post('nome');
            $pessoa->email = $this->input->post('email');
            $pessoa->telefone = $this->input->post('telefone');
            
            R::store($pessoa);
            redirect('home/candidatoarea/'.$id, 'refresh');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['nome'] = array(
                'name'  => 'nome',
                'id'    => 'nome',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $pessoa->nome
            );
    
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $pessoa->email
            );
            $this->data['cpf'] = array(
                'name'  => 'cpf',
                'id'    => 'cpf',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $pessoa->cpf
            );
            $this->data['telefone'] = array(
                'name'  => 'telefone',
                'id'    => 'telefone',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $pessoa->telefone
            );


            /* Load Template */
            $this->template->auth_render('public/editpessoas', $this->data);
        }
    }
    public function alterarsenha($id){
      
        $altsenha = R::load("pessoas",$id);
        
        if (count($this->input->post()) > 0) {
            
            $altsenha = R::load("pessoas",$id);
             
            $altsenha->senha = $this->input->post('senha');
            $altsenha->confirmarsenha = $this->input->post('confirmarsenha');
            if($altsenha->senha == $altsenha->confirmarsenha){
                $altsenha->senha = md5($altsenha->senha);
                $altsenha->confirmarsenha= md5($altsenha->confirmarsenha);
                
                R::store($altsenha);
                redirect('./home/candidatoarea/'.$id, 'refresh');
            
            }else{
                header('Location: ./login/'); 
            }
        } 
        header('Location: ./candidatoarea/'.$id);
    }
    function esqueciminhasenha(){
        /* Load */
        $this->load->config('common/dp_config');

       
        if (count($this->input->post()) > 0) {
            $username = $this->input->post("email");

            $existe = R::find('pessoas', "email = '{$username}'");

            if (count($existe) == 1) {
                $usuario = array_pop($existe);
                $id = $usuario->id;
                //cria uma nova senha
                $novasenha = $this->geraNovaSenha();
                //chama o id do email enviado
                $altsenha = R::load("pessoas",$id);
                //pega a nova senha gerada                
                $altsenha->senha = md5($novasenha); 
                
                //grava no banco a nova senha
                R::store($altsenha);
               //envia email 
                $this->configEmail();
                $this->email->from('no-reply@riogrande.rs.gov.br');
                $this->email->to($this->input->post("email"));

                //$this->email->to("matheus.cezar@riogrande.rs.gov.br");
                $this->email->subject('Concursos - Nova Senha');
                $corpoemail = "
                            Olá!<br /><br />
                            Sua senha foi alterada!<br /><br />
                            Para acessar o sistema utilize seu e-mail e a senha abaixo:<br />
                            {$novasenha}<br /><br />
                            Att.";
                $this->email->message($corpoemail);
                $this->email->send();
            }
            
            $this->data['message'] = "<p class='alert alert-success'>Tudo certo! Se seu e-mail está cadastrado, lhe encaminhamos uma mensagem com uma nova senha temporaria. Click em cancelar para voltar </p>";
            //redirect('./home//', 'refresh');
           
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');  
        }

        $this->data['email'] = array(
            'name'        => 'email',
            'id'          => 'email',
            'type'        => 'text',
            'value'       => $this->form_validation->set_value('email'),
            'class'       => 'form-control',
            'placeholder' => "Digite seu e-mail aqui",
            'required' => 'required'
        );

        /* Load Template */
        $this->template->auth_render('public/esqueciminhasenha', $this->data);
        
    }
    private function geraNovaSenha() {
        $caracteres = 'abcdefghijklmnopqrstuvwxyz12345678901234567890';
        $senha = array(); 
        $tamLista = strlen($caracteres) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $c = rand(0, $tamLista);
            $senha[] = $caracteres[$c];
        }
        return implode($senha);
    }
    private function configEmail() {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_host'] = 'mail.riogrande.rs.gov.br';
        $config['smtp_user'] = 'no-reply@riogrande.rs.gov.br';
        $config['smtp_pass'] = 'd3vn0reply!';
        $config['smtp_port'] = '465';
        $this->email->initialize($config);
    }

    }//fim da classe