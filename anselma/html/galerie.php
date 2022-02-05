<!DOCTYPE html>
<html>

	<head>
<!--Das charset-Attribut gibt die Zeichenkodierung für das HTML-Dokument.-->
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/des.css" type="text/css" media="all">
<!--Gibt einen Namen für die Metadaten an-->
		 <meta name="viewport" content="width=device-width, initial-scale=1">
<!--Das charset-Attribut gibt die Zeichenkodierung für das HTML-Dokument.-->
<!--Bootstrap ist der beliebteste HTML, CSS und JavaScript-Framework für die Entwicklung von ansprechenden, mobilen-first-Websites.-->
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Anselma</title>
		
	</head>

	<body style="background: #ccff99;">
		
		<div id="header">
			<a class="des" href="../index.html">
				<img class="bild" src="../bilder/logo.png">
				<h1 class="name">Coca Cola</h1>
			</a>
			<div id="nav">

				<ul class="nav">
					
					<li><a href="../index.html">Startseite</a></li>
					<li><a href="news.html">Geschichte</a></li>
					<li><a href="galerie.html">Produkte</a></li>
					<li><a href="bio.html">Lebenslauf</a></li>
					<li><a href="link.html">Impresum</a></li>
					<li><a href="kontakt.html">Kontakt</a></li>

				
				</ul>
				
			</div>
		<div class="div7">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<h3>Name:</h3><br>
		<input type="text" name="name">
  			<br>
  			<h3>Groesse:</h3><br>
  		<input type="text" name="groesse">
  			<br>
  			<h3>ISBN:</h3><br>
  		<input type="text" name="isbn">
			<br>
			<h3>Farbe:</h3><br>
  		<input type="text" name="farbe">
  			<br>
  			<h3>Brands:</h3><br>
  		<input type="text" name="brands">
  			<br><br>
  			<h3>Preis:</h3><br>
  		<input type="text" name="preis">
  			<br><br>
  		<input type="submit" value="Absenden">
  			<br><br>
		</form> 
		</div>
		
		<?php
		if (!isset($_POST["name"])|| !isset($_POST["groesse"])|| !isset($_POST["isbn"]) || !isset($_POST["farbe"])|| !isset($_POST["brands"]) || !isset($_POST["preis"])) {
					echo "<p>Bitte das Formular ausfuellen.</p>";
		}	

		$name = $groesse = $isbn = $farbe = $brands = $preis= "";
//Wenn die REQUEST_METHOD POST ist, dann hat das Formular abgeschickt worden - und es soll überprüft werden.
				
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
//eine Funktion zu erstellen, die für uns alle die Prüfung tun-die Funktion test_input nennen ()
				$name = test_input($_POST["name"]);
				$groesse = test_input($_POST["groesse"]);
				$isbn = test_input(($_POST["isbn"]));
				$farbe = test_in(test_input($_POST["farbe"]));
				$brands =test_input($_POST["brands"]);
				$preis =test_input($_POST["preis"]);

				}
//Hier habe ich vier verschiedene Variable deklariert
			$servername = "localhost";
			$dbname = "ansnik15sql1";
			$username = "ansnik15sql1";
			$passwort = "EzdkjybwpS";
