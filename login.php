<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Alarmsysteem</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body style="background: #000;">
  <div class="login-page">
  <div class="form">
      <img src="assets/img/logo-rondje.png" width="150px">
      <p style="color: red;"><?php if (isset($_GET['fail'])) { echo 'Onjuiste velden, probeer opnieuw'; } 
 if (isset($_GET['email'])) { echo 'Er bestaat al een account met dit e-mailadres'; } 
 if (isset($_GET['iban'])) { echo 'Er bestaat al een account met dit IBAN nummer'; } 
 if (isset($_GET['telefoon'])) { echo 'Er bestaat al een account met dit telefoon nummer'; }?>
</p>
<p style="color: green;"><?php if (isset($_GET['succes'])) { echo 'Aanmaken van account is gelukt!'; }?></p>
    <form method="POST" action="controllers/account-aanmaken.php" class="register-form">

        <input type="text" name="name" required="required" placeholder="Naam en achternaam"/>
      <input type="text" name="telefoon" placeholder="Telefoonnummer"/>
      <input type="email" name="email"  required="required" placeholder="E-mailadres"/>
      <input type="text" name="adres"  required="required" placeholder="Adres + huisnr"/>
      <input type="text" name="woonplaats" required="required"  placeholder="Woonplaats"/>
      <input type="text" name="postcode" maxlength="6" required="required"  placeholder="Postcode"/>
      <input type="text" name="iban"  required="required"  placeholder="IBAN nummer"/>
      <input type="password" name="password" required="required"  placeholder="Wachtwoord"/>
      <label style="font-family: 'Roboto'"><input type="checkbox" name="premium"> Ja, ik wil gebruik maken van de SMS functie en een onbeperkt aantal alarms installeren voor &euro; 7,50 per maand.</label>
      <br/><br/><button>Registreer</button>
      <p class="message">Bent u al geregistreerd? <a href="#">Log in</a></p>
    </form>
      <form method="POST" action="controllers/login.php" class="login-form">
          <p style="color: red;"><?php if (isset($_GET['wrong'])) { echo 'Onjuiste combinatie van gebruikersnaam en wachtwoord'; }?></p>
          <input type="email" required="required" name="username" placeholder="E-mailadres"/>
      <input type="password" required="required" name="password" placeholder="Wachtwoord"/>
      <button type="submit">Login</button>
      <p class="message">Niet geregistreerd? <a href="#">Maak een account aan</a></p>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
