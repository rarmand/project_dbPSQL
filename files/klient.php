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
			   <li><input type="submit" name="tabela" value="Ilość tras klientów"/></li>
			   <li><input type="submit" name="tabela" value="Promocje dla klientów"/></li>
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
					case 'Ilość tras klientów':

						?>
						<h2>Dane klientów i ilość wykonanych tras</h2>
						</br>
						<form action="" method="post">
						<p>ID klienta     
						<input style="border: 1px solid red;" type="text" name="klientID">
						<input style="border: 1px solid red;" type="submit" value="Zmień"></p>
						</form>
						</br>
						<?php	
						
						if (isset($_POST['klientID'])) {
							$id = $_POST['klientID']; 
						
							$output = pg_query($conn, "select k.klient_id, k.imie, k.nazwisko, count(*) from projekt.Klient k, projekt.Rezerwacja r where k.klient_id = r.klient_id and k.klient_id = $id group by k.klient_id;");  							
							?>	
							
							<table>				
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
							</br>
							<?php
						}
						
						$output = pg_query($conn, "select k.klient_id, k.imie, k.nazwisko, count(*) from projekt.Klient k, projekt.Rezerwacja r where k.klient_id = r.klient_id group by k.klient_id;");
						?>	
						</br>
						<table>
							<tr>
								<th> ID klienta</th>
								<th> Imię </th>
								<th> Nazwisko </th>
								<th> Ilość przejechanych tras </th>
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
											
					case 'Promocje dla klientów':
						?>
						<h2>Dane klientów i przypisane im promocje</h2>
						</br>
						<form action="" method="post">
						<p>ID klienta     
						<input style="border: 1px solid red;" type="text" name="klientID">
						<input style="border: 1px solid red;" type="submit" value="Zmień"></p>
						</form>
						</br>
						<?php 
						
						if (isset($_POST['klientID'])) {
							$id = $_POST['klientID']; 
							
							$output = pg_query($conn, "select k.klient_id, k.imie, k.nazwisko, k.Promocja_ID, p.nazwa from projekt.Klient k, projekt.Promocja p where p.promocja_id = k.promocja_id and k.klient_id = $id;"); 
														
							?>	
							<table>				
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
							</br>
						<?php	
							
						}
						
						$output = pg_query($conn, "select k.klient_id, k.imie, k.nazwisko, k.Promocja_ID, p.nazwa from projekt.Klient k, projekt.Promocja p where p.promocja_id = k.promocja_id;");
						?>	
						</br>
						<table>
							<tr>
								<th> ID klienta</th>
								<th> Imię </th>
								<th> Nazwisko </th>
								<th> ID promocji </th>
								<th> Nazwa </th>
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