//try-catch:Dies ist hilfreich, wenn Sie anpassen möchten, wie Sie einem Benutzer eine Fehlermeldung anzeigen oder möglicherweise etwas wiederholen, das beim ersten Mal fehlgeschlagen ist.
			try {
//Hier wird die Verbindung herstellt
//Wenn Sie eine neue Datenbank erstellen, müssen Sie nur die ersten drei Argumente an das mysqli - Objekt (Servername , Benutzername und Kennwort) angeben müssen. 
//Wenn Sie einen bestimmten Port verwenden, fügen Sie eine leere Zeichenfolge für die Datenbank-Name Argument, wie folgt aus : neue mysqli ( „localhost“, „username“, „password“, „“, port)
//Um eine Verbindung zur Datenbank herzustellen wird ein neues Objekt der Klasse PDO instanziiert
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwort);
// set the PDO error mode to exception
//PDO :: setAttribute legt ein Attribut für das Datenbank-Handle fest.
//PDO :: ATTR_ERRMODE: Dieses Attribut wird für die Fehlerberichterstattung verwendet. Es kann einen haben
//der folgenden Werte.
//PDO :: ERRMODE_EXCEPTION: Dieser Wert löst Ausnahmen aus. Wenn im Ausnahmemodus ein Fehler in SQL auftritt, gibt PDO Ausnahmen aus, und das Skript wird nicht mehr ausgeführt. 
//Der Wert von PDO :: ERRMODE_EXCEPTION ist 2. Das Skript beendet die Ausführung des Fehlers, der die Ausnahme auslöst.				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				echo "";

				if ($_SERVER["REQUEST_METHOD"] == "POST"){
//In die SELECT-Anweisung können wir die Zeichen * verwenden, um alle Spalten aus einer Tabelle zu wählen:
  					$insert_stmt = $conn->prepare("INSERT INTO `coca cola produkte` (id, name, groesse, isbn, farbe, brands, preis) 
  				VALUES ('NULL', :name, :groesse, :isbn, :farbe, :brands, :preis)");
  					$insert_stmt->bindParam(':name', $name);
//Die Werte für die Parameter werden mit der Methode bindParam() dem Statement zugewiesen.
  						$insert_stmt->bindParam(':groesse', $groesse);
  						$insert_stmt->bindParam(':isbn', $isbn);
  						$insert_stmt->bindParam(':farbe', $farbe);
  						$insert_stmt->bindParam(':brands', $brands);
  						$insert_stmt->bindParam(':preis', $preis);
//PDOStatement :: execute - Führt eine vorbereitete Anweisung aus.
  						$insert_stmt->execute();
  					}
//In die SELECT-Anweisung können wir die Zeichen * verwenden, um alle Spalten aus einer Tabelle zu wählen:

  					$select_stmt = $conn->prepare("SELECT * FROM `coca cola produkte`");
  					$select_stmt->execute();
//Gibt ein Array zurück, das alle Ergebnismengenzeilen enthält.

  					$result = $select_stmt->fetchAll();

  					echo "<div class = 'div12'>";
  					echo "<h1>Hier sind die Produkte</h1>";
  							echo "<table border = '1' class='csstable'>";
  				echo "<tr>";
  				echo "<th> ID </th> <th> Name </th> <th> Groesse </th> <th> ISBN </th> <th> Farbe </th> <th>  Brands </th> <th> Preis </th>";
  				echo "</tr>";
  				echo $result;
 		 foreach ($result as $row) {
 		 	echo "<tr>";
 		 	echo "<th>" , $row["id"] , "</th>";
  			echo "<th>" , $row["name"] , "</th>";
  			echo "<th>" , $row["groesse"] , "</th>";
  			echo "<th>" , $row["ISBN"] , "</th>";
  			echo "<th>" , $row["farbe"] , "</th>";
  			echo "<th>" , $row["brands"] , "</th>";
  			echo "<th>" , $row["preis"] , "</th>";
 		 }
  			
  			echo "</tr>";
  			echo "</table>";
}
//Wenn eine Ausnahme ausgelöst wird, wird der auf die Anweisung folgende Code nicht ausgeführt, und PHP versucht, den ersten übereinstimmenden catch-Block zu finden.
// Wenn eine Ausnahme nicht abgefangen wird, wird ein schwerwiegender PHP-Fehler mit der Meldung "Uncught Exception ..." ausgegeben, sofern nicht ein Handler mit set_exception_handler () definiert wurde.
//PDOException stellt einen Fehler dar, der von PDO ausgelöst wurde.
//catch- Code, um die Ausnahme zu behandeln
		catch(PDOException $e) {
  					echo "Error: " . $e->getMessage();
  }
//Die Verbindung wird automatisch geschlossen werden, wenn das Skript beendet. Um, bevor die Verbindung zu schließen, gehen Sie wie folgt:
  $conn = null;
  		function test_input($data) {
//Loesche unnötige Zeichen
		$data = trim($data);
//Entfernen Backslash
		$data = stripslashes($data);
//Die htmlspecialchars () konvertiert Sonderzeichen in HTML - Code.
		$data = htmlspecialchars($data);
		return $data;
		}

		function test_in($int){
		if (!filter_var($int,FILTER_VALIDATE_INT) === false) {
    		echo("Integer is valid");
    		return $int;
		} 
		else {
    		echo("Integer is not valid");
    		return "";
			}
		}		
		
				
		?>	
	</div>
		<div id="footer">
			<p> &copy; Coca Cola 11 Anselma Nika  </p>
		</div>
	</body>
</html>
		