<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include ('includes/head.php');
        $api = mysqli_real_escape_string($link, $_GET['id']);
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
                                    Alarm aangemaakt gelukt
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
                                        Alarm aangemaakt gelukt
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p>U heeft nu een alarm toegevoegd met de API KEY:</p>
                                                <p><strong style="letter-spacing: 2px; font-size: 26px; font-family: monospace;"><?php echo $api;?></strong></p>
                                                <p>In het alarmsysteem kan u kiezen voor de optie 'koppelen alarmsysteem'. 
                                                 Voer hier de API KEY in en klik op 'Opslaan'.</p>
                                               <br/><br/> <a href="alarms-beheren.php" class="btn btn-default green">Ga naar alarmoverzicht</a>
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