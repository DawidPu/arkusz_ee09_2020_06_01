<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Organizer</title>
    <link rel="stylesheet" href="styl6.css" />
  </head>
  <body>
    <header>
      <section id="baner1">
        <h2>MÓJ ORGANIZER</h2>
      </section>
      <section id="baner2">
        <form method="post">
          <label for="wpis">Wpis wydarzenia: </label>
          <input type="text" name="wpis" id="wpis" />
          <button type="submit">ZAPISZ</button>
        </form>
        <?php
          $mysqli = new mysqli('localhost', 'root', '', 'egzamin6');

          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wpis = $_POST['wpis'];

            $stmt = $mysqli->prepare("UPDATE zadania SET wpis = ? WHERE dataZadania = '2020-08-27';");
            $stmt->bind_param('s', $wpis);
            $stmt->execute();
            $stmt->close();
          }
        ?>
      </section>
      <section id="baner3">
        <img src="logo2.png" alt="Mój organizer" />
      </section>
    </header>
    <main>
      <?php
        $result = $mysqli->query("SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';");

        while ($row = $result->fetch_assoc()) {
          $dataZadania = $row['dataZadania'];
          $miesiac = $row['miesiac'];
          $wpis = $row['wpis'];

          echo '<div class="wpis">';
          echo "<h6>$dataZadania, $miesiac</h6>";
          echo "<p>$wpis</p>";
          echo '</div>';
        }
      ?>
    </main>
    <footer>
      <?php
        $result = $mysqli->query("SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';");

        $row = $result->fetch_assoc();
        $miesiac = $row['miesiac'];
        $rok = $row['rok'];

        echo "<h1>miesiąc: $miesiac, rok: $rok</h1>";

        $mysqli->close();
      ?>
      <p>Stronę wykonał: 00000000000</p>
    </footer>
  </body>
</html>
