<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include ('includes/head.php');
        if($_SESSION['abonnement'] != 2) { 
           redirect('login.php?wrong');
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
                                Klanten overzicht
                            </h1>
                            <div class="row">
                                <div class="col-md-12">
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
                                            Klanten overzicht 
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Naam</th>
                                                            <th>Tel.</th>
                                                            <th>E-mail</th>
                                                            <th>Adres</th>
                                                            <th>Woonplaats</th>
                                                            <th>Postcode</th>
                                                            <th>IBAN</th>
                                                            <th>Abonnement</th>
                                                            <th>Alarms</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `user` WHERE abonnement != '2'";
                                                        $result = mysqli_query($link, $sql);
                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr class="gradeU">
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['name'];?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['telefoon']; ?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['email']; ?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['adres']; ?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['woonplaats']; ?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['postcode']; ?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['iban']; ?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php if($rows['abonnement'] == 1) { echo 'Premium'; } else { echo 'Basic';} ?></td>
                                                                <td style='padding: 3px; font-size: 11px;'><?php
                                                                $sqlcheck = "SELECT * FROM sensor WHERE user_id = '" . $rows['id'] . "'";
    $resultcheck = mysqli_query($link, $sqlcheck);
    echo $row_cnt = $resultcheck->num_rows;
                                                                ?></td>
                                                                <td style="text-align: center;"><a onclick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?')" href="controllers/verwijder-gebruiker.php?id=<?php echo $rows['id'];?>"><i style="font-size: 18px;" class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                                            </tr>
<?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
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