<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include ('includes/head.php');
        $sql = "SELECT * FROM `user` WHERE id= '" . $user_id . "'";
        $result = mysqli_query($link, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
            $abonnement = $rows['abonnement'];
            $iban = $rows['iban'];
        }
        
            
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
                                   Premium abonnement aanschaffen
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
                                   Premium abonnement aanschaffen
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?php if($abonnement == 1) {
                                                    ?>
                                                <p>U bent al in het bezit van een premium abonnement.</p>
                                                <p>&nbsp;</p>
                                                <a href="javascript:history.back()" class="btn btn-default">Terug</a>
                                                <?php
                                                } else { ?>
                                                <form action="controllers/premium-abonnement-aanschaffen.php" method="POST" role="form">
                                                    <div class="form-group">
                                                        <label>Ik wil een onbeperkt aantal alarms en gebruik maken van de SMS functie voor &euro; 7,50 per maand. Wij schrijven met een automatische incasso dit bedrag maandelijks af van het bij ons bekende IBAN nummer: <?php echo $iban;?></label><br/> <br/>
                                                        <label><input type="checkbox" name="akkoord" class="" required="required"> Ik ga akkoord</label>
                                                    </div>
                                                   <br/> <button type="submit" class="btn btn-default green">Aanschaffen</button>
                                                </form>
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