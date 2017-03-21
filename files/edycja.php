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
	
	<div id="divEdycja">
		</br></br></br>
		
		<form name="form" action="" method="get">
		<ul id="buttonMenu">
		   <li><a href=#>Wybierz funkcję:</a>
			<ul>
			   <li><input type="submit" value="Edytuj"/>
			   	<ul>
				   <li><input type="submit" name="edit" value="Kierowca"/></li>
				   <li><input type="submit" name="edit" value="Pojazd"/></li>
				   <li><input type="submit" name="edit" value="Trasa"/></li>
				   <li><input type="submit" name="edit" value="Promocja"/></li>
				   <li><input type="submit" name="edit" value="Klient"/></li>
				   <li><input type="submit" name="edit" value="Kurs"/></li>
				   <li><input type="submit" name="edit" value="Rezerwacja"/></li>
				   <li><input type="submit" name="edit" value="Wypożyczenie"/></li>
			      </ul>
			   </li>
			   <li><input type="submit" value="Dodaj"/>
			   	<ul>
				   <li><input type="submit" name="add" value="Kierowca"/></li>
				   <li><input type="submit" name="add" value="Pojazd"/></li>
				   <li><input type="submit" name="add" value="Trasa"/></li>
				   <li><input type="submit" name="add" value="Promocja"/></li>
				   <li><input type="submit" name="add" value="Klient"/></li>
				   <li><input type="submit" name="add" value="Kurs"/></li>
				   <li><input type="submit" name="add" value="Rezerwacja"/></li>
				   <li><input type="submit" name="add" value="Wypożyczenie"/></li>
			    	</ul>
			   </li>
			   <li><input type="submit" value="Usuń"/>
			   	<ul>
				   <li><input type="submit" name="delete" value="Kierowca"/></li>
				   <li><input type="submit" name="delete" value="Pojazd"/></li>
				   <li><input type="submit" name="delete" value="Trasa"/></li>
				   <li><input type="submit" name="delete" value="Promocja"/></li>
				   <li><input type="submit" name="delete" value="Klient"/></li>
				   <li><input type="submit" name="delete" value="Kurs"/></li>
				   <li><input type="submit" name="delete" value="Rezerwacja"/></li>
				   <li><input type="submit" name="delete" value="Wypożyczenie"/></li>
			    	</ul>
			   </li>
		   </ul>
		   </li>
		</ul>
		</form>
	
		</br></br></br>
		
		<?php			
			if (isset($_GET['edit'])) 
			{ 
				$table = 'projekt.'.$_GET['edit'];	
				if ($_GET['edit'] === 'Wypożyczenie')
					$table = 'projekt.Wypozyczenie';
			
				switch ($table) {
						case 'projekt.Kierowca':

							?>
							<h2>Kierowcy</h2>
							<table name="edition">
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu </td>
									<td><input type="text" required name="idEdit1"></td>
									<td>Imię</td><?php $dane = 'Imie'; ?>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td>Nazwisko</td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit3"></td>
									<td>Pesel</td>
									<td><input type="text" name="valEdit3"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit4"></td>
									<td>E-mail</td>
									<td><input type="text" name="valEdit4"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit5"></td>
									<td>Data zatrudnienia</td>
									<td><input type="text" name="valEdit5"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit6"></td>
									<td>Przepracowane godziny</td>
									<td><input type="text" name="valEdit6"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
							<?php	
							
							if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set imie = '$value' where kierowca_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set nazwisko = '$value' where kierowca_id = $id;");  
							}
							else if(isset($_POST['idEdit3'])) {
								$id = $_POST['idEdit3']; 
								$value = $_POST['valEdit3'];
								$output = pg_query($conn, "update $table set pesel = $value where kierowca_id = $id;");  
							}
							else if(isset($_POST['idEdit4'])) {
								$id = $_POST['idEdit4']; 
								$value = $_POST['valEdit4'];
								$output = pg_query($conn, "update $table set mail = '$value' where kierowca_id = $id;");  
							}
							else if(isset($_POST['idEdit5'])) {
								$id = $_POST['idEdit5']; 
								$value = $_POST['valEdit5'];
								$output = pg_query($conn, "update $table set data_zatrudnienia = '$value' where kierowca_id = $id;");  
							}
							else if(isset($_POST['idEdit6'])) {
								$id = $_POST['idEdit6']; 
								$value = $_POST['valEdit6'];
								$output = pg_query($conn, "update $table set przeprac_godziny = $value where kierowca_id = $id;");  
							}
							
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;					
												
						case 'projekt.Pojazd':
							?>
							<h2>Pojazdy</h2>
							<table name="edition">
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit1"></td>
									<td> Marka </td>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td> Data produkcji </td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit3"></td>
									<td> Data zakupu </td>
									<td><input type="text" name="valEdit3"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit4"></td>
									<td> Liczba miejsc </td>
									<td><input type="text" name="valEdit4"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit5"></td>
									<td> Ostatni przegląd </td>
									<td><input type="text" name="valEdit5"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit6"></td>
									<td> Cena wypożyczenia </d>
									<td><input type="text" name="valEdit6"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit7"></td>
									<td> Pożyczony </d>
									<td><input type="text" name="valEdit7"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
							<?php 
							
							if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set marka = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set data_produkcji = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit3'])) {
								$id = $_POST['idEdit3']; 
								$value = $_POST['valEdit3'];
								$output = pg_query($conn, "update $table set data_zakupu = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit4'])) {
								$id = $_POST['idEdit4']; 
								$value = $_POST['valEdit4'];
								$output = pg_query($conn, "update $table set liczba_miejsc = $value where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit5'])) {
								$id = $_POST['idEdit5']; 
								$value = $_POST['valEdit5'];
								$output = pg_query($conn, "update $table set przeglad = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit6'])) {
								$id = $_POST['idEdit6']; 
								$value = $_POST['valEdit6'];
								$output = pg_query($conn, "update $table set cena_wypozyczenia = $value where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit7'])) {
								$id = $_POST['idEdit7']; 
								$value = $_POST['valEdit7'];
								$output = pg_query($conn, "update $table set pozyczony = $value where pojazd_id = $id;");  
							}
							
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
									
						case 'projekt.Trasa':
							?>
							<h2>Trasy</h2>
							<table name="edition">
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit1"></td>
									<td> Przystanek początkowy </td>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td> Przystanek końcowy </td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit3"></td>
									<td> Odległość </td>
									<td><input type="text" name="valEdit3"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit4"></td>
									<td> Cena biletu </td>
									<td><input type="text" name="valEdit4"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
							<?php 
							
							if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set trasa_start = '$value' where trasa_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set trasa_meta = '$value' where trasa_id = $id;");  
							}
							else if(isset($_POST['idEdit3'])) {
								$id = $_POST['idEdit3']; 
								$value = $_POST['valEdit3'];
								$output = pg_query($conn, "update $table set odleglosc = $value where trasa_id = $id;");  
							}
							else if(isset($_POST['idEdit4'])) {
								$id = $_POST['idEdit4']; 
								$value = $_POST['valEdit4'];
								$output = pg_query($conn, "update $table set cena = $value where trasa_id = $id;");  
							}							
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Promocja':
							?>
							<h2>Promocje</h2>
							<table name="edition">
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit1"></td>
									<td> Tytuł </td>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td> Liczba darmowych przejazdów </td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
							<?php 
							
							if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set nazwa = '$value' where promocja_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set darmowe_przejazdy = $value where promocja_id = $id;");  
							}							
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Klient':
							?>
							<h2>Klienci</h2>
							<table name="edition">
								<tr>
									<form name="doEdit" action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit1"></td>
									<td> Przypisana promocja ID </td>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td> Imię </td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit3"></td>
									<td> Nazwisko </td>
									<td><input type="text" name="valEdit3"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit4"></td>
									<td> Pesel </td>
									<td><input type="text" name="valEdit4"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit5"></td>
									<td> E-mail </td>
									<td><input type="text" name="valEdit5"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit6"></td>
									<td> Hasło </td>
									<td><input type="text" name="valEdit6"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit7"></td>
									<td> Telefon </td>
									<td><input type="text" name="valEdit7"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit8"></td>
									<td> Firma </td>
									<td><input type="text" name="valEdit8"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit9"></td>
									<td> Ilość odbytych tras </td>
									<td><input type="text" name="valEdit9"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
							<?php
							if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set promocja_id = $value where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set imie = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit3'])) {
								$id = $_POST['idEdit3']; 
								$value = $_POST['valEdit3'];
								$output = pg_query($conn, "update $table set nazwisko = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit4'])) {
								$id = $_POST['idEdit4']; 
								$value = $_POST['valEdit4'];
								$output = pg_query($conn, "update $table set pesel = $value where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit5'])) {
								$id = $_POST['idEdit5']; 
								$value = $_POST['valEdit5'];
								$output = pg_query($conn, "update $table set mail = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit6'])) {
								$id = $_POST['idEdit6']; 
								$value = $_POST['valEdit6'];
								$output = pg_query($conn, "update $table set haslo = '$value' where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit7'])) {
								$id = $_POST['idEdit7']; 
								$value = $_POST['valEdit7'];
								$output = pg_query($conn, "update $table set telefon = $value where pojazd_id = $id;");  
							}
							else if(isset($_POST['idEdit8'])) {
								$id = $_POST['idEdit8']; 
								$value = $_POST['valEdit8'];
								$output = pg_query($conn, "update $table set telefon = $value where firma = $id;");  
							}
							else if(isset($_POST['idEdit9'])) {
								$id = $_POST['idEdit9']; 
								$value = $_POST['valEdit9'];
								$output = pg_query($conn, "update $table set telefon = $value where ile_tras = $id;");  
							}
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Kurs':
							?>
							<h2>Kursy</h2>
							<table name="edition">
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit1"></td>
									<td> ID pojazdu </td>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td> ID kierowcy </td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit3"></td>
									<td> ID trasy </td>
									<td><input type="text" name="valEdit3"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit4"></td>
									<td> Liczba pasażerów </td>
									<td><input type="text" name="valEdit4"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit5"></td>
									<td> Godzina wyjazdu </td>
									<td><input type="text" name="valEdit5"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit6"></td>
									<td> Godzina przyjazdu </td>
									<td><input type="text" name="valEdit6"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
							<?php 
							
							if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set pojazd_id = $value where kurs_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set kierowca_id = $value where kurs_id = $id;");  
							}
							else if(isset($_POST['idEdit3'])) {
								$id = $_POST['idEdit3']; 
								$value = $_POST['valEdit3'];
								$output = pg_query($conn, "update $table set trasa_id = $value where kurs_id = $id;");  
							}
							else if(isset($_POST['idEdit4'])) {
								$id = $_POST['idEdit4']; 
								$value = $_POST['valEdit4'];
								$output = pg_query($conn, "update $table set liczba_pasazerow = $value where kurs_id = $id;");  
							}
							else if(isset($_POST['idEdit5'])) {
								$id = $_POST['idEdit5']; 
								$value = $_POST['valEdit5'];
								$output = pg_query($conn, "update $table set godzina_wyjazdu = '$value' where kurs_id = $id;");  
							}
							else if(isset($_POST['idEdit6'])) {
								$id = $_POST['idEdit6']; 
								$value = $_POST['valEdit6'];
								$output = pg_query($conn, "update $table set godzina_przyjazdu = '$value' where kurs_id = $id;");  
							}
							
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Rezerwacja':
							?>
							<h2>Rezerwacje</h2>
							<table name="edition">
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit1"></td>
									<td> ID klienta </td>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td> ID trasy </td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit3"></td>
									<td> ID kierowcy </td>
									<td><input type="text" name="valEdit3"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit4"></td>
									<td> ID pojazdu </td>
									<td><input type="text" name="valEdit4"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu </td>
									<td><input type="text" required name="idEdit5"></td>
									<td> ID kursu </td>
									<td><input type="text" name="valEdit5"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit6"></td>
									<td> Liczba miejsc </td>
									<td><input type="text" name="valEdit6"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
							<?php 
							
							if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set klient_id = $value where rezerwacja_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set trasa_id = $value where rezerwacja_id = $id;");  
							}
							else if(isset($_POST['idEdit3'])) {
								$id = $_POST['idEdit3']; 
								$value = $_POST['valEdit3'];
								$output = pg_query($conn, "update $table set kierowca_id = $value where rezerwacja_id = $id;");  
							}
							else if(isset($_POST['idEdit4'])) {
								$id = $_POST['idEdit4']; 
								$value = $_POST['valEdit4'];
								$output = pg_query($conn, "update $table set pojazd_id = $value where rezerwacja_id = $id;");  
							}
							else if(isset($_POST['idEdit5'])) {
								$id = $_POST['idEdit5']; 
								$value = $_POST['valEdit5'];
								$output = pg_query($conn, "update $table set kurs_id = $value where rezerwacja_id = $id;");  
							}
							else if(isset($_POST['idEdit6'])) {
								$id = $_POST['idEdit6']; 
								$value = $_POST['valEdit6'];
								$output = pg_query($conn, "update $table set liczba_miejsc = $value where rezerwacja_id = $id;");  
							}
							
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;

						case 'projekt.Wypozyczenie':
							?>
							<h2>Wypożyczenia</h2>
							<table name="edition">
								<tr>
							
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit1"></td>
									<td> ID klienta </td>
									<td><input type="text" name="valEdit1"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit2"></td>
									<td> ID pojazdu </td>
									<td><input type="text" name="valEdit2"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit3"></td>
									<td> ID kierowcy </td>
									<td><input type="text" name="valEdit3"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
								<tr>
									<form action="" method="post">
									<td>ID elementu</td>
									<td><input type="text" required name="idEdit4"></td>
									<td> Data </td>
									<td><input type="text" name="valEdit4"></td>
									<td><input type="submit" value="Zmień"></td>
									</form>
								</tr>
							</table>
						<?php 
						
						if (isset($_POST['idEdit1'])) {
								$id = $_POST['idEdit1']; 
								$value = $_POST['valEdit1'];
								$output = pg_query($conn, "update $table set klient_id = $value where wypozyczenie_id = $id;");  
							}
							else if(isset($_POST['idEdit2'])) {
								$id = $_POST['idEdit2']; 
								$value = $_POST['valEdit2'];
								$output = pg_query($conn, "update $table set pojazd_id = $value where wypozyczenie_id = $id;");  
							}
							else if(isset($_POST['idEdit3'])) {
								$id = $_POST['idEdit3']; 
								$value = $_POST['valEdit3'];
								$output = pg_query($conn, "update $table set kierowca_id = $value where wypozyczenie_id = $id;");  
							}
							else if(isset($_POST['idEdit4'])) {
								$id = $_POST['idEdit4']; 
								$value = $_POST['valEdit4'];
								$output = pg_query($conn, "update $table set data = '$value' where wypozyczenie_id = $id;");  
							}
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
		
					}	 
				}
				
				
				
				else if (isset($_GET['add'])) { 
					$table = 'projekt.'.$_GET['add'];	
					if ($_GET['add'] === 'Wypożyczenie')
						$table = 'projekt.Wypozyczenie';
			
					switch ($table) {
						case 'projekt.Kierowca':
							?>
							<h2>Kierowcy</h2>
							<table name="addition">
								<form name="doAdd" action="" method="post">
								<tr>
									<td> Imię </td>
									<td><input type="text" required name="add1"></td>
								</tr>
								<tr>
									<td> Nazwisko </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> Pesel </td>
									<td><input type="text" required name="add3"></td>
								</tr>
								<tr>
									<td> E-mail </td>
									<td><input type="text" required name="add4"></td>
								</tr>
								<tr>
									<td> Data zatrudnienia </td>
									<td><input type="text" required name="add5"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							$info1 = $_POST['add1'];
							$info2 = $_POST['add2'];
							$info3 = $_POST['add3'];
							$info4 = $_POST['add4'];
							$info5 = $_POST['add5'];
							
							$output = pg_query($conn, "insert into $table (Imie, Nazwisko, Pesel, Mail, Data_Zatrudnienia)  
							values ('$info1', '$info2', $info3, '$info4', '$info5');");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
						
							
							break;					
				
						case 'projekt.Pojazd':
							?>
							<h2>Pojazdy</h2>
							<table name="edition">
								<form name="doAdd" action="" method="post">
								<tr>
									<td> Marka </td>
									<td><input type="text" required name="add1"></td>
								</tr>
								<tr>
									<td> Data produkcji </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> Data zakupu </td>
									<td><input type="text" required name="add3"></td>
								</tr>
								<tr>
									<td> Liczba miejsc </td>
									<td><input type="text" required name="add4"></td>
								</tr>
								<tr>
									<td> Ostatni przegląd </td>
									<td><input type="text" required name="add5"></td>
								</tr>
								<tr>
									<td> Cena wypożyczenia </td>
									<td><input type="text" required name="add6"></td>
								</tr>
								<tr>
									<td> Pożyczony </td>
									<td><input type="text" required name="add7"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php 
							
							$info1 = $_POST['add1'];
							$info2 = $_POST['add2'];
							$info3 = $_POST['add3'];
							$info4 = $_POST['add4'];
							$info5 = $_POST['add5'];
							$info6 = $_POST['add6'];
							$info7 = $_POST['add7'];
							
							
							$output = pg_query($conn, "insert into $table (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
							values ('$info1', '$info2', '$info3', $info4, '$info5', $info6, '$info7');");
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}							
							
							break;
							
						case 'projekt.Trasa':
							?>
							<h2>Trasy</h2>
							<table name="edition">
								<form name="doAdd" action="" method="post">
								<tr>
									<td> Przystanek początkowy </td>
									<td><input type="text" required name="add1"></td>
								</tr>
								<tr>
									<td> Przystanek końcowy </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> Odległość </td>
									<td><input type="text" required name="add3"></td>
								</tr>
								<tr>
									<td> Cena biletu </td>
									<td><input type="text" required name="add4"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php 
							
							$info1 = $_POST['add1'];
							$info2 = $_POST['add2'];
							$info3 = $_POST['add3'];
							$info4 = $_POST['add4'];
							
														
							$output = pg_query($conn, "insert into $table (Trasa_Start, Trasa_Meta, Odleglosc, cena) 
							values ('$info1', '$info2', $info3, $info4);");
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Promocja':
							?>
							<h2>Promocje</h2>
							<table name="edition">
								<form name="doAdd" action="" method="post">
								<tr>
									<td> Tytuł </td>
									<td><input type="text" required name="add1"></td>
								</tr>
								<tr>
									<td> Liczba darmowych przejazdów </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php 
							
							$info1 = $_POST['add1'];
							$info2 = $_POST['add2'];
							
							
							$output = pg_query($conn, "insert into $table (Nazwa, Darmowe_Przejazdy)
							values ('$info1', $info2);");
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}	
							
							
							break;
							
						case 'projekt.Klient':
							?>
							<h2>Klienci</h2>
							<table>
								<form action="" method="post">
								<tr>
									<td> Imię </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> Nazwisko </td>
									<td><input type="text" required name="add3"></td>
								</tr>
								<tr>
									<td> Pesel </td>
									<td><input type="text" required name="add4"></td>
								</tr>
								<tr>
									<td> E-mail </td>
									<td><input type="text" required name="add5"></td>
								</tr>
								<tr>
									<td> Hasło </td>
									<td><input type="text" required name="add6"></td>
								</tr>
								<tr>
									<td> Telefon </td>
									<td><input type="text" required name="add7"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php 
							
							$info2 = $_POST['add2'];
							$info3 = $_POST['add3'];
							$info4 = $_POST['add4'];
							$info5 = $_POST['add5'];
							$info6 = $_POST['add6'];
							$info7 = $_POST['add7'];
							
							
							$output = pg_query($conn, "insert into $table (Imie, Nazwisko, Pesel, Mail, Haslo, Telefon)
							values ('$info2', '$info3', $info4, '$info5', '$info6', $info7);");
				
							?><p><?php echo "insert into $table (Imie, Nazwisko, Pesel, Mail, Haslo, Telefon)
							values ('$info2', '$info3', $info4, '$info5', '$info6', $info7);\n"; ?><p><?php
					
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?>
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
						
						
						break;
							
						case 'projekt.Kurs':
							?>
							<h2>Kursy</h2>
							<table name="edition">
								<form name="doAdd" action="" method="post">
								<tr>
									<td> ID pojazdu </td>
									<td><input type="text" required name="add1"></td>
								</tr>
								<tr>
									<td> ID kierowcy </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> ID trasy </td>
									<td><input type="text" required name="add3"></td>
								</tr>
								<tr>
									<td> Liczba pasażerów </td>
									<td><input type="text" required name="add4"></td>
								</tr>
								<tr>
									<td> Godzina wyjazdu </td>
									<td><input type="text" required name="add5"></td>
								</tr>
								<tr>
									<td> Godzina przyjazdu </td>
									<td><input type="text" required name="add6"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php 
							
							$info1 = $_POST['add1'];
							$info2 = $_POST['add2'];
							$info3 = $_POST['add3'];
							$info4 = $_POST['add4'];
							$info5 = $_POST['add5'];
							$info6 = $_POST['add6'];
							
							
							
							$output = pg_query($conn, "insert into $table (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu) 
							values ($info1, $info2, $info3, $info4, '$info5', '$info6');");
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?>
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}

							break;
							
						case 'projekt.Rezerwacja':
							?>
							<h2>Rezerwacje</h2>
							<table name="edition">
								<form name="doAdd" action="" method="post">
								<tr>
									<td> ID klienta </td>
									<td><input type="text" required name="add1"></td>
								</tr>
								<tr>
									<td> ID trasy </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> ID kierowcy </td>
									<td><input type="text" required name="add3"></td>
								</tr>
								<tr>
									<td> ID pojazdu </td>
									<td><input type="text" required name="add4"></td>
								</tr>
								<tr>
									<td> ID kursu </td>
									<td><input type="text" required name="add5"></td>
								</tr>
								<tr>
									<td> Liczba miejsc </td>
									<td><input type="text" required name="add6"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php 
							
							$info1 = $_POST['add1'];
							$info2 = $_POST['add2'];
							$info3 = $_POST['add3'];
							$info4 = $_POST['add4'];
							$info5 = $_POST['add5'];
							$info6 = $_POST['add6'];
							
							
							$output = pg_query($conn, "insert into $table (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
										values ($info1, $info2, $info3, $info4, $info5, $info6);");
							
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?>
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
						
							
							break;
							
						case 'projekt.Wypozyczenie':
							?>
							<h2>Wypożyczenia</h2>
							<table name="edition">
								<form name="doAdd" action="" method="post">
								<tr>
									<td> ID klienta </td>
									<td><input type="text" required name="add1"></td>
								</tr>
								<tr>
									<td> ID pojazdu </td>
									<td><input type="text" required name="add2"></td>
								</tr>
								<tr>
									<td> ID kierowcy </td>
									<td><input type="text" required name="add3"></td>
								</tr>
								<tr>
									<td> Data </td>
									<td><input type="text" required name="add4"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="addition" value="Dodaj rekord"></td>
								</tr>
								</form>
							</table>
							<?php
						
							$info1 = $_POST['add1'];
							$info2 = $_POST['add2'];
							$info3 = $_POST['add3'];
							$info4 = $_POST['add4'];
							
							
							$output = pg_query($conn, "insert into $table (Klient_ID, Pojazd_ID, Kierowca_ID, Data) values ($info1, $info2, $info3, '$info4');");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały dodane. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}							
							
							
							break;
		
					}	 
				}
				
				else if(isset($_GET['delete'])) 
				{ 
					
					$table = 'projekt.'.$_GET['delete'];	
					if ($_GET['delete'] === 'Wypożyczenie')
						$table = 'projekt.Wypozyczenie';
			
			
					switch ($table) {
						case 'projekt.Kierowca':
							?>
							<h2>Kierowcy</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							//wyświetlić dane usunięte
							
							$info1 = $_POST['deleteID'];
							$output = pg_query($conn, "delete from $table where kierowca_id = $info1;");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;	
											
						case 'projekt.Pojazd':
							?>
							<h2>Pojazdy</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							//wyświetlić dane usunięte
							
							$info1 = $_POST['deleteID'];
							$output = pg_query($conn, "delete from $table where pojazd_id = $info1;");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Trasa':
							?>
							<h2>Trasy</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							//wyświetlić dane usunięte
							
							$info1 = $_POST['deleteID'];
							$output = pg_query($conn, "delete from $table where trasa_id = $info1;");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
	
							
							break;
							
						case 'projekt.Promocja':
							?>
							<h2>Promocje</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							//wyświetlić dane usunięte
							
							$info1 = $_POST['deleteID'];
							$output = pg_query($conn, "delete from $table where promocja_id = $info1;");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Klient':
							?>
							<h2>Klienci</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							//wyświetlić dane usunięte
							
							$info1 = $_POST['deleteID'];
							$output = pg_query($conn, "delete from $table where klient_id = $info1;");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Kurs':
							?>
							<h2>Kursy</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							//wyświetlić dane usunięte
							
							$info1 = $_POST['deleteID'];
							
							$output = pg_query($conn, "delete from $table where kurs_id = $info1;");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}						
							
							break;
							
						case 'projekt.Rezerwacja':
							?>
							<h2>Rezerwacje</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							//wyświetlić dane usunięte
							
							$info1 = $_POST['deleteID'];
							
							$output = pg_query($conn, "delete from $table where rezerwacja_id = $info1;");
							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
							break;
							
						case 'projekt.Wypozyczenie':
							?>
							<h2>Wypożyczenia</h2>
							<table>
								<form name="doDelete" action="" method="post">
								<tr>
									<td> ID wiersza do usunięcia </td>
									<td><input type="text" required name="deleteID"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="removal" value="Usuń rekord"></td>
								</tr>
								</form>
							</table>
							<?php	
							
							
							$info1 = $_POST['deleteID'];
							
							//$deleted = pg_query($conn, "select * from $table where wypozyczenie_id = $info1;");
							
							$output = pg_query($conn, "delete from $table where wypozyczenie_id = $info1;");

							if(!$output) {
								?><p><?php echo "Pusto tu!\n"; ?><p><?php
							}
							else {
								?><p>Dane zostały usunięte. Sprawdź tablicę w zakładce Przegląd.</p><?php
							}
							
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
