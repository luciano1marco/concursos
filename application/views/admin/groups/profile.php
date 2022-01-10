<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1>Grupos de segurança</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fa fa-tachometer-alt"></i> Painel Principal</a></li>
                        <li class="breadcrumb-item">Usuários</li>
                        <li class="breadcrumb-item active"><?php echo $this->router->fetch_method(); ?></li>				
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tbody>               

                        <?php echo form_hidden('id', $groups->id);?>

                        <?php if(isset($groups->id) && isset($groups->name) ): ?>    
                        
                        <?php
                        $name = htmlspecialchars($groups->name, ENT_QUOTES, 'UTF-8');
                        $description = htmlspecialchars($groups->description, ENT_QUOTES, 'UTF-8');
                        $bgcolor = htmlspecialchars($groups->bgcolor, ENT_QUOTES, 'UTF-8');
                        ?>                                                                    
                            <tr>
                                <th><?php echo 'Nome do Grupo'; ?></th>
                                <td><?php echo $name; ?></td>                                   
                            </tr>                        
                            <tr>
                                <th><?php echo 'Descrição do Grupo'; ?></th>
                                <td><?php echo $description; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo 'Cor do Grupo'; ?></th>                                   
                                <td><i class="fa fa-stop" style="color:<?php echo $bgcolor; ?>"></i></td>
                            </tr>                           
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            
                <div class="card-footer">            
                </div>
                
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->