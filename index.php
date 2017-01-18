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
                                            Uw overzicht 
                                            <?php if (!isset($_GET['alles'])) {?><a style="float: right;" href="index.php?alles">Bekijk inclusief verborgen items</a><?php } else { ?>
                                        <a style="float: right;" href="index.php">Bekijk exclusief verborgen items</a>
                                            <?php } ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Locatie</th>
                                                            <th>Tijd</th>
                                                            <th><?php if (!isset($_GET['alles'])) { echo 'Alleen zichtbare items'; } else { echo 'Alle items'; }?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (isset($_GET['alles'])) {
                                                        $sql = "SELECT sensor.id, sensor.user_id, sensor.locatie, alarm_overzicht.id AS alarm_overzicht_id, alarm_overzicht.sensor_id, alarm_overzicht.tijd, alarm_overzicht.verberg FROM sensor, alarm_overzicht WHERE alarm_overzicht.sensor_id = sensor.id AND sensor.user_id= '" . $user_id . "' GROUP BY alarm_overzicht.id ORDER BY alarm_overzicht.id DESC";
                                                        }
                                                        else {
                                                         $sql = "SELECT sensor.id, sensor.user_id, sensor.locatie, alarm_overzicht.id AS alarm_overzicht_id, alarm_overzicht.sensor_id, alarm_overzicht.tijd, alarm_overzicht.verberg FROM sensor, alarm_overzicht WHERE alarm_overzicht.sensor_id = sensor.id AND sensor.user_id= '" . $user_id . "' AND alarm_overzicht.verberg = 0 GROUP BY alarm_overzicht.id ORDER BY alarm_overzicht.id DESC";
                                                        }                                                        
                                                        $result = mysqli_query($link, $sql);
                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr class="gradeU">

                                                                <td><?php echo $rows['locatie']; ?></td>
                                                                <td><?php echo $rows['tijd']; ?></td>

                                                        <td style="text-align: center;"><a href="controllers/verbergen.php?id=<?php echo $rows['alarm_overzicht_id'];?>&verberg=<?php echo $rows['verberg'];?>"><i  style="font-size: 30px;" class="fa fa-eye<?php if ($rows['verberg'] == 1) { echo '-slash'; }?>" aria-hidden="true"></i></a></td>
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