<?php
	$conn_string = "host=pascal.fis.agh.edu.pl port=5432 dbname=u4holik user=u4holik password=4holik";
	$conn = pg_connect($conn_string);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>

<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Projekt PSQL</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<header><h1>Firma przewozowa BAMBUS</h1></header>
	</br>
	
	<ul>
	     <li><a href="../BAZA/index.php">Strona główna</a></li>
	     <li><a href="../BAZA/pracownicy.php">Strefa pracowników</a>
	     <li><a href="../BAZA/klient.php">Strefa klienta</a></li>
	     <li><a href="../BAZA/przeglad.php">Przegląd bazy</a></li>
	     <li><a href="../BAZA/edycja.php">Edycja bazy</a></li>
	</ul>
	
	<div id='divPokazKursy'>
	</br></br>
	</br></br>
	
	<?php 	
		$today = date("Y-m-d");
		$datetime = new DateTime('tomorrow'); 
		$tom = $datetime->format('Y-m-d');
		
		$output = pg_query($conn, "select kurs_id, trasa_start, godzina_wyjazdu, 
						   trasa_meta, godzina_przyjazdu from projekt.KursTrasa where godzina_wyjazdu > '$today' and godzina_wyjazdu < '$tom';");
		if(!$output) {
			?><p><? echo "Brak kursów na dzień dzisiejszy.\n"; ?></p><?
		}
	?>
	</br>
	<h2>ROZKŁAD JAZDY</h2>
	</br>
	<table>
		<tr>
			<th> Miasto początkowe </th>
			<th> Czas wyjazdu </th>
			<th> Miasto końcowe </th>
			<th> Czas przyjazdu </th>
		</tr>

	<?php
	while($wiersz = pg_fetch_row($output)) {
	?><tr>
		<td><?php	echo "$wiersz[1]"; ?></td>
		<td><?php	echo "$wiersz[2]"; ?></td>
		<td><?php	echo "$wiersz[3]"; ?></td>
		<td><?php	echo "$wiersz[4]"; ?></td>
	  </tr><?php
	}

	?>
	</table>
	</div>
	
	<footer>		
		<a>Copyright © 2016 Aleksandra Holik</a> 
	</footer>
</body>
</html>

<?php	
	
	pg_close($conn);
?>
