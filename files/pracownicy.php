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

	<div>
		</br></br></br>
		
		<form name="form" action="" method="get">
		<ul id="buttonMenu">
		   <li><a href=#>Wybierz raport:</a>
			<ul>
			   <li><input type="submit" name="tabela" value="Ogólne dane kursów"/></li>
			   <li><input type="submit" name="tabela" value="Rezerwacje na kursy"/></li>
			   <li><input type="submit" name="tabela" value="Kursy kierowców"/></li>
			   <li><input type="submit" name="tabela" value="Kierowcy - godziny"/></li>
			   <li><input type="submit" name="tabela" value="Przewidziany zarobek"/></li>
			   <li><input type="submit" name="tabela" value="Lista wypożyczeń"/></li>
			   <li><input type="submit" name="tabela" value="Stan pojazdów"/></li>
			   <li><input type="submit" name="tabela" value="Ilość tras pojazdów"/></li>
		   	</ul>
		   </li>
		</ul>
		</form>
	
		</br></br></br>
		
		<?php			
			if (isset($_GET['tabela'])) 
			{ 
				$table = $_GET['tabela'];	
			
				switch ($table) {
					case 'Ogólne dane kursów':
						$today = date("Y-m-d");
						$datetime = new DateTime('tomorrow'); 
						$tom = $datetime->format('Y-m-d');
				
						$output = pg_query($conn, "select * from projekt.DanyKurs where godzina_wyjazdu > '$today' and godzina_wyjazdu < '$tom';");

						?>
						<h2>Dane najbliższych kursów</h2>
						<table>
							<tr>
								<th> ID kursu</th>
								<th> Imię kierowcy </th>
								<th> Nazwisko kierowcy </th>
								<th> Marka pojazdu </th>
								<th> Przystanek początkowy </th>
								<th> Godzina wyjazdu </th>
								<th> Przystanek końcowy </th>
								<th> Godzina przyjazdu </th>
								<th> Liczba pasażerów </th>
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
						  </tr><?php
						}

						?>
						</table>
						<?php	
							
						break;			
											
					case 'Rezerwacje na kursy':
						?>
						<h2>Dane klientów z rezerwacją na dany kurs</h2>
						</br>
						<form action="" method="post">
						<p>ID kursu     
						<input style="border: 1px solid red;" type="text" name="kursID">
						<input style="border: 1px solid red;" type="submit" value="Sprawdź"></p>
						</form>
						</br>
						<?php 
						
						if (isset($_POST['kursID'])) {
							$id = $_POST['kursID']; 
							$start = date("Y-m-d"); 
							$end = date("Y-m-d", strtotime("+1 week"));
							
							$output = pg_query($conn, "select distinct imie, nazwisko, liczba_miejsc from projekt.Rezerwacja full outer join projekt.Klient on projekt.rezerwacja.klient_id = projekt.klient.klient_id where kurs_id=$id;");
														
							?>	
							<table>
								<tr>
									<th> Imię klienta </th>
									<th> Nazwisko klienta </th>
									<th> Liczba miejsc </th>
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
						<?php	
							
						}
						
						break;
						
					case 'Kursy kierowców':
						?>
						<h2>Kursy konkretnego kierowcy na dany tydzień</h2>
						</br>
						<form action="" method="post">
						<p>ID kierowcy     
						<input style="border: 1px solid red;" type="text" name="kierowcaID">
						<input style="border: 1px solid red;" type="submit" value="Sprawdź"></p>
						</form>
						</br>
						<?php	
						
						if (isset($_POST['kierowcaID'])) {
							$id = $_POST['kierowcaID']; 
							$start = date("Y-m-d"); 
							$end = date("Y-m-d", strtotime("+1 week"));
							
							$output = pg_query($conn, "select kurs_id, marka, trasa_start, godzina_wyjazdu, trasa_meta, godzina_przyjazdu from projekt.Kurs, projekt.Trasa, projekt.Pojazd where projekt.Kurs.trasa_id = projekt.Trasa.trasa_id and projekt.Kurs.pojazd_id = projekt.Pojazd.pojazd_id and projekt.Kurs.kierowca_id = $id and godzina_wyjazdu between '$start' and '$end';");  							
							?>	
							
							<table>
								<tr>
									<th> ID kursu</th>
									<th> Marka </th>
									<th> Przystanek początkowy </th>
									<th> Godzina wyjazdu </th>
									<th> Przystanek końcowy </th>
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
							  </tr><?php
							}

							?>
				
							</table>
							</br>
							<?php
						}
						
							
						break;
						
					case 'Kierowcy - godziny':
						?>
						<h2>Wypracowane godziny kierowców w konkretnym tygodniu</h2>
						</br>
						<form action="" method="post">
						<p>ID kierowcy     
						<input style="border: 1px solid red;" type="text" name="kierowcaID">
						<input style="border: 1px solid red;" type="submit" value="Sprawdź"></p>
						</form>
						</br>
						<?php	
						
						if (isset($_POST['kierowcaID'])) {
							$id = $_POST['kierowcaID']; 
							$start = date('01-m-Y');
							$end = date('d-m-Y', strtotime('last day of this month'));
							
							$output = pg_query($conn, "select kierowca_id, sum(godzina_przyjazdu - godzina_wyjazdu) from projekt.kurs where kierowca_id = $id  and godzina_przyjazdu between '$start' and '$end' group by kierowca_id;");		
							
							?>	
							
							<table>
							   <tr>
								<th> ID kierowcy</th>
								<th> Przepracowane godziny </th>
							   </tr>	
							   		
							<?php
							while($wiersz = pg_fetch_row($output)) {
							?><tr>
								<td><?php	echo "$wiersz[0]"; ?></td>
								<td><?php	echo "$wiersz[1]"; ?></td>
							  </tr><?php
							}

							?>
							</table>
							<?php
						}
						else {
							?><p><?php echo "Podaj ID"; ?></p>
						
						<?php
						}
		
						break;
							
					case 'Przewidziany zarobek':
						?>
						<h2>Przewidziany zarobek z konkretnego kursu</h2>
						</br>
						<form action="" method="post">
						<p>ID kursu     
						<input style="border: 1px solid red;" type="text" name="kursID">
						<input style="border: 1px solid red;" type="submit" value="Sprawdź"></p>
						</form>
						</br>
						<?php	
						
						if (isset($_POST['kursID'])) {
							$id = $_POST['kursID']; 
						
							$output = pg_query($conn, "select r.kurs_id, k.godzina_wyjazdu, sum(r.liczba_miejsc*t.cena) from projekt.rezerwacja r, projekt.trasa t, projekt.kurs k where t.trasa_id = r.trasa_id and k.kurs_id = r.kurs_id and r.kurs_id = $id group by r.kurs_id, k.godzina_wyjazdu;
");			
							?>	
							
							<table>				
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
							</br>
							<?php
						}
						else if(!isset($_POST['kursID'])) {
						
							$start = date("Y-m-d"); 
							$end = date("Y-m-d", strtotime("+1 week"));
							$output = pg_query($conn, "select r.kurs_id, k.godzina_wyjazdu, sum(r.liczba_miejsc*t.cena) from projekt.rezerwacja r, projekt.trasa t, projekt.kurs k where t.trasa_id = r.trasa_id and k.kurs_id = r.kurs_id and k.godzina_wyjazdu between '$start' and '$end' group by r.kurs_id, k.godzina_wyjazdu;");
						
							?>	
							</br>
							<table>
								<tr>
									<th> ID kursu</th>
									<th> Godzina wyjazdu </th>
									<th> Zarobek </th>
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
							<?php	
						}
							
						break;
							
					case 'Lista wypożyczeń':
						?>
						<h2>Dane wypożyczenia na konkretny tydzień</h2>
						</br>
							<form action="" method="post">
								<p>Zakres czasowy</p>
								<p>Początkowa data:      
								<input style="border: 1px solid red;" type="text" name="start"> Końcowa data:      
								<input style="border: 1px solid red;" type="text" name="end"></p>
								<p><input style="border: 1px solid red;" type="submit" value="Sprawdź"></p>
							</form>
						</br>
						<?php	
						
						if (isset($_POST['start']) and isset($_POST['end'])) {
							$start = $_POST['start']; 
							$end = $_POST['end'];
							
							?><p><? echo $start." - ".$end; ?></p><?php
							
							$output = pg_query($conn, "select k.imie, k.nazwisko, p.marka, w.data, kl.imie, kl.nazwisko from projekt.Pojazd p, projekt.Kierowca k, projekt.Wypozyczenie w, projekt.Klient kl where kl.klient_id = w.klient_id and k.kierowca_id = w.kierowca_id and p.pojazd_id = w.pojazd_id
and w.data between '$start' and '$end';");  							
							?>	
							
							<table>
							 <tr>
									<th> Imię kierowcy</th>
									<th> Nazwisko kierowcy </th>
									<th> Marka pojazdu </th>
									<th> Data </th>
									<th> Imię klienta </th>
									<th> Nazwisko klienta </th>
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
							</br>
							<?php
						}
						else {
							$start = date("Y-m-d"); 
							$end = date("Y-m-d", strtotime("+1 week"));
							
							?><p><? echo $start." - ".$end; ?></p><?php
						
							$output = pg_query($conn, "select k.imie, k.nazwisko, p.marka, w.data, kl.imie, kl.nazwisko from projekt.Pojazd p, projekt.Kierowca k, projekt.Wypozyczenie w, projekt.Klient kl where kl.klient_id = w.klient_id and k.kierowca_id = w.kierowca_id and p.pojazd_id = w.pojazd_id
	and w.data between $start' and '$end';");
							?>	
							</br>
							<table>
								<tr>
									<th> Imię kierowcy</th>
									<th> Nazwisko kierowcy </th>
									<th> Marka pojazdu </th>
									<th> Data </th>
									<th> Imię klienta </th>
									<th> Nazwisko klienta </th>
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
						}
						
						break;	
						
					case 'Stan pojazdów':
						$output = pg_query($conn, "select pojazd_id, marka, przeglad, pozyczony from projekt.Pojazd;");
			
						?>
						<h2>Ostatnie przeglądy pojazdów</h2>
						<table>
							<tr>
								<th> ID pojazdu</th>
								<th> Marka </th>
								<th> Przegląd </th>
								<th> Wypożyczony </th>
							</tr>
					
						<?php
						while($wiersz = pg_fetch_row($output)) {
						?><tr>
							<td><?php	echo "$wiersz[0]"; ?></td>
							<td><?php	echo "$wiersz[1]"; ?></td>
							<td><?php	echo "$wiersz[2]"; ?></td>
							<td><?php	echo "$wiersz[3]"; ?></td>
						  </tr><?php
						}

						?>
						</table>
						<?php	
							
						break;	
						
					case 'Ilość tras pojazdów':
						$output = pg_query($conn, "select projekt.kurs.pojazd_id, marka, count(*) from projekt.Pojazd right join projekt.Kurs on projekt.Kurs.pojazd_id=projekt.Pojazd.pojazd_id group by projekt.Pojazd.marka, projekt.kurs.pojazd_id;");
			
						?>
						<h2>Ilość wykonanych tras przez pojazdy</h2>
						<table>
							<tr>
								<th> ID pojazdu</th>
								<th> Marka </th>
								<th> Ilość wykonanych tras </th>
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
						<?php	
							
						break;				
				}	 
			}

		?>
		
	</div>
</body>
</html>

<?php	
	
	pg_close($conn);
?>
