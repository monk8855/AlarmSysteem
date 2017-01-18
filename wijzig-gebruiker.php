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
                                    Gebruiker wijzigen
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
                                        Wijzig gebruiker <?php if ($rows['abonnement'] == 1) { ?> <a style='float: right;' href='abonnement-stoppen.php'>Ik wil mijn premium account stoppen</a> <?php } ?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form action="controllers/wijzig-gebruiker.php" back="wijzig-gebruiker.php" method="POST" role="form">
                                                    <div class="form-group">
                                                        <label>Naam</label>
                                                        <input type="text" name ="naam" value="<?php echo $rows['name']; ?>" class="form-control">
                                                    </div>
                                                    <?php if ($rows['abonnement'] == 1) { ?>
                                                    <div class="form-group">
                                                        <label>Telefoonnummer voor SMS functie</label>
                                                        <input name="telefoon" type="text"  value="<?php echo $rows['telefoon']; ?>" class="form-control">
                                                    </div>
                                                    <?php } else { ?>
                                                    <p style="color: red;">Om gebruik te maken van de SMS functie dient u een premium abonnement te hebben.</p>
                                                    <a href="premium-abonnement-aanschaffen.php" class="btn btn-default green">Premium abonnement aanschaffen</a><br/><br/><br/>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label>E-mailadres / gebruikersnaam</label>
                                                        <input name="email" readonly type="email" value="<?php echo $rows['email']; ?>"  class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adres</label>
                                                        <input type="text" name="adres" value="<?php echo $rows['adres']; ?>"  class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Woonplaats</label>
                                                        <input name="woonplaats" type="text" value="<?php echo $rows['woonplaats']; ?>"  class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postcode</label>
                                                        <input type="text" name="postcode"  value="<?php echo $rows['postcode']; ?>" maxlength="6" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>IBAN rekeningnummer</label>
                                                        <input type="text" name="iban" value="<?php echo $rows['iban']; ?>" required="required" maxlength="34" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Wachtwoord voor gebruiker: <?php echo $rows['username']; ?></label>
                                                        
                                                            <input name="password" type="password"  class="form-control">
                                                            <p class="help-block">Wachtwoord leeglaten om niet te wijzigen</p>
                                                    </div>
                                                    <button type="submit" class="btn btn-default green">Opslaan</button>
                                                </form>
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