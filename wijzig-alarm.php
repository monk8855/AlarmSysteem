<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include ('includes/head.php');
        
        if (!isset($_GET['id']))
        {
             redirect('../alarms-beheren.php?wrong');
        }
        else 
        {
        
            $id = mysqli_real_escape_string($link, $_GET['id']);
        $sql = "SELECT * FROM `sensor` WHERE id= '" . $id . "'";
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
                                    Alarm wijzigen
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
                                        Wijzig alarm
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form action="controllers/wijzig-alarm.php" method="POST" role="form">
                                                    <div class="form-group">
                                                        <label>Naam / locatie</label>
                                                        <input type="text" name ="locatie" value="<?php echo $rows['locatie']; ?>" class="form-control">
                                            <input type="hidden" name ="api" value="<?php echo $rows['id']; ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <label>API KEY</label>
                                                        <input type="text" disabled="disabled" value="<?php echo $rows['id']; ?>" class="form-control">
                                                             <p class="help-block">API KEY is niet te wijzigen.</p>
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
        <?php } } ?>

</html>