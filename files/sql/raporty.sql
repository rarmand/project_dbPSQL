
/* widok w celu bezproblemowego wyświetlenia danych */


/* raport z kursów na najbliższe 3 dni na PIERWSZEJ STRONIE */

/* dane do konkretnego kursu: do wydruku dla kierowców i ogólnie */

/* widok kurs - kierowca I */
create view projekt.KursKierowca as select kurs_id, imie, nazwisko from projekt.kurs, projekt.kierowca where projekt.kurs.kierowca_id = projekt.kierowca.kierowca_id;
/* widok kurs - pojazd II */
create view projekt.KursPojazd as select kurs_id, marka from projekt.kurs,projekt.pojazd where projekt.kurs.pojazd_id = projekt.pojazd.pojazd_id;
/* widok trasa - kurs */
create view projekt.KursTrasa as select kurs_id, trasa_start, godzina_wyjazdu, trasa_meta, godzina_przyjazdu, liczba_pasazerow from projekt.kurs, projekt.trasa where projekt.kurs.trasa_id = projekt.trasa.trasa_id;
/* łączenie pierwszych dwóch tabel */
create view projekt.KursKierowcaPojazd as select imie, nazwisko, projekt.kurspojazd.* from projekt.KursKierowca, projekt.KursPojazd where projekt.KursKierowca.kurs_id =  projekt.KursPojazd.kurs_id;
/* całość */
create view projekt.DanyKurs as select projekt.KursTrasa.kurs_id, imie, nazwisko, marka, trasa_start, godzina_wyjazdu, trasa_meta, godzina_przyjazdu, liczba_pasazerow from projekt.KursKierowcaPojazd, projekt.KursTrasa where projekt.KursTrasa.kurs_id = projekt.KursKierowcaPojazd.kurs_id; 




/* lista rezerwacji z imionami i nazwiskami klientów */
/* klient ids dla danego kursu */
select distinct imie, nazwisko, liczba_miejsc from projekt.Rezerwacja full outer join projekt.Klient on projekt.rezerwacja.klient_id = projekt.klient.klient_id where kurs_id=1000000000;




/* lista kursów dla danego kierowcy */
select kurs_id, marka, trasa_start, godzina_wyjazdu, trasa_meta, godzina_przyjazdu from projekt.Kurs, projekt.Trasa, projekt.Pojazd where projekt.Kurs.trasa_id = projekt.Trasa.trasa_id and projekt.Kurs.pojazd_id = projekt.Pojazd.pojazd_id 
and projekt.Kurs.kierowca_id = 156801 and godzina_wyjazdu between '2017-01-08' and '2017-01-09';



/* raport wypozyczeń na najbliższy tydzień */
select k.imie, k.nazwisko, p.marka, w.data, kl.imie, kl.nazwisko from projekt.Pojazd p, projekt.Kierowca k, projekt.Wypozyczenie w, projekt.Klient kl where kl.klient_id = w.klient_id and k.kierowca_id = w.kierowca_id and p.pojazd_id = w.pojazd_id;
and w.data between '2016-01-08' and '2017-01-11';


select k.imie, k.nazwisko, p.marka from projekt.Pojazd p, projekt.Kierowca k, projekt.Wypozyczenie w where p.pojazd_id = w.pojazd_id and k.kierowca_id = w.wypozyczenie_id;

/* raport zarobek z danego kursu */
select r.kurs_id, sum(r.liczba_miejsc*t.cena) from projekt.rezerwacja r, projekt.trasa t where t.trasa_id = r.trasa_id group by r.kurs_id;



/* raport ostatnich przeglądów samochodów */
select marka, przeglad from projekt.Pojazd;



/* raport przepracowane godziny kierowców w danym tygodniu */
/* godziny na dany kurs zsumowanie po kierowcy*/
select kierowca_id, sum(godzina_przyjazdu - godzina_wyjazdu) from projekt.kurs group by kierowca_id;

/*select sum(godzina_przyjazdu - godzina_wyjazdu) from projekt.kurs group by kierowca_id;
update projekt.kierowca set przeprac_godziny = (select sum(godzina_przyjazdu - godzina_wyjazdu) from projekt.kurs group by kierowca_id);
create view projekt.PrzepracowaneGodziny as select kierowca_id, sum(godzina_przyjazdu - godzina_wyjazdu) from projekt.kurs group by kierowca_id;
*/


/* raport częstość użytkowania danego samochodu -> ile razy się pojawił w danym tygodniu */
select projekt.Kurs.pojazd_id, marka, count(*) from projekt.Pojazd, projekt.Kurs where projekt.Kurs.pojazd_id=projekt.Pojazd.pojazd_id group by projekt.Pojazd.marka, projekt.Kurs.pojazd_id;


select projekt.kurs.pojazd_id, marka, count(*) from projekt.Pojazd right join projekt.Kurs on projekt.Kurs.pojazd_id=projekt.Pojazd.pojazd_id group by projekt.Pojazd.marka, projekt.kurs.pojazd_id;

/* raport klienci i przypisanie im promocje */
select k.klient_id, k.imie, k.nazwisko, k.Promocja_ID, p.nazwa from projekt.Klient k, projekt.Promocja p where p.promocja_id = k.promocja_id;


/* zliczenie ilości tras wykonanych w danym miesiącu */
select k.klient_id, k.imie, k.nazwisko, count(*) from projekt.Klient k, projekt.Rezerwacja r where k.klient_id = r.klient_id group by k.klient_id;





