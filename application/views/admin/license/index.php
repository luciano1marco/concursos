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
                    <h1>License</h1>
                </div>

                <div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="dashboard"><i class="fa fa-tachometer-alt"></i> Painel Principal</a></li>
					<li class="breadcrumb-item">License</li>
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
                <h3 class="card-title"><i class="fa fa-globe"></i> domProjects, Inc.</h3>
                
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card-body">           
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>domProjects, Inc.</strong><br />
                            29 rue Pasteur<br />
                            91380 Chilly-Mazarin<br />
                            France<br />
                            Email: contact@domprojects.com
                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong>John Doe</strong><br />
                            10 rue de Cambrais<br />
                            75010 Paris<br />
                            France<br />
                            Email: john.doe@example.com
                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <p class="well well-sm no-shadow">
                        <b>Order ID:</b> 4F3S8J<br>
                        <b>Payment Due:</b> 2/22/2014<br>
                        <b>Account:</b> 968-34567
                        </p>
                    </div>
                </div>

               <hr/>

                <div class="row">
                    <div class="col-xs-12 table-responsive ">
                        <table id="datatable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Product</th>
                                    <th>Serial #</th>
                                    <th>Description</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>CodeIgniter</td>
                                    <td>100-000-301</td>
                                    <td>Framework</td>
                                    <td>$0.00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Bootstrap</td>
                                    <td>110-000-335</td>
                                    <td>Framework</td>
                                    <td>$0.00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>jQuery</td>
                                    <td>120-000-214</td>
                                    <td>Framework</td>
                                    <td>$0.00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>AdminLTE</td>
                                    <td>130-000-203</td>
                                    <td>Framework</td>
                                    <td>$0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-6">
                        <p class="lead">Payment Methods:</p>

                        <i class="fab fa-cc-paypal text-info" style="font-size:40px;"></i>
                        <i class="fab fa-cc-amex" style="font-size:32px;"></i>
                        <i class="fab fa-cc-mastercard" style="font-size:32px;"></i>
                        <i class="fab fa-cc-visa" style="font-size:32px;"></i>

                        <div class="card card-body bg-light mt-4">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </div>
                        
                    </div>

                    <div class="col-6">
                        <p class="lead">Amount Due 2/22/2014</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Tax (19.6%)</th>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                    </div>
            </div>
           
            <div class="card-footer">            
            </div>
            
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php $x = 0;
if($x):
    ?>
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-globe"></i> domProjects, Inc.</h3>
                                </div>
                                <div class="box-body">

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>domProjects, Inc.</strong><br />
                                29 rue Pasteur<br />
                                91380 Chilly-Mazarin<br />
                                France<br />
                                Email: contact@domprojects.com
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>John Doe</strong><br />
                                10 rue de Cambrais<br />
                                75010 Paris<br />
                                France<br />
                                Email: john.doe@example.com
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <p class="well well-sm no-shadow">
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/22/2014<br>
                            <b>Account:</b> 968-34567
                            </p>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>CodeIgniter</td>
                                        <td>100-000-301</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Bootstrap</td>
                                        <td>110-000-335</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>jQuery</td>
                                        <td>120-000-214</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>AdminLTE</td>
                                        <td>130-000-203</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <p class="lead">Payment Methods:</p>

                            <i class="fa fa-cc-paypal text-info" style="font-size:40px;"></i>
                            <i class="fa fa-cc-amex" style="font-size:32px;"></i>
                            <i class="fa fa-cc-mastercard" style="font-size:32px;"></i>
                            <i class="fa fa-cc-visa" style="font-size:32px;"></i>

                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                        </div>
                        <div class="col-xs-6">
                            <p class="lead">Amount Due 2/22/2014</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (19.6%)</th>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

                </section>
            </div>


<?php endif; ?>