<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        
        function generateRandomString($length = 12) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
        
        include ('includes/head.php');
        $sql = "SELECT * FROM `user` WHERE id= '" . $user_id . "'";
        $result = mysqli_query($link, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
            $abonnement = $rows['abonnement'];
        }
            $api = generateRandomString();
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
                                Alarm toevoegen
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
<?php if (isset($_GET['succes'])) { ?>
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
<?php } ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Alarm toevoegen
                                </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <?php
if ($abonnement == 0) {
    $sql = "SELECT * FROM sensor WHERE user_id = '" . $user_id . "'";
    $result = mysqli_query($link, $sql);
    $row_cnt = $result->num_rows;
} else { $row_cnt = 0;}
    if ($row_cnt > 0) { ?>
        <div class="col-lg-6">
            <p>Op dit moment kan u niet meer dan 1 alarm toevoegen. Schaf een premium account aan om een onbeperkt aantal alarms toe te voegen en gebruik te maken van de SMS functie. De prijs van een premium abonnement is &euro; 7,50 per maand. Wij schrijven met een automatische incasso dit bedrag maandelijks af van het bij ons bekende IBAN nummer.</p><br/>
            <a href="premium-abonnement-aanschaffen.php" class="btn btn-default green">Premium abonnement aanschaffen</a>    
                                            </div>
   <?php } else { 
    ?>
                                            <div class="col-lg-6">
                                                <form action="controllers/alarm-toevoegen.php" method="POST" role="form">
                                                    <div class="form-group">
                                                        <label>Naam / locatie</label>
                                                        <input type="text" name ="naam" required="required" value="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>API KEY</label>
 <input type="hidden" name ="api" value="<?php echo $api; ?>">

                                                        <input type="text" disabled="disabled" name ="apikey" value="<?php echo $api; ?>" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-default green">Toevoegen</button>
                                                </form>
                                            </div>
<?php } ?>
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