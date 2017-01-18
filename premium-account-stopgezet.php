<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include ('includes/head.php');
            ?>
        </head>
        <body>
            <div id="wrapper">
                <?php
                include ('includes/header.php');
                ?>
                <div id="page-wrapper">
                    <div id="page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="page-header">
                                    Premium abonnement stoppen
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if (isset($_GET['succes'])) {?>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        Uw handeling is succesvol geslaagd
                                    </div>
                                </div>
                                <?php } elseif (isset($_GET['wrong'])) { ?>
                                           <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        Uw handeling is mislukt. Probeer opnieuw of neem contact op met de beheerder.
                                    </div>
                                </div>         
                                              <?php  } ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       Premium abonnement stoppen
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p>Wij hebben uw abonnement gewijzigd naar basic. U kan er uiteraard altijd voor kiezen weer een premium abonnement aan te schaffen.</p>
                                                <br/><br/> <a href="alarms-beheren.php" class="btn btn-default green">Naar alarm overzicht</a>
                       </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
                        <?php
                        include ('includes/footer.php');
                        ?>	
                    </div>
                </div>
            </div>
            <?php
            include ('includes/footer-js.php');
            ?>
        </body>
  

</html>