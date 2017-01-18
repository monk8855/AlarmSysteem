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
                                       Premium abonnement stoppen?
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p>Wat jammer dat u het premium abonnement wilt stoppen.</p>
                                                <?php
                                                $sql = "SELECT * FROM sensor WHERE user_id = '" . $user_id . "'";
    $result = mysqli_query($link, $sql);
    $row_cnt = $result->num_rows;
    if ($row_cnt > 1) {
        ?>
                                                <p>In het basic abonnement kan u maximaal 1 alarm installeren. 
                                                    Momenteel heeft u <?php echo $row_cnt;?> alarms. U dient <?php echo $row_cnt-1;?> alarm(s) te verwijderen om uw premium abonnement te stoppen.<br/><br/></p>
                                                <a href="alarms-beheren.php" class="btn btn-default green">Naar mijn alarms overzicht</a>
                                                
                                                <?php
    }
    else {
                                                ?>
                                                <p>U kan voor vragen altijd contact met ons opnemen: <a href='mailto:info@alarmsysteem.nl'>info@alarmsysteem.nl</a></p>
                                                <p>Houd er wel rekening mee dat u maximaal 1 alarm kan installeren en geen gebruik meer kan maken van de SMS functie.</p>
                                                <br/><br/> <a href="controllers/premium-abonnement-stoppen.php" onclick="return confirm('Weet u zeker dat u dit abonnement wilt stopzetten?')" class="btn btn-default red">Ik wil mijn premium abonnement toch stopzetten</a>
    <?php } ?>
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