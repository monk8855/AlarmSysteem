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
                                Alarms beheren
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
                                            Uw alarmlocaties <a href="alarm-toevoegen.php" style="float: right;">+ Alarm toevoegen</a>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Sensor API</th>
                                                            <th>Naam / locatie</th>
                                                            <th>Wijzig naam / locatie</th>
                                                            <th>Verwijder</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `sensor` WHERE user_id= '" . $user_id . "'";
                                                        $result = mysqli_query($link, $sql);
                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr class="gradeU">
                                                                <td><?php echo $rows['id'];?></td>
                                                                <td><?php echo $rows['locatie']; ?></td>
                                                                <td style="text-align: center;"><a href="wijzig-alarm.php?id=<?php echo $rows['id'];?>"><i style="font-size: 30px;" class="fa fa-edit" aria-hidden="true"></i></a></td>
                                                                <td style="text-align: center;"><a onclick="return confirm('Weet u zeker dat u dit alarm wilt verwijderen?')" href="controllers/verwijder-alarm.php?id=<?php echo $rows['id'];?>"><i style="font-size: 30px;" class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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