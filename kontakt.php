<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kosmetik Saydam – Kontakt</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <header>
    <div class="topbar">
      <h1><a href="index.html">Kosmetik Saydam</a></h1>
      <nav>
        <button class="nav-toggle" aria-label="Menü öffnen"><i class="fas fa-bars"></i></button>
        <ul>
          <li><a href="index.html">HOME</a></li>
          <li><a href="leistungen.html">LEISTUNGEN & PREISE</a></li>
          <li><a href="angebote.html">ANGEBOTE</a></li>
          <li><a href="kontakt.php">ONLINE BUCHEN</a></li>
        </ul>
      </nav>
      <div class="socials">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="hero">
      <div class="hero-text">
        <h2>Kontakt</h2>
        <p>Schreiben Sie uns eine Nachricht</p>
      </div>
    </div>
  </header>
  <main>
    <section class="section kontakt-section">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST["name"] ?? '');
        $email = htmlspecialchars($_POST["email"] ?? '');
        $nachricht = htmlspecialchars($_POST["nachricht"] ?? '');
        $behandlung = htmlspecialchars($_POST["behandlung"] ?? '');
        $termin = htmlspecialchars($_POST["termin"] ?? '');
        $uhrzeit = htmlspecialchars($_POST["uhrzeit"] ?? '');
        $flexibel = isset($_POST["flexibel"]) ? "Ja" : "Nein";
        $to = "kosmetiksaydam@hotmail.de"; // <-- Hier geändert!
        $subject = "Neue Kontaktanfrage von $name";
        $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
        $body = "Name: $name\nE-Mail: $email\nBehandlung: $behandlung\nWunschtermin: $termin $uhrzeit\nFlexibel: $flexibel\n\nNachricht:\n$nachricht";
        if (mail($to, $subject, $body, $headers)) {
          // Bestätigung an Kunden
          $customer_subject = "Ihre Anfrage bei Kosmetik Saydam";
          $customer_body = "Liebe/r $name,\n\nvielen Dank für Ihre Nachricht und Ihr Interesse an unseren Leistungen.\n\n"
            . "Wir haben Ihre Anfrage für den $termin um $uhrzeit erhalten und melden uns schnellstmöglich bei Ihnen.\n\n"
            . "Ihre Angaben:\n"
            . "Behandlungsart: $behandlung\n"
            . "Wunschtermin: $termin $uhrzeit\n\n"
            . "Mit freundlichen Grüßen\nKosmetik Saydam";
          $customer_headers = "From: kosmetiksaydam@hotmail.de\r\nReply-To: kosmetiksaydam@hotmail.de\r\nContent-Type: text/plain; charset=UTF-8";
          mail($email, $customer_subject, $customer_body, $customer_headers);

          echo "<div class='form-success'>Vielen Dank für Ihre Nachricht!</div>";
        } else {
          echo "<div class='form-error'>Fehler beim Senden. Bitte versuchen Sie es später erneut.</div>";
        }
      }
      ?>
      <form method="post" action="kontakt.php" class="kontakt-form" autocomplete="on">
        <div class="form-row">
          <div class="form-group">
            <label for="name"><i class="fa fa-user"></i> Ihr Name*</label>
            <input type="text" id="name" name="name" placeholder="Vor- und Nachname" required>
          </div>
          <div class="form-group">
            <label for="email"><i class="fa fa-envelope"></i> Ihre E-Mail*</label>
            <input type="email" id="email" name="email" placeholder="beispiel@email.de" required>
          </div>
        </div>
        <div class="form-group">
          <label for="behandlung"><i class="fa fa-spa"></i> Behandlungsart*</label>
          <select id="behandlung" name="behandlung" required>
            <option value="" disabled selected>Bitte wählen</option>
            <option>Kosmetik</option>
            <option>Med. Fusspflege</option>
            <option>Microblading</option>
            <option>Waxing</option>
            <option>Microdermabrasion</option>
            <option>Fußreflexionsmassage</option>
            <option>Permanent Make-Up</option>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="termin"><i class="fa fa-calendar"></i> Wunschtermin*</label>
            <input type="date" id="termin" name="termin" required>
          </div>
          <div class="form-group">
            <label for="uhrzeit"><i class="fa fa-clock"></i> Uhrzeit*</label>
            <input type="time" id="uhrzeit" name="uhrzeit" required>
          </div>
        </div>
        <div class="form-group form-checkbox">
          <label>
            <input type="checkbox" name="flexibel" value="ja">
            Ich bin beim Termin flexibel
          </label>
        </div>
        <div class="form-group">
          <label for="nachricht"><i class="fa fa-comment"></i> Ihre Nachricht*</label>
          <textarea id="nachricht" name="nachricht" rows="5" placeholder="Ihre Nachricht an uns..." required></textarea>
        </div>
        <div class="form-group form-checkbox">
          <label style="font-size:0.95em;">
            <input type="checkbox" name="datenschutz" required>
            Ich habe die <a href="datenschutzerklaerung.html" target="_blank">Datenschutzerklärung</a> gelesen und akzeptiere sie.*
          </label>
        </div>
        <div class="form-group" style="text-align:center;">
          <button type="submit" class="buchen-btn form-submit-btn">Absenden</button>
        </div>
      </form>
    </section>
  </main>
  <footer>
    <div class="footer-main">
      <p>
        &copy; 2025 Kosmetik Saydam – Alle Rechte vorbehalten
      </p>
      <p class="footer-dev">
        Entwicklung: <a href="https://dein-portfolio-link.de" target="_blank" rel="noopener" title="Portfolio Ugur Hallaclioglu">Ugur Hallaclioglu</a>
      </p>
    </div>
  </footer>
  <script>
    // Mobile Navigation Toggle
    document.querySelector('.nav-toggle').addEventListener('click', function() {
      document.querySelector('nav ul').classList.toggle('open');
    });
  </script>  
</body>
</html>