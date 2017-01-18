<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include ('includes/head.php');
        $sql = "SELECT * FROM `user` WHERE id= '" . $user_id . "'";
        $result = mysqli_query($link, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
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
                                    Gefeliciteerd
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
                                        Gefeliciteerd, u heeft een premium abonnement
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                Gefeliciteerd! U bent nu in het bezit van het premium abonnement. U heeft nu de mogelijkheid om meerdere alarms toe te voegen en gebruik te maken van de SMS functie.<br/><br/>
                                                <a href="alarm-toevoegen.php" class="btn btn-default green">Voeg alarm toe</a>&nbsp;&nbsp;<a href="wijzig-gebruiker.php" class="btn btn-default green">Activeer SMS functie</a>
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
    <?php } ?>

</html>