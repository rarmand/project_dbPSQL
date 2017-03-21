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
	
	<div id='divPrzeglad'>
	
		</br></br></br>
		
		<ul id="buttonMenu">
		   <li><a href=#>Przeglądaj tabelę:</a>
			<ul>
			<form name="form" action="" method="post">
			   <li><input type="submit" name="tabela" value="Kierowca"/></li>
			   <li><input type="submit" name="tabela" value="Pojazd"/></li>
			   <li><input type="submit" name="tabela" value="Trasa"/></li>
			   <li><input type="submit" name="tabela" value="Promocja"/></li>
			   <li><input type="submit" name="tabela" value="Klient"/></li>
			   <li><input type="submit" name="tabela" value="Kurs"/></li>
			   <li><input type="submit" name="tabela" value="Rezerwacja"/></li>
			   <li><input type="submit" name="tabela" value="Wypożyczenie"/></li>
		   </form>
		   </ul>
		   </li>
		</ul>
		</br></br>
		
		<?php
			$table = 'projekt.'.$_POST['tabela'];
			if ($_POST['tabela'] === 'Wypożyczenie')
				$table = 'projekt.Wypozyczenie';
				
			$output = pg_query($conn, "select * from $table;");
		
			?> </br></br></br> <?php
			switch ($table) {
				case 'projekt.Kierowca':
					?>
					<h2>Kierowcy</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> Imię </th>
							<th> Nazwisko </th>
							<th> Pesel </th>
							<th> E-mail </th>
							<th> Data zatrudnienia </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
						<td><?php	echo "$wiersz[3]"; ?></td>
						<td><?php	echo "$wiersz[4]"; ?></td>
						<td><?php	echo "$wiersz[5]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php	
					break;
				case 'projekt.Pojazd':
					?>
					<h2>Pojazdy</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> Marka </th>
							<th> Data produkcji </th>
							<th> Data zakupu </th>
							<th> Liczba miejsc </th>
							<th> Ostatni przegląd </th>
							<th> Cena wypożyczenia </th>
							<th> Pożyczony </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
						<td><?php	echo "$wiersz[3]"; ?></td>
						<td><?php	echo "$wiersz[4]"; ?></td>
						<td><?php	echo "$wiersz[5]"; ?></td>
						<td><?php	echo "$wiersz[6]"; ?></td>
						<td><?php	echo "$wiersz[7]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php break;
				case 'projekt.Trasa':
					?>
					<h2>Trasy</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> Przystanek początkowy </th>
							<th> Przystanek końcowy </th>
							<th> Odległość </th>
							<th> Cena biletu </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
						<td><?php	echo "$wiersz[3]"; ?></td>
						<td><?php	echo "$wiersz[4]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php break;
				case 'projekt.Promocja':
					?>
					<h2>Promocje</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> Tytuł </th>
							<th> Liczba darmowych przejazdów </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php break;
				case 'projekt.Klient':
					?>
					<h2>Klienci</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> Przypisana promocja ID </th>
							<th> Imię </th>
							<th> Nazwisko </th>
							<th> Pesel </th>
							<th> E-mail </th>
							<th> Hasło </th>
							<th> Telefon </th>
							<th> Firma </th>
							<th> Ilość tras </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
						<td><?php	echo "$wiersz[3]"; ?></td>
						<td><?php	echo "$wiersz[4]"; ?></td>
						<td><?php	echo "$wiersz[5]"; ?></td>
						<td><?php	echo "$wiersz[6]"; ?></td>
						<td><?php	echo "$wiersz[7]"; ?></td>
						<td><?php	echo "$wiersz[8]"; ?></td>
						<td><?php	echo "$wiersz[9]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php break;
				case 'projekt.Kurs':
					?>
					<h2>Kursy</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> ID pojazdu </th>
							<th> ID kierowcy </th>
							<th> ID trasy </th>
							<th> Liczba pasażerów </th>
							<th> Godzina wyjazdu </th>
							<th> Godzina przyjazdu </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
						<td><?php	echo "$wiersz[3]"; ?></td>
						<td><?php	echo "$wiersz[4]"; ?></td>
						<td><?php	echo "$wiersz[5]"; ?></td>
						<td><?php	echo "$wiersz[6]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php break;
				case 'projekt.Rezerwacja':
					?>
					<h2>Rezerwacje</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> ID klienta </th>
							<th> ID trasy </th>
							<th> ID kierowcy </th>
							<th> ID pojazdu </th>
							<th> ID kursu </th>
							<th> Liczba miejsc </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
						<td><?php	echo "$wiersz[3]"; ?></td>
						<td><?php	echo "$wiersz[4]"; ?></td>
						<td><?php	echo "$wiersz[5]"; ?></td>
						<td><?php	echo "$wiersz[6]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php break;
				case 'projekt.Wypozyczenie':
					?>
					<h2>Wypożyczenia</h2>
					<table>
						<tr>
							<th> ID </th>
							<th> ID klienta </th>
							<th> ID pojazdu </th>
							<th> ID kierowcy </th>
							<th> Data </th>
						</tr>
						
					<?php
					while($wiersz = pg_fetch_row($output)) {
					?><tr>
						<td><?php	echo "$wiersz[0]"; ?></td>
						<td><?php	echo "$wiersz[1]"; ?></td>
						<td><?php	echo "$wiersz[2]"; ?></td>
						<td><?php	echo "$wiersz[3]"; ?></td>
						<td><?php	echo "$wiersz[4]"; ?></td>
					  </tr><?php
					}

					?>
					</table>
					<?php break;		
				default:
				 	?><p></p>
				 	<?php ;
			}
			
			?>	 
	</div>
</body>
</html>

<?php	
	
	pg_close($conn);
?>
