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
                                Alarm overzicht
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
                                            Alarm overzicht 
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Alarm ID</th>
                                                            <th>Naam klant</th>
                                                            <th>Klant e-mail</th>
                                                            <th>Klant woonplaats</th>
                                                       
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM sensor ORDER BY id DESC";
                                                        $result = mysqli_query($link, $sql);
                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                            
                                                       
                                                        $sql2 = "SELECT * FROM user WHERE id = '" . $rows['user_id'] . "'";
                                                        $result2 = mysqli_query($link, $sql2);
                                                        while ($rows2 = mysqli_fetch_assoc($result2)) { 
                                                           $naam = $rows2['name']; 
                                                           $email_klant = $rows2['email']; 
                                                           $woonplaats = $rows2['woonplaats']; 
                                                        }
                                                        
                                                        ?>
                                                            
                                                            
                                                         
                                                            <tr class="gradeU">
                                                                <td style='padding: 3px; font-size: 11px;'><?php echo $rows['id'];?></td>
                                                              <td style='padding: 3px; font-size: 11px;'><?php echo $naam;?></td>
                                                              <td style='padding: 3px; font-size: 11px;'><?php echo $email_klant;?></td>
                                                              <td style='padding: 3px; font-size: 11px;'><?php echo $woonplaats;?></td>
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