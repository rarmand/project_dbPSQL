/*	update czy pojazd jest wypozyczony czy nie	*/
update projekt.Pojazd set pozyczony='t' where pojazd_id =23603;

/*	update daty przeglądu poprzez ID	*/
update projekt.Pojazd set przeglad='2016-04-12' where pojazd_id=23603;

/*	klient ??? promocja 	*/
update projekt.Klient set promocja_id=100 where przejechane_km >= 3000;

/*	update kursu KIEROWCA 	*/
update projekt.Kurs set kierowca_id = 156800 where liczba_pasazerow < 16);

/* informacje o rezerwacji miejsc */
create view projekt.kursRezerwacje as select kurs_id, sum(liczba_miejsc) from projekt.rezerwacja group by kurs_id;

/* do zmian LICZBA_PASAŻERÓW */


/*	pilnować aby kurs do jednego miasta nie powtórzył się DATA 		
		   aby kierowca jadący do celu, nie wracał tego samego dni
		   aby liczba pasażerów nie przekraczała ilości miejsc w autobusie
*/

/* update info o trasie, autobusie, kierowcy dla których zarezerwowano bilet */
update projekt.Rezerwacja set Trasa_ID = (select projekt.Kurs.trasa_id from projekt.Kurs where projekt.Kurs.Kurs_ID = 1000000000) where projekt.Rezerwacja.Kurs_ID = 1000000000;

update projekt.Rezerwacja set Pojazd_ID = (select projekt.Kurs.pojazd_id from projekt.Kurs where projekt.Kurs.Kurs_ID = 1000000000) where projekt.Rezerwacja.Kurs_ID = 1000000000;

update projekt.Rezerwacja set Kierowca_ID = (select projekt.Kurs.Kierowca_ID from projekt.Kurs where projekt.Kurs.Kurs_ID = 1000000000) where projekt.Rezerwacja.Kurs_ID = 1000000000;

